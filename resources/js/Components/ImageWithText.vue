<script setup>
const props = defineProps({
    imageUrl: {
        type: String,
        default: "https://source.unsplash.com/random/1920x1080",
    },
    altText: {
        type: String,
        default: "Header image",
    },
    customClasses: {
        type: Object,
        default: () => ({}),
    },
    overlayClasses: {
        type: Object,
        default: () => ({}),
    },
});
</script>
<template>
    <article
        class="relative z-20 group w-full min-h-[35vw] tablet:min-h-[25vw] laptop:min-h-[20vw] overflow-hidden rounded-xl"
        :class="customClasses"
    >
        <img
            :src="imageUrl"
            :alt="altText || 'Article image'"
            class="absolute inset-0 w-full h-full group-hover:scale-105 transform transition-all duration-100 ease-in-out object-cover"
        />

        <div
            class="absolute inset-0 w-full h-full bg-gradient-to-t from-black/60 from-10%"
            :class="overlayClasses"
        ></div>
        <div
            v-if="$slots.text"
            class="absolute bottom-0 right-0 left-0 mx-auto p-2 laptop:p-4"
        >
            <slot name="text" />
        </div>
    </article>
</template>
