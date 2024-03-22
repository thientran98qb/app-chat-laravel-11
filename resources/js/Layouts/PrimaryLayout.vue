<script setup></script>
<template>
    <section class="w-full h-14 bg-red-300">
        <div
            class="flex items-center justify-between h-full container mx-auto max-w-screen-lg px-3"
        >
            <div>
                <p class="text-white leading-tight font-bold text-xl">LOGO</p>
            </div>
            <div class="tracking-wider text-white font-normal">TDEV</div>
        </div>
    </section>
    <div class="container mx-auto max-w-screen-lg px-3">
        <slot />
    </div>
</template>
