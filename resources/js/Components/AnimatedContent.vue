<template>
    <div ref="target">
        <transition :name="animationType">
            <div v-if="animate" class="animated-component">
                <slot />
            </div>
        </transition>
    </div>
</template>

<script setup>
import { ref, onMounted, onBeforeUnmount } from 'vue';

const props = defineProps({
    animationType: {
        type: String,
        default: 'zoom',
    },
    delay: {
        type: Number,
        default: 0,
    }
});

const target = ref(null);
const animate = ref(false);
let observer = null;

const createObserver = () => {
    observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    animate.value = true;
                }, props.delay);
            } else {
                animate.value = false;
            }
        });
    });

    if (target.value) {
        observer.observe(target.value);
    }
};

onMounted(() => {
    if (typeof IntersectionObserver !== 'undefined') {
        createObserver();
    }
});

onBeforeUnmount(() => {
    if (observer && target.value) {
        observer.unobserve(target.value);
    }
});
</script>
<style scoped>
.animated-component.fade-enter-active,
.animated-component.fade-leave-active {
    transition: opacity 300ms ease;
}

.animated-component.fade-enter-from,
.animated-component.fade-leave-to {
    opacity: 0;
}

.animated-component.zoom-enter-active,
.animated-component.zoom-leave-active {
    transition: transform 300ms ease;
}

.animated-component.zoom-enter-from,
.animated-component.zoom-leave-to {
    transform: scale(0.9);
}
</style>
