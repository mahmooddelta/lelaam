<script setup>
import { ref } from 'vue';
import { Head, useForm } from '@inertiajs/inertia-vue3';
import JetAuthenticationCard from '../../Jetstream/AuthenticationCard.vue';
import JetAuthenticationCardLogo from '../../Jetstream/AuthenticationCardLogo.vue';
import JetButton from '../../Jetstream/Button.vue';
import JetInput from '../../Jetstream/Input.vue';
import JetLabel from '../../Jetstream/Label.vue';
import JetValidationErrors from '../../Jetstream/ValidationErrors.vue';

const form = useForm({
    password: '',
});

const passwordInput = ref(null);

const submit = () => {
    form.post(route('password.confirm'), {
        onFinish: () => {
            form.reset();

            passwordInput.value.focus();
        },
    });
};
</script>

<template>
    <Head title="صفحه امن" />

    <JetAuthenticationCard>
        <template #logo>
            <JetAuthenticationCardLogo />
        </template>

        <div class="mb-4 text-sm">
            این یک بخش محافظت شده است. لطفا رمز عبور تان را قبل از ادامه وارد کنید!
        </div>

        <JetValidationErrors class="mb-4" />

        <form @submit.prevent="submit">
            <div>
                <JetLabel for="password" value="رمزعبور" />
                <JetInput
                    id="password"
                    ref="passwordInput"
                    v-model="form.password"
                    type="password"
                    class="mt-1 block w-full"
                    required
                    autocomplete="current-password"
                    autofocus
                />
            </div>

            <div class="flex justify-end mt-4">
                <JetButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    تایید
                </JetButton>
            </div>
        </form>
    </JetAuthenticationCard>
</template>
