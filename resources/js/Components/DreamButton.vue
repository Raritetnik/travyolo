<template>
  <a
    href="#"
    class="dreamLandButton flex items-center justify-center p-4 rounded-xl shadow-md hover:scale-95 transition duration-150 ease-in-out max-h-500 border"
  >
    <div class="flex-shrink-0">
      <img :src="urlImage" class="w-15 h-10" alt="Image DreamLand" />
    </div>
    <div class="pl-2 flex-grow">
      <h4
        class="text-black font-OpenSans text-sm md:text-base lg:text-lg xl:text-xl"
      >
        {{ props.country_name }}
      </h4>
    </div>
  </a>
</template>

<style scoped>
.dreamLandButton {
  aspect-ratio: 3 / 1;
  width: 100%;
  position: relative;
}
</style>

<script setup>
import { defineProps } from "vue";
const props = defineProps(["image", "country_name"]);
const urlImage = `/assets/images/${props.image}`;
</script>
