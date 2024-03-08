<script setup>
const props = defineProps({
    customClass: {
        type: Array,
        default: [{}],
    },
});
</script>
<template>
    <section
        class="bg-gray-500/0 px-2 laptop:px-0 mt-[48px] laptop:mt-[92px] mx-auto min-h-[25vh] flex flex-col desktop:mx-auto laptop:mx-6 desktop:max-w-[1280px]"
        :class="customClass"
    >
        <div v-if="$slots.header">
            <slot name="header" />
        </div>
        <div>
            <slot name="default" />
        </div>
        <div v-if="$slots.footer">
            <slot name="footer" />
        </div>
    </section>
</template>
<style scoped></style>
