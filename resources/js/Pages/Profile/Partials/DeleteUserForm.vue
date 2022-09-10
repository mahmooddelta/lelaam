<script setup>
import {ref} from 'vue';
import {useForm} from '@inertiajs/inertia-vue3';
import JetActionSection from '../../../Jetstream/ActionSection.vue';
import JetDialogModal from '../../../Jetstream/DialogModal.vue';
import JetDangerButton from '../../../Jetstream/DangerButton.vue';
import JetInput from '../../../Jetstream/Input.vue';
import JetInputError from '../../../Jetstream/InputError.vue';
import JetSecondaryButton from '../../../Jetstream/SecondaryButton.vue';

const confirmingUserDeletion = ref(false);
const passwordInput = ref(null);

const form = useForm({
    password: '',
});

const confirmUserDeletion = () => {
    confirmingUserDeletion.value = true;

    setTimeout(() => passwordInput.value.focus(), 250);
};

const deleteUser = () => {
    form.delete(route('current-user.destroy'), {
        preserveScroll: true,
        onSuccess: () => closeModal(),
        onError: () => passwordInput.value.focus(),
        onFinish: () => form.reset(),
    });
};

const closeModal = () => {
    confirmingUserDeletion.value = false;

    form.reset();
};
</script>

<template>
    <JetActionSection>
        <template #title>
            حذف حساب کاربری
        </template>

        <template #description>
            حذف دائمی حساب کاربری
        </template>

        <template #content>
            <div class="max-w-xl text-sm">
                پس از حذف حساب شما، تمام منابع و داده های آن برای همیشه حذف می شوند. قبل از حذف حساب خود، لطفاً هر داده
                یا اطلاعاتی را که می‌خواهید حفظ کنید، دانلود کنید.
            </div>

            <div class="mt-5">
                <JetDangerButton @click="confirmUserDeletion">
                    حذف حساب کاربری
                </JetDangerButton>
            </div>

            <!-- Delete Account Confirmation Modal -->
            <JetDialogModal :show="confirmingUserDeletion" @close="closeModal">
                <template #title>
                    حذف حساب کاربری
                </template>

                <template #content>
                    آیا مطمئن هستید که می خواهید اکانت خود را حذف کنید؟ پس از حذف حساب شما، تمام منابع و داده های آن
                    برای همیشه حذف می شوند. لطفاً رمز عبور خود را وارد کنید تا تأیید کنید که می خواهید حساب خود را برای
                    همیشه حذف کنید.

                    <div class="mt-4">
                        <JetInput
                            ref="passwordInput"
                            v-model="form.password"
                            type="password"
                            class="mt-1 block w-3/4"
                            placeholder="Password"
                            @keyup.enter="deleteUser"
                        />

                        <JetInputError :message="form.errors.password" class="mt-2"/>
                    </div>
                </template>

                <template #footer>
                    <JetSecondaryButton @click="closeModal">
                        لغو
                    </JetSecondaryButton>

                    <JetDangerButton
                        class="ml-3"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                        @click="deleteUser"
                    >
                        حذف حساب کاربری
                    </JetDangerButton>
                </template>
            </JetDialogModal>
        </template>
    </JetActionSection>
</template>
