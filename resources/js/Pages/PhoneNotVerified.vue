<script setup>
import {Head, useForm} from '@inertiajs/inertia-vue3';
import JetAuthenticationCard from '../Jetstream/AuthenticationCard.vue';
import JetAuthenticationCardLogo from '../Jetstream/AuthenticationCardLogo.vue';
import JetButton from '../Jetstream/Button.vue';
import JetLabel from '../Jetstream/Label.vue';
import JetValidationErrors from '../Jetstream/ValidationErrors.vue';
import {getAuth, RecaptchaVerifier, signInWithPhoneNumber} from 'firebase/auth'
import {computed, onMounted, ref} from "vue";
import {initializeApp} from "firebase/app";
import {getAnalytics} from "firebase/analytics";
import ClientOnly from '@duannx/vue-client-only';

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
    apiKey: "AIzaSyBSMj80wutV8V9xN7Kzl_sIgaB11FFYfH8",
    authDomain: "lelaam-42896.firebaseapp.com",
    projectId: "lelaam-42896",
    storageBucket: "lelaam-42896.appspot.com",
    messagingSenderId: "606275294671",
    appId: "1:606275294671:web:a2679e3c18de34c23deeba",
    measurementId: "G-N970EG7BPE"
};

// Initialize Firebase
let app;
let analytics
let auth
if (typeof window !== 'undefined') {
    app = initializeApp(firebaseConfig);
    analytics = getAnalytics(app);
    auth = getAuth();
}

const errors = ref('');
const isRecaptchaSolved = ref(false);

const otpSent = ref(false);
const otpInput = ref(null);
const otp = ref(null);
const otpVerified = ref(false);

const form = useForm({
    phone: '',
    phoneVerified: otpVerified.value,
});

const isPhoneInputted = computed(() => form.phone.length === 10);
const phoneNumberInput = ref(null);

const updatePhoneNumber = () => {
    if (phoneNumberInput.value.otp.length > 0 && phoneNumberInput.value.otp.length <= 10) {
        form.phone = phoneNumberInput.value.otp.join('');
    }
};

const updateOtp = () => {
    if (otpInput.value.otp.length > 0 && otpInput.value.otp.length <= 10) {
        otp.value = otpInput.value.otp.join('');
    }
};

const submit = () => {
    form.transform(data => ({
        ...data,
        phoneVerified: otpVerified.value,
    })).post(route('phone.verify.store'));
};
if (typeof window !== 'undefined') {
    const handleOTPExceptions = error => {
        if (error.message === 'TOO_MANY_ATTEMPTS_TRY_LATER')
            errors.value = 'تعداد ارسال کد از مقدار مجاز عبور نموده است. لطفاً بعداً کوشش کنید!';
        else if (error.message === 'ERROR_SESSION_EXPIRED')
            errors.value = 'کد وارد شده منقضی شده است. لطفاً روی ارسال دوباره کلیک کنید!';
        else if (error.message === 'ERROR_QUOTA_EXCEEDED')
            errors.value = 'مشکلی رخ داده است. لطفاً بعداً دوباره کوشش نمایید!';
        else if (error.message === 'ERROR_INVALID_VERIFICATION_CODE')
            errors.value = 'کد وارد شده درست نیست!';
        else if (error.message === 'SESSION_EXPIRED') {
            errors.value = 'کد وارد شده منقضی شده است. لطفاً روی ارسال دوباره کلیک کنید!';
            window.location.reload();
        } else
            errors.value = 'مشکلی در ارسال کد تایید رخ داده است. لطفاً بعداً دوباره کوشش نمایید.';

        if (errors.value !== '')
            toast.error(errors.value, {timeout: 2000});
    };
    onMounted(() => {
        // Recaptcha
        auth.languageCode = 'fa';
        setTimeout(() => {
            window.recaptchaVerifier = new RecaptchaVerifier('recaptcha-container', {
                // 'size': 'invisible',
                'callback': (response) => isRecaptchaSolved.value = true,
                'expired-callback': () => isRecaptchaSolved.value = false,
            }, auth);
            recaptchaVerifier.render().then((widgetId) => {
                window.recaptchaWidgetId = widgetId;
            });
        }, 1000)
    });
    const sendOtp = () => {
        if (isRecaptchaSolved.value) {

            const countryCode = '+93' // Afghanistan
            const phoneNumberFormatted = form.phone.charAt(0) === '0' ? form.phone.substring(1) : form.phone;
            const phoneNumber = countryCode + phoneNumberFormatted;
            // !TODO Problem is here and thus it should be traced and sent
            signInWithPhoneNumber(auth, phoneNumber, window.recaptchaVerifier)
                .then(function (confirmationResult) {
                    // SMS sent. Prompt user to type the code from the message, then sign the
                    // user in with confirmationResult.confirm(code).
                    window.confirmationResult = confirmationResult;

                    toast.success('کد تاییدی ارسال شد.', {timeout: 3000});
                    otpSent.value = true;
                })
                .catch(function (error) {
                    grecaptcha.reset(window.recaptchaWidgetId);
                    otpSent.value = false;
                    handleOTPExceptions(error);
                });
        } else {
            toast.error('لطفا پازل را حل کنید!', {timeout: 2000});
        }
    };
    const verifyOtp = () => {
        window.confirmationResult.confirm(otp.value).then(function (result) {
            otpVerified.value = true;
        }).catch(function (error) {
            otpVerified.value = false;
            handleOTPExceptions(error);
        });
    };
}
</script>

