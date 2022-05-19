<template>
    <div class="min-h-fit py-10 flex flex-col sm:justify-center items-center sm:pt-0">
        <div>
            <slot name="logo" />
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 shadow-md overflow-hidden sm:rounded-lg bg-base-300">
            <slot />
        </div>
    </div>
</template>
