<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Dashboard
            </h2>
        </template>

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
            <div class="px-5 py-6 md:py-12 md:px-0">
                <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div v-if="$page.props.auth.role === 'user'" class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            <h3 class="mb-4 text-2xl font-bold">Welcome, {{ $page.props.auth.user.name }}! 🎉</h3>
                            <p class="mb-6">
                                To apply for an internship, please follow the steps below:
                            </p>
                            <ul class="mb-6 list-disc list-inside">
                                <li>Review the available internship fields.</li>
                                <li>Prepare your resume (optional).</li>
                                <li>Click the button below to start your application.</li>
                            </ul>
                            <p class="mb-6 text-red-600">
                                If you have already applied and your application is under review, please do not apply
                                again. For further assistance, contact our support team.
                            </p>
                            <Link :href="route('apply')">
                                <PrimaryButton>
                                    Apply Now
                                </PrimaryButton>
                            </Link>
                        </div>
                    </div>

                    <!-- Admin Analytics Section -->
                    <AdminAnalytics v-if="$page.props.auth.role === 'admin'" :analytics="analytics" />

                    <!-- Internship Applications Section -->
                    <InternshipApplications
                        class="mt-5"
                        :internship-applications="internshipApplications"
                        :specialties="specialties"
                        :filters="filters"
                        :auth="auth"
                    />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import PrimaryButton from "@/Components/PrimaryButton.vue";
import AdminAnalytics from "@/Components/Sections/Dashboard/AdminAnalytics.vue";
import InternshipApplications from "@/Components/Sections/Dashboard/InternshipApplications.vue";

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
    analytics: {
        type: Object,
        required: true,
    },
});
</script>
