<script setup>
import {useForm, usePage} from "@inertiajs/inertia-vue3";
import {Inertia} from "@inertiajs/inertia";
import Container from "../../Shared/Components/Container";
import {onBeforeUnmount} from "vue";

const props = defineProps({
    ad: {
        type: Object,
        required: true
    },
    messages: {
        type: Object,
        required: true,
        default: {},
    },
})
const messageDirection = message => (message?.sender?.id ?? message.sender_id) === usePage().props.value.user.id ? 'justify-start' : 'justify-end';
const messageStyle = message => (message?.sender?.id ?? message.sender_id) === usePage().props.value.user.id ? 'badge badge-primary' : 'badge bg-adaptable';
const form = useForm({
    message: null,
})
const emit = defineEmits(['MessageSent',])
const submit = () => {
    Inertia.post(route('chat.store'), {
        message: form.message,
        post: usePage().props.value.ad.data?.slug,
    }, {
        preserveScroll: true,
        preserveState: true,
        replace: true,
        onFinish: () => {
            emit('MessageSent', {
                user: usePage().props.value.user,
                message: form.message,
                ad: props.ad,
            });
            form.message = ''
        },
    });
}

window.Echo.private('chat')
    .listen('MessageSent', (data) => {
        if (data.ad.slug === props.ad.slug) {
            props.messages.data.push(data.message);
        }
    });

onBeforeUnmount(() => {
    window.Echo.leave('chat');
});

const title = () => ` گفتگو درباره ${usePage().props.value.ad.data?.title}` ?? 'گفتگو';
</script>
<template>
    <Head :title="title()"/>
    <Container>
        <div class="md:flex md:items-center md:justify-between">
            <Link as="div" class="flex cursor-pointer items-center"
                  :href="route('ad.show', { ad: ad.data?.slug })"
                  title="رفتن به مشخصات آگهی">
                <img class="object-cover w-16 h-16"
                     :src="ad.data?.thumb"
                     :alt="`${ad.data?.slug} thumbnail`"/>
                <span class="block ml-2 font-bold text-gray-600 text-2xl"
                      v-text="ad.data?.title"></span>
            </Link>
            <div class="flex justify-center md:justify-end py-4 md:py-0">
                <a v-if="ad.data?.phone_number" :href="`tel:${ad.data?.phone_number}`"
                   class="btn btn-primary btn-sm mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                    </svg>
                    تماس
                </a>
                <Link :href="route('chat')"
                      class="btn btn-primary btn-sm mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                    </svg>
                    رفتن به لیست گفتگو ها
                </Link>
            </div>
        </div>
        <div class="divider"></div>
        <div class="w-full p-4 overflow-auto">
            <ul class="space-y-2" v-if="messages.data.length > 0">
                <li v-for="message in messages.data" :key="message.id" class="flex"
                    :class="messageDirection(message)">
                    <div class="relative max-w-xl p-4 rounded shadow-lg" :class="messageStyle(message)"
                         v-text="message.body"></div>
                </li>
            </ul>
            <div v-else>
                <div class="text-center text-gray-600">
                    <span class="text-2xl">هیچ پیامی در این چت وجود ندارد!</span>
                </div>
            </div>
        </div>
        <div class="divider"></div>
        <div class="flex items-center justify-between">
            <form @submit.prevent="submit" class="flex justify-center w-full" autocomplete="off">
                <input type="text" placeholder="پیام"
                       class="input input-bordered bg-adaptable w-full px-4 mr-4"
                       v-model="form.message"
                       name="message" required/>
                <button type="submit">
                    <svg class="w-8 h-8 text-primary-500 origin-center transform rotate-90"
                         xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 20 20" fill="currentColor">
                        <path
                            d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"/>
                    </svg>
                </button>
            </form>
        </div>
    </Container>
</template>
