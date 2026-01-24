<script setup lang="ts">
import { ref, computed } from 'vue';
import Fr_sidebar from '@/components/U-Sign Components/Fr_sidebar.vue';

// Sample log data - expanded with more entries
const logs = ref([
    { id: 1, datetime: '2026-01-25 10:30 AM', user: 'Juan Dela Cruz', action: 'Requested COR for 1st Semester', role: 'Student' },
    { id: 2, datetime: '2026-01-25 10:32 AM', user: 'Maria Santos', action: 'Approved COR Request #12345', role: 'Frontliner' },
    { id: 3, datetime: '2026-01-25 10:35 AM', user: 'Pedro Garcia', action: 'Downloaded COR Document', role: 'Student' },
    { id: 4, datetime: '2026-01-25 10:40 AM', user: 'Ana Reyes', action: 'Updated Profile Information', role: 'Student' },
    { id: 5, datetime: '2026-01-25 10:45 AM', user: 'Jose Mendoza', action: 'Responded to Student Query', role: 'Frontliner' },
    { id: 6, datetime: '2026-01-25 10:50 AM', user: 'Lisa Cruz', action: 'Submitted Grade Report', role: 'Student' },
    { id: 7, datetime: '2026-01-25 11:00 AM', user: 'Mark Torres', action: 'Verified Student Document', role: 'Frontliner' },
    { id: 8, datetime: '2026-01-25 11:15 AM', user: 'Sarah Lee', action: 'Requested Official Transcript', role: 'Student' },
    { id: 9, datetime: '2026-01-25 11:20 AM', user: 'Carlos Ramos', action: 'Logged into System', role: 'Student' },
    { id: 10, datetime: '2026-01-25 11:25 AM', user: 'Diana Flores', action: 'Processed COR Request', role: 'Frontliner' },
    { id: 11, datetime: '2026-01-25 11:30 AM', user: 'Rico Tan', action: 'Updated Contact Number', role: 'Student' },
    { id: 12, datetime: '2026-01-25 11:35 AM', user: 'Emma Garcia', action: 'Sent Email Notification', role: 'Frontliner' },
    { id: 13, datetime: '2026-01-25 11:40 AM', user: 'John Santos', action: 'Viewed Academic Records', role: 'Student' },
    { id: 14, datetime: '2026-01-25 11:45 AM', user: 'Grace Lim', action: 'Approved Document Request', role: 'Frontliner' },
    { id: 15, datetime: '2026-01-25 11:50 AM', user: 'Ryan Cruz', action: 'Requested Certificate of Grades', role: 'Student' },
]);

const selectedFilter = ref<string>('All');
const searchQuery = ref<string>('');
const currentPage = ref<number>(1);
const itemsPerPage = 10;

// Filter logs based on role and search
const filteredLogs = computed(() => {
    let result = logs.value;

    // Filter by role
    if (selectedFilter.value !== 'All') {
        result = result.filter(log => log.role === selectedFilter.value);
    }

    // Filter by search query
    if (searchQuery.value.trim()) {
        const query = searchQuery.value.toLowerCase();
        result = result.filter(log =>
            log.user.toLowerCase().includes(query) ||
            log.action.toLowerCase().includes(query) ||
            log.datetime.toLowerCase().includes(query)
        );
    }

    return result;
});

// Paginated logs
const paginatedLogs = computed(() => {
    const start = (currentPage.value - 1) * itemsPerPage;
    const end = start + itemsPerPage;
    return filteredLogs.value.slice(start, end);
});

// Total pages
const totalPages = computed(() => {
    return Math.ceil(filteredLogs.value.length / itemsPerPage);
});

// Reset to page 1 when filter changes
const setFilter = (filter: string) => {
    selectedFilter.value = filter;
    currentPage.value = 1;
};

// Go to specific page
const goToPage = (page: number) => {
    if (page >= 1 && page <= totalPages.value) {
        currentPage.value = page;
    }
};

// Get page numbers to display
const visiblePages = computed(() => {
    const pages: number[] = [];
    const total = totalPages.value;
    const current = currentPage.value;

    if (total <= 5) {
        for (let i = 1; i <= total; i++) {
            pages.push(i);
        }
    } else {
        if (current <= 3) {
            pages.push(1, 2, 3, 4, 5);
        } else if (current >= total - 2) {
            pages.push(total - 4, total - 3, total - 2, total - 1, total);
        } else {
            pages.push(current - 2, current - 1, current, current + 1, current + 2);
        }
    }

    return pages;
});
</script>

