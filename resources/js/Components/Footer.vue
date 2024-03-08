<script setup>
import Button from "./Buttons/Button.vue";
import InputSub from "./Inputs/InputSub.vue";
import IconLink from "./Buttons/IconLink.vue";
</script>

<template>
    <div class="w-screen bg-footer text-white px-14">
        <section
            class="flex flex-wrap md:flex-row justify-around pt-14 pb-6 gap-6 max-w-full items-center"
        >
            <div class="flex flex-col items-center lg:items-start">
                <h2 class="font-extrabold pb-2">
                    Subscribe to our special offers
                </h2>
                <p class="pb-6 text-sm">
                    Save with our latest fares and offers
                </p>
                <span class="flex gap-2">
                    <InputSub />
                    <Button href="#" type="button" method="get"
                        >Subscribe</Button
                    >
                </span>
            </div>
            <div class="flex flex-col items-center lg:items-start">
                <h2 class="font-extrabold pb-2">Travyolo App</h2>
                <p class="pb-6 text-sm">
                    Book and manage your hotels on the go
                </p>
                <span class="flex flex-col md:flex-row gap-2">
                    <img
                        src="/assets/images/iosRedirect.png"
                        class="max-w-[160px] h-[51px] object-cover"
                        alt="App Store"
                    />
                    <img
                        src="/assets/images/androidRedirect.png"
                        class="max-w-[160px] h-[51px] object-cover"
                        alt="Android"
                    />
                </span>
            </div>
            <div class="flex flex-col items-center lg:items-start">
                <h2 class="font-extrabold pb-2">Have Questions?</h2>
                <p class="pb-6 text-sm">1-866-913-2615</p>
                <span class="flex flex-col items-center lg:items-start">
                    <p>
                        support<span class="text-[#85BE3F]">@</span>travyolo.com
                    </p>
                    <p>24/7 Dedicated Customer Support</p>
                </span>
            </div>
            <div class="flex flex-col items-center lg:items-start">
                <h2 class="font-extrabold pb-2">Connect with Us</h2>
                <p class="pb-6 text-sm">Share your Travyolo experience</p>
                <span class="flex md:justify-around gap-2">
                    <IconLink to="#"
                        ><img
                            src="/assets/images/youtube.svg"
                            class="max-w-[40px]"
                            alt="Youtube"
                    /></IconLink>
                    <IconLink to="#"
                        ><img
                            src="/assets/images/twitter.svg"
                            class="max-w-[40px]"
                            alt="Twitter"
                    /></IconLink>
                    <IconLink to="#"
                        ><img
                            src="/assets/images/instagram.svg"
                            class="max-w-[40px]"
                            alt="Instagram"
                    /></IconLink>
                    <IconLink to="#"
                        ><img
                            src="/assets/images/facebook.svg"
                            class="max-w-[40px]"
                            alt="Facebook"
                    /></IconLink>
                </span>
            </div>
        </section>
        <section class="flex justify-between py-6 items-center">
            <div>
                <h2 class="font-extrabold">
                    © Travyolo 2023 | Terms and Conditions | Privacy Policiy |
                    Cookies Policy | Site Map
                </h2>
            </div>
            <img src="/assets/images/LogoTravyolo.png" alt="Logo" />
        </section>
    </div>
</template>
