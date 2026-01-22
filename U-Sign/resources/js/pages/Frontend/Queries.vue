<script setup lang="ts">
import AppLayout from "@/layouts/AppLayout.vue";
import { Link } from "@inertiajs/vue3";
import Login from "@/pages/auth/Login.vue";

// defineOptions({
//     layout: AppLayout,
// });
</script>

<template>
    <div class="min-h-screen flex justify-center items-center bg-white text-red-700 text-xl">
        <div class="flex flex-col items-center">
            <div class=" text-left px-6">
                <h1 class="text-3xl font-bold mb-4">Hi, User!</h1>

                <p class="italic mb-2">List of Queries:</p>

                <ul class="list-disc pl-6 space-y-1 ml-7">
                    <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                    <li>Phasellus scelerisque ex at nulla viverra, interdum maximus lectus.</li>
                    <li>Pellentesque quis nisi vel tellus porttitor pretium sit amet eu leo.</li>
                    <li>Integer sed eros in nibh tempus egestas.</li>
                    <li>Duis mattis metus in elit lacinia, interdum pellentesque tellus convallis.</li>
                    <li>Cras commodo nisi ut purus sollicitudin, eget congue augue tincidunt.</li>
                    <li>Ut euismod tortor at nulla placerat facilisis.</li>
                    <li>Vivamus maximus dolor in ultrices laoreet.</li>
                    <li>Sed non arcu sit amet turpis blandit interdum pulvinar in ipsum.</li>
                    <li>Nullam ac tortor nec lorem convallis tempor id vel mi.</li>
                </ul>
            </div>

            <Link
                href="/deafUI"
                class="
                    mt-8
                    w-fit
                    px-10
                    py-2
                    rounded-lg
                    bg-red-700
                    text-white
                    font-semibold
                    hover:bg-red-800
                    transition-colors
                "
            >
                CONTINUE
            </Link>

        </div>

    </div>


</template>

<style scoped>

</style>
