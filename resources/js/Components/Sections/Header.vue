<template>
    <div>
        <header :class="['fixed top-0 left-0 w-full z-50 transition-all duration-300', { 'bg-blur': isScrolled }]">
            <div class="flex items-center justify-between px-5 py-4 md:px-40">
                <Link :href="route('welcome')" class="text-4xl font-bold text-primary-dark">
                    <img src="@/assets/images/logo.png"  class="w-20 h-20" />
                </Link>
                <div class="hidden space-x-5 md:flex">
                    <NavLink :is-active="route().current('welcome')" :to="route('welcome')" text="Home" />
                    <NavLink :is-active="route().current('about')" :to="route('about')" text="About" />
                    <NavLink :is-active="route().current('contact')" :to="route('contact')" text="Contact" />
                    <NavLink :is-active="route().current('faq')" :to="route('faq')" text="FAQ" />
                    <NavLink :is-active="route().current('fields')" :to="route('fields')" text="Our Fields" />
                </div>
                <div class="items-center hidden space-x-3 md:flex">
                    <Button :to="route('apply')" text="Apply Now" additional-classes="bg-secondary text-dark border-2 border-primary hover:text-white" />
                    <div v-if="isAuthenticated" class="relative">
                        <button to="" @click="toggleDropdown" class="flex items-center space-x-2 font-semibold rounded text-primary-dark">
                            <span>{{ userName }}</span>
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <transition name="fade">
                            <div v-show="dropdownOpen" class="absolute right-0 z-50 w-48 mt-4 bg-white rounded-md shadow-lg">
                                <Link :href="route('dashboard')" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Dashboard</Link>
                                <Link :href="route('profile.edit')" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Profile</Link>
                                <Link :href="route('logout')" method="post" class="block w-full px-4 py-2 text-left text-gray-800 hover:bg-gray-200">Logout</Link>
                            </div>
                        </transition>
                    </div>
                    <Button v-else :to="route('register')" text="Get Started" additional-classes="bg-primary font-semibold text-secondary" />
                </div>
                <div class="flex items-center md:hidden">
                    <img
                        v-if="!menuOpen"
                        :src="Menu"
                        alt="Menu"
                        class="w-8 h-8 cursor-pointer"
                        @click="toggleMenu"
                    />
                    <img
                        v-else
                        :src="Close"
                        alt="Close"
                        class="w-8 h-8 cursor-pointer"
                        @click="toggleMenu"
                    />
                </div>
            </div>
            <transition name="slide-fade">
                <div v-if="menuOpen" class="flex flex-col px-5 py-4 space-y-5 md:hidden">
                    <NavLink :is-active="route().current('welcome')" :to="route('welcome')" text="Home" @click="toggleMenu" />
                    <NavLink :is-active="route().current('about')" :to="route('about')" text="About" @click="toggleMenu" />
                    <NavLink :is-active="route().current('contact')" :to="route('contact')" text="Contact" @click="toggleMenu" />
                    <NavLink :is-active="route().current('faq')" :to="route('faq')" text="FAQ" @click="toggleMenu" />
                    <NavLink :is-active="route().current('fields')" :to="route('fields')" text="Our Fields" @click="toggleMenu" />
                    <Button :to="route('apply')" text="Apply Now" additional-classes="bg-secondary text-dark border-2 border-primary hover:text-white" @click="toggleMenu" />
                    <div v-if="isAuthenticated" class="relative">
                        <button to="" @click="toggleDropdown" class="flex items-center space-x-2 font-semibold rounded text-primary-dark">
                            <span>{{ userName }}</span>
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <transition name="fade">
                            <div v-show="dropdownOpen" class="absolute right-0 z-50 w-48 mt-2 bg-white rounded-md shadow-lg">
                                <Link :href="route('dashboard')" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Dashboard</Link>
                                <Link :href="route('profile.edit')" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Profile</Link>
                                <Link :href="route('logout')" method="post" class="block w-full px-4 py-2 text-left text-gray-800 hover:bg-gray-200">Logout</Link>
                            </div>
                        </transition>
                    </div>
                    <Button v-else :to="route('register')" text="Get Started" additional-classes="bg-primary font-semibold text-secondary" @click="toggleMenu" />
                </div>
            </transition>
        </header>
        <main class="pt-20">
            <!-- Your page content goes here -->
        </main>
    </div>
</template>

<script setup>
import Menu from "@/assets/images/menu.png"
import Close from "@/assets/images/close.png"
import NavLink from "@/Components/NavLink.vue";
import Button from "@/Components/Button.vue";
import { ref, onMounted, onUnmounted } from 'vue';
import { Link, usePage } from "@inertiajs/vue3";

const menuOpen = ref(false);
const isScrolled = ref(false);
const dropdownOpen = ref(false);

const { props } = usePage();
const isAuthenticated = props.auth.user !== null;
const userName = isAuthenticated ? props.auth.user.name : '';

const toggleMenu = () => {
    menuOpen.value = !menuOpen.value;
};

const toggleDropdown = () => {
    dropdownOpen.value = !dropdownOpen.value;
};

const handleScroll = () => {
    isScrolled.value = window.scrollY > 0;
};

onMounted(() => {
    window.addEventListener('scroll', handleScroll);
});

onUnmounted(() => {
    window.removeEventListener('scroll', handleScroll);
});
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');

body {
    font-family: 'Inter', sans-serif;
}

header {
    background: rgba(255, 255, 255, 0.8);
    backdrop-filter: blur(10px);
}

.bg-blur {
    background: rgba(255, 255, 255, 0.7);
    backdrop-filter: blur(15px);
}

.slide-fade-enter-active,
.slide-fade-leave-active {
    transition: all 0.3s ease;
}

.slide-fade-enter-from,
.slide-fade-leave-to {
    transform: translateY(-10px);
    opacity: 0;
}

.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.3s ease;
}

.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}

main {
    padding-top: 80px; /* Adjust this value based on your header height */
}
</style>
