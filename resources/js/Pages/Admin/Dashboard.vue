<script setup>
import AuthenticatedLayout from '@/Layouts/AdminAuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

const props = defineProps({
    medicineCount: Number  // Add this to accept the medicine count from the backend
});
</script>

<template>
    <Head title="Admin Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">You're logged in as an admin!</div>
                </div>
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-lg font-semibold mb-4">Total Medicines</h2>
                    <p class="text-3xl font-bold">{{ medicineCount }}</p>
                </div>

            </div>
        </div>
    </AuthenticatedLayout>
</template>
