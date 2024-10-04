<template>
    <Head title="All Users" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Users
            </h2>
        </template>

        <AnimatedContent animation-type="zoom" delay=200>
            <div class="mx-auto max-w-7xl py-12 sm:px-6 lg:px-8">
                <div class="flex md:flex-row flex-col md:space-y-0 md:space-x-3 space-y-2 justify-between items-center mb-4 px-5 w-full">
                    <TextInput v-model="searchQuery" placeholder="Search users..." class="md:w-1/3 w-full" />
                    <select v-model="selectedSchool" class="border-gray-300 md:w-1/3 w-full rounded-md shadow-sm">
                        <option value="">All Schools</option>
                        <option v-for="school in schools" :key="school" :value="school">{{ school == null ? "No school set": school }}</option>
                    </select>
                    <select v-model="selectedSpecialty" class="border-gray-300 md:w-1/3 w-full rounded-md shadow-sm">
                        <option value="">All Specialties</option>
                        <option v-for="specialty in specialties" :key="specialty.id" :value="specialty.id">{{ specialty.name }}</option>
                    </select>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mg:px-0 px-5">
                    <div v-for="user in filteredUsers" :key="user.id" class="bg-white p-6 rounded-lg shadow-md">
                        <h3 class="text-lg font-semibold">{{ user.name }}</h3>
                        <p class="text-gray-600">{{ user.email }}</p>
                        <p class="text-gray-600">{{ user.phone }}</p>
                        <p class="text-gray-600">{{ user.address }}</p>
                        <p class="text-gray-600">{{ user.school }}</p>
                        <p class="text-gray-600">{{ user.level }}</p>
                        <p class="text-gray-600">{{ user.resume ? 'Resume Available' : 'No Resume' }}</p>
                        <div v-if="user.resume" class="mt-4">
                            <h4 class="font-semibold">Resume Preview</h4>
                            <iframe :src="`/storage/${user.resume}`" class="w-full h-48 border rounded-md"></iframe>
                            <a :href="`/storage/${user.resume}`" download class="text-blue-500 underline mt-2 block">Download Resume</a>
                        </div>
                        <div class="mt-4">
                            <h4 class="font-semibold">Internship Applications ({{ user.internships.length }})</h4>
                            <ul>
                                <li v-for="internship in user.internships" :key="internship.id">
                                    {{ formatDate(internship.start_date) }} - {{ formatDate(internship.end_date) }} {{ internship.specialty.name }} ({{ internship.status }})
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="mt-6">
                    <Pagination :links="users.links" />
                </div>
            </div>
        </AnimatedContent>
    </AuthenticatedLayout>
</template>

<script setup>
import { ref, computed } from 'vue';
import { Head, Link } from '@inertiajs/vue3';
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import AnimatedContent from "@/Components/AnimatedContent.vue";
import TextInput from "@/Components/TextInput.vue";
import Pagination from "@/Components/Pagination.vue";

const props = defineProps({
    users: {
        type: Object,
        required: true,
    },
    schools: {
        type: Array,
        required: true,
    },
    specialties: {
        type: Array,
        required: true,
    },
});

const searchQuery = ref('');
const selectedSchool = ref('');
const selectedSpecialty = ref('');

const filteredUsers = computed(() => {
    return props.users.data.filter(user => {
        const matchesSearch = user.name.toLowerCase().includes(searchQuery.value.toLowerCase()) || user.email.toLowerCase().includes(searchQuery.value.toLowerCase());
        const matchesSchool = selectedSchool.value ? user.school === selectedSchool.value : true;
        const matchesSpecialty = selectedSpecialty.value ? user.internships.some(internship => internship.specialty_id === selectedSpecialty.value) : true;
        return matchesSearch && matchesSchool && matchesSpecialty;
    });
});

const formatDate = (date) => {
    const options = {year: 'numeric', month: 'long', day: 'numeric'};
    return new Date(date).toLocaleDateString(undefined, options);
};
</script>

<style scoped>
/* Add any additional styling here */
</style>
