<script setup>
    import Header from "@/Components/Sections/Header.vue";
    import Footer from "@/Components/Sections/Footer.vue";
    import AnimatedContent from "@/Components/AnimatedContent.vue";
</script>

<template>
    <div class="w-full">
        <Header />

        <AnimatedContent>
            <slot />
        </AnimatedContent>


        <Footer />
    </div>
</template>


<style scoped>

</style>
