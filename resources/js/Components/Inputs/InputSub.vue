<script setup>
import { Link } from "@inertiajs/vue3";
defineProps({
    type: {
        type: String,
        default: "button",
    },
    method: {
        type: String,
        default: "get",
    },
    href: {
        type: String,
        default: "/",
    },
});
</script>

<template>
    <input
        type="text"
        class="bg-transparent rounded-md border-3 border-white w-44"
        placeholder="Email adress"
    />
</template>
