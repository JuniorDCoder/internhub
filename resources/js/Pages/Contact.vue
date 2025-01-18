<template>
    <GuestLayout>
        <Head title="Contact" />
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
            <div class="flex flex-col px-5 py-5 md:px-40 md:py-16">
                <h1 class="mb-8 text-4xl font-bold text-primary-dark">Contact Us</h1>
                <div class="mb-6">
                    <p class="mb-4 text-lg text-gray-700">We would love to hear from you! Please reach out to us using the form below or through our contact details.</p>
                    <div class="flex flex-col md:flex-row md:items-center md:space-x-4">
                        <div class="flex items-center space-x-2">
                            <svg class="w-6 h-6 text-primary animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8a6 6 0 00-12 0v4a6 6 0 0012 0V8z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01"></path>
                            </svg>
                            <span class="text-gray-700">Bambili, Bamenda Opposite 2nd Gate of UBa</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <svg class="w-6 h-6 text-primary animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 01-8 0 4 4 0 018 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14v6m0 0h-3m3 0h3"></path>
                            </svg>
                            <span class="text-gray-700">+237 677 802 114</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <svg class="w-6 h-6 text-primary animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 01-8 0 4 4 0 018 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14v6m0 0h-3m3 0h3"></path>
                            </svg>
                            <span class="text-gray-700">info@traitz.tech</span>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col items-center w-full md:flex-row">
                    <img src="@/assets/images/contact.webp" class="md:w-1/2">
                    <form @submit.prevent="submitForm" class="w-full bg-white rounded-lg md:w-1/2">
                        <div class="mb-6">
                            <label for="name" class="block mb-2 font-bold text-gray-700">Name</label>
                            <input
                                v-model="form.name"
                                type="text"
                                id="name"
                                class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                                :class="{'border-red-500': errors.name}"
                                placeholder="Your Name"
                            />
                            <p v-if="errors.name" class="mt-2 text-sm text-red-500">{{ errors.name[0] }}</p>
                        </div>
                        <div class="mb-6">
                            <label for="email" class="block mb-2 font-bold text-gray-700">Email</label>
                            <input
                                v-model="form.email"
                                type="email"
                                id="email"
                                class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                                :class="{'border-red-500': errors.email}"
                                placeholder="Your Email"
                            />
                            <p v-if="errors.email" class="mt-2 text-sm text-red-500">{{ errors.email[0] }}</p>
                        </div>
                        <div class="mb-6">
                            <label for="message" class="block mb-2 font-bold text-gray-700">Message</label>
                            <textarea
                                v-model="form.message"
                                id="message"
                                class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                                :class="{'border-red-500': errors.message}"
                                placeholder="Your Message"
                                rows="5"
                            ></textarea>
                            <p v-if="errors.message" class="mt-2 text-sm text-red-500">{{ errors.message[0] }}</p>
                        </div>
                        <div class="text-center">
                            <button
                                type="submit"
                                class="px-6 py-3 text-white transition duration-300 rounded-lg shadow-lg bg-primary hover:bg-primary-dark"
                            >
                                Send Message
                            </button>
                        </div>
                    </form>
                </div>
                <Loader v-if="loading" />
                <div v-if="successMessage" class="fixed top-0 left-0 flex items-center justify-center w-full h-full px-5 bg-black bg-opacity-50">
                    <div class="p-6 text-center bg-white rounded-lg shadow-lg">
                        <p class="text-lg text-green-500">{{ successMessage }}</p>
                    </div>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>

<script setup>
import { ref } from 'vue';
import { Head } from '@inertiajs/vue3';
import axios from 'axios';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import Loader from '@/Components/Loader.vue';

const form = ref({
    name: '',
    email: '',
    message: ''
});

const errors = ref({});
const loading = ref(false);
const successMessage = ref('');

const submitForm = async () => {
    loading.value = true;
    errors.value = {};
    try {
        const response = await axios.post('/contact/submit', form.value);
        successMessage.value = response.data.message;
        setTimeout(() => {
            successMessage.value = '';
        }, 5000);
    } catch (error) {
        if (error.response && error.response.data.errors) {
            errors.value = error.response.data.errors;
        }
    } finally {
        loading.value = false;
    }
};
</script>

<style scoped>
.container {
    animation: fadeIn 1s ease-in-out;
}

@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

input, textarea {
    transition: border-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
}

input:focus, textarea:focus {
    box-shadow: 0 0 10px rgba(0, 123, 255, 0.5);
}

button {
    transition: background-color 0.3s ease-in-out, transform 0.3s ease-in-out;
}

button:hover {
    transform: translateY(-2px);
}

svg.animate-bounce {
    animation: bounce 1s infinite;
}

@keyframes bounce {
    0%, 100% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-10px);
    }
}
</style>
