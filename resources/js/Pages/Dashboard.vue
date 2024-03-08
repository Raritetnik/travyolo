<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import Navigation from "@/Components/Navigation.vue";
import Footer from "@/Components/Footer.vue";
import Header from "@/Components/Header.vue";
import HotelGrid from "@/Components/HotelGrid.vue";
import NavLink from "@/Components/NavLink.vue";
import HotelSearchForm from "@/Components/HotelSearchForm.vue";
import BookingSearch from "@/Components/BookingSearch.vue";
import DreamlandGrid from "@/Components/DreamlandGrid.vue";
import DestinationsGallery from "@/Components/DestinationsGallery.vue";
import ThemeGallery from "@/Components/ThemeGallery.vue";
import Affordability from "@/Components/Affordability.vue";
import ButtonMore from "@/Components/Buttons/ButtonMore.vue";
import { Head, Link } from "@inertiajs/vue3";

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
});
const services = [
    {
        id: 1,
        name: "Hotels",
        description: "Service 1 description",
        component: HotelSearchForm,
    },
    {
        id: 2,
        name: "Flight Booking",
        description: "Service 2 description",
    },
    {
        id: 3,
        name: "Car Rental",
        description: "Service 3 description",
    },
];
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #navigation>
            <Navigation :canLogin="!canLogin">
                <template #home-link>
                    <NavLink
                        href="/dashboard"
                        :active="route().current('dashboard')"
                        >Home</NavLink
                    >
                </template>
            </Navigation>
        </template>
        <template #header>
            <Header
                imageUrl="/assets/images/image_header.png"
                headerHeight="h-[50vh]"
                overlayClasses="bg-gradient-to-r from-gray-950/50 from-10%"
                contentClasses=" md:max-w-[1200px] max-w-[1250px] shadow-xl "
            >
                <template #text-heading>
                    <div
                        class="ml-6 mb-10 tracking-wider sm:ml-8 relative flex flex-col gap-1 leading-tight tablet:gap-2 text-4xl tablet:text-5xl lg:text-6xl"
                    >
                        <span class="border-b-2 max-w-fit">It's time to </span>
                        <span
                            class="ml-[120px] laptop:ml-[220px] border-b-2 text-secondary-500 max-w-fit"
                            >Travel</span
                        >
                    </div>
                </template>
                <BookingSearch :services="services"> </BookingSearch>
            </Header>
        </template>
        <!-- Main components -->

        <!-- best hotels Section -->
        <HotelGrid />
        <template #destinationsGallery>
            <DestinationsGallery />
        </template>
        <template #themeGallery>
            <ThemeGallery />
        </template>
        <!-- Affordability Amplified Section -->
        <affordability />

        <dreamlandGrid />
        <template #footer>
            <Footer />
        </template>
    </AuthenticatedLayout>
</template>
