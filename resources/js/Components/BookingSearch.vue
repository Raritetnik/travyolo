<script setup>
import { ref, computed } from "vue";
const props = defineProps({
    bookingClasses: {
        type: Object,
        default: () => ({}),
    },
    services: {
        type: Object,
        default: () => [],
    },
});
const currentService = ref(1);
const currentServiceComponent = computed(() => {
    return props.services[currentService.value - 1].component;
});

const setActiveService = (id) => {
    currentService.value = id;
};
</script>

<template>
    <div class="bg-white text-gray-900 rounded-xl ">
        <div class="flex w-full bg-gray-100 rounded-xl">
            <button
                @click="setActiveService(service.id)"
                class="border-1 rounded-t-md text-base hover:bg-gray-200 active:text-secondary-500 py-2 px-4"
                :class="{
                    'bg-white': currentService === service.id,
                }"
                type="button"
                v-for="service in services"
                :key="service.id"
            >
                {{ service.name }}
            </button>
        </div>
        <div class="p-3 pt-5 z-30 rounded-b-xl">
            <component :is="currentServiceComponent"></component>
        </div>
    </div>
</template>
