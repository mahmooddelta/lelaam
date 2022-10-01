<script setup>
import Container from "../../Shared/Components/Container.vue";

defineProps({
    post: Object,
})
</script>

<template>
    <Head :title="post.data.title"/>
    <Container>
        <nav class="w-full my-4" aria-label="Breadcrumb">
            <ol role="list" class="flex items-center space-x-4">
                <li>
                    <div class="flex items-center">
                        <Link :href="route('blog.index')" class="mr-4 text-sm font-medium text-base-700 hover:font-bold">
                            پست های بلاگ
                        </Link>
                    </div>
                </li>

                <li>
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="flex-shrink-0 h-5 w-5 text-base-300 transition ease-in-out duration-300 hover:rotate-180"
                             fill="none" viewBox="0 0 24 24"
                             stroke="#fb5858" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                        </svg>
                        <Link
                            :href="route('blog.posts', {category: post.data?.category?.slug})"
                            v-text="post.data.category.name"
                            class="ml-4 text-sm font-medium text-base-700 hover:font-bold"></Link>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="flex-shrink-0 h-5 w-5 text-base-300 transition ease-in-out duration-300 hover:rotate-180"
                             fill="none" viewBox="0 0 24 24"
                             stroke="#fb5858" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                        </svg>
                        <a v-text="post.data.title" disabled class="ml-4 text-sm font-medium text-primary-500"></a>
                    </div>
                </li>
            </ol>
        </nav>
        <section>
            <img :src="post.data.media[0].url"
                 :alt="post.data.title + '_image_' + post.data?.media[0]?.uuid"
                 class="rounded-lg w-full object-cover max-h-[26rem]" loading="lazy"/>
        </section>
        <section class="pt-6">
            <div class="mb-6 flex justify-between">
                <div class="flex justify-between">
                    <div class="w-8 h-8 rounded-full ring ring-primary ring-offset-base-100 ring-offset-2">
                        <img :src="post.data?.user?.profile_photo_url"
                             class="object-cover rounded-full"
                             :alt="post.data?.user?.name + 'profile picture'"/>
                    </div>
                    <div class="ml-4 text-xs">
                        <strong v-text="post.data?.user?.name ?? ''"></strong>
                        <p>نویسنده بلاگ لیلام</p>
                    </div>
                </div>
                <section class="flex">
                    <strong class="text-sm flex">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                        </svg>
                        {{ post.data?.category?.name ?? '' }}
                    </strong>
                    <span class="mx-4 text-gray-500">|</span>
                    <div class="text-sm flex">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        {{ post.data.published_at ?? '' }}
                    </div>
                </section>
            </div>
            <h1 class="text-2xl font-bold break-words" v-text="post.data.title"></h1>
            <p class="text-justify my-4" v-html="post.data.content"></p>
        </section>
        <div class="divider"></div>
        <section class="pb-4" v-if="post.data.tags && post.data.tags.length > 0">
            <p class="text-xl mb-4">
                تگ ها
            </p>
            <template v-for="tag in post.data.tags" :key="tag.id">
                <Link :href="route('blog.posts', {tag: tag.slug})" class="p-4 mx-1 badge badge-primary"
                      v-text="tag.name"></Link>
            </template>
        </section>
    </Container>
</template>
