<script setup>
import { defineProps, defineEmits, ref, watchEffect } from "vue";

const props = defineProps({
    maxStars: {
        type: Number,
        default: 5,
    },
    modelValue: {
        type: Number,
        default: 0,
    },
});

const emits = defineEmits(["update:modelValue"]);

const selectedStar = ref(props.modelValue);

watchEffect(() => {
    selectedStar.value = props.modelValue;
    console.log("selectedStar.value", selectedStar.value);
});

const selectStar = (starNumber) => {
    selectedStar.value = starNumber;
    emits("update:modelValue", starNumber);
};
</script>

<template>
    <div class="flex min-w-fit w-full">
        <span
            v-for="starNumber in maxStars"
            :key="starNumber"
            class="block material-symbols-outlined cursor-pointer"
            :class="{
                'text-yellow-500': starNumber <= selectedStar,
            }"
            @click="selectStar(starNumber)"
        >
            star
        </span>
    </div>
</template>
