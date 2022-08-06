<script setup>

import Container from "../../Shared/Components/Container.vue";
import {Splide, SplideSlide} from '@splidejs/vue-splide';
import BlogPost from "../../Shared/Components/BlogPost.vue";

defineProps({
    categories: Object,
    featured: Object,
    newest: Object,
})
</script>

<template>
    <Head title="بلاگ لیلام"/>
    <Container>
        <!-- Featured -->
        <Splide v-for="item in featured.data" :key="item.id">
            <SplideSlide>
                <div class="card lg:card-side bg-base-100 shadow-xl py-0">
                    <figure class="w-screen">
                        <img :src="item.media[0].url" :data-splide-lazy="item.media[0].url"
                             :alt="item.title + '_image_' + item.media[0].uuid"
                             class="rounded-lg w-full object-cover h-[22rem]" loading="lazy"/>
                    </figure>
                    <div class="card-body">
                        <div class="h-full">
                            <div class="pb-4 flex justify-between">
                                <strong class="text-sm flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                                    </svg>
                                    {{ item?.category?.name ?? '' }}
                                </strong>
                                <span class="text-sm flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    {{ item.published_at ?? '' }}
                                </span>
                            </div>
                            <h1 class="text-4xl font-bold card-title" v-text="item.title"></h1>
                            <div class="py-2 w-fit whitespace-normal text-justify" v-html="item.content"></div>
                        </div>
                        <div class="card-actions justify-between">
                            <div class="avatar">
                                <div
                                    class="w-12 h-12 rounded-full ring ring-primary ring-offset-base-100 ring-offset-2">
                                    <img :src="item?.user?.profile_photo_url"
                                         :alt="item?.user?.name + 'profile picture'"/>
                                </div>
                                <div class="flex flex-col items-center ml-4">
                                    <strong class="text-sm" v-text="item?.user?.name ?? ''"></strong>
                                    <p class="text-sm">نویسنده بلاگ لیلام</p>
                                </div>
                            </div>
                            <Link as="button" :href="route('blog.post', item.slug)" class="btn btn-primary">
                                ادامه...
                            </Link>
                        </div>
                    </div>
                </div>
            </SplideSlide>
        </Splide>
        <div class="divider"></div>
        <!-- Newest -->
        <h2 class="text-3xl font-bold pb-4 flex">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mr-1" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z"/>
            </svg>
            جدید ترین پست ها
        </h2>
        <div class="flex flex-row w-full">
            <div class="grid grid-cols-4" v-for="item in newest.data" :key="item.id">
                <BlogPost :item="item"/>
            </div>
        </div>
        <div class="divider"></div>
        <!-- Categories -->
        <div class="w-full" v-for="category in categories.data" :key="category.id">
            <h2 class="text-3xl font-bold pb-4 flex">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mr-1" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                </svg>
                {{ category.name }}
            </h2>
            <div class="flex flex-row w-full">
                <div v-for="item in category.posts" :key="item.id">
                    <BlogPost :item="item"/>
                </div>
            </div>
        </div>
    </Container>
</template>
