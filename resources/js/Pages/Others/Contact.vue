<script setup>

import Container from "../../Shared/Components/Container.vue";

const props = defineProps({
    phone: String,
    email: String,
})

</script>

<template>
    <Head>
        <title>تماس با لیلام</title>
    </Head>
    <Container>
        <h1 class="text-4xl text-primary-500 text-center">تماس، اخذ مشاوره و راهنمایی از متخصصین لیلام</h1>
        <div class="divider"></div>
        <section class="flex justify-center">
            <div class="card w-96 bg-base-100 shadow-xl my-2 text-right border-2 border-primary-500 transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-100 duration-300 hover:border-1 hover:shadow-2xl mr-4">
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
                    <a :href="`tel:${phone.slice(3, -4)}`" class="btn btn-primary">تماس</a>
                </div>
            </div>
            <div class="card w-96 bg-base-100 shadow-xl shadow-xl my-2 text-right border-2 border-primary-500 transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-100 duration-300 hover:border-1 hover:shadow-2xl">
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
                    <a :href="`mailto:${email.slice(3, -4)}`" class="btn btn-primary">ایمیل</a>
                </div>
            </div>
        </section>
    </Container>
</template>
