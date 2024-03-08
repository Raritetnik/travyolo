<script setup>
import { ref } from "vue";
defineProps({
    title: String,
    subtitle: String,
});
</script>

<template>
    <div
        class="font-Montserrat font-medium flex items-center gap-4 pb-2 bg-white"
    >
        <div class="flex items-center flex-initial" v-if="$slots.icon">
            <slot name="icon" />
        </div>
        <div class="flex flex-col flex-grow xl:gap-1">
            <span class="text-sm">{{ title }}</span>
            <div class="text-base font-normal text-gray-500">
                <slot />
            </div>
        </div>
    </div>
</template>
