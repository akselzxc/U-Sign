<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import Navbar from "@/components/U-Sign Components/Navbar.vue";
import Footer from "@/components/U-Sign Components/Footer.vue";
import { dashboard, login, register } from '@/routes';
import {CardFooter} from "@/components/ui/card";
import {Collapsible} from "@/components/ui/collapsible";

withDefaults(
    defineProps<{
        canRegister: boolean;
    }>(),
    {
        canRegister: true,
    },
);
</script>

<template>

    <Head title="Dashboard">
        <link rel="preconnect" href="https://rsms.me/" />
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    </Head>
    <!--    <div-->
    <!--        class="flex min-h-screen flex-col items-center bg-[#FDFDFC] p-6 text-[#1b1b18] lg:justify-center lg:p-8 dark:bg-[#FFFFFF]"-->
    <!--    >-->

    <nav class="sticky top-0 z-50 w-full border-b border-gray-200 bg-white">
        <Navbar />
    </nav>

    <main>
        <slot/>
        <section class="flex items-center justify-center bg-white px-6 -mt-15">
            <div class="flex w-full max-w-6xl flex-col items-center lg:flex-row lg:items-center lg:justify-start lg:gap-60">
                <!-- Avatar -->
                <img src="/Images/Avatar.png" alt="Avatar" class="
                        w-60
                        sm:w-72
                        md:w-80
                        lg:w-[500px]
                        h-auto
                      " />

                <h1 class="
                        text-center
                        font-medium
                        text-red-700
                        text-5xl
                        sm:text-6xl
                        md:text-7xl
                        lg:text-8xl
                        lg:text-left
                      ">
                    Hi, I am <br />
                    U’Sign!
                </h1>
            </div>
        </section>

        <section class="flex items-center justify-center bg-[#960202] px-6">
            <div class="flex w-full max-w-6xl flex-col items-center lg:flex-row lg:items-center lg:justify-start lg:gap-35">
                <!-- Avatar -->
                <div class="flex lg:flex-col gap-6">
                    <h1 class="
                        text-center
                        font-bold
                        text-white
                        text-2xl
                        sm:text-6xl
                        md:text-7xl
                        lg:text-4xl
                        lg:text-left
                      ">
                        U'Sign translate text into sign
                        language and sign language
                        into audio and text
                    </h1>

                    <p class="">
                        I provide fast, cost-effective translation for university frontline services. Use me on websites, service portals, or kiosks to deliver accessible, barrier-free information. I help ensure Deaf students, staff, and visitors receive clear communication, while also supporting inclusive access for hearing users.
                    </p>

                    <Link class="underline">
                        How to use U'Sign ➝
                    </Link>

                </div>

                <img src="/Images/Avatar.png" alt="Avatar" class="
                        w-60
                        sm:w-72
                        md:w-80
                        lg:w-[500px]
                        h-auto
                      " />


            </div>
        </section>

        <section class="flex items-center justify-center bg-white px-6">
            <div class="flex w-full max-w-6xl flex-col items-center lg:flex-row lg:items-center lg:justify-start lg:gap-35">
                <!-- Avatar -->

                <img src="/Images/Avatar.png" alt="Avatar" class="
                        w-60
                        sm:w-72
                        md:w-80
                        lg:w-[500px]
                        h-auto
                      " />

                <div class="flex lg:flex-col gap-6">
                    <h1 class="
                        text-center
                        font-bold
                        text-red-700
                        text-2xl
                        sm:text-6xl
                        md:text-7xl
                        lg:text-4xl
                        lg:text-left
                      ">
                        I translate your world
                    </h1>

                    <p class="text-red-700">
                        I provide fast, cost-effective translation for university frontline services. Use me on websites, service portals, or kiosks to deliver accessible, barrier-free information. I help ensure Deaf students, staff, and visitors receive clear communication, while also supporting inclusive access for hearing users.
                    </p>

                    <Link class="underline text-red-700">
                        How to use U'Sign ➝
                    </Link>

                </div>

            </div>
        </section>
    </main>

    <Footer/>
</template>
