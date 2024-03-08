<script setup>
import { defineProps, ref, onMounted } from "vue";
import { store } from '@/store/store.js'
defineProps({
    overlayClasses: {
        type: Object,
        default: () => ({}),
    },
    contentClasses: {
        type: Object,
        default: () => ({}),
    },
    textHeadingClasses: {
        type: Object,
        default: () => ({}),
    },
    imageUrl: String,
    altText: {
        type: String,
        default: "Header image",
    },
    headerHeight: {
        type: String,
        default: "h-[50vh]",
    },
});
</script>

<template>
    <div
        class="relative flex items-center justify-start font-bold text-white rounded-xl "
        :class="headerHeight"
    >
        <div
            class="-z-10 absolute inset-0 w-full h-full px-4 sm:px-6 lg:px-8 rounded-xl"
            :class="overlayClasses"
        ></div>
        <img
            v-if="imageUrl"
            :src="imageUrl"
            :alt="altText"
            alt="Header image"
            class="-z-20 absolute inset-0 w-full h-full object-cover rounded-xl"
        />
        <div class="absolute" :class="textHeadingClasses">
            <slot name="text-heading" />
        </div>
    </div>
    <div
    class="absolute z-20 left-0 right-0 m-auto rounded-xl"
    :class="[contentClasses, { 'top-[48%]': store.isHeaderExtended, 'top-[52%]': !store.isHeaderExtended }]"
>

        <slot />
    </div>
</template>
<style></style>
