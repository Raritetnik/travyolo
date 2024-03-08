<script setup>
import { Link } from "@inertiajs/vue3";
import { ref } from 'vue'

const hover = ref(false);
defineProps({
    type: {
        type: String,
        default: "button",
    },
    method: {
        type: String,
        default: "get",
    },
});
</script>

<template>
    <Link
        :type="type"
        :as="button"
        :method="method"
        class="inline-flex gap-2 items-center px-3 py-2 m-0 bg-transparent border-primary-500 border-2 rounded-3xl font-semibold text-sm text-primary-500 transition ease-in-out duration-150 max-h-16 hover:shadow-lg hover:text-white hover:bg-primary-500"
        @mouseover="hover = true"
        @mouseleave="hover = false"
    >
        <slot />

        <div class="relative w-[16px] h-[16px]">
            <transition-group name="icon" class="absolute top-0">
                <img v-if="!hover" class="absolute top-0" src="assets/Images/left_hand.svg" alt="More not active">
                <img v-else class="absolute top-0" src="assets/Images/left_hand_white.svg" alt="More active">
            </transition-group>
        </div>

    </Link>
</template>

<style scoped>
.icon-leave-active {
    transition: all 500ms cubic-bezier(1,0,1,1);
}

.icon-enter-active {
    transition: all 500ms cubic-bezier(1,1,0,1);
}
.icon-enter-from,
.icon-leave-to {
  opacity: 0;
}
</style>