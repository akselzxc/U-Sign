<script setup lang="ts">
import AppLayout from "@/layouts/AppLayout.vue";
import { Link } from "@inertiajs/vue3";
import Login from "@/pages/auth/Login.vue";
import {Button} from "@/components/ui/button";


</script>

<template>
    <div class="min-h-screen flex items-center justify-center bg-white ">
        <div class="relative w-full max-w-md mt-25">

            <!-- Avatar (floating) -->
            <div class="absolute -top-55 left-1/2 -translate-x-1/2">
                <img
                    src="/Images/Avatar.png"
                    alt="Avatar"
                    class="w-40 h-auto"
                />
            </div>

            <!-- Card -->
            <div class="bg-[#4a4a4a] rounded-2xl px-10 pt-10 pb-10 text-center shadow-lg">

                <!-- Label -->
                <h2 class="text-white text-lg font-semibold mb-4">
                    Name
                </h2>

                <!-- Input -->
                <input
                    type="text"
                    placeholder="Enter your name"
                    class="w-full text-center rounded-lg bg-gray-300 text-gray-700 py-3 mb-6 focus:outline-none"
                />

                <!-- Button -->
                <Link
                    href="/queries"
                    class="
                    px-10
                    rounded-lg
                    bg-red-700
                    py-2
                    text-white
                    font-semibold
                    hover:bg-red-800
                    transition-colors
                "
                >
                    LOGIN
                </Link>

            </div>
        </div>
    </div>

</template>

<style scoped>

</style>
