<script setup>
import Fr_sidebar from '@/components/U-Sign Components/Fr_sidebar.vue';
import { usePage } from '@inertiajs/vue3';

const { auth } = usePage().props;
const user = auth.user;

// You can pass these as props from your controller later
const stats = {
    totalStudents: 1234,
    totalFrontliners: 1234,
    totalInquires: 1234
};

const recentStudents = [
    { name: 'John Doe', id: 1 },
    { name: 'Jane Smith', id: 2 },
    { name: 'Mike Johnson', id: 3 },
    { name: 'Sarah Williams', id: 4 }
];

const recentFrontliners = [
    { name: 'John Doe', role: 'Registrar', id: 1 },
    { name: 'John Doe', role: 'Registrar', id: 2 },
    { name: 'John Doe', role: 'Library', id: 3 },
    { name: 'John Doe', role: 'Admin', id: 4 }
];
</script>

<template>
    <div class="min-h-screen bg-gray-100">
        <!-- Sidebar -->
        <Fr_sidebar :user="user" />

        <!-- Main Content -->
        <div class="ml-64 p-8">
            <!-- Header -->
            <h1 class="text-4xl font-bold text-red-700 mb-8">Dashboard</h1>
            4
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <!-- Total Students -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <p class="text-gray-600 mb-2">Total Students</p>
                    <p class="text-4xl font-bold text-red-700">{{ stats.totalStudents }}</p>
                </div>

                <!-- Total Frontliners -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <p class="text-gray-600 mb-2">Total Frontliners</p>
                    <p class="text-4xl font-bold text-red-700">{{ stats.totalFrontliners }}</p>
                </div>

                <!-- Total Inquires -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <p class="text-gray-600 mb-2">Total Inquires</p>
                    <p class="text-4xl font-bold text-red-700">{{ stats.totalInquires }}</p>
                </div>
            </div>

            <!-- Lists Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 " >
                <!-- Students List -->
                <div class="bg-white rounded-lg shadow-md p-6 ">
                    <h2 class="text-2xl font-bold text-red-700 mb-4">Students</h2>
                    <div class="space-y-3 ">
                        <div v-for="student in recentStudents" :key="student.id"
                             class="flex items-center gap-3 p-3 hover:bg-gray-50  transition border-t">
                            <div class="w-12 h-12 bg-red-700 rounded-full flex items-center justify-center border-t">
                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <p class="font-semibold text-gray-800">{{ student.name }}</p>
                        </div>
                    </div>
                </div>

                <!-- Frontliners List -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-2xl font-bold text-red-900 mb-4">Frontliners</h2>
                    <div class="space-y-3">
                        <div v-for="frontliner in recentFrontliners" :key="frontliner.id"
                             class="flex items-center gap-3 p-3 hover:bg-gray-50  transition border-t">
                            <div class="w-12 h-12 bg-red-700 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800">{{ frontliner.name }}</p>
                                <p class="text-sm text-gray-500 italic">{{ frontliner.role }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
/* Add any custom styles here if needed */
</style>
