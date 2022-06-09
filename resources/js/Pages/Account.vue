<script setup>

import Container from "../Shared/Components/Container";
import Collapse from "../Shared/Components/Collapse";
import Ad from "../Shared/Ad"
import {ref, watch} from "vue";
import {Inertia} from "@inertiajs/inertia";

const props = defineProps({
    ads: Object,
    states: Object,
    bookmarked: Object,
    last_views: Object,
    user_state: Number,
    reports: Object,
})
const selectedState = ref(props.user_state ?? null);
watch(selectedState, (value) => {
    // localStorage.setItem('state', value)
    // localStorage.getItem('state')
    Inertia.visit(route('account.user.state.change', {state: value}, {
        preserveState: true,
        preserveScroll: true,
        replace: true,
    }))
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
</script>

<template>
    <Head title="حساب کاربری من"/>

    <Container>
        <Collapse title="اعلانات من">
            <section class="w-full grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xs:grid-cols-3 gap-4 px-4">
                <Ad v-for="ad in ads.data" :key="ad.id" :ad="ad" v-if="ads.data.length > 0"/>
                <div class="text-center" v-else>
                    <p class="text-2xl">
                        شما هیچ اعلانی ثبت نکرده اید!
                    </p>
                </div>
            </section>
        </Collapse>

        <Collapse title="نشانی شده ها">
            <section class="w-full grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xs:grid-cols-3 gap-4 px-4">
                <Ad v-for="bookmark in bookmarked.data" :key="bookmark.id" :ad="bookmark.ad" v-if="bookmarked.data.length > 0"/>
                <div class="text-center" v-else>
                    <p class="text-2xl">
                        شما هیچ اعلانی نشانی نکرده اید!
                    </p>
                </div>
            </section>
        </Collapse>

        <Collapse title="آخرین بازدید ها">
            <section class="w-full grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xs:grid-cols-3 gap-4 px-4">
                <Ad v-for="last_view in last_views.data" :key="last_view.id" :ad="last_view.ad" v-if="last_views.data.length > 0"/>
                <div class="text-center" v-else>
                    <p class="text-2xl">
                        شما هیچ اعلانی را بازدید نکرده اید!
                    </p>
                </div>
            </section>
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
                        <td v-text="report.report_type.name"></td>
                        <td v-text="report.ad.title"></td>
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

        <Collapse title="تغییر ولایت">
            <section class="w-full grid grid-cols-4 md:grid-cols-4 gap-4 px-4">
                <div class="form-control" v-for="state in states" :key="state.id">
                    <label class="label cursor-pointer flex justify-start">
                        <input type="radio" name="states" class="radio checked:bg-red-500" v-model="selectedState" :value="state.id"/>
                        <span class="label-text px-2" v-text="state.name"></span>
                    </label>
                </div>
            </section>
        </Collapse>

        <Collapse title="پشتیبانی و راهنمایی">
            <section class="flex justify-center">
                <div class="card w-96 bg-base-100 shadow-xl mr-4">
                    <div class="card-body">
                        <h2 class="card-title">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="#fb5858" stroke-width="2">
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
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="#fb5858" stroke-width="2">
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
