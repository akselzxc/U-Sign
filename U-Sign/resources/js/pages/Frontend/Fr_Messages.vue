<script setup lang="ts">
import AppLayout from "@/layouts/AppLayout.vue";
import { Link, usePage } from "@inertiajs/vue3";
import Login from "@/pages/auth/Login.vue";
import { ref } from 'vue';

import Fr_sidebar from '@/components/U-Sign Components/Fr_sidebar.vue';

const { auth } = usePage().props;
const user = auth.user;

// Control sidebar visibility
const showSidebar = ref(true);

const toggleSidebar = () => {
    showSidebar.value = !showSidebar.value;
};
</script>

<template>
    <div class="min-h-screen bg-gray-100 flex">
        <!-- Sidebar -->
        <Fr_sidebar :user="user" />

        <!-- Main Content -->
        <div class="flex-1 p-6 ml-64">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 h-full">
                <!-- LEFT -->
                <div class="flex flex-col gap-6">
                    <!-- Zoeey -->
                    <div class="bg-[#EDEDED] border-1 rounded-xl p-4 flex-1">
                        <p class="text-red-700 font-semibold mb-2 lg:text-xl">Zoeey</p>

                        <div class="relative flex flex-col items-center h-full justify-center -mt-20 ">
                            <!-- Avatar -->
                            <img
                                src="Images/Avatar.png"
                                class="h-75 z-0"
                            />

                            <!-- Subtitle (on top of image) -->
                            <div
                                class="absolute bottom-4 bg-gray-700/60 text-white px-4 py-2 rounded-lg z-10 -mb-15"
                            >
                                Hi, can i get my COR.
                            </div>
                        </div>
                    </div>

                    <!-- Frontliner -->
                    <div class="bg-[#EDEDED] border-1 rounded-xl p-4 flex-1">
                        <p class="text-red-700 font-semibold mb-2 lg:text-xl">Frontliner</p>

                        <div class="relative flex flex-col items-center h-full justify-center -mt-20 ">
                            <!-- Avatar -->
                            <img
                                src="Images/Avatar.png"
                                class="h-75 z-0"
                            />

                            <!-- Subtitle (on top of image) -->
                            <div
                                class="absolute bottom-4 bg-gray-700/60 text-white px-4 py-2 rounded-lg z-10 -mb-15"
                            >
                                Yes, you can.
                            </div>
                        </div>
                    </div>
                </div>

                <!-- RIGHT -->
                <div class="bg-[#EDEDED] border-1 rounded-xl p-6 flex flex-col">
                    <!-- Title -->
                    <h2 class="text-xl font-semibold text-center mb-4 text-black">
                        Conversation
                    </h2>

                    <!-- Messages Container with scroll -->
                    <div class="flex flex-col gap-3 flex-1 overflow-y-auto mb-4">
                        <!-- User message (left) -->
                        <div class="flex items-start gap-2">
                            <img src="Images/Avatar.png" class="w-8 h-8 rounded-full flex-shrink-0" />
                            <div class="bg-red-700 text-white px-4 py-2 rounded-full max-w-xs">
                                Hi, can i get my COR.
                            </div>
                        </div>

                        <!-- Bot message (right) -->
                        <div class="flex justify-end">
                            <div class="bg-gray-500 text-white px-4 py-2 rounded-full max-w-xs">
                                Yes, you can
                            </div>
                        </div>
                    </div>

                    <!-- Quick Responses - Fixed positioning -->
                    <div class="flex flex-wrap gap-2 justify-center mb-3">
                        <button class="bg-white hover:bg-gray-100 text-gray-700 px-4 py-2 rounded-full text-sm transition shadow-sm">
                            Sure!
                        </button>
                        <button class="bg-white hover:bg-gray-100 text-gray-700 px-4 py-2 rounded-full text-sm transition shadow-sm">
                            Please wait for a while
                        </button>
                        <button class="bg-white hover:bg-gray-100 text-gray-700 px-4 py-2 rounded-full text-sm transition shadow-sm">
                            Okay!
                        </button>
                        <button class="bg-white hover:bg-gray-100 text-gray-700 px-4 py-2 rounded-full text-sm transition shadow-sm">
                            Thank you
                        </button>
                        <button class="bg-white hover:bg-gray-100 text-gray-700 px-4 py-2 rounded-full text-sm transition shadow-sm">
                            I'll check that
                        </button>
                        <button class="bg-white hover:bg-gray-100 text-gray-700 px-4 py-2 rounded-full text-sm transition shadow-sm">
                            Can I get your I'd, please, Thank you
                        </button>
                    </div>

                    <!-- Input Field with Voice Icon -->
                    <div class="flex items-center gap-2 bg-[#D9D9D9] py-2 px-4 rounded-2xl">
                        <input
                            type="text"
                            placeholder="Enter text..."
                            class="flex-1 px-4 py-2 rounded-full outline-none text-black bg-transparent"
                        />
                        <!-- Voice/Mic Button -->
                        <button class="bg-red-700 text-white p-2 rounded-full hover:bg-red-800 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M7 4a3 3 0 016 0v4a3 3 0 11-6 0V4zm4 10.93A7.001 7.001 0 0017 8a1 1 0 10-2 0A5 5 0 015 8a1 1 0 00-2 0 7.001 7.001 0 006 6.93V17H6a1 1 0 100 2h8a1 1 0 100-2h-3v-2.07z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <!-- Send Button -->
                        <img src="Images/Send.png" class="w-8 h-8 cursor-pointer" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
