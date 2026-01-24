<script setup lang="ts">

import {Link} from "@inertiajs/vue3";
</script>

<template>
    <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4">

        <!-- Logo -->
        <div class="flex items-center gap-2">
            <Link href="/login_frontline">
            <img src="/Images/USignLogo.png" alt="U'Sign Logo" class="h-15 w-auto" />
            </Link>
        </div>

        <!-- Menu -->
        <div class="flex items-center gap-8">
            <Link href="/home" class="text-sm font-medium text-gray-600 hover:text-gray-900">
                Home
            </Link>

            <Link href="/tutorial" class="text-sm font-medium text-gray-600 hover:text-gray-900">
                Tutorial
            </Link>

            <Link href="/faqs" class="text-sm font-medium text-gray-600 hover:text-gray-900">
                FAQs
            </Link>

            <Link class="
                              rounded-lg
                              bg-red-700
                              px-5
                              py-2
                              text-sm
                              font-semibold
                              text-white
                              hover:bg-red-800
                              transition-colors duration-300
                            " href="/user">
                Get Started
            </Link>
        </div>
    </div>
</template>

<style scoped>

</style>
