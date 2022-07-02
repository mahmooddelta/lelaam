<script setup>
import {useForm, usePage} from "@inertiajs/inertia-vue3";
import {Inertia} from "@inertiajs/inertia";
import Container from "../../Shared/Components/Container.vue";
import {onBeforeUnmount, onMounted, ref} from "vue";
import {scrollToBottom} from "../../custom";

const props = defineProps({
    conversation: {
        type: Object,
        required: true
    },
    ad: {
        type: Object,
        required: true
    },
    messages: {
        type: Object,
        required: true,
        default: {},
    },
});

const messageDirection = message => (message?.sender?.id) === usePage().props.value.user.id ? 'justify-start' : 'justify-end';
const messageStyle = message => (message?.sender?.id) === usePage().props.value.user.id ? 'badge badge-primary' : 'badge bg-adaptable';

const form = useForm({
    message: null,
})

const submit = () => {
    Inertia.post(route('chat.store', {ad: props.ad.data.slug,}), {
        message: form.message,
        conversation_id: props.conversation.data.id,
    }, {
        preserveScroll: true,
        preserveState: true,
        replace: true,
        onFinish: () => {
            form.message = ''
        },
    });
}

window.Echo.private(`chat.${props.conversation.data.id}`)
    .listen('MessageSentEvent', (data) => {
        const messageIndex = props.messages.data.findIndex((item) => item.id === data.message.id);
        messageIndex < 0 ? props.messages.data.push(data.message) : props.messages.data[messageIndex] = data.message;
        scrollToBottom('#chatList');
    });

// Typing indicator
const isTyping = ref(false)
const typing = () => {
    window.Echo.private(`chat.${props.conversation.data.id}`)
        .whisper('typing', {
            user: usePage().props.value.user,
            typing: true,
        });
}

window.Echo.private(`chat.${props.conversation.data.id}`)
    .listenForWhisper('typing', (data) => {
        if (data.user.id !== usePage().props.value.user.id) {
            isTyping.value = true;

            setTimeout(() => {
                isTyping.value = false;
            }, 900);
        }
    });

onBeforeUnmount(() => {
    window.Echo.leave(`chat.${props.conversation.data.id}`);
});

const title = () => ` گفتگو درباره ${usePage().props.value.ad.data?.title}` ?? 'گفتگو';

onMounted(() => {
    scrollToBottom('#chatList');
});
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
                <span class="ml-2 font-bold text-gray-600 text-2xl">
                    {{ ad.data?.title }}
                    <section v-if="isTyping" class="text-sm text-gray-500">
                        <i>در حال تایپ...</i>
                    </section>
                </span>
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
        <div id="chatList" class="w-full p-4 overflow-y-auto max-h-[19rem]">
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
        <div id="chatForm" class="flex items-center justify-between">
            <form @submit.prevent="submit" class="flex justify-center w-full" autocomplete="off">
                <input type="text" placeholder="پیام"
                       class="input input-bordered bg-adaptable w-full px-4 mr-4"
                       v-model="form.message"
                       @keydown="typing"
                       @keyup="isTyping = false"
                       @focusin="isTyping"
                       name="message" required/>
                <div v-if="form.errors.message" class="text-red-500 text-sm my-2">{{ form.errors.message }}</div>
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
