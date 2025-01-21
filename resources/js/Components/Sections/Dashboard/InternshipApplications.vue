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
                    <h3 class="mb-4 text-xl font-semibold leading-tight text-gray-800">Filter Applications</h3>
                    <form @submit.prevent="submit" class="flex space-x-4">
                        <div>
                            <label for="specialty" class="block text-sm font-medium text-gray-700">Specialty</label>
                            <select v-model="form.specialty" id="specialty" name="specialty"
                                    class="block w-full py-2 pl-3 pr-10 mt-1 text-base border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option value="all">All</option>
                                <option v-for="specialty in specialties" :key="specialty.id" :value="specialty.id">
                                    {{ specialty.name }}
                                </option>
                            </select>
                        </div>
                        <div v-if="$page.props.auth.role === 'admin'">
                            <label for="user" class="block text-sm font-medium text-gray-700">User</label>
                            <input v-model="form.user" type="text" id="user" name="user"
                                   class="block w-full py-2 pl-3 pr-10 mt-1 text-base border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                   placeholder="Search by user name">
                        </div>
                        <div class="flex items-end space-x-4">
                            <img @click="submit" src="@/assets/images/icons/filter.png" class="w-24 cursor-pointer md:w-9 md:h-9 h-11" alt="filter">
                        </div>
                    </form>
                </div>
                <h3 class="mb-4 text-xl font-semibold leading-tight text-gray-800">Your Internship Applications</h3>
                <div v-if="internshipApplications.data.length === 0"
                     class="p-4 text-red-700 bg-red-100 rounded-lg shadow-md">
                    <p class="text-center">
                        <span v-if="$page.props.auth.role === 'admin'">
                            No internship applications found. Please encourage users to apply.
                        </span>
                        <span v-else>
                            You have not applied for any internships yet. Please apply to get started!
                        </span>
                    </p>
                </div>
                <div
                    data-aos="fade-up"
                    data-aos-offset="100"
                    data-aos-delay="50"
                    data-aos-duration="100"
                    data-aos-easing="ease-in-out"
                    data-aos-mirror="true"
                    data-aos-once="false"
                    data-aos-anchor-placement="top-center"
                    v-else
                >
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                        <div v-for="internship in internshipApplications.data" :key="internship.id"
                             class="p-6 bg-white rounded-lg shadow-md">
                            <h4 class="mb-2 text-lg font-semibold">{{ internship.specialty?.name }} Internship</h4>
                            <p class="mb-4 text-gray-600">Status: {{ internship.status }}</p>
                            <Link :href="route('application.show', internship)">
                                <PrimaryButton> View Details</PrimaryButton>
                            </Link>
                            <SecondaryButton class="ml-4" @click="confirmDelete(internship.id)">Delete</SecondaryButton>
                        </div>
                    </div>
                    <div class="mt-6">
                        <Pagination :links="internshipApplications.links"/>
                    </div>
                </div>
            </div>
        </transition>
        <SuccessPopup v-if="showSuccessPopup" :message="'The internship has been deleted successfully.'" @close="showSuccessPopup = false" />
        <ConfirmationModal
            v-if="showDeleteModal" :show="showDeleteModal"
            title="Confirm Deletion"
            message="Are you sure you want to delete this application?"
            @confirm="deleteApplication"
            @cancel="showDeleteModal = false"
        />
    </div>
</template>

<script setup>
import { ref } from 'vue';
import { useForm, Link } from '@inertiajs/vue3';
import AnimatedContent from "@/Components/AnimatedContent.vue";
import Pagination from "@/Components/Pagination.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from '@/Components/SecondaryButton.vue';
import ConfirmationModal from '@/Components/ConfirmationModal.vue';
import SuccessPopup from '@/Components/SuccessPopup.vue';

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

const showSuccessPopup = ref(false);

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
const showDeleteModal = ref(false);
const selectedApplicationId = ref(null);

const toggleApplications = () => {
    showApplications.value = !showApplications.value;
};

const confirmDelete = (id) => {
    selectedApplicationId.value = id;
    showDeleteModal.value = true;
};

const deleteApplication = () => {
    // Make a request to delete the application
    form.delete(route('application.destroy', selectedApplicationId.value), {
        onSuccess: () => {
            showSuccessPopup.value = true;
            showDeleteModal.value = false;
        },
        onError: (errors) => {
            console.error(errors);
            showDeleteModal.value = false;
        }
    })
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
