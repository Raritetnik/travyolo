<script setup>
import ThemeCard from "@/Components/ThemeCard.vue";
import TravyoloSection from "@/Components/Section/TravyoloSection.vue";
import SectionHeader from "@/Components/Section/SectionHeader.vue";
import ButtonMore from "@/Components/Buttons/ButtonMore.vue";
import { ref } from "vue";

const themes = ref([
    {
        id: 1,
        image: "plage.png",
        text: "Beach & Seaside",
    },
    {
        id: 2,
        image: "nature.png",
        text: "Nature",
    },
    {
        id: 3,
        image: "culture.png",
        text: "Krabi, Thailand",
    },
    {
        id: 4,
        image: "decor.png",
        text: "Small hotels",
    },
    {
        id: 5,
        image: "nature.png",
        text: "Forests",
    },
    {
        id: 6,
        image: "decor.png",
        text: "Luxery",
    },
    {
        id: 7,
        image: "plage.png",
        text: "Hot Countries",
    },
    {
        id: 8,
        image: "decor.png",
        text: "Romance",
    },
]);

</script>

<template>
    <TravyoloSection>
        <template #header>
            <SectionHeader title="Choose A Theme That Feet You">
                <template #text>
                    <p>
                        Find Your Perfect Atmosphere: Choosing a Theme that Matches Your Unique Style and Preferences
                    </p>
                </template>
                <template #button>
                    <ButtonMore>View More</ButtonMore>
                </template>
            </SectionHeader>
        </template>

        <template #default>
            <div class="grid grid-cols-2 tablet:grid-cols-3 laptop:grid-cols-4 gap-4 items-center">
                <ThemeCard

                v-for="theme in themes"
                    :key="theme.id"
                    :imageUrl="'assets/images/themes/'+theme.image"
                    :altText="theme.image"
                >
                <template #text>
                    <h3 class="flex gap-2 items-center text-center text-black text-md lg:text-2xl">{{ theme.text }}</h3>
                </template>
            </ThemeCard>
            </div>
        </template>
    </TravyoloSection>
</template>