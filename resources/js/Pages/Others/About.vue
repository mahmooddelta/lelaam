<script setup>

import Container from "../../Shared/Components/Container.vue";

defineProps({
    text: String,
})
</script>

<template>
    <Head title="درباره لیلام"/>
    <Container>
        <h1 class="text-4xl text-center text-primary-500">سلام! میخواهی درباره لیلام بدانی؟</h1>
        <h2 class="text-3xl text-center text-base-content mt-4">خوش آمدی!</h2>
        <div class="divider"></div>
        <p class="text-justify my-6" v-html="text"></p>
    </Container>
</template>
