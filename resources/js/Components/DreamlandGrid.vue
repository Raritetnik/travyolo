<template>
  <TravyoloSection :class="customClass">
    <template #header>
      <SectionHeader title="Choose Your Dreamland">
        <template #text>
          <p>
            Find Your Perfect Atmosphere: Choosing a Theme that Matches Your<br />
            Unique Style and Preferences
          </p>
        </template>
        <template #button>
          <ButtonMore>View More</ButtonMore>
        </template>
      </SectionHeader>
    </template>

    <template #default>
      <div
        class="max-w-7xl mx-auto grid grid-cols-2 gap-4 sm:grid-cols-3 md:grid-cols-6"
      >
        <DreamCard
          v-for="destination in destinations"
          :key="destination.id"
          :country_name="destination.country_name"
          :image="destination.image"
        />
      </div>
    </template>
  </TravyoloSection>
</template>

<script setup>
import DreamCard from "@/Components/DreamButton.vue";
import { ref } from "vue";
import ButtonMore from "./Buttons/ButtonMore.vue";
import TravyoloSection from "./Section/TravyoloSection.vue";
import SectionHeader from "@/Components/Section/SectionHeader.vue";

const props = defineProps(["image", "country_name"]);
const destinations = ref([
  {
    id: 1,
    country_name: "Algeria",
    image: "icon-algeria.png",
  },
  {
    id: 2,
    country_name: "Algeria",
    image: "icon-algeria.png",
  },
  {
    id: 3,
    country_name: "Italia",
    image: "icon-italian.png",
  },
  {
    id: 4,
    country_name: "Cuba",
    image: "icon-cuba.png",
  },
  {
    id: 5,
    country_name: "Algeria",
    image: "icon-algeria.png",
  },
  {
    id: 6,
    country_name: "Ukraine",
    image: "icon-ukraine.png",
  },
  {
    id: 7,
    country_name: "Cuba",
    image: "icon-cuba.png",
  },
  {
    id: 8,
    country_name: "Cuba",
    image: "icon-cuba.png",
  },
  {
    id: 9,
    country_name: "Ukraine",
    image: "icon-ukraine.png",
  },
  {
    id: 10,
    country_name: "Ukraine",
    image: "icon-ukraine.png",
  },
  {
    id: 11,
    country_name: "Ukraine",
    image: "icon-ukraine.png",
  },
  {
    id: 12,
    country_name: "Ukraine",
    image: "icon-ukraine.png",
  },
]);
</script>