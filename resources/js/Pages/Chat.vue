<script setup>
import Container from "../Shared/Components/Container";

const props = defineProps({
    ads: Object,
    ad: {
        type: Object,
        default: null
    },
})
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

        <ul class="overflow-auto h-full">
            <h2 class="my-2 mb-2 ml-2 text-3xl text-gray-600">گفتگو ها</h2>
            <div class="divider"></div>
            <li>
                <Link v-for="ad in ads.data" :key="ad.id" :href="route('chat.create', {post: ad.slug})"
                      class="flex items-center px-3 py-2 text-sm transition duration-150 ease-in-out border-b border-gray-300 cursor-pointer hover:bg-base-100 focus:outline-none rounded">
                    <img class="object-cover w-16 h-16"
                         :src="ad.thumb" alt="ad.title"/>
                    <div class="w-full pb-2">
                        <div class="flex justify-between">
                            <span class="block ml-2 font-semibold text-xl" v-text="ad.title"></span>
                            <span class="block ml-2 text-sm text-gray-600"
                                  v-text="ad.messages[ad.messages.length - 1].created_at ?? ''"></span>
                        </div>
                        <span class="block ml-2 text-sm text-gray-600"
                              v-text="ad.messages[ad.messages.length - 1].body.substring(0, 50) + '...' ?? ''"></span>
                    </div>
                </Link>
            </li>
        </ul>
    </Container>
</template>
