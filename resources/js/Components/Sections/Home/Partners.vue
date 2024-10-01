<template>
    <AnimatedContent animationType="fade" delay=200>
      <div class="flex items-center justify-between w-full h-20 px-5 overflow-hidden md:px-40 bg-primary">
        <div class="slider">
          <img src="@/assets/images/traitz.jpeg" class="h-12 rounded-md" alt="">
          <img src="@/assets/images/wiscoprec.png" class="h-12 rounded-md" alt="">
          <img src="@/assets/images/solavise.png" class="h-12 rounded-md" alt="">
          <img src="@/assets/images/wiscoprec.png" class="h-12 rounded-md" alt="">
          <img src="@/assets/images/traitz.jpeg" class="h-12 rounded-md" alt="">
          <img src="@/assets/images/solavise.png" class="h-12 rounded-md" alt="">
          <img src="@/assets/images/traitz.jpeg" class="h-12 rounded-md" alt="">
          <img src="@/assets/images/wiscoprec.png" class="h-12 rounded-md" alt="">
          <img src="@/assets/images/solavise.png" class="h-12 rounded-md" alt="">
          <img src="@/assets/images/wiscoprec.png" class="h-12 rounded-md" alt="">
          <img src="@/assets/images/traitz.jpeg" class="h-12 rounded-md" alt="">
          <img src="@/assets/images/solavise.png" class="h-12 rounded-md" alt="">
        </div>
      </div>
    </AnimatedContent>
  </template>

  <script setup>
  import AnimatedContent from "@/Components/AnimatedContent.vue";
  </script>

  <style scoped>
  .slider {
    display: flex;
    animation: slide 20s linear infinite;
  }

  .slider img {
    margin-right: 1rem; /* Adjust spacing as needed */
  }

  @keyframes slide {
    0% {
      transform: translateX(0);
    }
    100% {
      transform: translateX(-100%);
    }
  }

  /* Hide scrollbar */
  .slider-container::-webkit-scrollbar {
    display: none;
  }

  .slider-container {
    -ms-overflow-style: none;  /* IE and Edge */
    scrollbar-width: none;  /* Firefox */
  }
  </style>
