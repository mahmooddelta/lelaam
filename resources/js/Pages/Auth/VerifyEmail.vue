<script setup>
import { computed } from 'vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import JetAuthenticationCard from '../../Jetstream/AuthenticationCard.vue';
import JetAuthenticationCardLogo from '../../Jetstream/AuthenticationCardLogo.vue';
import JetButton from '../../Jetstream/Button.vue';

const props = defineProps({
    status: String,
});

const form = useForm();

const submit = () => {
    form.post(route('verification.send'));
};

const verificationLinkSent = computed(() => props.status === 'verification-link-sent');
</script>

<template>
    <Head title="تایید ایمیل" />

    <JetAuthenticationCard>
        <template #logo>
            <JetAuthenticationCardLogo />
        </template>

        <div class="mb-4 text-sm">
            سپاس از ثبت نام شما در سیستم! قبل از ادامه دادن لطفاً ایمیل آدرس خویش را با کلیک کردن بر روی لینکی که برای شما ایمیل شده است، تایید کنید! اگر ایمیلی دریافت ننموده اید، میتوانید دوباره درخواست کنید.
        </div>

        <div v-if="verificationLinkSent" class="mb-4 font-medium text-sm text-green-600">
            یک لینک تایید حساب کاربری به ایمیلی که در حین ثبت نام وارد نموده اید، فرستاده شد.
        </div>

        <form @submit.prevent="submit">
            <div class="mt-4 flex items-center justify-between">
                <JetButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    ارسال دوباره لینک فعال سازی
                </JetButton>

                <Link
                    :href="route('logout')"
                    method="post"
                    as="button"
                    class="underline text-sm hover:text-primary-500"
                >
                    خارچ شدن از حساب کاربری
                </Link>
            </div>
        </form>
    </JetAuthenticationCard>
</template>
