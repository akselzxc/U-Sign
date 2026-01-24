<script setup>
import { Link, router } from "@inertiajs/vue3";
import { ref } from 'vue';

// Accept user as a prop (make it optional instead of required)
defineProps({
    user: {
        type: Object,
        required: false,
        default: () => ({})
    }
});

const showLogoutConfirm = ref(false);
const showLogoutSuccess = ref(false);

const handleLogoutClick = () => {
    showLogoutConfirm.value = true;
};

const confirmLogout = () => {
    showLogoutConfirm.value = false;
    showLogoutSuccess.value = true;

    // Hide success message and redirect after 1.5 seconds
    setTimeout(() => {
        showLogoutSuccess.value = false;
        // Direct redirect to login page
        window.location.href = '/login_frontline';
    }, 1500);
};

const cancelLogout = () => {
    showLogoutConfirm.value = false;
};
</script>

<template>
    <!-- Sidebar -->
    <aside class="fixed left-0 top-0 h-screen w-64 bg-white shadow-lg">
        <!-- Logo -->
        <div class="flex items-center justify-center gap-2 p-2">
            <Link href="/login_frontline">
                <img src="/Images/USignLogo.png"
                     alt="U'Sign Logo"
                     class="h-26 w-auto" />
            </Link>
        </div>

        <!-- Navigation -->
        <nav class="p-4 space-y-2">
            <a href="/Fr_dashboard" class="flex items-center gap-3 px-4 py-3 text-gray-700 hover:bg-red-800 hover:text-white font-semibold rounded-lg transition">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1
                    0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                </svg>
                <span>Dashboard</span>
            </a>

            <a href="/fr_messages" class="flex items-center gap-3 px-4 py-3 text-gray-700 hover:bg-red-800 hover:text-white font-semibold rounded-lg transition">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M2 5a2 2 0 012-2h12a2 2 0 012 2v10a2 2 0 01-2 2H4a2 2 0 01-2-2V5zm3.293 1.293a1 1 0 011.414 0l3.293 3.293 3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                </svg>
                <span>Messages</span>
            </a>

            <a href="/fr_logs" class="flex items-center gap-3 px-4 py-3 text-gray-700 hover:bg-red-800 hover:text-white font-semibold rounded-lg transition">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
                </svg>
                <span>Logs</span>
            </a>
        </nav>

        <!-- User Profile (Bottom) - Clickable -->
        <div class="absolute bottom-0 left-3 right-0 p-4 mb-5">
            <button
                @click="handleLogoutClick"
                class="flex items-center gap-3 w-full hover:bg-red-50 p-2 rounded-lg transition"
            >
                <div class="w-12 h-12 bg-red-700 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="flex-1 text-left">
                    <p class="font-bold text-red-700">{{ user?.name || 'Guest' }}</p>
                    <p class="text-lg text-black">{{ user?.role || 'User' }}</p>
                </div>
            </button>
        </div>
    </aside>

    <!-- Logout Confirmation Modal -->
    <div
        v-if="showLogoutConfirm"
        class="fixed inset-0 bg-black/30 backdrop-blur-sm flex items-center justify-center z-50"
        @click="cancelLogout"
    >
        <div
            class="bg-white rounded-lg p-6 max-w-sm w-full mx-4 shadow-xl"
            @click.stop
        >
            <div class="text-center">
                <!-- Warning Icon -->
                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100 mb-4">
                    <svg class="h-6 w-6 text-red-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>

                <h3 class="text-lg font-semibold text-gray-900 mb-2">Logout Confirmation</h3>
                <p class="text-gray-600 mb-6">Are you sure you want to log out?</p>

                <div class="flex gap-3">
                    <button
                        @click="cancelLogout"
                        class="flex-1 px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 font-semibold transition"
                    >
                        Cancel
                    </button>
                    <button
                        @click="confirmLogout"
                        class="flex-1 px-4 py-2 bg-red-700 text-white rounded-lg hover:bg-red-800 font-semibold transition"
                    >
                        Logout
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Logout Success Modal -->
    <div
        v-if="showLogoutSuccess"
        class="fixed inset-0 bg-black/30 backdrop-blur-sm flex items-center justify-center z-50"
    >
        <div class="bg-white rounded-lg p-6 max-w-sm w-full mx-4 shadow-xl">
            <div class="text-center">
                <!-- Success Icon -->
                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100 mb-4">
                    <svg class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </div>

                <h3 class="text-lg font-semibold text-gray-900 mb-2">Logout Successful</h3>
                <p class="text-gray-600">You have been logged out successfully.</p>
            </div>
        </div>
    </div>
</template>

<style scoped>
</style>
