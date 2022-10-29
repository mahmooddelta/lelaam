<template>
    <Head :title="ad.data.title"/>
    <div class="max-w-lg mx-auto overflow-hidden md:max-w-6xl p-6 pb-12">
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
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="flex-shrink-0 h-5 w-5 text-base-300 transition ease-in-out duration-300 hover:rotate-180"
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
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="flex-shrink-0 h-5 w-5 text-base-300 transition ease-in-out duration-300 hover:rotate-180"
                             fill="none" viewBox="0 0 24 24"
                             stroke="#fb5858" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                        </svg>
                        <a v-text="ad.data.title" disabled class="ml-4 text-sm font-medium text-primary-500"></a>
                    </div>
                </li>
            </ol>
        </nav>
        <section class="grid grid-cols-1 lg:grid-cols-2 px-4 py-8">
            <div class="text-right px-4">
                <h1 class="text-3xl lg:text-4xl font-bold" v-text="ad.data.title"></h1>
                <h2 class="text-base-600 py-6 flex">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                         stroke="#fb5858" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    {{ ad.data.published_at }}
                    در
                    {{ ad.data.district }}
                    ولایت
                    {{ ad.data.state }}
                </h2>
                <section class="lg:flex justify-between pb-4">
                    <div class="lg:flex justify-start">
                        <a v-if="ad.data.phone_number" :href="`tel:${ad.data.phone_number}`"
                           class="btn btn-primary btn-sm mr-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            تماس
                        </a>
                        <Link
                            v-if="$page.props.user && ad.data.user !== 'مهمان' && ad.data.is_chat_enabled && ad.data.user !== $page.props.user.name"
                            :href="route('chat.create', {ad: ad.data.slug})"
                            class="btn btn-primary btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                            </svg>
                            چت
                        </Link>
                    </div>
                    <div class="lg:flex justify-end">
                        <button class="btn btn-outline btn-primary btn-sm modal-button"
                                @click="wantsToReportAd = true"
                                v-if="$page.props.user && can_report">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            گزارش تخلف و مشکل آگهی
                        </button>
                        <span>
                            <!-- Report Post Modal -->
                            <DialogModal :show="wantsToReportAd" @close="wantsToReportAd = null" class="my-24">
                                <template #title>
                                    گزارش تخلف و مشکل در آگهی
                                </template>

                                <template #content>
                                    <section class="py-4">
                                        <!-- Type -->
                                        <div class="mt-4">
                                            <label class="block font-medium text-sm" for="type">
                                                <span
                                                    class="label-text font-bold after:content-['*'] after:ml-0.5 after:text-red-500">
                                                    نوع تخلف یا مشکل
                                                </span>
                                            </label>
                                            <select name="type" id="type"
                                                    class="select select-bordered w-full mt-1 block" v-model="form.type"
                                                    placeholder="انتخاب نوع">
                                                <option selected disabled>انتخاب نوع</option>
                                                <option v-for="type in report_types" :key="type.id" :value="type.id"
                                                        v-text="type.name"></option>
                                            </select>
                                            <section class="text-sm italic m-1">
                                                <label for="typeDescription">توضیخات نوع تخلف یا مشکل:</label>
                                                <p id="typeDescription"
                                                   v-html="currentTypeDescription"></p>
                                            </section>
                                            <div v-if="form.errors.type"
                                                 class="text-red-500 text-sm my-2">{{ form.errors.type }}</div>
                                        </div>
                                        <!-- Description -->
                                        <div class="my-4">
                                        <label for="description" class="label block font-medium">
                                            <span
                                                class="label-text font-bold after:content-['*'] after:ml-0.5 after:text-red-500">
                                                 توضیحات
                                                (
                                                لطفاً چگونه گی و چرایی وجود مشکل یا تخلف را بنویسید.
                                                )
                                            </span>
                                        </label>
                                        <client-only>
                                            <RichEditor
                                                v-model="form.description"
                                                :errors="form.errors.description"
                                                :disabled="form.processing"
                                            />
                                        </client-only>
                                        <div v-if="form.errors.description"
                                             class="text-red-500 text-sm my-2">{{ form.errors.description }}</div>
                                    </div>
                                </section>
                                </template>

                                <template #footer>
                                    <button class="btn btn-outline btn-secondary text-primary-500 mx-2"
                                            @click="wantsToReportAd = null">
                                        منصرف شدم
                                    </button>

                                    <button
                                        @click="submit"
                                        class="btn btn-primary"
                                        type="submit"
                                        :class="{'loading': form.processing}"
                                        :disabled="form.processing">
                                            ثبت
                                    </button>
                                </template>
                            </DialogModal>
                        </span>
                        <Link :href="route('ad.bookmark', { ad: ad.data.slug })"
                              :title="is_bookmarked ? 'نشانی شده' : 'اضافه کردن به نشانی شده ها'"
                              v-if="$page.props.user">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8"
                                 :fill="is_bookmarked ? '#fb5858' : 'none'" viewBox="0 0 24 24"
                                 :stroke="is_bookmarked ? 'currentColor' : '#fb5858'" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/>
                            </svg>
                        </Link>
                    </div>
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
            <client-only>
                <SplideSlider :images="ad.data.media"
                              class="order-first lg:order-last pt-4 lg:py-0 lg:mb-0 mb-12"
                              :id="(Math.random() + 1).toString(36).substring(2)"
                              :key="(Math.random() + 1).toString(36).substring(2)">
                    <SplideSlide v-if="ad.data.media && ad.data.media.length > 0"
                                 v-for="image in ad.data.media"
                                 :key="image.uuid"
                                 :id="image.uuid">
                        <img :alt="ad.data.title + '_image_' + image.uuid"
                             :src="image.url" :data-splide-lazy="image.url"
                             class="rounded-lg w-full object-cover" loading="lazy"/>
                    </SplideSlide>
                    <SplideSlide v-else class="w-full">
                        <img :src="ad.data.thumb" :data-splide-lazy="ad.data.thumb" alt="No Image Placeholder"
                             loading="lazy"
                             class="rounded-lg w-full object-cover"/>
                    </SplideSlide>
                </SplideSlider>
            </client-only>
        </section>
    </div>
</template>
<script setup>
import {computed, ref, watch} from "vue";
import Label from "../Jetstream/Label.vue";
import {useForm} from "@inertiajs/inertia-vue3";
import DialogModal from "../Jetstream/DialogModal.vue";
import Button from "../Jetstream/Button.vue";
import SplideSlider from "../Shared/Components/SplideSlider.vue";
import {SplideSlide} from '@splidejs/vue-splide';
import RichEditor from "../Shared/Components/CKEditor.vue";
import ClientOnly from '@duannx/vue-client-only';

const props = defineProps({
    ad: Object,
    is_bookmarked: Boolean,
    report_types: Object,
    can_report: Boolean,
})

const isEmpty = value => (value == null || value === 0);
const price = computed(() => isEmpty(props.ad.data.price) ? `<b class="text-bold">توافقی</b>` : `<b>${props.ad.data.price}</b> ${props.ad.data.currency}`)

const wantsToReportAd = ref(null)
const form = useForm({
    type: 'انتخاب نوع',
    description: '',
})
const currentTypeDescription = ref('');
watch(() => form.type, () => {
    currentTypeDescription.value = props.report_types.filter(type => type.id === form.type)[0].description
})

const submit = () => {
    form.post(route('post.report', props.ad.data.slug), {
        preserveState: true,
        preserveScroll: true,
        replace: true,
        onSuccess: response => wantsToReportAd.value = null,
    })
};
</script>
