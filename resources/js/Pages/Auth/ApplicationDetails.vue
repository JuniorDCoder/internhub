<template>
    <Head title="Application Details" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-2xl font-semibold leading-tight text-gray-800">
                {{ internship.user.name }} Internship Details
            </h2>
        </template>

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
            <div class="px-5 py-12 md:px-0">
                <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div class="p-8 bg-white rounded-lg shadow-md">
                        <h3 class="mb-6 text-3xl font-bold text-gray-900">Internship Details</h3>
                        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                            <div class="space-y-4">
                                <p class="text-lg"><strong class="text-gray-700">Specialty:</strong> <span class="text-gray-900">{{ internship.specialty.name }}</span></p>
                                <p class="text-lg"><strong class="text-gray-700">Start Date:</strong> <span class="text-gray-900">{{ internship.start_date }}</span></p>
                                <p class="text-lg"><strong class="text-gray-700">End Date:</strong> <span class="text-gray-900">{{ internship.end_date }}</span></p>
                                <p class="text-lg"><strong class="text-gray-700">Status:</strong> <span class="text-gray-900">{{ internship.status }}</span></p>
                                <p class="text-lg"><strong class="text-gray-700">Is Accepted:</strong> <span class="text-gray-900">{{ internship.is_accepted === 0 ? "No" : "Yes"}}</span></p>
                            </div>
                            <div class="space-y-4">
                                <p class="text-lg"><strong class="text-gray-700">User Name:</strong> <span class="text-gray-900">{{ internship.user.name }}</span></p>
                                <p class="text-lg truncate"><strong class="text-gray-700">Email:</strong> <span class="text-gray-900">{{ internship.user.email }}</span></p>
                                <p class="text-lg"><strong class="text-gray-700">Phone:</strong> <span class="text-gray-900">{{ internship.user.phone }}</span></p>
                                <p class="text-lg"><strong class="text-gray-700">Address:</strong> <span class="text-gray-900">{{ internship.user.address }}</span></p>
                                <p class="text-lg"><strong class="text-gray-700">School:</strong> <span class="text-gray-900">{{ internship.user.school }}</span></p>
                            </div>
                        </div>
                        <div v-if="internship.user.resume" class="mt-8">
                            <h4 class="mb-4 text-2xl font-semibold text-gray-900">Resume Preview</h4>
                            <iframe :src="`/storage/${internship.user.resume}`" class="w-full border rounded-md h-96"></iframe>
                        </div>
                        <div v-if="$page.props.auth.role === 'admin'" class="mt-8">
                            <div v-if="internship.status === 'pending'" class="flex space-x-4">
                                <PrimaryButton @click="showConfirmation('accepted')">Accept Internship</PrimaryButton>
                                <SecondaryButton @click="showConfirmation('rejected')">Reject Internship</SecondaryButton>
                            </div>
                            <div v-else class="p-4 text-green-700 bg-green-100 rounded-lg shadow-md">
                                <p class="text-center">This application has already been reviewed.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <Loader v-if="form.processing" />
        <SuccessPopup v-if="showSuccessPopup" @close="showSuccessPopup = false" />
        <ConfirmationModal
            v-if="showModal"
            :show="showModal"
            title="Confirm Action"
            :message="`Are you sure you want to ${action} this internship application?`"
            @confirm="submitForm"
            @cancel="showModal = false"
        />
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import AnimatedContent from "@/Components/AnimatedContent.vue";
import Loader from "@/Components/Loader.vue";
import SuccessPopup from "@/Components/SuccessPopup.vue";
import ConfirmationModal from "@/Components/ConfirmationModal.vue";
import {Head, usePage, useForm} from "@inertiajs/vue3";
import {ref} from "vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";

const {props} = usePage();

const form = useForm({
    status: "",
});

const showSuccessPopup = ref(false);
const showModal = ref(false);
const action = ref("");

const showConfirmation = (status) => {
    action.value = status;
    showModal.value = true;
};

const submitForm = () => {
    form.status = action.value;
    form.put(route('internships.update', {internship: props.internship.id}), {
        onSuccess: () => {
            showSuccessPopup.value = true;
            showModal.value = false;
        },
    });
};

defineProps({
    internship: {
        type: Object,
        required: true,
    },
});
</script>
