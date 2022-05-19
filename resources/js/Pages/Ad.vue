<script setup>
defineProps({
    ad: Object,
})
</script>

<template>
    <div class="max-w-lg mx-auto overflow-hidden md:max-w-6xl p-6">
        <nav class="w-full flex-row" aria-label="Breadcrumb">
            <ol role="list" class="flex items-center space-x-4">
                <li>
                    <div class="flex items-center">
                        <Link :href="route('ads')" class="mx-4 text-sm font-medium text-base-700 hover:font-bold">
                            آگهی ها
                        </Link>
                    </div>
                </li>

                <li>
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 h-5 w-5 text-base-300 transition ease-in-out duration-300 hover:rotate-180"
                             fill="none" viewBox="0 0 24 24"
                             stroke="#fb5858" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                        </svg>
                        <Link :href="route('ads', {'category': ad.data.category.slug})" v-text="ad.data.category.name"
                              class="ml-4 text-sm font-medium text-base-700 hover:font-bold"></Link>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 h-5 w-5 text-base-300 transition ease-in-out duration-300 hover:rotate-180"
                             fill="none" viewBox="0 0 24 24"
                             stroke="#fb5858" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                        </svg>
                        <a v-text="ad.data.title" disabled class="ml-4 text-sm font-medium text-primary-500"></a>
                    </div>
                </li>
            </ol>
        </nav>
        <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 2xl:grid-cols-2 px-16 py-10">
            <div class="text-right">
                <h1 class="text-4xl font-bold" v-text="ad.data.title"></h1>
                <h2 class="text-base-600 py-6 flex">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="#fb5858" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    {{ ad.data.created_at }}
                    در
                    {{ ad.data.district }}
                    ولایت
                    {{ ad.data.state }}
                </h2>
                <div class="overflow-x-auto">
                    <table class="table w-full">
                        <tbody>
                        <!-- row 1 -->
                        <tr>
                            <td>قیمت</td>
                            <td v-html="`<b>${ad.data.price}</b> ${ad.data.currency}`"></td>
                        </tr>
                        <tr v-for="attribute in ad.data.attributes" :key="attribute.id">
                            <td v-text="attribute.name"></td>
                            <td v-html="attribute.value"></td>
                        </tr>
                        <tr v-for="value in ad.data.values" :key="value.id">
                            <td v-text="value.attribute.name"></td>
                            <td v-html="value.name"></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <h4 class="text-lg font-bold my-4">توضیحات</h4>
                <p v-html="ad.data.desc"></p>
            </div>
            <!-- Carousel -->
            <!-- !TODO replace it with swiper -->
            <div class="carousel max-w-md p-4 space-x-4 rounded-box">
                <div class="carousel-item" v-if="ad.data.media.length > 0" v-for="image in ad.data.media" :key="image.uuid" :id="image.uuid">
                    <img :src="image.url" :alt="ad.data.title + '_image_' + image.uuid" class="rounded-box w-full"/>
                </div>
                <div class="carousel-item" v-else>
                    <img :src="ad.data.thumb" alt="No Image Placeholder" class="rounded-box"/>
                </div>
            </div>
        </section>
    </div>
</template>
