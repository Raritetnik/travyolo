<template>
  <div class="bg-white shadow-lg rounded-lg">
    <div class="relative">
      <img :src="urlImage" alt="Hotel Room" class="rounded-t-lg" style="z-index: 1;" />
      <div class="absolute inset-0 flex flex-col justify-end p-4">
        <p class="text-white text-lg font-OpenSans">{{ city_name }}</p>
        <p class="text-white text-xl font-bold font-OpenSans">{{ hotel_name }}</p>
      </div>
    </div>
    <div class="p-4">
      <div class="flex mb-5">
        <p class="text-gray-700 line-clamp-2 font-Poppins">
          {{ description }}
        </p>
      </div>
      <div class="flex items-center justify-between">
        <div>
          <p class="text-secondary-500 font-bold font-OpenSans text-sm text-green">
            From CAD {{ price }} | Night
          </p>
          <div class="flex items-center">
            <span
              v-for="star in rating"
              :key="star"
              class="text-yellow-500 mr-1"
              >★</span
            >
          </div>
        </div>
        <ButtonMore>Book it</ButtonMore>
      </div>
    </div>
  </div>
</template>

<script setup>
import ButtonMore from "./Buttons/ButtonMore.vue";
const props = defineProps([
  "city_name",
  "hotel_name",
  "description",
  "price",
  "rating",
  "image",
]);
const urlImage = `/assets/images/Gallery/${props.image}`;
</script>

<style scoped>
/* Styles spécifiques au composant HotelCard */
</style>
