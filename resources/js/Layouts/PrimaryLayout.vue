<script setup lang="ts">
import HeaderNavbar from "./HeaderNavbar.vue";
</script>
<template>
    <HeaderNavbar />

    <div class="container mx-auto px-3">
        <slot />
    </div>
</template>
