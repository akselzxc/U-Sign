<script setup lang="ts">
import AppLayout from "@/layouts/AppLayout.vue";
import { Link } from "@inertiajs/vue3";
import Login from "@/pages/auth/Login.vue";

// defineOptions({
//     layout: AppLayout,
// });
</script>

<template>
    <section class="min-h-screen flex items-center justify-center bg-white">
        <div class="flex lg:flex-col gap-6 lg:text-center items-center">
            <h1 class="
                        text-center
                        font-bold
                        text-red-700
                        text-2xl
                        sm:text-6xl
                        md:text-7xl
                        lg:text-6xl
                        lg:text-left
                      ">
                Who's using U'Sign?
            </h1>

            <p class="text-red-700">
                You may choose what type of user you are.
            </p>

            <Link
                href="/studentInput"
                class="
                    rounded-lg
                    border
                    border-red-700
                    bg-white
                    w-50
                    px-5
                    py-2
                    text-sm
                    font-semibold
                    text-red-700
                    hover:bg-red-700
                    hover:text-white
                    transition-colors
                    duration-300
                  ">
                Student
            </Link>

            <Link
                href="/guestInput"
                class="
                    rounded-lg
                    border
                    border-red-700
                    bg-red-700
                    w-50
                    px-5
                    py-2
                    text-sm
                    font-semibold
                    text-white
                    hover:bg-red-800
                    hover:text-white
                    transition-colors
                    duration-300
                  ">
                Guest
            </Link>
        </div>
    </section>
<!--    <section class="flex items-center justify-center bg-white px-6 -mt-15">-->
<!--        <div class="flex w-full max-w-6xl flex-col items-center lg:flex-row lg:items-center lg:justify-start lg:gap-60">-->
<!--            &lt;!&ndash; Avatar &ndash;&gt;-->
<!--            <img src="/Images/Avatar.png" alt="Avatar" class="-->
<!--                        w-60-->
<!--                        sm:w-72-->
<!--                        md:w-80-->
<!--                        lg:w-[500px]-->
<!--                        h-auto-->
<!--                      " />-->

<!--            <h1 class="-->
<!--                        text-center-->
<!--                        font-medium-->
<!--                        text-red-700-->
<!--                        text-5xl-->
<!--                        sm:text-6xl-->
<!--                        md:text-7xl-->
<!--                        lg:text-8xl-->
<!--                        lg:text-left-->
<!--                      ">-->
<!--                Hi, I am <br />-->
<!--                U’Sign!-->
<!--            </h1>-->
<!--        </div>-->
<!--    </section>-->
</template>

<style scoped>

</style>
