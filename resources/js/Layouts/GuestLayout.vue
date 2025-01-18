<script setup>
    import Header from "@/Components/Sections/Header.vue";
    import Footer from "@/Components/Sections/Footer.vue";
</script>

<template>
    <div class="w-full">
        <Header />

        <div
            data-aos="fade-up"
            data-aos-offset="50"
            data-aos-delay="50"
            data-aos-duration="100"
            data-aos-easing="ease-in-out"
            data-aos-mirror="true"
            data-aos-once="false"
            data-aos-anchor-placement="top-center"
        >
            <slot />
        </div>


        <Footer />
    </div>
</template>


<style scoped>

</style>
