<script setup lang="ts">
import { Link } from "@inertiajs/inertia-vue3";
import PrimaryLayout from "../../Layouts/PrimaryLayout.vue";
defineProps({
    courts: Object,
});
</script>

<template>
    <PrimaryLayout>
        <h3 class="text-md font-medium tracking-normal text-gray-700 py-5">
            Court lists
        </h3>
        <div class="grid grid-cols-1 md:grid-cols-3 sm:grid-cols-2 gap-4">
            <template v-for="court in courts" :key="court.id">
                <div
                    class="relative rounded-lg shadow h-[200px] w-full cursor-pointer hover:translate-y-[-5px] transition-all duration-300"
                >
                    <div
                        class="absolute top-0 left-0 bottom-0 right-0 w-full rounded-lg"
                    >
                        <img
                            :src="court.image"
                            alt=""
                            class="w-full h-full object-cover rounded-lg"
                        />
                    </div>
                    <div class="absolute w-full bottom-0 z-10 p-2">
                        <p
                            class="text-md text-white text-center font-semibold tracking-wide"
                        >
                            {{ court.name }}
                        </p>
                        <p
                            class="text-sm font-semibold text-center tracking-wide text-white"
                        >
                            Giá: {{ court.price }} / h
                        </p>
                    </div>
                    <div
                        class="absolute w-full h-[60px] bottom-0 z-0 bg-black opacity-40 p-2 rounded-ee-lg rounded-es-lg"
                    ></div>
                </div>
            </template>
        </div>
    </PrimaryLayout>
</template>
