<template>
    <Head title="Application Details" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-2xl font-semibold leading-tight text-gray-800">
                {{ internship.user.name }} Internship Details
            </h2>
        </template>

        <AnimatedContent>
            <div class="py-12 md:px-0 px-5">
                <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div class="bg-white shadow-md rounded-lg p-8">
                        <h3 class="text-3xl font-bold mb-6 text-gray-900">Internship Details</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-4">
                                <p class="text-lg"><strong class="text-gray-700">Specialty:</strong> <span class="text-gray-900">{{ internship.specialty.name }}</span></p>
                                <p class="text-lg"><strong class="text-gray-700">Start Date:</strong> <span class="text-gray-900">{{ internship.start_date }}</span></p>
                                <p class="text-lg"><strong class="text-gray-700">End Date:</strong> <span class="text-gray-900">{{ internship.end_date }}</span></p>
                                <p class="text-lg"><strong class="text-gray-700">Status:</strong> <span class="text-gray-900">{{ internship.status }}</span></p>
                                <p class="text-lg"><strong class="text-gray-700">Is Accepted:</strong> <span class="text-gray-900">{{ internship.is_accepted}}</span></p>
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
                            <h4 class="text-2xl font-semibold mb-4 text-gray-900">Resume Preview</h4>
                            <iframe :src="`/storage/${internship.user.resume}`" class="w-full h-96 border rounded-md"></iframe>
                        </div>
                        <div v-if="$page.props.auth.role === 'admin'" class="mt-8 flex space-x-4">
                            <form @submit.prevent="submitForm('accepted')" method="POST">
                                <PrimaryButton>
                                    Accept Internship
                                </PrimaryButton>
                            </form>
                            <form @submit.prevent="submitForm('rejected')" method="POST">
                                <SecondaryButton type="submit">Reject Internship</SecondaryButton>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </AnimatedContent>
        <Loader v-if="form.processing" />
        <SuccessPopup v-if="showSuccessPopup" @close="showSuccessPopup = false" />
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import AnimatedContent from "@/Components/AnimatedContent.vue";
import Loader from "@/Components/Loader.vue";
import SuccessPopup from "@/Components/SuccessPopup.vue";
import { Head, usePage, useForm } from "@inertiajs/vue3";
import {ref} from "vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";

const { props } = usePage();

const form = useForm({
    status: "",
});

const showSuccessPopup = ref(false);

const submitForm = (status) => {
    form.status = status;
    form.put(route('internships.update', { internship: props.internship.id }), {
        onSuccess: () => {
            showSuccessPopup.value = true;
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
