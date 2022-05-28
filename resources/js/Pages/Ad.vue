<template>
    <Head :title="ad.data.title"/>
    <div class="max-w-lg mx-auto overflow-hidden md:max-w-6xl p-6">
        <nav class="w-full" aria-label="Breadcrumb">
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
        <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 2xl:grid-cols-2 py-3">
            <div class="text-right p-4">
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
                <section class="flex justify-between pb-4">
                    <a v-if="ad.data.phone_number" :href="`tel:${ad.data.phone_number}`" class="btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        تماس با فروشنده
                    </a>
                    <Link :href="route('ad.bookmark', { ad: ad.data.slug })" :title="is_bookmarked ? 'نشانی شده' : 'اضافه کردن به نشانی شده ها'"
                          v-if="$page.props.user">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" :fill="is_bookmarked ? '#fb5858' : 'none'" viewBox="0 0 24 24"
                             :stroke="is_bookmarked ? 'currentColor' : '#fb5858'" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/>
                        </svg>
                    </Link>
                </section>
                <div class="overflow-x-auto">
                    <table class="table w-full">
                        <tbody>
                        <!-- row 1 -->
                        <tr>
                            <td>قیمت</td>
                            <td v-html="price"></td>
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
            <Swiper :images="ad.data.media" :model-data="ad.data"/>
        </section>
    </div>
</template>
<script setup>

import Swiper from "../Shared/Components/Swiper";
import {computed} from "vue";

const props = defineProps({
    ad: Object,
    is_bookmarked: Boolean,
})
const price = computed(() => {
    return props.ad.data.price == null ? `<b class="text-bold">توافقی</b>` : `<b>${props.ad.data.price}</b> ${props.ad.data.currency}`;
})
// !TODO add ad to bookmarks without login
// const bookmark = bookmark => {
//     let bookmarks = new Set()
//     if (localStorage.getItem('bookmarks'))
//         bookmarks.add(Array.from((JSON.stringify(localStorage.getItem('bookmarks'))).split(',')))
//     console.log(bookmarks)
//     bookmarks.add(bookmark)
//     localStorage.setItem('bookmarks', JSON.stringify(Array.from(bookmarks.keys())))
// }
// props.is_bookmarked = () => {
//     const bookmark = localStorage.getItem('bookmark')
//     return bookmark.includes(this.props.ad.slug)
// }
</script>
