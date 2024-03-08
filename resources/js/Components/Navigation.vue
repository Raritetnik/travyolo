<script setup>
import ApplicationLogo from "./ApplicationLogo.vue";
import ButtonLink from "./Buttons/ButtonLink.vue";
import NavLink from "./NavLink.vue";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/Buttons/DropdownLink.vue";
import ResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";
import En from "@/Components/Flags/En.vue";
import Fr from "@/Components/Flags/Fr.vue";

import { defineProps, ref, computed } from "vue";
import { Link } from "@inertiajs/vue3";

const props = defineProps({
    canLogin: {
        type: Boolean,
        default: false,
    },
});

// Current language
const currentLanguage = ref("En");

const switchLanguage = (lang) => {
    currentLanguage.value = lang;
};

const currentFlagComponent = computed(() => {
    return currentLanguage.value === "Fr" ? Fr : En;
});

const showingNavigationDropdown = ref(false);
</script>

<template>
    <div class="flex justify-between items-center h-[60px] bg-white  px-2 laptop:px-0  py-2 ">
        <Link href="/">
            <ApplicationLogo />
        </Link>

        <nav>
            <div class="flex items-center gap-4 text-md">
                <div
                    class="hidden sm:flex items-center gap-4 font-Montserrat font-bold"
                >
                    <slot name="home-link"></slot>
                    <NavLink
                        :href="route('dashboard')"
                        :active="route().current('about')"
                        >About</NavLink
                    >
                    <NavLink
                        :href="route('dashboard')"
                        :active="route().current('contact')"
                        >Contact</NavLink
                    >
                    <div v-if="canLogin">
                        <ButtonLink href="/login" type="button" method="get"
                            >Sign in</ButtonLink
                        >
                    </div>
                    <!-- Language Dropdown -->
                    <div class="flex">
                        <Dropdown align="right" width="48">
                            <template #trigger>
                                <span class="inline-flex rounded-md font-bold">
                                    <button
                                        type="button"
                                        class="inline-flex items-center gap-2 border border-transparent text-sm leading-4 rounded-md text-gray-600 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150"
                                    >
                                        <component
                                            class="h-5"
                                            :is="currentFlagComponent"
                                        ></component>
                                        <span>
                                            {{ currentLanguage }}
                                        </span>
                                        <svg
                                            class="h-4 w-4"
                                            xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20"
                                            fill="currentColor"
                                        >
                                            <path
                                                fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd"
                                            />
                                        </svg>
                                    </button>
                                </span>
                            </template>

                            <template #content>
                                <div class="flex flex-col text-sm font-medium">
                                    <button
                                        @click="switchLanguage('Fr')"
                                        class="w-full flex items-center gap-2 px-2 py-1 hover:bg-gray-100"
                                    >
                                        <Fr class="h-4" />
                                        <span> French</span>
                                    </button>

                                    <button
                                        @click="switchLanguage('En')"
                                        class="w-full flex items-center gap-2 px-2 py-1 hover:bg-gray-100"
                                    >
                                        <En class="h-4" />
                                        <span> English</span>
                                    </button>
                                </div>
                            </template>
                        </Dropdown>
                    </div>
                    <!-- Dark mode -->
                    <button
                        @click="switchDisplayMode"
                        type="button"
                        class="material-symbols-outlined font-medium text-gray-600 hover:text-gray-900 focus:outline-none transition ease-in-out duration-150"
                    >
                        dark_mode
                    </button>
                    <template v-if="$page.props.auth.user">
                        <div class="hidden sm:flex sm:items-center sm:ml-6">
                            <!-- Settings Dropdown -->
                            <div class="font-Montserrat">
                                <Dropdown align="right" width="48">
                                    <template #trigger>
                                        <span class="inline-flex rounded-md">
                                            <button
                                                type="button"
                                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150"
                                            >
                                                <span
                                                    class="material-symbols-outlined"
                                                >
                                                    person
                                                </span>

                                                <svg
                                                    class="ml-2 -mr-0.5 h-4 w-4"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20"
                                                    fill="currentColor"
                                                >
                                                    <path
                                                        fill-rule="evenodd"
                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        clip-rule="evenodd"
                                                    />
                                                </svg>
                                            </button>
                                        </span>
                                    </template>

                                    <template #content>
                                        <DropdownLink
                                            :href="route('profile.edit')"
                                        >
                                            Profile
                                        </DropdownLink>
                                        <DropdownLink
                                            :href="route('logout')"
                                            method="post"
                                            as="button"
                                        >
                                            Log Out
                                        </DropdownLink>
                                    </template>
                                </Dropdown>
                            </div>
                        </div>
                    </template>
                </div>
                <!-- Hamburger -->
                <div class="-mr-2 flex items-center sm:hidden">
                    <button
                        @click="
                            showingNavigationDropdown =
                                !showingNavigationDropdown
                        "
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out"
                    >
                        <svg
                            class="h-6 w-6"
                            stroke="currentColor"
                            fill="none"
                            viewBox="0 0 24 24"
                        >
                            <path
                                :class="{
                                    hidden: showingNavigationDropdown,
                                    'inline-flex': !showingNavigationDropdown,
                                }"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"
                            />
                            <path
                                :class="{
                                    hidden: !showingNavigationDropdown,
                                    'inline-flex': showingNavigationDropdown,
                                }"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"
                            />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Responsive Navigation Menu -->
            <div
                :class="{
                    block: showingNavigationDropdown,
                    hidden: !showingNavigationDropdown,
                }"
                class="sm:hidden"
            >
                <div class="pt-2 pb-3 space-y-1">
                    <ResponsiveNavLink
                        :href="route('dashboard')"
                        :active="route().current('dashboard')"
                    >
                        Dashboard
                    </ResponsiveNavLink>
                </div>

                <!-- Responsive Settings Options -->
                <div
                    class="pt-4 pb-1 border-t border-gray-200"
                    v-if="$page.props.auth.user"
                >
                    <div class="px-4">
                        <div class="font-medium text-base text-gray-800">
                            {{ $page.props.auth.user.name ?? "" }}
                        </div>
                        <div class="font-medium text-sm text-gray-500">
                            {{ $page.props.auth.user.email ?? "" }}
                        </div>
                    </div>

                    <div class="mt-3 space-y-1">
                        <ResponsiveNavLink :href="route('profile.edit')">
                            Profile
                        </ResponsiveNavLink>
                        <ResponsiveNavLink
                            :href="route('logout')"
                            method="post"
                            as="button"
                        >
                            Log Out
                        </ResponsiveNavLink>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</template>
