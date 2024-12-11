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
        <div class="flex flex-col justify-between px-5 space-x-5 md:flex-row md:px-40">
            <div class="flex flex-col space-y-4 md:w-1/2 py-9 md:py-24">
                <h2 class="text-4xl font-semibold md:text-5xl text-primary-dark">
                    Become a <span class="text-primary">Traitz Tech Intern</span> Today
                </h2>
                <p class="text-gray-900 text-md md:text-sm">
                    {{ about }}
                </p>
                <p class="text-gray-900 text-md md:text-sm">
                    Our internship program at Traitz Tech is designed to provide you with the skills and experience needed to excel in your career. Join us and be part of a dynamic and innovative team.
                </p>

                <h2 class="text-3xl font-semibold text-primary-dark">
                    Benefits of Joining Us
                </h2>
                <div class="flex flex-col justify-between md:flex-row">
                    <div class="flex-col space-y-3 md:w-1/2">
                        <div class="flex flex-row items-center space-x-2">
                            <span class="w-3 h-3 rounded-full bg-primary"></span>
                            <h3 class="font-semibold text-gray-900 text-md">Real-World Experience</h3>
                        </div>
                        <div class="flex flex-row items-center space-x-2">
                            <span class="w-3 h-3 rounded-full bg-primary"></span>
                            <h3 class="font-semibold text-gray-900 text-md">Flexible Work Hours</h3>
                        </div>
                        <div class="flex flex-row items-center space-x-2">
                            <span class="w-3 h-3 rounded-full bg-primary"></span>
                            <h3 class="font-semibold text-gray-900 text-md">Innovative Projects</h3>
                        </div>
                        <div class="flex flex-row items-center space-x-2">
                            <span class="w-3 h-3 rounded-full bg-primary"></span>
                            <h3 class="font-semibold text-gray-900 text-md">Professional Growth</h3>
                        </div>
                    </div>
                    <div class="flex-col space-y-3 md:w-1/2">
                        <div class="flex flex-row items-center space-x-2">
                            <span class="w-3 h-3 rounded-full bg-primary"></span>
                            <h3 class="font-semibold text-gray-900 text-md">Creative Freedom</h3>
                        </div>
                        <div class="flex flex-row items-center space-x-2">
                            <span class="w-3 h-3 rounded-full bg-primary"></span>
                            <h3 class="font-semibold text-gray-900 text-md">Skill Development</h3>
                        </div>
                        <div class="flex flex-row items-center space-x-2">
                            <span class="w-3 h-3 rounded-full bg-primary"></span>
                            <h3 class="font-semibold text-gray-900 text-md">Networking Opportunities</h3>
                        </div>
                        <div class="flex flex-row items-center space-x-2">
                            <span class="w-3 h-3 rounded-full bg-primary"></span>
                            <h3 class="font-semibold text-gray-900 text-md">Career Advancement</h3>
                        </div>
                    </div>
                </div>
                <Button v-if="!isAuthenticated" :to="route('register')" text="Get Started" additional-classes="w-[120px] bg-primary font-semibold text-secondary" />
                <Button v-else :to="route('dashboard')" text="Dashboard" additional-classes="w-[120px] bg-primary font-semibold text-secondary" />
            </div>
            <img alt="" class="mt-6 md:w-1/2 md:mt-0" src="@/assets/images/internship.jpg">
        </div>
    </div>
</template>

<script setup>
import Button from "@/Components/Button.vue";
import {usePage} from "@inertiajs/vue3";

defineProps({
    about: {
        type: String,
        required: false
    }
})

const { props } = usePage();
const isAuthenticated = props.auth.user !== null;
</script>

<style lang="scss" scoped>

</style>
