<template>
    <GuestLayout>
        <Head title="Frequently Asked Questions" />
        <div
            data-aos="fade-up"
            data-aos-offset="100"
            data-aos-delay="50"
            data-aos-duration="100"
            data-aos-easing="ease-in-out"
            data-aos-mirror="true"
            data-aos-once="false"
            data-aos-anchor-placement="top-center"
        >
            <div class="px-5 py-5 md:px-40 md:py-16">
                <h1 class="mb-4 text-4xl font-bold text-primary-dark">Frequently Asked Questions</h1>
                <input
                    v-model="searchQuery"
                    @input="searchFaqs"
                    type="text"
                    placeholder="Search FAQs..."
                    class="w-full p-2 mb-5 border border-gray-300 rounded"
                />
                <div class="space-y-4">
                    <div v-for="(faq, index) in filteredFaqs" :key="index" class="pb-4 border-b border-gray-200">
                        <button @click="toggleFaq(index)" class="flex items-center justify-between w-full py-2 text-left">
                            <span class="text-xl font-semibold">{{ faq.question }}</span>
                            <svg :class="{'transform rotate-180': faq.open}" class="w-6 h-6 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div v-if="faq.open" class="mt-2 text-gray-700">
                            <p>{{ faq.answer }}</p>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center mt-8">
                    <button @click="loadMore" v-if="hasMore" class="px-4 py-2 text-white rounded bg-primary">Show More</button>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>

<script setup>
import { ref, computed } from 'vue';
import { Head, usePage } from '@inertiajs/vue3';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import AnimatedContent from '@/Components/AnimatedContent.vue';

const { props } = usePage();
const faqs = ref(Object.entries(props.faqs).map(([question, answer]) => ({ question, answer, open: false })));
const searchQuery = ref('');
const page = ref(1);
const perPage = 10;

const filteredFaqs = computed(() => {
    if (searchQuery.value) {
        return faqs.value.filter(faq =>
            faq.question.toLowerCase().includes(searchQuery.value.toLowerCase()) ||
            faq.answer.toLowerCase().includes(searchQuery.value.toLowerCase())
        );
    }
    return faqs.value.slice(0, page.value * perPage);
});

const hasMore = computed(() => {
    return filteredFaqs.value.length < faqs.value.length;
});

const loadMore = () => {
    page.value += 1;
};

const toggleFaq = (index) => {
    filteredFaqs.value[index].open = !filteredFaqs.value[index].open;
};

const searchFaqs = () => {
    page.value = 1; // Reset pagination when searching
};
</script>

<style scoped>
/* Add any additional styling here */
</style>
