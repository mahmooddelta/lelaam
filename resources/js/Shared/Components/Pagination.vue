<script setup>
defineProps({
    links: Array,
})
</script>

<template>
    <div v-if="links.length > 3">
        <div class="flex flex-wrap justify-center -mb-1">
            <template v-for="(link, key) in links">
                <div v-if="link.url === null" :key="key" class="mb-1 mr-1 px-4 py-3 text-gray-400 text-sm btn btn-disabled" v-html="link.label"/>
                <Link v-else :key="`link-${key}`"
                      class="mb-1 mr-1 px-4 py-3 text-sm btn btn-outline"
                      :class="{ 'btn-primary': link.active }" :href="link.url" v-html="link.label"/>
            </template>
        </div>
    </div>
</template>
