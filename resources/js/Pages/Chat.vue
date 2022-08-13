<script setup>
import Container from "../Shared/Components/Container.vue";
import {onBeforeUnmount} from "vue";
import {Inertia} from "@inertiajs/inertia";

const props = defineProps({
    conversations: Object,
})
if (typeof window !== 'undefined') {
    window.Echo.private('conversation')
        .listen('ConversationCreatedEvent', (data) => {
            const messageIndex = props.conversations.data.findIndex((item) => item.id === data.conversation.id);
            messageIndex < 0 ? props.conversations.data.push(data.conversation) : props.conversations.data[messageIndex] = data.conversation;
        });

    onBeforeUnmount(() => {
        window.Echo.leave('conversation');
    });
}

const deleteConversation = (conversationId) => {
    Inertia.visit(route('conversation.destroy', conversationId), {
        method: 'delete',
        data: {},
        replace: true,
        preserveState: true,
        preserveScroll: true,
        onError: errors => {
            toast.error('حذف گفتگو ناموفق بود!')
        },
        onFinish: visit => {
            toast.success('گفتگو موفقانه حذف شد.')
        },
    });
}
</script>

<template>
    <Head title="گفتگو ها"/>
    <Container>
        <!--            <div class="mx-3 my-3">-->
        <!--                <div class="relative text-gray-600">-->
        <!--                  <span class="absolute inset-y-0 left-0 flex items-center pl-2">-->
        <!--                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"-->
        <!--                         viewBox="0 0 24 24" class="w-6 h-6 text-gray-300">-->
        <!--                      <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>-->
        <!--                    </svg>-->
        <!--                  </span>-->
        <!--                    <input type="search" class="block w-full py-2 pl-10 bg-base-100 rounded outline-none" name="search"-->
        <!--                           placeholder="Search" required/>-->
        <!--                </div>-->
        <!--            </div>-->

        <ul>
            <h2 class="my-2 mb-2 ml-2 text-3xl text-gray-600">گفتگو ها</h2>
            <div class="divider"></div>
            <li class="overflow-y-auto max-h-[19rem]">
                <section v-for="conversation in conversations.data" :key="conversation.id"
                         v-if="conversations.data.length > 0"
                         class="flex items-center px-3 py-2 text-sm transition duration-150 ease-in-out border-b border-gray-300 cursor-pointer hover:bg-base-100 focus:outline-none rounded">
                    <Link :href="route('chat.create', {ad: conversation?.ad?.slug, conversation: conversation.id})"
                          class="flex items-center w-full">
                        <img class="object-cover w-16 h-16"
                             :src="conversation?.ad?.thumb" :alt="conversation?.ad?.title"/>
                        <div class="w-full pb-2">
                            <span class="block ml-2 font-semibold text-xl" v-text="conversation?.ad?.title"></span>
                            <div class="text-sm ml-2 mt-1 text-gray-500">
                                <p v-text="conversation.last_message_text"></p>
                                <p v-text="conversation.last_message_time"></p>
                            </div>
                        </div>
                    </Link>
                    <div class="dropdown dropdown-left dropdown-end">
                        <label tabindex="0" class="btn btn-xs btn-ghost">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                            </svg>
                        </label>
                        <ul tabindex="0" class="dropdown-content menu shadow bg-base-100 rounded-lg">
                            <li>
                                <button @click="deleteConversation(conversation.id)" class="text-primary-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                    حذف
                                </button>
                            </li>
                        </ul>
                    </div>
                </section>
                <div v-else>
                    <p class="text-center text-2xl">
                        گفتگویی وجود ندارد!
                    </p>
                </div>
            </li>
        </ul>
    </Container>
</template>
