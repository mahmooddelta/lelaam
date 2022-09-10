<template>
    <div class="card w-96 bg-base-100 shadow-xl">
        <figure>
            <img :src="item.media[0].url"
                 :alt="item.title + '_image_' + item.media[0].uuid"
                 class="rounded-lg w-full object-cover h-[12rem]" loading="lazy"/>
        </figure>
        <div class="card-body">
            <div class="pb-4 flex justify-between">
                <strong class="text-sm flex">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                    </svg>
                    {{ item?.category?.name ?? '' }}
                </strong>
                <div class="text-sm flex">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    {{ item.published_at ?? '' }}
                </div>
            </div>
            <h1 class="text-2xl font-bold text-center break-words" v-text="item.title"></h1>
            <div class="card-actions justify-between mt-4">
                <section class="flex justify-between">
                    <div class="w-8 h-8 rounded-full ring ring-primary ring-offset-base-100 ring-offset-2">
                        <img :src="item?.user?.profile_photo_url"
                             class="rounded-full object-cover"
                             :alt="item?.user?.name + 'profile picture'"/>
                    </div>
                    <div class="ml-4 text-xs">
                        <strong v-text="item?.user?.name ?? ''"></strong>
                        <p>نویسنده بلاگ لیلام</p>
                    </div>
                </section>
                <Link as="button" :href="route('blog.post', item.slug)" class="btn btn-primary btn-sm">
                    ادامه...
                </Link>
            </div>
        </div>
    </div>
</template>
<script setup>
defineProps({
    item: Object,
})
</script>
