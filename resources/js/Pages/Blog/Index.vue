<script setup>

import Container from "../../Shared/Components/Container.vue";
import {Splide, SplideSlide} from '@splidejs/vue-splide';
import BlogPost from "../../Shared/Components/BlogPost.vue";

const props = defineProps({
    categories: Object,
    featured: Object,
    newest: Object,
})

const options = {
    gap: '1rem',
    paginationDirection: 'rtl',
    direction: 'rtl',
    rewind: props.featured.data.length > 1,
    autoplay: props.featured.data.length > 1,
    type: props.featured.data.length > 1 ? 'loop' : 'slide',
    drag: props.featured.data.length > 1,
    keyboard: props.featured.data.length > 1,
    pagination: props.featured.data.length > 1,
    paginationKeyboard: props.featured.data.length > 1,
    arrows: props.featured.data.length > 1,
    lazyLoad: 'nearby',
}
</script>

<template>
    <Head title="بلاگ لیلام"/>
    <Container>
        <!-- Featured -->
        <Splide :options="options" :has-track="true">
            <SplideSlide v-for="item in featured.data" :key="item.id">
                <div class="card lg:card-side bg-base-100 shadow-xl py-0 pr-8 break-all">
                    <figure class="w-full">
                        <img v-if="item.media"
                             :src="item.media?.url" :data-splide-lazy="item.media?.url"
                             :alt="item.title + '_image_' + item.media?.uuid"
                             class="rounded-lg w-full object-cover max-h-[24rem]" loading="lazy"/>
                        <img v-else
                             src="../../../../public/images/No_image_preview.png"
                             alt="Default blog post image"
                             class="rounded-lg w-full object-contain h-[12rem]" loading="lazy"/>
                    </figure>
                    <div class="card-body min-w-[26rem]">
                        <div class="h-full">
                            <div class="pb-4 flex justify-between">
                                <Link as="strong" :href="route('blog.posts', {category: item?.category?.slug})"
                                      class="text-sm flex cursor-pointer hover:underline hover:decoration-2 hover:decoration-primary-500 hover:underline-offset-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                                    </svg>
                                    {{ item?.category?.name ?? '' }}
                                </Link>
                                <span class="text-sm flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    {{ item.published_at ?? '' }}
                                </span>
                            </div>
                            <h1 class="text-4xl font-bold card-title mt-4" v-text="item.title"></h1>
                            <div class="py-2 w-fit whitespace-normal text-justify break-all"
                                 v-html="item.content"></div>
                        </div>
                        <div class="card-actions justify-between sticky bottom-0 pt-4">
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
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 lg:gap-20 md:gap-12 w-full justify-items-center">
            <template v-for="item in newest.data" :key="item.id">
                <BlogPost :item="item"/>
            </template>
        </div>
        <div class="divider"></div>
        <!-- Categories -->
        <div class="w-full" v-for="(category, index) in categories.data" :key="category.id">
            <template v-if="category.posts && category.posts.length > 0">
                <section class="flex justify-between pb-4">
                    <Link as="h2" :href="route('blog.posts', {category: category.slug})"
                          class="text-3xl font-bold flex cursor-pointer hover:underline hover:decoration-4 hover:decoration-primary-500 hover:underline-offset-8">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mr-1" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                        </svg>
                        {{ category.name }}
                    </Link>
                    <Link as="button" :href="route('blog.posts', {category: category.slug})"
                          class="flex cursor-pointer btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="w-6 h-6 mr-1">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M11.25 9l-3 3m0 0l3 3m-3-3h7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>

                        دیدن تمامی پست ها
                    </Link>
                </section>
                <div
                    class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 lg:gap-20 md:gap-12 w-full justify-items-center">
                    <template v-for="item in category.posts" :key="item.id">
                        <BlogPost :item="item"/>
                    </template>
                </div>
            </template>
            <div class="divider" v-if="index !== categories.data.length - 1"></div>
        </div>
    </Container>
</template>
