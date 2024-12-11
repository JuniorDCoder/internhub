<template>
    <GuestLayout>
        <Head title="Apply" />
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
            <div class="flex flex-col w-full px-5 pt-16 md:flex-row md:space-x-7 md:px-40">
                <!-- Success Popup -->
                <div v-if="showSuccessPopup" class="fixed inset-0 flex items-center justify-center px-5 bg-black bg-opacity-50 md:px-0">
                    <div class="p-6 text-center bg-white rounded-lg shadow-lg">
                        <img src="@/assets/images/icons/success.png" alt="Success" class="w-16 h-16 mx-auto mb-4" />
                        <h2 class="mb-2 text-2xl font-bold">Success!</h2>
                        <p class="text-lg">Your application has been submitted successfully!</p>
                        <p class="mt-1 text-lg">An email has been sent to you to confirm your application submission.</p>
                        <p class="mt-2 text-lg">You will be redirected to your dashboard in a few seconds.</p>
                    </div>
                </div>

                <!-- Loader -->
                <Loader v-if="form.processing" />

                <div class="flex flex-col md:w-2/3">
                    <!-- Warning Message -->
                    <div class="p-4 mb-4 text-yellow-700 bg-yellow-100 border-l-4 border-yellow-500" role="alert">
                        <p class="font-bold">Attention</p>
                        <p>Please ensure to enter the right data and do not leave the page while filling as data could be lost.</p>
                    </div>

                    <!-- Progress Bar -->
                    <div class="flex items-center justify-center mb-8">
                        <div class="w-full bg-gray-200 rounded-full h-2.5">
                            <div class="bg-green-400 h-2.5 rounded-full" :style="{ width: progress + '%' }"></div>
                        </div>
                        <div class="ml-4 font-semibold text-green-600">{{ progress }}%</div>
                    </div>

                    <!-- Form Steps -->
                    <div v-if="step === 1">
                        <h2 class="mb-4 text-xl font-semibold">Personal Information</h2>
                        <form @submit.prevent="nextStep">
                            <div>
                                <InputLabel for="name" value="Name" />
                                <TextInput id="name" type="text" class="block w-full mt-1" v-model="form.name" required autofocus autocomplete="name" />
                                <InputError class="mt-2" :message="form.errors.name" />
                            </div>
                            <div class="mt-4">
                                <InputLabel for="email" value="Email (Not editable from here)" />
                                <TextInput disabled id="email" type="email" class="block w-full mt-1" v-model="form.email" required autocomplete="username" />
                                <InputError class="mt-2" :message="form.errors.email" />
                            </div>
                            <div class="mt-4">
                                <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">Next</PrimaryButton>
                            </div>
                        </form>
                    </div>

                    <div v-if="step === 2">
                        <h2 class="mb-4 text-xl font-semibold">Contact Information</h2>
                        <form @submit.prevent="nextStep">
                            <div>
                                <InputLabel for="phone" value="Phone" />
                                <TextInput id="phone" type="text" class="block w-full mt-1" v-model="form.phone" required />
                                <InputError class="mt-2" :message="form.errors.phone" />
                            </div>
                            <div class="mt-4">
                                <InputLabel for="address" value="Address" />
                                <TextInput id="address" type="text" class="block w-full mt-1" v-model="form.address" required />
                                <InputError class="mt-2" :message="form.errors.address" />
                            </div>
                            <div class="flex items-center justify-between mt-4">
                                <PrimaryButton @click="prevStep" class="ms-4">Back</PrimaryButton>
                                <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">Next</PrimaryButton>
                            </div>
                        </form>
                    </div>

                    <div v-if="step === 3">
                        <h2 class="mb-4 text-xl font-semibold">School Information</h2>
                        <form @submit.prevent="nextStep" enctype="multipart/form-data">
                            <div>
                                <InputLabel for="school" value="School Name" />
                                <TextInput id="school" type="text" class="block w-full mt-1" v-model="form.school" required />
                                <InputError class="mt-2" :message="form.errors.school" />
                            </div>
                            <div class="mt-4">
                                <InputLabel for="level" value="School Level" />
                                <select id="level" class="block w-full mt-1" v-model="form.level" required>
                                    <option value="" disabled>Select Level</option>
                                    <option value="Level 200">Level 200</option>
                                    <option value="Level 300">Level 300</option>
                                    <option value="Level 400">Level 400</option>
                                    <option value="Level 500">Level 500</option>
                                    <option value="Post Graduate">Post Graduate</option>
                                </select>
                                <InputError class="mt-2" :message="form.errors.level" />
                            </div>
                            <div class="mt-4">
                                <InputLabel for="resume" value="Resume (PDF) - Optional" />
                                <input id="resume" type="file" class="block w-full mt-1" @change="handleFileUpload" accept="application/pdf" />
                                <InputError class="mt-2" :message="form.errors.resume" />
                                <div v-if="form.resume" class="mt-4">
                                    <embed :src="form.resume" type="application/pdf" width="100%" height="200px" />
                                </div>
                            </div>
                            <div class="flex items-center justify-between mt-4">
                                <PrimaryButton @click="prevStep" class="ms-4">Back</PrimaryButton>
                                <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">Next</PrimaryButton>
                            </div>
                        </form>
                    </div>

                    <div v-if="step === 4">
                        <h2 class="mb-4 text-xl font-semibold">Internship Details</h2>
                        <form @submit.prevent="nextStep">
                            <div>
                                <InputLabel for="specialty" value="Specialty" />
                                <select id="specialty" class="block w-full mt-1" v-model="form.specialty" required>
                                    <option value="" disabled>Select Specialty</option>
                                    <option v-for="specialty in specialties" :key="specialty.id" :value="specialty.id">{{ specialty.name }}</option>
                                </select>
                                <InputError class="mt-2" :message="form.errors.specialty" />
                            </div>
                            <div class="mt-4">
                                <InputLabel for="start_date" value="Start Date" />
                                <TextInput id="start_date" type="date" class="block w-full mt-1" v-model="form.start_date" required />
                                <InputError class="mt-2" :message="form.errors.start_date" />
                            </div>
                            <div class="mt-4">
                                <InputLabel for="end_date" value="End Date" />
                                <TextInput id="end_date" type="date" class="block w-full mt-1" v-model="form.end_date" required />
                                <InputError class="mt-2" :message="form.errors.end_date" />
                            </div>
                            <div class="flex items-center justify-between mt-4">
                                <PrimaryButton @click="prevStep" class="ms-4">Back</PrimaryButton>
                                <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">Next</PrimaryButton>
                            </div>
                        </form>
                    </div>

                    <div v-if="step === 5">
                        <h2 class="mb-6 text-2xl font-bold text-center">Review & Submit</h2>
                        <div class="bg-white rounded-lg">
                            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                                <div>
                                    <p class="text-lg"><strong>Name:</strong> {{ form.name }}</p>
                                    <p class="text-lg"><strong>Email:</strong> {{ form.email }}</p>
                                    <p class="text-lg"><strong>Phone:</strong> {{ form.phone }}</p>
                                    <p class="text-lg"><strong>Address:</strong> {{ form.address }}</p>
                                </div>
                                <div>
                                    <p class="text-lg"><strong>School Name:</strong> {{ form.school }}</p>
                                    <p class="text-lg"><strong>School Level:</strong> {{ form.level }}</p>
                                    <p class="text-lg"><strong>Specialty:</strong> {{ form.specialty }}</p>
                                    <p class="text-lg"><strong>Start Date:</strong> {{ form.start_date }}</p>
                                    <p class="text-lg"><strong>End Date:</strong> {{ form.end_date }}</p>
                                </div>
                            </div>
                            <div v-if="form.resume" class="mt-6">
                                <h3 class="mb-2 text-xl font-semibold">Resume Preview:</h3>
                                <embed :src="form.resume" type="application/pdf" class="w-full h-64 border rounded-lg" />
                            </div>
                        </div>
                        <div class="flex items-center justify-between mt-6">
                            <PrimaryButton @click="prevStep" class="ms-4">Back</PrimaryButton>
                            <PrimaryButton @click="submitForm" class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">Submit</PrimaryButton>
                        </div>
                        <div v-if="form.errors.date" class="mt-4 font-semibold text-red-600">
                            {{ form.errors.date }}
                        </div>
                    </div>
                </div>
                <div class="flex flex-col md:w-1/3">
                    <div class="flex items-center justify-center">
                        <svg class="w-40 h-40" viewBox="0 0 36 36">
                            <path
                                class="circle-bg"
                                d="M18 2.0845
                 a 15.9155 15.9155 0 0 1 0 31.831
                 a 15.9155 15.9155 0 0 1 0 -31.831"
                            />
                            <path
                                class="circle"
                                :stroke-dasharray="`${progress}, 100`"
                                d="M18 2.0845
                 a 15.9155 15.9155 0 0 1 0 31.831
                 a 15.9155 15.9155 0 0 1 0 -31.831"
                            />
                            <text x="18" y="20.35" class="percentage">{{ progress }}%</text>
                        </svg>
                    </div>
                    <div class="mt-4">
                        <div class="overflow-x-auto">
                            <table class="bg-white border border-gray-200 rounded-lg shadow-md md:min-w-full">
                                <thead>
                                <tr>
                                    <th class="px-4 py-2 border-b">Field</th>
                                    <th class="px-4 py-2 border-b">Details</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="px-4 py-2 border-b">Name</td>
                                    <td class="px-4 py-2 border-b">{{form?.name}}</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-2 border-b">Email</td>
                                    <td class="px-4 py-2 border-b">{{ form?.email }}</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-2 border-b">Phone</td>
                                    <td class="px-4 py-2 border-b">{{ form?.phone }}</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-2 border-b">Address</td>
                                    <td class="px-4 py-2 border-b">{{form?.address}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <p class="mt-4 font-semibold text-center text-green-600">
                            You stand a very good chance of selection! Please fill in the data carefully.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>

<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import { Head, useForm } from "@inertiajs/vue3";
import { ref, onMounted } from "vue";
import { usePage } from "@inertiajs/vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import Loader from "@/Components/Loader.vue";

defineProps({
    specialties: Array,
});

const page = usePage();
const user = ref(page.props.auth.user);
const showSuccessPopup = ref(false);

const step = ref(1);
const progress = ref(20);

const form = useForm({
    name: user.value.name,
    email: user.value.email,
    phone: '',
    address: '',
    school: '',
    level: '',
    resume: null,
    specialty: '',
    start_date: '',
    end_date: '',
    errors: {},
    processing: false,
});

const nextStep = () => {
    if (step.value < 5) {
        step.value++;
        progress.value += 20;
    }
};

const prevStep = () => {
    if (step.value > 1) {
        step.value--;
        progress.value -= 20;
    }
};

const handleFileUpload = (event) => {
    const file = event.target.files[0];
    if (file && file.type === 'application/pdf') {
        form.resume = file;
    } else {
        form.errors.resume = 'Please upload a valid PDF file.';
    }
};

const submitForm = () => {
    form.errors = {};
    if (new Date(form.end_date) < new Date(form.start_date)) {
        form.errors.date = 'End date cannot be earlier than start date.';
        return;
    }
    form.processing = true;

    form.post(route('apply.store'), {
        onSuccess: () => {
            showSuccessPopup.value = true;
            setTimeout(() => {
                window.location.href = route('dashboard');
            }, 6000);
        },
        onFinish: () => {
            form.processing = false;
        }
    });
};

onMounted(() => {
    if (page.props.flash && page.props.flash.success) {
        showSuccessPopup.value = true;
        setTimeout(() => {
            window.location.href = route('dashboard');
        }, 6000);
    }
});
</script>

<style scoped>
.circle-bg {
    fill: none;
    stroke: #e5e7eb; /* gray-400 */
    stroke-width: 3.8;
}

.circle {
    fill: none;
    stroke: #68d391; /* green-400 */
    stroke-width: 3.8;
    stroke-linecap: round;
    transition: stroke-dasharray 0.3s ease;
}

.percentage {
    fill: #4a5568; /* gray-700 */
    font-family: Arial, sans-serif;
    font-size: 0.5em;
    text-anchor: middle;
}
</style>
