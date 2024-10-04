<template>
    <div>
        <div @click="toggleApplications" class="flex items-center cursor-pointer">
            <i :class="['fas', showApplications ? 'fa-chevron-down' : 'fa-chevron-right', 'text-blue-500', 'mr-2']"></i>
            <span class="text-blue-500">{{ showApplications ? 'Hide Applications' : 'Show Applications' }}</span>
        </div>
        <transition name="fade">
            <div v-if="showApplications" class="mt-4">
                <!-- Filters Section -->
                <div class="my-8">
                    <h3 class="text-xl font-semibold leading-tight text-gray-800 mb-4">Filter Applications</h3>
                    <form @submit.prevent="submit" class="flex space-x-4">
                        <div>
                            <label for="specialty" class="block text-sm font-medium text-gray-700">Specialty</label>
                            <select v-model="form.specialty" id="specialty" name="specialty"
                                    class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                <option value="all">All</option>
                                <option v-for="specialty in specialties" :key="specialty.id" :value="specialty.id">
                                    {{ specialty.name }}
                                </option>
                            </select>
                        </div>
                        <div v-if="$page.props.auth.role === 'admin'">
                            <label for="user" class="block text-sm font-medium text-gray-700">User</label>
                            <input v-model="form.user" type="text" id="user" name="user"
                                   class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md"
                                   placeholder="Search by user name">
                        </div>
                        <div class="flex space-x-4 items-end">
                            <img @click="submit" src="@/assets/images/icons/filter.png" class="md:w-9 md:h-9 w-24 h-11 cursor-pointer" alt="filter">
<!--                            <PrimaryButton>Filter</PrimaryButton>-->
                        </div>
                    </form>
                </div>
                <h3 class="text-xl font-semibold leading-tight text-gray-800 mb-4">Your Internship Applications</h3>
                <div v-if="internshipApplications.data.length === 0"
                     class="bg-red-100 text-red-700 p-4 rounded-lg shadow-md">
                    <p class="text-center">
                        <span v-if="$page.props.auth.role === 'admin'">
                            No internship applications found. Please encourage users to apply.
                        </span>
                        <span v-else>
                            You have not applied for any internships yet. Please apply to get started!
                        </span>
                    </p>
                </div>
                <AnimatedContent v-else>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div v-for="internship in internshipApplications.data" :key="internship.id"
                             class="bg-white p-6 rounded-lg shadow-md">
                            <h4 class="text-lg font-semibold mb-2">{{ internship.specialty?.name }} Internship</h4>
                            <p class="text-gray-600 mb-4">Status: {{ internship.status }}</p>
                            <Link :href="route('application.show', internship)">
                                <PrimaryButton> View Details</PrimaryButton>
                            </Link>
                        </div>
                    </div>
                    <div class="mt-6">
                        <Pagination :links="internshipApplications.links"/>
                    </div>
                </AnimatedContent>
            </div>
        </transition>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import { useForm, Link } from '@inertiajs/vue3';
import AnimatedContent from "@/Components/AnimatedContent.vue";
import Pagination from "@/Components/Pagination.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const props = defineProps({
    internshipApplications: {
        type: Object,
        required: true,
    },
    specialties: {
        type: Array,
        required: true,
    },
    filters: {
        type: Object,
        required: true,
    },
    auth: {
        type: Object,
        required: true,
    },
});

const form = useForm({
    specialty: props.filters.specialty || 'all',
    user: props.filters.user || '',
});

const clearFilters = () => {
    form.specialty = 'all';
    form.user = '';
};

const submit = () => {
    form.get(route('dashboard'));
};

const showApplications = ref(true);

const toggleApplications = () => {
    showApplications.value = !showApplications.value;
};
</script>

<style scoped>
.fade-enter-active, .fade-leave-active {
    transition: opacity 0.5s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active in <2.1.8 */ {
    opacity: 0;
}
</style>
