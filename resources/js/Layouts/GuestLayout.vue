<script setup>
    import Header from "@/Components/Sections/Header.vue";
    import Footer from "@/Components/Sections/Footer.vue";
</script>

<template>
    <div class="w-full">
        <Header />

        <slot />

        <Footer />
    </div>
</template>


<style scoped>

</style>
