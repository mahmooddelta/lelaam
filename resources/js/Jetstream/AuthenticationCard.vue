<template>
    <div class="min-h-fit py-4 flex flex-col sm:justify-center items-center sm:pt-0">
        <div>
            <slot name="logo" />
        </div>

        <div class="w-full sm:max-w-md px-6 overflow-hidden sm:rounded-lg">
            <slot />
        </div>
    </div>
</template>
