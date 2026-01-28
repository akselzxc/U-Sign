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
    <div class="min-h-screen bg-gray-50">
        <!-- Sidebar -->
        <Fr_sidebar :user="user" />

        <!-- Main Content -->
        <main class="ml-64 p-8">
            <!-- Header -->
            <header class="mb-10">
                <h1 class="text-3xl font-bold text-gray-800">Welcome back, {{ user.name }}!</h1>
                <p class="text-gray-500 mt-1">Here's a summary of the platform's activity.</p>
            </header>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
                <!-- Total Students -->
                <div class="bg-white rounded-xl shadow-md p-6 flex items-center gap-6 transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                    <div class="bg-red-100 p-4 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M15 21v-1a6 6 0 00-5.197-5.977" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm font-medium">Total Students</p>
                        <p class="text-3xl font-bold text-gray-800">{{ stats.totalStudents }}</p>
                    </div>
                </div>

                <!-- Total Frontliners -->
                <div class="bg-white rounded-xl shadow-md p-6 flex items-center gap-6 transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                    <div class="bg-red-100 p-4 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm font-medium">Total Frontliners</p>
                        <p class="text-3xl font-bold text-gray-800">{{ stats.totalFrontliners }}</p>
                    </div>
                </div>

                <!-- Total Inquires -->
                <div class="bg-white rounded-xl shadow-md p-6 flex items-center gap-6 transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                    <div class="bg-red-100 p-4 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm font-medium">Total Inquiries</p>
                        <p class="text-3xl font-bold text-gray-800">{{ stats.totalInquires }}</p>
                    </div>
                </div>
            </div>

            <!-- Lists Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Students List -->
                <div class="bg-white rounded-xl shadow-md">
                    <div class="p-6 border-b border-gray-200">
                        <h2 class="text-xl font-bold text-gray-800">Recent Students</h2>
                    </div>
                    <div class="p-6 space-y-4">
                        <div v-for="student in recentStudents" :key="student.id"
                             class="flex items-center gap-4">
                            <div class="w-10 h-10 bg-red-100 rounded-full flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            </div>
                            <p class="font-semibold text-gray-700">{{ student.name }}</p>
                        </div>
                    </div>
                </div>

                <!-- Frontliners List -->
                <div class="bg-white rounded-xl shadow-md">
                    <div class="p-6 border-b border-gray-200">
                        <h2 class="text-xl font-bold text-gray-800">Recent Frontliners</h2>
                    </div>
                    <div class="p-6 space-y-4">
                        <div v-for="frontliner in recentFrontliners" :key="frontliner.id"
                             class="flex items-center gap-4">
                            <div class="w-10 h-10 bg-red-100 rounded-full flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-700">{{ frontliner.name }}</p>
                                <p class="text-sm text-gray-500">{{ frontliner.role }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</template>

<style scoped>
/* Add any custom styles here if needed */
</style>
