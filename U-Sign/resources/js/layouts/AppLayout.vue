<script setup lang="ts">
import Navbar from "@/components/U-Sign Components/Navbar.vue";
import Footer from "@/components/U-Sign Components/Footer.vue";
import { usePage } from '@inertiajs/vue3';

const page = usePage();
</script>

<template>
    <nav class="sticky top-0 z-50 w-full border-b border-gray-200 bg-white">
        <Navbar :currentRoute="page.url" />
    </nav>

    <main class="">
        <slot />
    </main>

    <Footer />
</template>