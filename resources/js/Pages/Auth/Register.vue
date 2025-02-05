<script setup>
import {Head, Link, useForm} from '@inertiajs/inertia-vue3';
import JetAuthenticationCard from '../../Jetstream/AuthenticationCard.vue';
import JetAuthenticationCardLogo from '../../Jetstream/AuthenticationCardLogo.vue';
import JetButton from '../../Jetstream/Button.vue';
import JetInput from '../../Jetstream/Input.vue';
import JetCheckbox from '../../Jetstream/Checkbox.vue';
import JetLabel from '../../Jetstream/Label.vue';
import JetValidationErrors from '../../Jetstream/ValidationErrors.vue';
import {ref} from "vue";
import ClientOnly from '@duannx/vue-client-only';

const form = useForm({
    name: '',
    email: '',
    phone: '',
    password: '',
    password_confirmation: '',
    terms: false,
    state: '',
});

const props = defineProps({
    states: Object,
});

const phoneNumberInput = ref(null);

const updatePhoneNumber = () => {
    if (phoneNumberInput.value.otp.length > 0 && phoneNumberInput.value.otp.length <= 10) {
        form.phone = phoneNumberInput.value.otp.join('');
    }
};

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
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
                />
            </div>

            <div class="mt-4">
                <JetLabel for="state" value="ولایت"/>
                <select name="state" id="state" class="select select-bordered w-full mt-1 block" v-model="form.state"
                        placeholder="انتخاب ولایت">
                    <option selected disabled>انتخاب ولایت</option>
                    <option v-for="state in states" :key="state.id" :value="state.id" v-text="state.name"></option>
                </select>
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
            </div>

            <div v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature" class="mt-4">
                <JetLabel for="terms">
                    <div class="flex items-center">
                        <JetCheckbox id="terms" v-model:checked="form.terms" name="terms"/>

                        <div class="ml-2">
                            I agree to the <a target="_blank" :href="route('terms.show')"
                                              class="underline text-sm text-gray-600 hover:text-gray-900">Terms of
                            Service</a> and <a target="_blank" :href="route('policy.show')"
                                               class="underline text-sm text-gray-600 hover:text-gray-900">Privacy
                            Policy</a>
                        </div>
                    </div>
                </JetLabel>
            </div>

            <div class="flex items-center justify-between mt-4">
                <Link :href="route('login')" class="underline text-sm hover:text-primary-500">
                    قبلاً ثبت نام کرده اید؟
                </Link>

                <JetButton class="ml-4 disabled:opacity-75"
                           :disabled="form.processing">
                    ثبت نام
                </JetButton>
            </div>
        </form>
    </JetAuthenticationCard>
</template>
<script>
import {defineAsyncComponent} from "vue";

export default {
    name: "Register",
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
