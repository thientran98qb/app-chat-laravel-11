<script lang="ts" setup>
const props = defineProps<{ error: string | undefined }>();
</script>

<template>
    <div v-if="props.error" as="p" class="text-sm font-medium text-destructive">
        {{ props.error }}
    </div>
</template>