<template>
    <div class="min-h-screen bg-gray-100 flex">
        <!-- Sidebar -->
        <Fr_sidebar />

        <!-- Main Content -->
        <div class="flex-1 p-6 ml-64">
            <div class="bg-white rounded-xl shadow-lg p-6">
                <!-- Header -->
                <div class="mb-6">
                    <h1 class="text-2xl font-bold text-gray-800 mb-2">Activity Logs</h1>
                    <p class="text-gray-600">View all system activities and user actions</p>
                </div>

                <!-- Filters and Search -->
                <div class="flex flex-col md:flex-row gap-4 mb-6 items-center">
                    <!-- Search Bar -->
                    <div class="w-full md:w-96">
                        <input
                            v-model="searchQuery"
                            type="text"
                            placeholder="Search by user, action, or date..."
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-700 text-gray-800 placeholder-gray-400 bg-white"
                        />
                    </div>

                    <!-- Spacer to push filters to the right -->
                    <div class="flex-1"></div>

                    <!-- Role Filter -->
                    <div class="flex gap-2">
                        <button
                            @click="setFilter('All')"
                            :class="selectedFilter === 'All' ? 'bg-red-700 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300'"
                            class="px-4 py-2 rounded-lg font-semibold transition"
                        >
                            All
                        </button>
                        <button
                            @click="setFilter('Student')"
                            :class="selectedFilter === 'Student' ? 'bg-red-700 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300'"
                            class="px-4 py-2 rounded-lg font-semibold transition"
                        >
                            Student
                        </button>
                        <button
                            @click="setFilter('Frontliner')"
                            :class="selectedFilter === 'Frontliner' ? 'bg-red-700 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300'"
                            class="px-4 py-2 rounded-lg font-semibold transition"
                        >
                            Frontliner
                        </button>
                    </div>
                </div>

                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                        <tr class="bg-gray-100 border-b border-gray-200">
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Date/Time</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">User</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Action</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Role</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr
                            v-for="log in paginatedLogs"
                            :key="log.id"
                            class="border-b border-gray-200 hover:bg-gray-50 transition"
                        >
                            <td class="px-6 py-4 text-sm text-gray-800">{{ log.datetime }}</td>
                            <td class="px-6 py-4 text-sm text-gray-800">{{ log.user }}</td>
                            <td class="px-6 py-4 text-sm text-gray-800">{{ log.action }}</td>
                            <td class="px-6 py-4">
                                    <span
                                        :class="log.role === 'Student' ? 'bg-blue-100 text-blue-700' : 'bg-green-100 text-green-700'"
                                        class="px-3 py-1 rounded-full text-xs font-semibold"
                                    >
                                        {{ log.role }}
                                    </span>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    <!-- No Results -->
                    <div v-if="paginatedLogs.length === 0" class="text-center py-12">
                        <p class="text-gray-500 text-lg">No logs found</p>
                    </div>
                </div>

                <!-- Pagination Footer -->
                <div class="mt-6 flex items-center justify-between">
                    <!-- Results Count -->
                    <div class="text-sm text-gray-600">
                        Showing {{ ((currentPage - 1) * itemsPerPage) + 1 }} to {{ Math.min(currentPage * itemsPerPage, filteredLogs.length) }} of {{ filteredLogs.length }} logs
                    </div>

                    <!-- Pagination Controls -->
                    <div class="flex items-center gap-2" v-if="totalPages > 1">
                        <!-- Previous Button -->
                        <button
                            @click="goToPage(currentPage - 1)"
                            :disabled="currentPage === 1"
                            :class="currentPage === 1 ? 'bg-gray-200 text-gray-400 cursor-not-allowed' : 'bg-white text-gray-700 hover:bg-gray-100'"
                            class="px-4 py-2 border border-gray-300 rounded text-sm font-medium transition"
                        >
                            Previous
                        </button>

                        <!-- Page Numbers -->
                        <button
                            v-for="page in visiblePages"
                            :key="page"
                            @click="goToPage(page)"
                            :class="page === currentPage ? 'bg-red-700 text-white border-red-700' : 'bg-white text-gray-700 hover:bg-gray-100'"
                            class="px-4 py-2 border border-gray-300 rounded text-sm font-medium transition"
                        >
                            {{ page }}
                        </button>

                        <!-- Next Button -->
                        <button
                            @click="goToPage(currentPage + 1)"
                            :disabled="currentPage === totalPages"
                            :class="currentPage === totalPages ? 'bg-gray-200 text-gray-400 cursor-not-allowed' : 'bg-white text-gray-700 hover:bg-gray-100'"
                            class="px-4 py-2 border border-gray-300 rounded text-sm font-medium transition"
                        >
                            Next
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
</style>
