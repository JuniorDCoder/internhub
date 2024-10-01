<template>
    <AnimatedContent animationType="fade" delay=200>
        <div class="flex flex-col md:flex-row space-x-5 px-5 md:px-40 justify-between">
            <div class="flex flex-col space-y-4 md:w-1/2 py-9 md:py-24">
                <h2 class="md:text-5xl text-4xl text-primary-dark font-semibold">
                    Become a <span class="text-primary">Traitz Tech Intern</span> Today
                </h2>
                <p class="text-gray-900 text-md md:text-sm">
                    {{ about }}
                </p>
                <p class="text-gray-900 text-md md:text-sm">
                    Our internship program at Traitz Tech is designed to provide you with the skills and experience needed to excel in your career. Join us and be part of a dynamic and innovative team.
                </p>

                <h2 class="text-3xl text-primary-dark font-semibold">
                    Benefits of Joining Us
                </h2>
                <div class="flex flex-col md:flex-row justify-between">
                    <div class="flex-col md:w-1/2 space-y-3">
                        <div class="flex items-center flex-row space-x-2">
                            <span class="bg-primary w-3 h-3 rounded-full"></span>
                            <h3 class="font-semibold text-gray-900 text-md">Real-World Experience</h3>
                        </div>
                        <div class="flex items-center flex-row space-x-2">
                            <span class="bg-primary w-3 h-3 rounded-full"></span>
                            <h3 class="font-semibold text-gray-900 text-md">Flexible Work Hours</h3>
                        </div>
                        <div class="flex items-center flex-row space-x-2">
                            <span class="bg-primary w-3 h-3 rounded-full"></span>
                            <h3 class="font-semibold text-gray-900 text-md">Innovative Projects</h3>
                        </div>
                        <div class="flex items-center flex-row space-x-2">
                            <span class="bg-primary w-3 h-3 rounded-full"></span>
                            <h3 class="font-semibold text-gray-900 text-md">Professional Growth</h3>
                        </div>
                    </div>
                    <div class="flex-col md:w-1/2 space-y-3">
                        <div class="flex items-center flex-row space-x-2">
                            <span class="bg-primary w-3 h-3 rounded-full"></span>
                            <h3 class="font-semibold text-gray-900 text-md">Creative Freedom</h3>
                        </div>
                        <div class="flex items-center flex-row space-x-2">
                            <span class="bg-primary w-3 h-3 rounded-full"></span>
                            <h3 class="font-semibold text-gray-900 text-md">Skill Development</h3>
                        </div>
                        <div class="flex items-center flex-row space-x-2">
                            <span class="bg-primary w-3 h-3 rounded-full"></span>
                            <h3 class="font-semibold text-gray-900 text-md">Networking Opportunities</h3>
                        </div>
                        <div class="flex items-center flex-row space-x-2">
                            <span class="bg-primary w-3 h-3 rounded-full"></span>
                            <h3 class="font-semibold text-gray-900 text-md">Career Advancement</h3>
                        </div>
                    </div>
                </div>
                <Button v-if="!isAuthenticated" :to="route('register')" text="Get Started" additional-classes="w-[120px] bg-primary font-semibold text-secondary" />
                <Button v-else :to="route('dashboard')" text="Dashboard" additional-classes="w-[120px] bg-primary font-semibold text-secondary" />
            </div>
            <img alt="" class="md:w-1/2 md:mt-0 mt-6" src="@/assets/images/internship.jpg">
        </div>
    </AnimatedContent>
</template>

<script setup>
import AnimatedContent from "@/Components/AnimatedContent.vue";
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
