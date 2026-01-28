<script setup>
import Fr_sidebar from '@/components/U-Sign Components/Fr_sidebar.vue';
import { usePage, Head } from '@inertiajs/vue3';
import { ref, computed } from 'vue';

const { auth } = usePage().props;
const user = auth.user;

// Mock Data for Logs (Replace this with props from your Laravel controller)
const logs = ref([
    { id: 1, user: 'John Doe', role: 'Student', action: 'Log in', description: 'User logged in successfully', status: 'success', created_at: '2023-10-27 08:30:00' },
    { id: 2, user: 'Jane Smith', role: 'Frontliner', action: 'Log in', description: 'User logged in successfully', status: 'success', created_at: '2023-10-27 09:15:00' },
    { id: 3, user: 'Mike Johnson', role: 'Admin', action: 'Log out', description: 'User logged out', status: 'success', created_at: '2023-10-27 10:00:00' },
    { id: 4, user: 'Sarah Williams', role: 'Student', action: 'Log in', description: 'Failed login attempt', status: 'error', created_at: '2023-10-27 10:45:00' },
    { id: 5, user: 'John Doe', role: 'Student', action: 'Log out', description: 'User logged out', status: 'success', created_at: '2023-10-27 11:30:00' },
    { id: 6, user: 'Alice Brown', role: 'Frontliner', action: 'Log in', description: 'User logged in successfully', status: 'success', created_at: '2023-10-27 12:00:00' },
    { id: 7, user: 'Bob White', role: 'Student', action: 'Log out', description: 'User logged out', status: 'success', created_at: '2023-10-27 12:30:00' },
]);

const search = ref('');
const filterRole = ref('');

const filteredLogs = computed(() => {
    return logs.value.filter(log => {
        const matchesSearch = log.user.toLowerCase().includes(search.value.toLowerCase()) ||
                              log.action.toLowerCase().includes(search.value.toLowerCase()) ||
                              log.description.toLowerCase().includes(search.value.toLowerCase());
        const matchesRole = filterRole.value ? log.role === filterRole.value : true;
        return matchesSearch && matchesRole;
    });
});

const currentPage = ref(1);
const itemsPerPage = 5;

const totalPages = computed(() => Math.ceil(filteredLogs.value.length / itemsPerPage));

const paginatedLogs = computed(() => {
    const start = (currentPage.value - 1) * itemsPerPage;
    const end = start + itemsPerPage;
    return filteredLogs.value.slice(start, end);
});

const nextPage = () => {
    if (currentPage.value < totalPages.value) currentPage.value++;
};

const prevPage = () => {
    if (currentPage.value > 1) currentPage.value--;
};

const getStatusColor = (status) => {
    switch (status) {
        case 'success': return 'bg-green-100 text-green-800 border-green-200';
        case 'warning': return 'bg-yellow-100 text-yellow-800 border-yellow-200';
        case 'error': return 'bg-red-100 text-red-800 border-red-200';
        default: return 'bg-gray-100 text-gray-800 border-gray-200';
    }
};
</script>

<template>
    <Head title="Activity Logs" />
    <div class="min-h-screen bg-gray-50">
        <!-- Sidebar -->
        <Fr_sidebar :user="user" />

        <!-- Main Content -->
        <main class="ml-64 p-8">
            <header class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div>
                    <h1 class="text-3xl font-bold text-gray-800">Activity Logs</h1>
                    <p class="text-gray-500 mt-1">Monitor system activities and user actions.</p>
                </div>
                <!-- Actions -->
                <div class="flex gap-3">
                    <button class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 font-medium transition shadow-sm flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" /></svg>
                        Export CSV
                    </button>
                </div>
            </header>

            <!-- Filters -->
            <div class="bg-white rounded-xl shadow-sm p-4 mb-6 border border-gray-100">
                <div class="flex flex-col md:flex-row gap-4">
                    <div class="flex-1 relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </span>
                        <input
                            v-model="search"
                            type="text"
                            placeholder="Search by user, action, or description..."
                            class="w-full pl-10 pr-4 py-2 border border-gray-300 text-gray-700 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition outline-none"
                        />
                    </div>
                    <div class="w-full md:w-48">
                        <select v-model="filterRole" class="w-full px-4 py-2 border border-gray-300 text-gray-700 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition bg-white outline-none">
                            <option value="">All Roles</option>
                            <option value="Student">Student</option>
                            <option value="Frontliner">Frontliner</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Logs Table -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50 border-b border-gray-200 text-xs uppercase text-gray-500 font-semibold tracking-wider">
                                <th class="px-6 py-4">Timestamp</th>
                                <th class="px-6 py-4">User</th>
                                <th class="px-6 py-4">Role</th>
                                <th class="px-6 py-4">Action</th>
                                <th class="px-6 py-4">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <tr v-for="log in paginatedLogs" :key="log.id" class="hover:bg-gray-50 transition duration-150">
                                <td class="px-6 py-4 text-sm text-gray-600 whitespace-nowrap">{{ log.created_at }}</td>
                                <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ log.user }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">
                                    <span class="px-2 py-1 bg-gray-100 rounded text-xs font-medium text-gray-600 border border-gray-200">{{ log.role }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900 font-medium">{{ log.action }}</div>
                                    <div class="text-xs text-gray-500">{{ log.description }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <span :class="['px-3 py-1 rounded-full text-xs font-medium border', getStatusColor(log.status)]">
                                        {{ log.status.toUpperCase() }}
                                    </span>
                                </td>
                            </tr>
                            <tr v-if="filteredLogs.length === 0">
                                <td colspan="5" class="px-6 py-10 text-center text-gray-500">No logs found matching your criteria.</td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- Pagination -->
                    <div v-if="filteredLogs.length > 0" class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6">
                        <div class="flex flex-1 justify-between sm:hidden">
                            <button @click="prevPage" :disabled="currentPage === 1" class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 disabled:opacity-50">Previous</button>
                            <button @click="nextPage" :disabled="currentPage === totalPages" class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 disabled:opacity-50">Next</button>
                        </div>
                        <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
                            <div>
                                <p class="text-sm text-gray-700">
                                    Showing
                                    <span class="font-medium">{{ (currentPage - 1) * itemsPerPage + 1 }}</span>
                                    to
                                    <span class="font-medium">{{ Math.min(currentPage * itemsPerPage, filteredLogs.length) }}</span>
                                    of
                                    <span class="font-medium">{{ filteredLogs.length }}</span>
                                    results
                                </p>
                            </div>
                            <div>
                                <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
                                    <button @click="prevPage" :disabled="currentPage === 1" class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0 disabled:opacity-50">
                                        <span class="sr-only">Previous</span>
                                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                    <button @click="nextPage" :disabled="currentPage === totalPages" class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0 disabled:opacity-50">
                                        <span class="sr-only">Next</span>
                                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</template>