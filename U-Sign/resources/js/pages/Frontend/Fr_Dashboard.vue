<script setup>
import Fr_sidebar from '@/components/U-Sign Components/Fr_sidebar.vue';
import { usePage } from '@inertiajs/vue3';
import { onMounted, ref } from 'vue';
import { Users, ShieldCheck, MessageCircle } from 'lucide-vue-next';

const { auth } = usePage().props;
const user = auth.user;

// You can pass these as props from your controller later
const stats = {
    totalStudents: 1234,
    totalFrontliners: 1234,
    totalInquires: 1234
};

// Animated counters for stats
const animatedStats = ref({
    totalStudents: 0,
    totalFrontliners: 0,
    totalInquires: 0
});

const easeOutCubic = (t) => 1 - Math.pow(1 - t, 3);

const animateValue = (key, target, duration = 1200) => {
    const start = 0;
    const startTime = performance.now();

    const step = (currentTime) => {
        const progress = Math.min((currentTime - startTime) / duration, 1);
        const eased = easeOutCubic(progress);

        animatedStats.value[key] = Math.floor(start + (target - start) * eased);

        if (progress < 1) {
            requestAnimationFrame(step);
        }
    };

    requestAnimationFrame(step);
};

onMounted(() => {
    animateValue('totalStudents', stats.totalStudents);
    animateValue('totalFrontliners', stats.totalFrontliners);
    animateValue('totalInquires', stats.totalInquires);
});

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
    <div class="min-h-screen bg-gradient-to-b from-gray-50 to-gray-100">
        <!-- Sidebar -->
        <Fr_sidebar :user="user" />

        <!-- Main Content -->
        <main class="ml-64 p-6 md:p-8 h-screen overflow-hidden">
            <!-- Header -->
            <header class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900 tracking-tight">
                        Welcome back, {{ user.name }}!
                    </h1>
                    <p class="text-gray-500 mt-1 text-sm">
                        Overview of current student activity, frontliner presence, and live inquiries.
                    </p>
                </div>
                <div class="flex items-center gap-3">
                    <div class="hidden sm:flex items-center gap-2 px-3 py-1.5 rounded-full bg-white/80 border border-gray-200 shadow-sm">
                        <span class="inline-flex h-2 w-2 rounded-full bg-emerald-500 animate-pulse" />
                        <span class="text-xs font-medium text-gray-700">
                            System status: <span class="text-emerald-600">Online</span>
                        </span>
                    </div>
                </div>
            </header>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                <!-- Total Students -->
                <div
                    class="bg-white/90 backdrop-blur rounded-2xl shadow-sm p-6 flex items-center gap-6 border border-red-50 transition-all duration-300 hover:shadow-xl hover:-translate-y-1"
                >
                    <div class="relative">
                        <div class="absolute inset-0 rounded-full bg-red-500/10 blur-md" />
                        <div class="relative bg-gradient-to-br from-red-500 to-red-700 p-4 rounded-full text-white shadow-lg">
                            <Users class="h-7 w-7" />
                        </div>
                    </div>
                    <div>
                        <p class="text-gray-500 text-xs font-semibold uppercase tracking-wide">
                            Total Students
                        </p>
                        <p class="text-3xl font-bold text-gray-800">
                            {{ animatedStats.totalStudents.toLocaleString() }}
                        </p>
                        <p class="text-xs text-green-600 mt-1 font-medium">
                            +12% vs last month
                        </p>
                    </div>
                </div>

                <!-- Total Frontliners -->
                <div
                    class="bg-white/90 backdrop-blur rounded-2xl shadow-sm p-6 flex items-center gap-6 border border-emerald-50 transition-all duration-300 hover:shadow-xl hover:-translate-y-1"
                >
                    <div class="relative">
                        <div class="absolute inset-0 rounded-full bg-emerald-500/10 blur-md" />
                        <div class="relative bg-gradient-to-br from-emerald-500 to-emerald-700 p-4 rounded-full text-white shadow-lg">
                            <ShieldCheck class="h-7 w-7" />
                        </div>
                    </div>
                    <div>
                        <p class="text-gray-500 text-xs font-semibold uppercase tracking-wide">
                            Total Frontliners
                        </p>
                        <p class="text-3xl font-bold text-gray-800">
                            {{ animatedStats.totalFrontliners.toLocaleString() }}
                        </p>
                        <p class="text-xs text-emerald-600 mt-1 font-medium">
                            98% active this week
                        </p>
                    </div>
                </div>

                <!-- Total Inquires -->
                <div
                    class="bg-white/90 backdrop-blur rounded-2xl shadow-sm p-6 flex items-center gap-6 border border-sky-50 transition-all duration-300 hover:shadow-xl hover:-translate-y-1"
                >
                    <div class="relative">
                        <div class="absolute inset-0 rounded-full bg-sky-500/10 blur-md" />
                        <div class="relative bg-gradient-to-br from-sky-500 to-sky-700 p-4 rounded-full text-white shadow-lg">
                            <MessageCircle class="h-7 w-7" />
                        </div>
                    </div>
                    <div>
                        <p class="text-gray-500 text-xs font-semibold uppercase tracking-wide">
                            Total Inquiries
                        </p>
                        <p class="text-3xl font-bold text-gray-800">
                            {{ animatedStats.totalInquires.toLocaleString() }}
                        </p>
                        <p class="text-xs text-sky-600 mt-1 font-medium">
                            24 new today
                        </p>
                    </div>
                </div>
            </div>

            <!-- Lists Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 h-[calc(100%-14rem)] min-h-0">
                <!-- Students List -->
                <div class="bg-white/90 backdrop-blur rounded-2xl shadow-md border border-gray-100 flex flex-col min-h-0">
                    <div class="p-5 border-b border-gray-200 flex items-center justify-between">
                        <div>
                            <h2 class="text-lg font-bold text-gray-900">Recent Students</h2>
                            <p class="text-xs text-gray-500 mt-0.5">Most recent learners interacting with U'SIGN.</p>
                        </div>
                        <span class="px-2.5 py-1 rounded-full text-[11px] font-semibold bg-red-50 text-red-700 border border-red-100">
                            {{ recentStudents.length }} total
                        </span>
                    </div>

                    <div class="p-5 space-y-3 overflow-y-auto dashboard-scroll">
                        <div
                            v-for="student in recentStudents"
                            :key="student.id"
                            class="flex items-center gap-3 rounded-xl border border-gray-100 bg-gray-50/60 px-3 py-2.5 hover:bg-gray-50 transition"
                        >
                            <div class="w-9 h-9 bg-red-100 rounded-full flex items-center justify-center flex-shrink-0">
                                <svg
                                    class="w-5 h-5 text-red-600"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                                    />
                                </svg>
                            </div>
                            <p class="font-semibold text-gray-800 text-sm">{{ student.name }}</p>
                        </div>
                    </div>
                </div>

                <!-- Frontliners List -->
                <div class="bg-white/90 backdrop-blur rounded-2xl shadow-md border border-gray-100 flex flex-col min-h-0">
                    <div class="p-5 border-b border-gray-200 flex items-center justify-between">
                        <div>
                            <h2 class="text-lg font-bold text-gray-900">Recent Frontliners</h2>
                            <p class="text-xs text-gray-500 mt-0.5">Active staff engaging with the deaf community.</p>
                        </div>
                        <span class="px-2.5 py-1 rounded-full text-[11px] font-semibold bg-gray-50 text-gray-700 border border-gray-200">
                            {{ recentFrontliners.length }} total
                        </span>
                    </div>
                    <div class="p-5 space-y-3 overflow-y-auto dashboard-scroll">
                        <div
                            v-for="frontliner in recentFrontliners"
                            :key="frontliner.id"
                            class="flex items-center gap-3 rounded-xl border border-gray-100 bg-gray-50/60 px-3 py-2.5 hover:bg-gray-50 transition"
                        >
                            <div class="w-9 h-9 bg-red-100 rounded-full flex items-center justify-center flex-shrink-0">
                                <svg
                                    class="w-5 h-5 text-red-600"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                                    />
                                </svg>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800 text-sm">{{ frontliner.name }}</p>
                                <p class="text-xs text-gray-500">{{ frontliner.role }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</template>

<style scoped>
.dashboard-scroll::-webkit-scrollbar {
    width: 8px;
}
.dashboard-scroll::-webkit-scrollbar-track {
    background: transparent;
}
.dashboard-scroll::-webkit-scrollbar-thumb {
    background: rgba(209, 213, 219, 0.8); /* gray-300 */
    border-radius: 9999px;
}
.dashboard-scroll::-webkit-scrollbar-thumb:hover {
    background: rgba(156, 163, 175, 0.9); /* gray-400 */
}
</style>
