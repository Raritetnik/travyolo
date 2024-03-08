<script setup>
//import GalleryCard from "@/Components/Cards/GalleryCard.vue";
import ButtonMore from "@/Components/Buttons/ButtonMore.vue";
import TravyoloSection from "@/Components/Section/TravyoloSection.vue";
import SectionHeader from "@/Components/Section/SectionHeader.vue";
import ImageWithText from "@/Components/ImageWithText.vue";
import { ref } from "vue";

const destinations = ref([
    {
        id: 1,
        cardStyle: "bigGallery",
        image: "thailand.png",
        text: "Krabi, Thailand",
        icon: "thailand_icon.svg",
        position: 'laptop:row-span-2 laptop:col-span-2'
    },
    {
        id: 2,
        cardStyle: "medGallery",
        image: "canada.png",
        text: "Leduc, Canada",
        icon: "canada_icon.svg",
        position: 'laptop:row-span-1 laptop:col-span-2'
    },
    {
        id: 3,
        cardStyle: "smallGallery",
        image: "italy.png",
        text: "Roma, Italia",
        icon: "italy_icon.svg",
        position: 'laptop:row-span-1 laptop:col-span-1'
    },
    {
        id: 4,
        cardStyle: "smallGallery",
        image: "cuba.png",
        text: "Trinidad, Cuba",
        icon: "cuba_icon.svg",
        position: 'laptop:row-span-1 laptop:col-span-1'
    },
]);
</script>

<template>
    <TravyoloSection>
        <template #header>
            <SectionHeader title="Place You Must Visit">
                <template #text>
                    <p>
                    Unveiling Hidden Gems: The Must-Visit Destination That Will
                    Leave You in Awe
                    </p>
                </template>
                <template #button>
                    <ButtonMore>View More</ButtonMore>
                </template>
            </SectionHeader>
        </template>

        <template #default>
            <div class="grid gap-4 text-white grid-cols-1 tablet:grid-cols-2 laptop:grid-cols-4 laptop:grid-rows-2 ">
                <ImageWithText
                v-for="dest in destinations"
                    :key="dest.id"
                    :imageUrl="'assets/images/gallery/'+dest.image"
                    :class="dest.position+' min-h-[55vw] tablet:min-h-[40vw] laptop:min-h-[35vh]'" >
                    <template #text>
                        <div class="flex justify-between">
                            <div class="self-end items-center flex gap-2">

                                <img :src="'assets/images/gallery/'+dest.icon" :alt="dest.icon" width="30">

                                <h3
                                    class="text-sm font-medium tablet:text-base laptop:text-lg laptop:leading-tight leading-tight font-Montserrat max-w-[20ch]"
                                >
                                    {{ dest.text }}
                                </h3>
                            </div>

                            <Link
                                href="#"
                                as="button"
                                method="method"
                                class="px-2 py-2 font-medium hover:border-white hover:text-white border-white/80 text-white/80 border-2 rounded-xl text-xs leading-tight laptop:text-sm self-end"
                            >
                                View more
                            </Link>
                        </div>
                    </template>
                </ImageWithText>
            </div>
        </template>
    </TravyoloSection>
</template>
