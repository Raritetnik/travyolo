<script setup>
import TravyoloSection from "@/Components/Section/TravyoloSection.vue";
import SectionHeader from "@/Components/Section/SectionHeader.vue";
import ImageWithText from "@/Components/ImageWithText.vue";
import ButtonMore from "@/Components/Buttons/ButtonMore.vue";
</script>
<template>
    <TravyoloSection>
        <template #header>
            <SectionHeader title="Affordability Amplified">
                <template #text>
                    <p>
                        Find Your Perfect Atmosphere: Choosing a Theme that
                        Matches Your Unique Style and Preferences
                    </p>
                </template>
                <template #button>
                    <ButtonMore>View More</ButtonMore>
                </template>
            </SectionHeader>
        </template>

        <template #default>
            <div class="flex flex-col laptop:flex-row gap-4 text-white">
                <div class="flex-8">
                    <ImageWithText
                        imageUrl="/assets/images/image1.png"
                        altText="Image with text"
                    >
                        <template #text>
                            <div class="flex justify-between">
                                <div class="flex flex-col gap-1">
                                    <h3
                                        class="text-sm font-medium tablet:text-base laptop:text-lg laptop:leading-tight leading-tight font-Montserrat"
                                    >
                                        Vacation Package deals just for you
                                    </h3>
                                    <p
                                        class="text-xs tablet:text-sm laptop:text-base min-w-fit max-w-[65ch] text-white/75 leading-tight"
                                    >
                                        Save on your next trip, Hotels for under
                                        C$299 per person
                                    </p>
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
                <div class="flex-4">
                    <ImageWithText imageUrl="/assets/images/image2.png">
                        <template #text>
                            <div class="flex justify-between">
                                <div class="self-end items-center flex gap-2">
                                    <span class="material-symbols-outlined">
                                        real_estate_agent
                                    </span>
                                    <h3
                                        class="text-sm font-medium tablet:text-base laptop:text-lg laptop:leading-tight leading-tight font-Montserrat max-w-[20ch]"
                                    >
                                        Special deals
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
            </div>
        </template>
    </TravyoloSection>
</template>
