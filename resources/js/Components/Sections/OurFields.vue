<template>
    <div
        :data-aos="aosType"
        :data-aos-offset="aosOffset"
        :data-aos-delay="aosDelay"
        :data-aos-duration="aosDuration"
        :data-aos-easing="aosEasing"
        :data-aos-mirror="aosMirror"
        :data-aos-once="aosOnce"
        :data-aos-anchor-placement="aosAnchorPlacement"
    >
    <h2 class="px-5 mt-12 mb-4 text-4xl font-semibold mt md:text-5xl md:px-40 md:w-1/2 text-primary-dark">
        We Offer <span class="text-primary">Internship Programs</span> in the following Fields
    </h2>
    <div class="grid grid-cols-1 px-5 gap-9 md:grid-cols-3 md:px-40">
        <FieldItem v-for="(field, index) in fields" :key="index" :class="field.class" :number="field.number" :title="field.title" :description="field.description" :image="field.image" />
    </div>
</div>
</template>

<script setup>
import { ref } from 'vue';
import AnimatedContent from "@/Components/AnimatedContent.vue";
import FieldItem from "@/Components/FieldItem.vue";

import Frontend1 from "@/assets/images/fields/frontend-1.jpg";
import Nuxt from "@/assets/images/fields/nuxt.png";
import React from "@/assets/images/fields/react.png";
import Django from "@/assets/images/fields/django.png";
import Laravel from "@/assets/images/fields/laravel.webp";
import Flutter from "@/assets/images/fields/flutter.png";
import ReactNative from "@/assets/images/fields/react-native.png";
import FullStack from "@/assets/images/fields/full-stack.webp";
import DevOps from "@/assets/images/fields/devops.png";
import AI from "@/assets/images/fields/ai.jpg";
import Network from "@/assets/images/fields/network.jpeg";
import Design from "@/assets/images/fields/design.webp";
import DigitalMarketing from "@/assets/images/fields/digital-marketing.png";
import Cybersecurity from "@/assets/images/fields/cybersecurity.jpeg";

const aosType = ref('fade-up');
const aosOffset = ref(100);
const aosDelay = ref(100); // Reduced delay
const aosDuration = ref(100);
const aosEasing = ref('ease-in-out');
const aosMirror = ref(true);
const aosOnce = ref(false);
const aosAnchorPlacement = ref('top-center');

const fields = ref([
    { number: 1, title: 'Frontend - Entry Level', description: 'Learn how to build responsive and interactive websites using HTML, CSS, Bootstrap and JavaScript.', image: Frontend1 },
    { number: 2, title: 'Advance Frontend (Tailwind, Vue & Nuxt)', description: 'Learn how to build advanced frontend applications using Tailwind CSS, Vue.js, and Nuxt.js.', image: Nuxt },
    { number: 3, title: 'Advance Frontend (Tailwind, React & Next)', description: 'Learn how to build advanced frontend applications using Tailwind CSS, React, and Next.js.', image: React },
    { number: 4, title: 'Backend Web Development - Django', description: 'Learn how to build robust backend applications using Django.', image: Django },
    { number: 5, title: 'Backend Web Development - Laravel', description: 'Learn how to build robust backend applications using Laravel.', image: Laravel },
    { number: 6, title: 'Mobile Development (Flutter)', description: 'Build cross-platform mobile applications using Flutter.', image: Flutter },
    { number: 7, title: 'Mobile Development (React Native)', description: 'Learn how to build cross-platform mobile applications using React Native.', image: ReactNative },
    { number: 8, title: 'FullStack Web (Laravel React/Vue)', description: 'Learn how to build full-stack web applications using Laravel with React or Vue.', image: FullStack },
    { number: 9, title: 'DevOps and Cloud', description: 'Learn the principles of DevOps and cloud computing with Amazon Web Services (AWS).', image: DevOps },
    { number: 10, title: 'Data Science & Machine Learning', description: 'Learn the fundamentals of data science and machine learning.', image: AI },
    { number: 11, title: 'Computer Networking', description: 'Learn the fundamentals of computer networking and network security.', image: Network },
    { number: 12, title: 'UI/UX/Graphics Design', description: 'Learn the principles of user interface and user experience design.', image: Design },
    { number: 13, title: 'Digital Marketing', description: 'Learn the strategies and tools for effective digital marketing.', image: DigitalMarketing },
    { number: 14, title: 'Cybersecurity', description: 'Learn the fundamentals of cybersecurity and how to protect systems and data.', image: Cybersecurity },
]);
</script>

<style scoped>
.grid {
  display: grid;
  grid-template-columns: repeat(1, 1fr);
  gap: 2.25rem; /* Adjust gap as needed */
}

@media (min-width: 768px) {
  .grid {
    grid-template-columns: repeat(3, 1fr);
  }
}
</style>
