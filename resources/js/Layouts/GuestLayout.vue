<script setup>
import { store } from '@/store/store.js'
</script>

<template>
    <div
        class="min-h-screen flex flex-col tablet:justify-center items-center mt-6 font-Poppins"
    >
        <!-- Page Navigation -->
        <div class="z-50 fixed top-0 w-full bg-white  ">
            <div class="w-full desktop:max-w-[1280px] mx-auto">
                <slot name="navigation"></slot>
            </div>
        </div>

        <!-- Page Heading -->
        <header class="w-full pt-[60px] mb-[260px] tablet:mb-[280px] laptop:mb-[65px] desktop:max-w-[1280px] rounded-xl" v-if="$slots.header"
        :class="{ 'mb-[460px] tablet:mb-[430px] laptop:mb-[110px]': store.isHeaderExtended}"
        >
            <slot name="header" />
        </header>

        <!-- Page Content -->
        <main class="flex-grow w-full ">
            <slot name="destinationsGallery" />
            <slot name="hotelGrid" />
            <slot name="themeGallery"/>
            <slot name="default" />
        </main>
        <footer class="mt-[92px]">
            <slot name="footer" />
        </footer>
    </div>
</template>
