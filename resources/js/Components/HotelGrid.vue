<template>
  <TravyoloSection :class="customClass">
    <template #header>
      <SectionHeader title="Best Hotels To Stay">
        <template #text>
          <p>
            Unparalleled Luxury and Unforgettable Experience Discover the<br />
            Finest Hotels for Your Perfect Stay
          </p>
        </template>
        <template #button>
          <ButtonMore>View More</ButtonMore>
        </template>
      </SectionHeader>
    </template>

    <template #default>
      <div
        class="max-w-7xl mx-auto grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3"
      >
        <ImageWithText
          v-for="destination in destinations"
          :key="destination.id"
          :imageUrl="'assets/images/gallery/' + destination.image"
        >
          <template #text>
            <div class="flex justify-between bg-white shadow-lg rounded-lg">
              <div class="absolute inset-0 flex flex-col justify-end p-4">
                <h3
                  class="text-white text-lg font-OpenSans tablet:text-base laptop:text-lg laptop:leading-tight leading-tight max-w-[20ch] mb-1"
                >
                  {{ destination.city_name }}
                </h3>
                <h3
                  class="text-white font-bold font-OpenSans tablet:text-base laptop:text-lg laptop:leading-tight leading-tight max-w-[20ch]"
                >
                  {{ destination.hotel_name }}
                </h3>
                <h3
                  class="text-secondary-500 font-bold font-OpenSans text-sm text-green"
                >
                  From CAD ${{ destination.price }} | Night
                </h3>
                <div class="flex items-center justify-between mb-2">
                  <div class="flex items-center">
                    <span
                      v-for="star in destination.rating"
                      :key="star"
                      class="text-yellow-500 mr-1"
                      >★</span
                    >
                  </div>

                  <Link
                    type="#"
                    as="button"
                    method="method"
                    class="inline-flex gap-2 items-center px-2 py-1 bg-transparent border-white border-2 rounded-2xl font-semibold text-sm text-white transition ease-in-out duration-150 max-h-16 hover:shadow-lg hover:text-white hover:bg-primary-500 hover:border-primary-500 cursor-pointer"
                    >Book it
                    <img
                      src="assets/Images/left_hand_white.svg"
                      width="16"
                      alt="More button"
                    />
                  </Link>
                </div>
              </div>
            </div>
          </template>
        </ImageWithText>
      </div>
    </template>
  </TravyoloSection>
</template>

<script setup>
import { ref } from "vue";
import TravyoloSection from "./Section/TravyoloSection.vue";
import SectionHeader from "@/Components/Section/SectionHeader.vue";
import ImageWithText from "@/Components/ImageWithText.vue";
import ButtonMore from "@/Components/Buttons/ButtonMore.vue";

const destinations = ref([
  {
    id: 1,
    city_name: "Krabi, Thailand",
    hotel_name: "Hotel A",
    price: "129",
    rating: 2,
    image: "suite-salle-bains.jpg",
  },
  {
    id: 2,
    city_name: "Tunis, Tunisie",
    hotel_name: "Hotel B",
    price: "149",
    rating: 4,
    image: "suite-salle-bains.jpg",
  },
  {
    id: 3,
    city_name: "Roma, Italia",
    hotel_name: "Hotel C",
    price: "179",
    rating: 3,
    image: "suite-salle-bains.jpg",
  },
  {
    id: 4,
    city_name: "Trinidad, Cuba",
    hotel_name: "Hotel D",
    price: "199",
    rating: 4,
    image: "suite-salle-bains.jpg",
  },
  {
    id: 5,
    city_name: "Alger, Algeria",
    hotel_name: "Hotel Ibis",
    price: "129",
    rating: 5,
    image: "suite-salle-bains.jpg",
  },
  {
    id: 6,
    city_name: "Kiev, Ukraine",
    hotel_name: "Hotel A",
    description:
      "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laborum, nesciunt. Sit praesentium odio minima alias quam culpa doloremque veniam beatae veritatis voluptatem ",
    price: "129",
    rating: 5,
    image: "suite-salle-bains.jpg",
  },
]);
</script>
