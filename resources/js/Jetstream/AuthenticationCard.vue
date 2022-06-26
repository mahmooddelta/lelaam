<template>
    <div class="min-h-fit py-4 flex flex-col sm:justify-center items-center sm:pt-0">
        <div>
            <slot name="logo"/>
        </div>
        <Alert/>
        <div class="w-full sm:max-w-lg px-6 overflow-hidden sm:rounded-lg">
            <slot/>
        </div>
    </div>
</template>
<script>
import Alert from "../Shared/Components/Alert";

export default {
    components: {Alert}
}
</script>
