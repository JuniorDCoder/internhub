<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import AnimatedContent from "@/Components/AnimatedContent.vue";

defineProps({
    internshipApplications: {
        type: Array,
        required: true,
    },
})
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Dashboard
            </h2>
        </template>

        <AnimatedContent animation-type="zoom" delay=200>
            <div class="py-12 md:px-0 px-5">
                <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            <h3 class="text-2xl font-bold mb-4">Welcome, {{ $page.props.auth.user.name }}! 🎉</h3>
                            <p class="mb-6">
                                To apply for an internship, please follow the steps below:
                            </p>
                            <ul class="list-disc list-inside mb-6">
                                <li>Review the available internship fields.</li>
                                <li>Prepare your resume (optional).</li>
                                <li>Click the button below to start your application.</li>
                            </ul>
                            <p class="mb-6 text-red-600">
                                If you have already applied and your application is under review, please do not apply again. For further assistance, contact our support team.
                            </p>
                            <Link
                                :href="route('apply')"
                                class="inline-block px-6 py-3 bg-primary text-white font-semibold rounded-md shadow-md hover:bg-blue-700 transition duration-300"
                            >
                                Apply Now
                            </Link>
                        </div>
                    </div>

                    <!-- Internship Applications Section -->
                    <AnimatedContent>
                        <div class="mt-8">
                            <h3 class="text-xl font-semibold leading-tight text-gray-800 mb-4">Your Internship Applications</h3>
                            <div v-if="!internshipApplications" class="bg-red-100 text-red-700 p-4 rounded-lg shadow-md">
                                <p class="text-center">You have not applied for any internships yet. Please apply to get started!</p>
                            </div>
                            <AnimatedContent v-else>
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                    <!-- Static Internship Application Card -->
                                    <div v-for="internship in internshipApplications" :key="internship.id" class="bg-white p-6 rounded-lg shadow-md">
                                        <h4 class="text-lg font-semibold mb-2">{{internship.specialty?.name}} Internship</h4>
                                        <p class="text-gray-600 mb-4">Status: {{ internship.status }}</p>
                                        <Link
                                            href=""
                                            class="inline-block px-4 py-2 bg-blue-600 text-white font-semibold rounded-md shadow-md hover:bg-blue-700 transition duration-300"
                                        >
                                            View Details
                                        </Link>
                                    </div>
                                </div>
                            </AnimatedContent>

                        </div>
                    </AnimatedContent>

                </div>
            </div>
        </AnimatedContent>

    </AuthenticatedLayout>
</template>
