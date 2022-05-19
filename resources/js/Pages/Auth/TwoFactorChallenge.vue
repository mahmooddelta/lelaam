<script setup>
import { nextTick, ref } from 'vue';
import { Head, useForm } from '@inertiajs/inertia-vue3';
import JetAuthenticationCard from '@/Jetstream/AuthenticationCard.vue';
import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo.vue';
import JetButton from '@/Jetstream/Button.vue';
import JetInput from '@/Jetstream/Input.vue';
import JetLabel from '@/Jetstream/Label.vue';
import JetValidationErrors from '@/Jetstream/ValidationErrors.vue';

const recovery = ref(false);

const form = useForm({
    code: '',
    recovery_code: '',
});

const recoveryCodeInput = ref(null);
const codeInput = ref(null);

const toggleRecovery = async () => {
    recovery.value ^= true;

    await nextTick();

    if (recovery.value) {
        recoveryCodeInput.value.focus();
        form.code = '';
    } else {
        codeInput.value.focus();
        form.recovery_code = '';
    }
};

const submit = () => {
    form.post(route('two-factor.login'));
};
</script>

<template>
    <Head title="Two-factor Confirmation" />

    <JetAuthenticationCard>
        <template #logo>
            <JetAuthenticationCardLogo />
        </template>

        <div class="mb-4 text-sm">
            <template v-if="! recovery">
                لطفاً کلید دسترسی برنامه که توسط برنامه authenticator شما تولید شده، را وارد کنید.
            </template>

            <template v-else>
                لطفاً یکی از کد های بازیابی عاجل خود را برای تایید هویت تان وارد کنید.
            </template>
        </div>

        <JetValidationErrors class="mb-4" />

        <form @submit.prevent="submit">
            <div v-if="! recovery">
                <JetLabel for="code" value="کد" />
                <JetInput
                    id="code"
                    ref="codeInput"
                    v-model="form.code"
                    type="text"
                    inputmode="numeric"
                    class="mt-1 block w-full"
                    autofocus
                    autocomplete="one-time-code"
                />
            </div>

            <div v-else>
                <JetLabel for="recovery_code" value="کد بازیابی" />
                <JetInput
                    id="recovery_code"
                    ref="recoveryCodeInput"
                    v-model="form.recovery_code"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="one-time-code"
                />
            </div>

            <div class="flex items-center justify-end mt-4">
                <button type="button" class="text-sm hover:text-primary-500 underline cursor-pointer" @click.prevent="toggleRecovery">
                    <template v-if="! recovery">
                        استفاده از کد بازیابی
                    </template>

                    <template v-else>
                        استفاده از کد دسترسی
                    </template>
                </button>

                <JetButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    ورود به سیستم
                </JetButton>
            </div>
        </form>
    </JetAuthenticationCard>
</template>
