<script setup>
const props = defineProps({
    title: {
        type: String,
        default: null,
    },
    subTitle: {
        type: String,
        default: null,
    },
});
</script>
<template>
    <header>
        <div class="relative flex pb-6 tablet:pb-8">
            <div class="flex flex-col tablet:gap-1 laptop:gap-2 flex-grow">
                <h2
                    v-if="title"
                    class="text-2xl py-2 pb-0 tablet:pb-2 tablet:text-3xl desktop:text-4xl leading-loose font-Montserrat font-extrabold text-gray-700"
                >
                    {{ title }}
                </h2>
                <h3
                    v-if="subTitle"
                    class="text-sm pb-2 leading-tight font-normal text-gray-500"
                >
                    {{ subTitle }}
                </h3>
                <div
                    v-if="$slots.text"
                    class="max-w-[35ch] tablet:max-w-[45ch] laptop:max-w-[65ch] text-sm leading-tight tablet:text-base tablet:leading-normal text-gray-500"
                >
                    <slot name="text" />
                </div>
            </div>
            <div v-if="$slots.button" class="min-w-fit self-end">
                <slot name="button" />
            </div>
        </div>
    </header>
</template>
