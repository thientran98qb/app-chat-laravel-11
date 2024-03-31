<script lang="ts" setup>
import type { HTMLAttributes } from "vue";
import type { LabelProps } from "radix-vue";
import { twMerge } from "tailwind-merge";
import { Label } from "../../../shared/ui/label";

const props = defineProps<
    LabelProps & { class?: HTMLAttributes["class"]; for: string }
>();
</script>

<template>
    <!-- eslint-disable-next-line vuejs-accessibility/label-has-for -->
    <Label :class="twMerge(props.class)" :for="props.for">
        <slot />
    </Label>
</template>
../label
