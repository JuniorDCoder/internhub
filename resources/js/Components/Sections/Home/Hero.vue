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
                <h2 class="text-5xl font-semibold md:text-7xl text-primary-dark">
                    Join Traitz Tech Internship Program
                </h2>
                <p class="text-gray-900 text-md md:text-sm">
                    Traitz Tech offers a comprehensive internship program designed to provide hands-on experience and professional development opportunities. Apply now to kickstart your career with us.
                </p>
                <div class="flex items-center space-x-4">
                    <Button to="/apply" text="Apply Now" additional-classes="bg-primary font-semibold text-secondary" />
                    <Link href="/" class="flex items-center space-x-2">
                        <img alt="Play" src="@/assets/images/play-button.png" class="w-8 h-8">
                        <p class="underline text-primary-dark">Learn More About Us</p>
                    </Link>
                </div>
            </div>
            <img alt="" class="md:w-1/2" src="@/assets/images/woman.webp">
        </div>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import Button from "@/Components/Button.vue";
</script>

<style scoped>

</style>
