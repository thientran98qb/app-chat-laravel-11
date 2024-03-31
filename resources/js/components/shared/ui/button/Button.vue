<script setup lang="ts">
import { HTMLAttributes } from "vue";
import { type ButtonVariants, buttonVariants } from ".";
import { Primitive, type PrimitiveProps } from "radix-vue";
import { twMerge } from "tailwind-merge";

interface Props extends PrimitiveProps {
    variant?: ButtonVariants["variant"];
    size?: ButtonVariants["size"];
    as?: string;
    class?: HTMLAttributes["class"];
}

const props = withDefaults(defineProps<Props>(), {
    as: "button",
});
</script>

<template>
    <Primitive
        :as="props.as"
        :as-child="asChild"
        :class="twMerge(buttonVariants({ variant, size }), props.class)"
    >
        <slot />
    </Primitive>
</template>
