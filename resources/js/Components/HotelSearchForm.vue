<script setup>
import { ref, defineEmits } from "vue";
import { store } from '@/store/store.js'
import Items from "@/Components/Items.vue";
import Button from "@/Components/Buttons/Button.vue";
import RatingSystem from "@/Components/RatingSystem.vue";
defineProps({
    type: {
        type: String,
        default: "submit",
    },
});
const showAdvancedSearch = ref(false);
const selectedStars = ref(0);

const showAdvancedSearchForm = () => {
    store.extendHeader();
    showAdvancedSearch.value = !showAdvancedSearch.value;
};

</script>

<template>
    <form
        class="flex flex-col gap-6 laptop:gap-10 laptop:flex-row sm:px-4 rounded-xl"
        action=""
    >
        <div class="flex flex-col gap-6 md:flex-1">
            <!-- Showed forms -->
            <div class="flex flex-col gap-1 xl:gap-4 laptop:flex-row">
                <!-- Destination -->
                <Items
                    class="flex-1 border-b-2 border-gray-400 pb-1"
                    title="Destination"
                >
                    <template #icon>
                        <span
                            class="text-3xl text-primary-500 material-symbols-outlined"
                        >
                            location_on
                        </span>
                    </template>
                    <input
                        class="border-none p-0 w-full focus:outline-none focus:ring-0"
                        type="text"
                        name="destination"
                        placeholder="Where to ?"
                    />
                </Items>
                <!-- Separator bar -->
                <div class="mx-4 border-r-2 border-gray-400"></div>
                <!-- Check in and Check out -->
                <div class="flex flex-1 gap-2">
                    <Items
                        class="border-b-2 border-gray-400 pb-1 flex-1"
                        title="Check-in"
                    >
                        <template #icon>
                            <span
                                class="text-3xl text-primary-500 material-symbols-outlined"
                            >
                                calendar_month
                            </span>
                        </template>
                        <input
                            class="border-none p-0 w-full focus:outline-none focus:ring-0"
                            type="text"
                            name="check_in"
                            placeholder="--/--/--"
                        />
                    </Items>
                    <Items
                        class="border-b-2 border-gray-400 pb-1 flex-1"
                        title="Check-out"
                    >
                        <input
                            class="border-none p-0 w-full focus:outline-none focus:ring-0"
                            type="text"
                            name="check_out"
                            placeholder="--/--/--"
                        />
                    </Items>
                </div>
                <!-- Separator bar -->
                <div class="mx-4 border-r-2 border-gray-400"></div>
                <!-- Travelers -->
                <Items
                    class="flex-1 border-b-2 border-gray-400 pb-1"
                    title="Travelers"
                >
                    <template #icon>
                        <span
                            class="text-3xl text-primary-500 material-symbols-outlined"
                        >
                            hotel
                        </span>
                    </template>
                    <input
                        class="border-none p-0 w-full focus:outline-none focus:ring-0"
                        type="text"
                        name="travelers"
                        placeholder="2 guests - 1 room"
                    />
                </Items>
            </div>
            <!-- Hidden form -->
            <div
                v-show="showAdvancedSearch"
                class="flex flex-col gap-1 xl:gap-4 laptop:flex-row mb-4"
            >
                <!-- Hotel -->
                <Items
                    class="flex-1 border-b-2 border-gray-400 pb-1"
                    title="Hotel Name"
                >
                    <template #icon>
                        <span
                            class="text-3xl text-primary-500 material-symbols-outlined"
                        >
                            home_work
                        </span>
                    </template>
                    <input
                        class="border-none p-0 w-full focus:outline-none focus:ring-0"
                        type="text"
                        name="hotel_name"
                        placeholder="EX: Hilton"
                    />
                </Items>
                <!-- Separator bar -->
                <div class="mx-4 border-r-2 border-gray-400"></div>
                <!-- Min and Max Price -->
                <div class="flex flex-1 gap-2">
                    <Items
                        class="border-b-2 border-gray-400 pb-1 flex-1"
                        title="Min price"
                    >
                        <template #icon>
                            <span
                                class="text-3xl text-primary-500 material-symbols-outlined"
                            >
                                monetization_on
                            </span>
                        </template>
                        <input
                            class="border-none p-0 w-full focus:outline-none focus:ring-0"
                            type="text"
                            name="check_in"
                            placeholder="$"
                        />
                    </Items>
                    <Items
                        class="border-b-2 border-gray-400 pb-1 flex-1"
                        title="Max price"
                    >
                        <input
                            class="border-none p-0 w-full focus:outline-none focus:ring-0"
                            type="text"
                            name="check_out"
                            placeholder="$"
                        />
                    </Items>
                </div>
                <!-- Separator bar -->
                <div class="mx-4 border-r-2 border-gray-400"></div>
                <!-- Rating -->
                <Items
                    class="flex-1 border-b-2 border-gray-400 pb-1"
                    title="rating"
                >
                    <template #icon>
                        <span
                            class="text-3xl text-primary-500 material-symbols-outlined"
                        >
                            hotel_class
                        </span>
                    </template>

                    <RatingSystem v-model="selectedStars" :maxStars="5" />
                </Items>
            </div>
        </div>
        <!-- Submit button form -->
        <div class="flex flex-col gap-3">
            <button
                type="submit"
                class="inline-flex gap-2 items-center justify-center px-3 py-2 m-0 bg-transparent border-primary-500 border-2 rounded-3xl font-semibold text-sm text-primary-500 transition ease-in-out duration-150 max-h-16 hover:shadow-lg hover:text-white hover:bg-primary-500"
            >
                <span>Search</span>
            </button>
            <div
                class="group self-end flex items-center gap-1 text-sm cursor-pointer min-w-fit-content"
                @click="showAdvancedSearchForm"
            >
                <span
                    class="font-semibold text-sm text-primary-500 min-w-fit group-hover:underline transition-all duration-300"
                    >Advanced search</span
                >
                <span
                    class="material-symbols-outlined text-primary-500 group-hover:scale-110 transition-all duration-300"
                    :class="[showAdvancedSearch ? 'rotate-0' : 'rotate-180']"
                >
                    arrow_circle_up
                </span>
            </div>
        </div>
    </form>
</template>
