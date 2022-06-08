<script setup>
import {Head, useForm} from '@inertiajs/inertia-vue3';
import JetAuthenticationCard from '@/Jetstream/AuthenticationCard.vue';
import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo.vue';
import JetButton from '@/Jetstream/Button.vue';
import JetInput from '@/Jetstream/Input.vue';
import JetLabel from '@/Jetstream/Label.vue';
import JetValidationErrors from '@/Jetstream/ValidationErrors.vue';
import {getAuth, RecaptchaVerifier, signInWithPhoneNumber} from 'firebase/auth'
import {computed, onMounted, ref} from "vue";

const errors = ref('');
const auth = getAuth();
const isRecaptchaSolved = ref(false);
const otpSent = ref(false);
const otp = ref(null);
const otpVerified = ref(false);
const form = useForm({
    phone: '',
    phoneVerified: otpVerified.value,
});
const isPhoneInputted = computed(() => form.phone.length === 10);

const submit = () => {
    form.transform(data => ({
        ...data,
        phoneVerified: otpVerified.value,
    })).post(route('phone.verify'));
};
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
        if (form.phone.length !== 10) {
            toast.error('شماره تلفن باید حداقل 10 رقم باشد!', {timeout: 2000});
        } else {
            //
            let countryCode = '+93' // Afghanistan
            let phoneNumber = countryCode + form.phone
            //
            signInWithPhoneNumber(auth, phoneNumber, window.recaptchaVerifier)
                .then(function (confirmationResult) {
                    // SMS sent. Prompt user to type the code from the message, then sign the
                    // user in with confirmationResult.confirm(code).
                    window.confirmationResult = confirmationResult;
                    //
                    toast.success('کد تاییدی ارسال شد.', {timeout: 3000});
                    otpSent.value = true;
                })
                .catch(function (error) {
                    grecaptcha.reset(window.recaptchaWidgetId);
                    isRecaptchaSolved.value = false;
                    otpSent.value = false;
                    handleOTPExceptions(error);
                });
        }
    } else {
        toast.error('لطفا پازل را حل کنید!', {timeout: 2000});
    }
};
const verifyOtp = () => {
    if (form.phone.length !== 10 || otp.value.length !== 6) {
        toast.error('شماره تلفن یا کد وارد شده درست نیست!', {timeout: 2000});
    } else {
        window.confirmationResult.confirm(otp.value).then(function (result) {
            otpVerified.value = true;
            console.log(otp.value, result)
        }).catch(function (error) {
            otpVerified.value = false;
            handleOTPExceptions(error);
        });
    }
};
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
                <JetInput
                    id="phone"
                    v-model="form.phone"
                    type="phone"
                    class="mt-1 block w-full"
                    required
                />
                <div id="recaptcha-container" class="flex justify-center w-full my-2" v-show="!isRecaptchaSolved"></div>
                <section class="flex mt-2 justify-between pr-2" v-show="isPhoneInputted">
                    <button id="sign-in-button" class="btn btn-outline btn-primary mx-1" @click="sendOtp" v-show="!otpSent" type="button">ارسال کد</button>
                    <input v-show="otpSent" @focusout="verifyOtp" class="input input-bordered bg-adaptable" type="text" minlength="6" maxlength="6" min="0"
                           max="9" v-model="otp"
                           placeholder="کد یکبار مصرف"/>
                    <button @click="sendOtp" v-show="otpSent" class="btn btn-outline btn-primary mx-1" type="button">ارسال دوباره</button>
                </section>
            </div>

            <div class="flex items-center justify-end mt-4">
                <JetButton class="ml-4 disabled:opacity-75"
                           :disabled="form.processing || !isRecaptchaSolved">
                    تایید شماره تماس
                </JetButton>
            </div>
        </form>
    </JetAuthenticationCard>
</template>
