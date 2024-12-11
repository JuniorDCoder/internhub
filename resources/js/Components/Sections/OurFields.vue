<template>
    <div
        data-aos="fade-up"
        data-aos-offset="200"
        data-aos-delay="50"
        data-aos-duration="1000"
        data-aos-easing="ease-in-out"
        data-aos-mirror="true"
        data-aos-once="false"
        data-aos-anchor-placement="top-center"
    >
    <h2 class="px-5 my-4 text-4xl font-semibold md:text-5xl md:px-40 md:w-1/2 text-primary-dark">
        We Offer <span class="text-primary">Internship Programs</span> in the following Fields
    </h2>
    <div class="flex flex-col px-5 space-y-9 md:px-40">

        <div
            data-aos="fade-up"
            data-aos-offset="200"
            data-aos-delay="50"
            data-aos-duration="1000"
            data-aos-easing="ease-in-out"
            data-aos-mirror="true"
            data-aos-once="false"
            data-aos-anchor-placement="top-center"
        >
            <div class="flex flex-col w-full space-y-4 md:flex-row md:space-y-0 md:space-x-4">
                <FieldItem class=" md:w-1/4" number="1" title="Frontend - Entry Level" description="Learn how to build responsive and interactive websites using HTML, CSS, Bootstrap and JavaScript." :image="Frontend1" />
                <FieldItem class=" md:w-1/4" number="2" title="Advance Frontend (Tailwind, Vue & Nuxt)" description="Learn how to build advanced frontend applications using Tailwind CSS, Vue.js, and Nuxt.js." :image="Nuxt" />
                <FieldItem class=" md:w-1/4" number="3" title="Advance Frontend (Tailwind, React & Next)" description="Learn how to build advanced frontend applications using Tailwind CSS, React, and Next.js." :image="React" />
                <FieldItem class=" md:w-1/4" number="4" title="Backend Web Development - Django" description="Learn how to build robust backend applications using Django." :image="Django" />
            </div>
        </div>

        <div
            data-aos="fade-up"
            data-aos-offset="200"
            data-aos-delay="50"
            data-aos-duration="1000"
            data-aos-easing="ease-in-out"
            data-aos-mirror="true"
            data-aos-once="false"
            data-aos-anchor-placement="top-center"
        >
            <div class="flex flex-col w-full space-y-4 md:flex-row md:space-y-0 md:space-x-4">
                <FieldItem class=" md:w-1/4" number="5" title="Backend Web Development - Laravel" description="Learn how to build robust backend applications using Laravel." :image="Laravel" />
                <FieldItem class=" md:w-1/4" number="6" title="Mobile Development (Flutter)" description="Build cross-platform mobile applications using Flutter." :image="Flutter" />
                <FieldItem class=" md:w-1/4" number="7" title="Mobile Development (React Native)" description="Learn how to build cross-platform mobile applications using React Native." :image="ReactNative" />
                <FieldItem class=" md:w-1/4" number="8" title="FullStack Web (Laravel React/Vue)" description="Learn how to build full-stack web applications using Laravel with React or Vue." :image="FullStack" />
            </div>
        </div>

        <div
            data-aos="fade-up"
            data-aos-offset="200"
            data-aos-delay="50"
            data-aos-duration="1000"
            data-aos-easing="ease-in-out"
            data-aos-mirror="true"
            data-aos-once="false"
            data-aos-anchor-placement="top-center"
        >
            <div class="flex flex-col w-full space-y-4 md:flex-row md:space-y-0 md:space-x-4">
                <FieldItem  class=" md:w-1/4"number="9" title="DevOps and Cloud" description="Learn the principles of DevOps and cloud computing with Amazon Web Services (AWS)." :image="DevOps" />
                <FieldItem class=" md:w-1/4" number="10" title="Data Science & Machine Learning" description="Learn the fundamentals of data science and machine learning." :image="AI" />
                <FieldItem class=" md:w-1/4" number="11" title="Computer Networking" description="Learn the fundamentals of computer networking and network security." :image="Network" />
                <FieldItem class=" md:w-1/4" number="12" title="UI/UX/Graphics Design" description="Learn the principles of user interface and user experience design." :image="Design" />
            </div>
        </div>

    </div>
</div>
</template>

<script setup>

import Frontend1 from "@/assets/images/fields/frontend-1.jpg";
import Nuxt from "@/assets/images/fields/nuxt.png"
import React from "@/assets/images/fields/react.png"
import Django from  "@/assets/images/fields/django.png"
import Laravel from "@/assets/images/fields/laravel.webp"
import Flutter from "@/assets/images/fields/flutter.png"
import ReactNative from "@/assets/images/fields/react-native.png"
import FullStack from "@/assets/images/fields/full-stack.webp"
import DevOps from "@/assets/images/fields/devops.png"
import AI from "@/assets/images/fields/ai.jpg"
import Network from "@/assets/images/fields/network.jpeg"
import Design from "@/assets/images/fields/design.webp"

import FieldItem from "@/Components/FieldItem.vue";
</script>

<style scoped>

</style>
