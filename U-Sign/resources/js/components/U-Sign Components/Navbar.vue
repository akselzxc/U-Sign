<script setup lang="ts">

import {Link} from "@inertiajs/vue3";
import { computed } from 'vue';

const props = defineProps<{
  currentRoute?: string;
}>();

const isActive = (route: string) => {
  return props.currentRoute === route;
};
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
            <Link 
                href="/home" 
                class="text-sm font-medium transition-colors duration-300 relative"
                :class="isActive('/home') ? 'text-gray-900' : 'text-gray-600 hover:text-gray-900'"
            >
                Home
                <span 
                    v-if="isActive('/home')"
                    class="absolute -bottom-1 left-0 w-full h-0.5 bg-red-700"
                ></span>
            </Link>

            <Link 
                href="/tutorial" 
                class="text-sm font-medium transition-colors duration-300 relative"
                :class="isActive('/tutorial') ? 'text-gray-900' : 'text-gray-600 hover:text-gray-900'"
            >
                Tutorial
                <span 
                    v-if="isActive('/tutorial')"
                    class="absolute -bottom-1 left-0 w-full h-0.5 bg-red-700"
                ></span>
            </Link>

            <Link 
                href="/faqs" 
                class="text-sm font-medium transition-colors duration-300 relative"
                :class="isActive('/faqs') ? 'text-gray-900' : 'text-gray-600 hover:text-gray-900'"
            >
                FAQs
                <span 
                    v-if="isActive('/faqs')"
                    class="absolute -bottom-1 left-0 w-full h-0.5 bg-red-700"
                ></span>
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