<template>
    <Head title="ثبت نام"/>

    <JetAuthenticationCard>
        <template #logo>
            <JetAuthenticationCardLogo/>
        </template>

        <JetValidationErrors class="mb-4"/>

        <form @submit.prevent="submit">
            <div class="mt-4">
                <JetLabel for="phone" value="شماره تماس"/>
                <div dir="ltr" class="mt-2 overflow-x-auto flex justify-center">
                    <client-only>
                        <v-otp-input
                            ref="phoneNumberInput"
                            input-classes="input input-bordered bg-adaptable w-[2.6rem] mr-1 my-1"
                            separator=" "
                            :num-inputs="10"
                            :should-auto-focus="true"
                            :is-input-num="true"
                            :placeholder="['0', '7', '*', '*', '*', '*', '*', '*', '*', '*']"
                            @on-change="updatePhoneNumber()"
                        />
                    </client-only>
                </div>

                <div class="flex items-center justify-end mt-4" v-if="isPhoneInputted && isRecaptchaSolved && !otpSent">
                    <button id="sign-in-button" class="btn btn-outline btn-primary mx-1" @click="sendOtp"
                            v-if="!otpSent" type="button">
                        ارسال کد
                    </button>
                </div>

                <div class="divider"></div>

                <div id="recaptcha-container" class="flex flex-grow justify-center w-full my-2"
                     v-show="!isRecaptchaSolved"></div>

                <section class="w-full text-center" v-if="isPhoneInputted && isRecaptchaSolved && otpSent">
                    <b class="text-sm text-gray-400 flex">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                             stroke="#fb5858" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        یک کد 6 رقمی برای بررسی درست بودن شماره تماس وارد شده به شماره تان فرستاده شد. لطفاً آنرا در
                        ورودی زیر وارد نمائید.
                    </b>
                    <section class="flex justify-center my-4">
                        <div dir="ltr">
                            <client-only>
                                <v-otp-input
                                    ref="otpInput"
                                    input-classes="input input-bordered bg-adaptable w-[2.6rem] mr-1"
                                    separator=" "
                                    :num-inputs="6"
                                    :should-auto-focus="true"
                                    :is-input-num="true"
                                    :placeholder="['*', '*', '*', '*', '*', '*']"
                                    @on-change="updateOtp()"
                                    @on-complete="verifyOtp"
                                />
                            </client-only>
                        </div>
                    </section>
                    <button @click="sendOtp" class="btn btn-outline btn-primary mx-1" type="button">
                        کدی دریافت نکرده اید! ارسال دوباره
                    </button>
                </section>
            </div>

            <div class="flex items-center justify-end mt-4">
                <JetButton class="ml-4 disabled:opacity-75"
                           :disabled="form.processing || !isRecaptchaSolved || !otpSent">
                    تایید شماره تماس و ادامه
                </JetButton>
            </div>
        </form>
    </JetAuthenticationCard>
</template>
<script>
import {defineAsyncComponent} from "vue";

export default {
    name: "PhoneNotVerified",
    components: {
        VOtpInput: defineAsyncComponent(() => {
            if (typeof window !== 'undefined') {
                return import('vue3-otp-input')
                    .then(module => module.default)
            }
        })
    },
}
</script>
