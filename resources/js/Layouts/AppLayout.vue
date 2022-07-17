<script setup>
import {Head} from '@inertiajs/inertia-vue3';
import JetBanner from '../Jetstream/Banner.vue';

defineProps({
    title: String,
});

</script>

<template>
    <div>
        <Head title="پروفایل"/>

        <div class="min-h-screen bg-base-100">
            <!-- Page Heading -->
            <header v-if="$slots.header" class="bg-base-100 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="header"/>
                </div>
            </header>

            <!-- Page Content -->
            <main>
                <slot/>
            </main>
        </div>
    </div>
</template>
