<script setup>
import Container from "../../Shared/Components/Container.vue";

defineProps({
    text: String,
})
</script>

<template>
    <Head>
        <title>شرایط و ضوابط</title>
    </Head>
    <Container>
        <h1 class="text-4xl text-center text-primary-500">شرایط و ضوابط اپلیکیشن لیلام</h1>
        <div class="divider"></div>
        <p class="text-justify" v-html="text"></p>
    </Container>
</template>
