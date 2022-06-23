<script setup>
import {Head, Link, useForm} from '@inertiajs/inertia-vue3';
import JetAuthenticationCard from '@/Jetstream/AuthenticationCard.vue';
import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo.vue';
import JetButton from '@/Jetstream/Button.vue';
import JetInput from '@/Jetstream/Input.vue';
import JetCheckbox from '@/Jetstream/Checkbox.vue';
import JetLabel from '@/Jetstream/Label.vue';
import JetValidationErrors from '@/Jetstream/ValidationErrors.vue';

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    identity: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.transform(data => ({
        ...data,
        remember: form.remember ? 'on' : '',
    })).post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <Head title="ورود به سیستم"/>
    <JetAuthenticationCard>
        <template #logo>
            <JetAuthenticationCardLogo/>
        </template>

        <JetValidationErrors class="mb-4"/>

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <div>
                <JetLabel for="identity" value="ایمیل آدرس یا شماره تلفن"/>
                <JetInput
                    id="identity"
                    v-model="form.identity"
                    type="text"
                    class="mt-2 block w-full"
                    required
                    autofocus
                />
            </div>

            <div class="mt-4">
                <JetLabel for="password" value="رمز عبور"/>
                <JetInput
                    id="password"
                    v-model="form.password"
                    type="password"
                    class="mt-2 block w-full"
                    required
                    autocomplete="current-password"
                />
            </div>

            <div class="block mt-4">
                <label class="flex items-center">
                    <JetCheckbox v-model:checked="form.remember" name="remember"/>
                    <span class="ml-2 text-sm">مرا به خاطر بسپار</span>
                </label>
            </div>

            <div class="flex items-center justify-between mt-4">
                <Link v-if="canResetPassword" :href="route('password.request')" class="underline text-sm hover:text-primary-500">
                    رمز عبور تان را فراموش کرده اید؟
                </Link>

                <JetButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    ورود به سیستم
                </JetButton>
            </div>
        </form>
    </JetAuthenticationCard>
</template>
