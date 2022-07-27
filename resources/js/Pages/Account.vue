<script setup>

import Container from "../Shared/Components/Container.vue";
import Collapse from "../Shared/Components/Collapse.vue";
import Ad from "../Shared/Ad.vue"
import {usePage} from "@inertiajs/inertia-vue3";

const props = defineProps({
    ads: Object,
    states: Object,
    bookmarked: Object,
    last_views: Object,
    user_state: Number,
    reports: Object,
})

const badgeType = type => {
    switch (type) {
        case 'pending':
            return 'badge-info';
        case 'resolved':
            return 'badge-success';
        case 'rejected':
            return 'badge-danger';
        default:
            return 'badge-secondary';
    }
};
const pageTitle = usePage().props.value.user ? `${usePage().props.value.user.name} عزیز، حالت چطوره؟ ` : 'حساب من';
</script>

<template>
    <Head title="حساب کاربری من"/>

    <Container>
        <section class="w-full flex justify-between items-center pb-4">
            <h1 class="text-4xl" v-text="pageTitle"></h1>
            <div class="flex">
                <Link :href="route('profile.show')" as="button" class="text-lg flex cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                    ویرایش حساب کاربری
                </Link>
                <div class="divider divider-horizontal"></div>
                <Link :href="route('logout')" as="form" method="post" class="text-lg flex cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                    خروج از حساب کاربری
                </Link>
            </div>
        </section>
        <div class="divider"></div>
        <Collapse title="اعلانات من">
            <section class="w-full grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xs:grid-cols-3 gap-4 px-4"
                     v-if="ads.data.length > 0">
                <Ad v-for="ad in ads.data" :key="ad.id" :ad="ad">
                    <template #footer="{ ad: ad }"
                              v-if="$page.props.user && ad.user !== 'مهمان' && ad.is_published && !ad.is_expired && ad.user !== $page.props.user.name">
                        <Link as="button" class="btn btn-primary btn-outline btn-sm"
                              :href="route('post.edit', ad.slug)">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                            ویرایش
                        </Link>
                    </template>
                </Ad>
            </section>
            <div class="text-center" v-else>
                <p class="text-2xl">
                    شما هیچ اعلانی ثبت نکرده اید!
                </p>
            </div>
        </Collapse>

        <Collapse title="نشانی شده ها">
            <section class="w-full grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xs:grid-cols-3 gap-4 px-4"
                     v-if="bookmarked.data.length > 0">
                <Ad v-for="bookmark in bookmarked.data" :key="bookmark.id" :ad="bookmark.ad"/>
            </section>
            <div class="text-center" v-else>
                <p class="text-2xl">
                    شما هیچ اعلانی را نشانی نکرده اید!
                </p>
            </div>
        </Collapse>

        <Collapse title="آخرین بازدید ها">
            <section class="w-full grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xs:grid-cols-3 gap-4 px-4"
                     v-if="last_views.data.length > 0">
                <Ad v-for="last_view in last_views.data" :key="last_view.id" :ad="last_view.ad"/>
            </section>
            <div class="text-center" v-else>
                <p class="text-2xl">
                    شما هیچ اعلانی را بازدید نکرده اید!
                </p>
            </div>
        </Collapse>

        <Collapse title="گزارش های تخطی و اشتباه">
            <div class="overflow-x-auto" v-if="reports.data.length > 0">
                <table class="table w-full">
                    <!-- head -->
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>نوع گزارش</th>
                        <th>آگهی</th>
                        <th>توضیحات</th>
                        <th>وضعیت</th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- row 1 -->
                    <tr class="hover" v-for="(report, index) in reports.data" :key="report.name">
                        <td v-text="index + 1"></td>
                        <td v-text="report.report_type?.name"></td>
                        <td v-text="report.ad?.title"></td>
                        <td v-html="report.description"></td>
                        <td>
                            <div class="badge" :class="badgeType(report.status)" v-text="report.status_label"></div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="text-center" v-else>
                <p class="text-2xl">
                    شما هیچ گزارشی ثبت نکرده اید!
                </p>
            </div>
        </Collapse>

        <div class="divider"></div>

        <Collapse title="پشتیبانی و راهنمایی">
            <section class="flex justify-center">
                <div class="card w-96 bg-base-100 shadow-xl mr-4">
                    <div class="card-body">
                        <h2 class="card-title">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                 stroke="#fb5858" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/>
                            </svg>
                            پشتیبانی
                        </h2>
                        <p>برای پرسش سوالات، مشکلات خود میتوانید با شماره های زیر تماس بگیرید</p>
                        <a href="tel:0747857970" class="btn btn-primary">تماس</a>
                    </div>
                </div>
                <div class="card w-96 bg-base-100 shadow-xl">
                    <div class="card-body">
                        <h2 class="card-title">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                 stroke="#fb5858" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                            </svg>
                            ایمیل
                        </h2>
                        <p>برای سوالات و مسائل تجاری، میتوانید با ایمیل آدرس زیر ایمیل دهید.</p>
                        <a href="mailto:lilamapp@gmail.com" class="btn btn-primary">ایمیل</a>
                    </div>
                </div>
            </section>
        </Collapse>
    </Container>
</template>
