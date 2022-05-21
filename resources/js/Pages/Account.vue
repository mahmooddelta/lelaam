<script setup>

import Container from "../Shared/Components/Container";
import Collapse from "../Shared/Components/Collapse";
import Ad from "../Shared/Ad"
import {ref, watch} from "vue";

defineProps({
    ads: Object,
    states: Object,
    bookmarked: Object,
    last_views: Object,
})
const selectedState = ref(localStorage.getItem('state') ?? null)
watch(selectedState, (value) => {
    localStorage.setItem('state', value)
})
</script>

<template>
    <Head title="حساب کاربری من"/>

    <Container>
        <Collapse title="اعلانات من">
            <section class="w-full grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xs:grid-cols-3 gap-4 px-4">
                <Ad v-for="ad in ads.data" :key="ad.id" :ad="ad"/>
            </section>
        </Collapse>

        <Collapse title="نشانی شده ها">
            <section class="w-full grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xs:grid-cols-3 gap-4 px-4">
                <Ad v-for="bookmark in bookmarked.data" :key="bookmark.id" :ad="bookmark.ad"/>
            </section>
        </Collapse>

        <Collapse title="آخرین بازدید ها">
            <section class="w-full grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xs:grid-cols-3 gap-4 px-4">
                <Ad v-for="last_view in last_views.data" :key="last_view.id" :ad="last_view.ad"/>
            </section>
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
            <div class="card w-96 bg-base-100 shadow-xl">
                <div class="card-body">
                    <h2 class="card-title">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="#fb5858" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                        پشتیبانی
                    </h2>
                    <p>برای پرسش سوالات، مشکلات خود میتوانید با شماره های زیر تماس بگیرید</p>
                    <a href="tel:0787276233" class="btn btn-primary">تماس</a>
                </div>
            </div>
        </Collapse>
    </Container>
</template>
