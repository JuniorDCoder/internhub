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
      <div class="flex items-center justify-between w-full h-20 px-5 overflow-hidden md:px-40 bg-primary">
        <div class="slider">
          <img src="@/assets/images/traitz.jpeg" class="h-12 rounded-md" alt="">
          <img src="@/assets/images/wiscoprec.png" class="h-12 rounded-md" alt="">
          <img src="@/assets/images/solavise.png" class="h-12 rounded-md" alt="">
          <img src="@/assets/images/wiscoprec.png" class="h-12 rounded-md" alt="">
          <img src="@/assets/images/logo.png" class="h-12 rounded-md" alt="">
          <img src="@/assets/images/ggit.png" class="h-12 rounded-md" alt="">
            <img src="@/assets/images/girlforce.png" class="h-12 rounded-md" alt="">
            <img src="@/assets/images/unib.png" class="h-12 rounded-md" alt="">
            <img src="@/assets/images/lurmina.png" class="h-12 rounded-md" alt="">
            <img src="@/assets/images/traitz.jpeg" class="h-12 rounded-md" alt="">
            <img src="@/assets/images/wiscoprec.png" class="h-12 rounded-md" alt="">
            <img src="@/assets/images/solavise.png" class="h-12 rounded-md" alt="">
            <img src="@/assets/images/wiscoprec.png" class="h-12 rounded-md" alt="">
        </div>
      </div>
    </div>
  </template>

  <script setup>
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
