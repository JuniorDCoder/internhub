<template>
  <div>
    <header :class="['fixed top-0 left-0 w-full z-50 transition-all duration-300', { 'bg-blur': isScrolled }]">
      <div class="flex items-center justify-between py-4 px-5 md:px-40">
        <Link :href="route('welcome')" class="text-4xl font-bold text-primary-dark">InternHub.</Link>
        <div class="hidden md:flex space-x-5">
          <NavLink :is-active="route().current('welcome')" :to="route('welcome')" text="Home" />
          <NavLink :is-active="route().current('about')" :to="route('about')" text="About" />
          <NavLink :is-active="route().current('contact')" :to="route('contact')" text="Contact" />
          <NavLink :is-active="route().current('faq')" :to="route('faq')" text="FAQ" />
          <NavLink :is-active="route().current('fields')" :to="route('fields')" text="Our Fields" />
        </div>
        <div class="hidden md:flex space-x-3">
          <Button :to="route('apply')" text="Apply Now" additional-classes="bg-secondary text-dark border-2 border-primary hover:text-white" />
          <Button v-if="!isAuthenticated" :to="route('register')" text="Get Started" additional-classes="bg-primary font-semibold text-secondary" />
            <Button v-else :to="route('dashboard')" text="Dashboard" additional-classes="bg-primary font-semibold text-secondary" />
        </div>
        <div class="md:hidden flex items-center">
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
        <div v-if="menuOpen" class="md:hidden flex flex-col space-y-5 px-5 py-4">
          <NavLink :is-active="route().current('welcome')" :to="route('welcome')" text="Home" @click="toggleMenu" />
          <NavLink :is-active="route().current('about')" :to="route('about')" text="About" @click="toggleMenu" />
          <NavLink :is-active="route().current('contact')" :to="route('contact')" text="Contact" @click="toggleMenu" />
          <NavLink :is-active="route().current('faq')" :to="route('faq')" text="FAQ" @click="toggleMenu" />
          <NavLink :is-active="route().current('fields')" :to="route('fields')" text="Our Fields" @click="toggleMenu" />
          <Button :to="route('apply')" text="Apply Now" additional-classes="bg-secondary text-dark border-2 border-primary hover:text-white" @click="toggleMenu" />
            <Button v-if="isAuthenticated" :to="route('dashboard')" text="Dashboard" additional-classes="bg-primary font-semibold text-secondary" @click="toggleMenu" />
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
import {Link, usePage} from "@inertiajs/vue3";

const menuOpen = ref(false);
const isScrolled = ref(false);

const { props } = usePage();
const isAuthenticated = props.auth.user !== null;

const toggleMenu = () => {
  menuOpen.value = !menuOpen.value;
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

main {
  padding-top: 80px; /* Adjust this value based on your header height */
}
</style>
