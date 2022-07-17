<script setup>
import Nav from "../Shared/Nav.vue";
import TopNavLinks from "../Shared/TopNavLinks.vue";
import Footer from "../Shared/Footer.vue";
import Alert from "../Shared/Components/Alert.vue";</script>

<template>
    <div class="max-w-full mx-auto">
        <nav class="sticky top-0 z-50">
            <TopNavLinks/>
            <Nav/>
        </nav>
        <main class="bg-base-200">
            <Alert/>
            <slot/>
        </main>
        <Footer/>
    </div>
</template>
