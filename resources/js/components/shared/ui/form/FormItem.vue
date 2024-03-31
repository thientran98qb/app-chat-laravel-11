<script lang="ts" setup>
import { type HTMLAttributes } from "vue";
import { twMerge } from "tailwind-merge";
const props = defineProps<{
    class?: HTMLAttributes["class"];
}>();
</script>
<template>
    <div :class="twMerge('space-y-2', props.class)">
        <slot />
    </div>
</template>
