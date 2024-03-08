<script setup>
    const urlImage = `/assets/images/themes/${props.image}`;

    const props = defineProps({
    imageUrl: {
        type: String,
        default: "assets/images/themes/culture.png",
    },
    text: {
        type: String,
        default: "Header Text",
    },
    altText: {
        type: String,
        default: "Header image",
    },
    customClasses: {
        type: Object,
        default: () => ({}),
    },
});
</script>
<template>
    <article
        class="themeCard flex flex-col items-center justify-center p-4 rounded-xl shadow-md hover:scale-95 transition duration-150 ease-in-out border h-full"
        :class="customClasses"
    >
        <img
            :src="imageUrl"
            :alt="altText || 'Article image'"
            width="100"
            height="50"
            class="rounded-2xl text-center"
        />
        <div
            v-if="$slots.text"
            class="text-white pt-3"
        >
            <slot name="text" />
        </div>
    </article>
</template>

<style scoped>
.themeCard {
    aspect-ratio: 3 / 2;
    width: 100%;
    position: relative;
}
</style>