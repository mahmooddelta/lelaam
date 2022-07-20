<script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/inertia-vue3';
import JetActionMessage from '../../../Jetstream/ActionMessage.vue';
import JetActionSection from '../../../Jetstream/ActionSection.vue';
import JetButton from '../../../Jetstream/Button.vue';
import JetDialogModal from '../../../Jetstream/DialogModal.vue';
import JetInput from '../../../Jetstream/Input.vue';
import JetInputError from '../../../Jetstream/InputError.vue';
import JetSecondaryButton from '../../../Jetstream/SecondaryButton.vue';

defineProps({
    sessions: Array,
});

const confirmingLogout = ref(false);
const passwordInput = ref(null);

const form = useForm({
    password: '',
});

const confirmLogout = () => {
    confirmingLogout.value = true;

    setTimeout(() => passwordInput.value.focus(), 250);
};

const logoutOtherBrowserSessions = () => {
    form.delete(route('other-browser-sessions.destroy'), {
        preserveScroll: true,
        onSuccess: () => closeModal(),
        onError: () => passwordInput.value.focus(),
        onFinish: () => form.reset(),
    });
};

const closeModal = () => {
    confirmingLogout.value = false;

    form.reset();
};
</script>

<template>
    <JetActionSection>
        <template #title>
            دستگاه های فعال
        </template>

        <template #description>
            مدیریت و خروج از دستگاه های فعال
        </template>

        <template #content>
            <div class="max-w-xl text-sm">
                در صورت لزوم، می توانید از تمام جلسات مرورگر دیگر خود در همه دستگاه های خود خارج شوید. برخی از جلسات اخیر شما در زیر فهرست شده است. با این حال، این فهرست ممکن است جامع نباشد. اگر احساس می کنید حساب شما به خطر افتاده است، باید رمز عبور خود را نیز به روز کنید.
            </div>

            <!-- Other Browser Sessions -->
            <div v-if="sessions.length > 0" class="mt-5 space-y-6">
                <div v-for="(session, i) in sessions" :key="i" class="flex items-center">
                    <div>
                        <svg
                            v-if="session.agent.is_desktop"
                            fill="none"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            class="w-8 h-8"
                        >
                            <path d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>

                        <svg
                            v-else
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                            stroke-width="2"
                            stroke="currentColor"
                            fill="none"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            class="w-8 h-8"
                        >
                            <path d="M0 0h24v24H0z" stroke="none" /><rect
                                x="7"
                                y="4"
                                width="10"
                                height="16"
                                rx="1"
                            /><path d="M11 5h2M12 17v.01" />
                        </svg>
                    </div>

                    <div class="ml-3">
                        <div class="text-sm">
                            {{ session.agent.platform ? session.agent.platform : 'نامعلوم' }} - {{ session.agent.browser ? session.agent.browser : 'نامعلوم' }}
                        </div>

                        <div>
                            <div class="text-xs">
                                {{ session.ip_address }},

                                <span v-if="session.is_current_device" class="text-green-500 font-semibold">دستگاه فعلی</span>
                                <span v-else>
                                    آخرین وضعیت فعال بودن در
                                    {{ session.last_active }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex items-center mt-5">
                <JetButton @click="confirmLogout">
                    خارج شدن از دیگر دستگاه ها
                </JetButton>

                <JetActionMessage :on="form.recentlySuccessful" class="ml-3">
                    انجام شد.
                </JetActionMessage>
            </div>

            <!-- Log Out Other Devices Confirmation Modal -->
            <JetDialogModal :show="confirmingLogout" @close="closeModal">
                <template #title>
                    خارج شدن از دیگر دستگاه ها
                </template>

                <template #content>
                    لطفاً رمز عبور خود را وارد کنید تا تأیید کنید که می خواهید از سایر دستگاه ها خارج شوید.

                    <div class="mt-4">
                        <JetInput
                            ref="passwordInput"
                            v-model="form.password"
                            type="password"
                            class="mt-1 block w-3/4"
                            placeholder="Password"
                            @keyup.enter="logoutOtherBrowserSessions"
                        />

                        <JetInputError :message="form.errors.password" class="mt-2" />
                    </div>
                </template>

                <template #footer>
                    <JetSecondaryButton @click="closeModal">
                        لغو
                    </JetSecondaryButton>

                    <JetButton
                        class="ml-3"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                        @click="logoutOtherBrowserSessions"
                    >
                        خارج شدن از دیگر دستگاه ها
                    </JetButton>
                </template>
            </JetDialogModal>
        </template>
    </JetActionSection>
</template>
