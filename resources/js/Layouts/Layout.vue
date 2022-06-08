<script setup>
import Nav from "../Shared/Nav";
import TopNavLinks from "../Shared/TopNavLinks";
import Footer from "../Shared/Footer";
import Alert from "../Shared/Components/Alert";
</script>

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
