<script setup>
import {Head, Link, useForm} from '@inertiajs/inertia-vue3';
import JetAuthenticationCard from '@/Jetstream/AuthenticationCard.vue';
import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo.vue';
import JetButton from '@/Jetstream/Button.vue';
import JetInput from '@/Jetstream/Input.vue';
import JetCheckbox from '@/Jetstream/Checkbox.vue';
import JetLabel from '@/Jetstream/Label.vue';
import JetValidationErrors from '@/Jetstream/ValidationErrors.vue';

const form = useForm({
    name: '',
    email: '',
    phone: '',
    password: '',
    password_confirmation: '',
    terms: false,
});

const submit = () => {
    // if (otpVerified.value) {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
    // } else
    //     alert('بدون تایید شماره تلفن ثبت نام امکان پذیر نیست!');
};

// const auth = getAuth();
// const isRecaptchaSolved = ref(false);
// const otpSent = ref(false);
//
// onMounted(() => {
//     auth.languageCode = 'fa';
//     setTimeout(() => {
//         window.recaptchaVerifier = new RecaptchaVerifier('recaptcha-container', {
//             'size': 'invisible',
//             'callback': (response) => isRecaptchaSolved.value = true,
//             'expired-callback': () => isRecaptchaSolved.value = false,
//         }, auth);
//         recaptchaVerifier.render().then((widgetId) => {
//             window.recaptchaWidgetId = widgetId;
//         });
//     }, 1000)
// });
// const appVerifier = ref(window.recaptchaVerifier);
// const otp = ref(null);
//
// const sendOtp = () => {
//     if (isRecaptchaSolved.value) {
//         if (form.phone.length !== 10) {
//             alert('شماره تلفن باید حداقل 10 رقم باشد!');
//         } else {
//             //
//             let countryCode = '+93' // Afghanistan
//             let phoneNumber = countryCode + form.phone
//             //
//             signInWithPhoneNumber(auth, phoneNumber, appVerifier)
//                 .then(function (confirmationResult) {
//                     // SMS sent. Prompt user to type the code from the message, then sign the
//                     // user in with confirmationResult.confirm(code).
//                     window.confirmationResult = confirmationResult;
//                     //
//                     alert('کد تاییدی ارسال شد.')
//                     otpSent.value = true;
//                 }).catch(function (error) {
//                 grecaptcha.reset(window.recaptchaWidgetId);
//                 alert('خطا! ارسال کد تاییدی با مشکل روبرو شد.')
//                 console.log(error)
//             });
//         }
//     } else {
//         alert('لطفا پازل را حل کنید!')
//     }
// };
// const otpVerified = ref(false);
// const verifyOtp = () => {
//     if (form.phone.length !== 10 || otp.length !== 6) {
//         alert('شماره تلفن یا کد وارد شده درست نیست!');
//     } else {
//         window.confirmationResult.confirm(otp.value).then(function (result) {
//             otpVerified.value = true;
//             console.log(code, result)
//         }).catch(function (error) {
//             otpVerified.value = false;
//             alert('کد وارد شده صحیح نیست!')
//         });
//     }
// };
// const isPhoneInputted = computed(() => form.phone.length === 10);
</script>

<template>
    <Head title="ثبت نام"/>

    <JetAuthenticationCard>
        <template #logo>
            <JetAuthenticationCardLogo/>
        </template>

        <JetValidationErrors class="mb-4"/>

        <form @submit.prevent="submit">
            <div>
                <JetLabel for="name" value="اسم"/>
                <JetInput
                    id="name"
                    v-model="form.name"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    autofocus
                    autocomplete="name"
                />
            </div>

            <div class="mt-4">
                <JetLabel for="email" value="ایمیل آدرس"/>
                <JetInput
                    id="email"
                    v-model="form.email"
                    type="email"
                    class="mt-1 block w-full"
                    required
                />
            </div>

            <div class="mt-4">
                <JetLabel for="password" value="رمز عبور"/>
                <JetInput
                    id="password"
                    v-model="form.password"
                    type="password"
                    class="mt-1 block w-full"
                    required
                    autocomplete="new-password"
                />
            </div>

            <div class="mt-4">
                <JetLabel for="password_confirmation" value="تایید رمز عبور"/>
                <JetInput
                    id="password_confirmation"
                    v-model="form.password_confirmation"
                    type="password"
                    class="mt-1 block w-full"
                    required
                    autocomplete="new-password"
                />
            </div>
            <div id="recaptcha-container"></div>
            <div class="mt-4">
                <JetLabel for="phone" value="شماره تماس"/>
                <JetInput
                    id="phone"
                    v-model="form.phone"
                    type="phone"
                    class="mt-1 block w-full"
                    required
                />
                <!--                <section class="flex mt-2 justify-start pr-2" v-show="isPhoneInputted">-->
                <!--                    <button id="sign-in-button" class="btn btn-outline btn-primary mx-1" @click="sendOtp" v-show="!otpSent" type="button">ارسال کد</button>-->
                <!--                    <input v-show="otpSent" class="input input-bordered bg-adaptable" type="text" minlength="6" maxlength="6" min="0" max="9" v-model="otp"-->
                <!--                           placeholder="OTP"/>-->
                <!--                    <button @click="sendOtp" v-show="otpSent" class="btn btn-outline btn-primary mx-1" type="button">ارسال دوباره</button>-->
                <!--                </section>-->
            </div>

            <div v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature" class="mt-4">
                <JetLabel for="terms">
                    <div class="flex items-center">
                        <JetCheckbox id="terms" v-model:checked="form.terms" name="terms"/>

                        <div class="ml-2">
                            I agree to the <a target="_blank" :href="route('terms.show')" class="underline text-sm text-gray-600 hover:text-gray-900">Terms of
                            Service</a> and <a target="_blank" :href="route('policy.show')" class="underline text-sm text-gray-600 hover:text-gray-900">Privacy
                            Policy</a>
                        </div>
                    </div>
                </JetLabel>
            </div>

            <div class="flex items-center justify-between mt-4">
                <Link :href="route('login')" class="underline text-sm hover:text-primary-500">
                    قبلاً ثبت نام کرده اید؟
                </Link>

                <JetButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    ثبت نام
                </JetButton>
            </div>
        </form>
    </JetAuthenticationCard>
</template>
