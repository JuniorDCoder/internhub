<template>
    <div class="footer-container">
        <div class="flex flex-col justify-between w-full px-5 py-12 space-y-8 md:px-40 bg-secondary md:space-y-0 md:flex-row">
            <div class="flex flex-col space-y-2 md:w-1/4">
                <Link :href="route('welcome')" class="text-4xl font-bold text-primary-dark">
                    <img src="@/assets/images/logo.png"  class="w-20 h-20" />
                </Link>
                <p>
                    Ensure the effectiveness and success of your internship programs.
                </p>
                <div class="flex space-x-3">
                    <a href="">
                        <img :src="Facebook" class="w-8 h-8" alt="Facebook">
                    </a>
                    <a href="">
                        <img :src="X" class="w-8 h-8" alt="X">
                    </a>
                    <a href="">
                        <img :src="LinkedIn" class="w-8 h-8" alt="LinkedIn">
                    </a>
                </div>
            </div>
            <div class="flex flex-col space-y-3">
                <h3 class="text-2xl font-semibold text-primary-dark">Company</h3>
                <div class="flex flex-col space-y-2">
                    <NavLink :is-active="route().current('welcome')" :to="route('welcome')" text="Home" />
                    <NavLink :is-active="route().current('about')" :to="route('about')" text="About" />
                    <NavLink :is-active="route().current('contact')" :to="route('contact')" text="Contact" />
                    <NavLink :is-active="route().current('fees')" :to="route('fees')" text="Fees" />
                    <NavLink :is-active="route().current('fields')" :to="route('fields')" text="Our Fields" />
                </div>
            </div>
            <div class="flex flex-col space-y-3">
                <h3 class="text-2xl font-semibold text-primary-dark">Support</h3>
                <div class="flex flex-col space-y-2">
                    <NavLink :is-active="route().current('faq')" :to="route('faq')" text="FAQ"/>
                    <NavLink onclick="botmanChatWidget.open(); return false;" text="Help"/>
                    <NavLink :is-active="route().current('contact')" :to="route('contact')" text="Contact"/>
                    <NavLink :is-active="route().current('fees')" :to="route('fees')" text="Fees" />
                    <NavLink :is-active="route().current('fields')" :to="route('fields')" text="Our Fields" />
                </div>
            </div>
            <div class="flex flex-col space-y-3">
                <h3 class="text-2xl font-semibold text-primary-dark">Links</h3>
                <div class="flex flex-col space-y-2">
                    <NavLink :is-active="route().current('welcome')" :to="route('welcome')" text="Home" />
                    <NavLink :is-active="route().current('about')" :to="route('about')" text="About" />
                    <NavLink :is-active="route().current('contact')" :to="route('contact')" text="Contact" />
                    <NavLink :is-active="route().current('fees')" :to="route('fees')" text="Fees" />
                    <NavLink :is-active="route().current('fields')" :to="route('fields')" text="Our Fields" />
                </div>
            </div>
            <div class="flex flex-col space-y-3">
                <h3 class="text-2xl font-semibold text-primary-dark">Contact Us</h3>
                <div class="flex flex-col space-y-2">
                    <a href="tel:+2376779802114">+237 (677 802 114)</a>
                    <a href="mailto:info@traitz.tech">info@traitz.tech</a>
                </div>
            </div>
        </div>
        <hr class="w-full h-1 bg-primary">
        <p class="w-full px-5 py-3 text-center md:px-0 text-md">
            All rights reserved InternHub &copy; <span> {{ currentMonthYear }}</span>
        </p>
    </div>
</template>

<script setup>
import {Link} from "@inertiajs/vue3";
import Facebook from "@/assets/images/icons/facebook.png"
import X from "@/assets/images/icons/x.png"
import LinkedIn from "@/assets/images/icons/linkedin.png"
import NavLink from "@/Components/NavLink.vue";
import {computed} from "vue";

const currentMonthYear = computed(() => {
    const date = new Date();
    const options = { year: 'numeric', month: 'long' };
    return date.toLocaleDateString(undefined, options);
});
</script>

<style scoped>
.footer-container {
    position: relative;
    bottom: 0;
    width: 100%;
}
</style>
