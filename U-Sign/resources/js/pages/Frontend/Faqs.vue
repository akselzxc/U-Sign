<script setup lang="ts">
import AppLayout from "@/layouts/AppLayout.vue";
import { Link } from "@inertiajs/vue3";
import { ref } from 'vue'

const openIndex = ref<number | null>(null)

const toggle = (index: number) => {
    openIndex.value = openIndex.value === index ? null : index
}


defineOptions({
    layout: AppLayout,
});
</script>

<template>
    <section class="flex items-center justify-center bg-white px-6 -mt-15">
        <div class="flex w-full max-w-6xl flex-col items-center lg:flex-row lg:items-center lg:justify-start lg:gap-35">
            <!-- Avatar -->
            <div class="flex lg:flex-col gap-6">
                <h1 class="
                        text-center
                        font-bold
                        text-red-700
                        text-2xl
                        sm:text-6xl
                        md:text-7xl
                        lg:text-8xl
                        lg:text-left
                      ">
                    Frequently <br/>
                    Asked <br/>
                    Questions <br/>
                </h1>

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

    <section class="flex justify-center bg-red-700 py-30">
        <div class="flex lg:flex-col gap-6 lg:text-center items-center">
            <h1 class="
                        text-center
                        font-bold
                        text-white
                        text-2xl
                        sm:text-6xl
                        md:text-7xl
                        lg:text-6xl
                        lg:text-left
                      ">
                Frequently Asked Questions (FAQs)
            </h1>

            <p class="text-white mb-5">
                These are the questions commonly asked here at Registar's Office
            </p>

            <div class="mx-auto bg-white rounded-xl overflow-hidden">

                <!-- HEADER -->
                <button
                    @click="toggle(0)"
                    class="w-full flex items-center justify-between px-16 py-5 text-left"
                >
                    <div class="flex lg:flex-row space-between items-center gap-100">
                        <h2 class="text-xl font-semibold text-red-700">
                            1. What is U'Sign?
                        </h2>

                        <!-- Arrow -->
                        <svg
                            class="w-6 h-6 text-red-700 transition-transform duration-300"
                            :class="{ 'rotate-180': openIndex === 0 }"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            viewBox="0 0 24 24"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>

                </button>

                <!-- CONTENT -->
                <div
                    v-show="openIndex === 0"
                    class="px-6 pb-6 transition-all duration-300"
                >
                    <div class="flex justify-center">
                        <div class="bg-red-700 rounded-lg w-full max-w-md aspect-video flex items-center justify-center">
                            <!-- Play icon -->
                            <div class="bg-white p-4 rounded-lg">
                                ▶
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="mx-auto bg-white rounded-xl overflow-hidden">

                <!-- HEADER -->
                <button
                    @click="toggle(1)"
                    class="w-full flex items-center justify-between px-16 py-5 text-left"
                >
                    <div class="flex lg:flex-row space-between items-center gap-100">
                        <h2 class="text-xl font-semibold text-red-700">
                            1. What is U'Sign?
                        </h2>

                        <!-- Arrow -->
                        <svg
                            class="w-6 h-6 text-red-700 transition-transform duration-300"
                            :class="{ 'rotate-180': openIndex === 1 }"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            viewBox="0 0 24 24"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>

                </button>

                <!-- CONTENT -->
                <div
                    v-show="openIndex === 1"
                    class="px-6 pb-6 transition-all duration-300"
                >
                    <div class="flex justify-center">
                        <div class="bg-red-700 rounded-lg w-full max-w-md aspect-video flex items-center justify-center">
                            <!-- Play icon -->
                            <div class="bg-white p-4 rounded-lg">
                                ▶
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="mx-auto bg-white rounded-xl overflow-hidden">

                <!-- HEADER -->
                <button
                    @click="toggle(2)"
                    class="w-full flex items-center justify-between px-16 py-5 text-left"
                >
                    <div class="flex lg:flex-row space-between items-center gap-100">
                        <h2 class="text-xl font-semibold text-red-700">
                            1. What is U'Sign?
                        </h2>

                        <!-- Arrow -->
                        <svg
                            class="w-6 h-6 text-red-700 transition-transform duration-300"
                            :class="{ 'rotate-180': openIndex === 2 }"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            viewBox="0 0 24 24"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>

                </button>

                <!-- CONTENT -->
                <div
                    v-show="openIndex === 2"
                    class="px-6 pb-6 transition-all duration-300"
                >
                    <div class="flex justify-center">
                        <div class="bg-red-700 rounded-lg w-full max-w-md aspect-video flex items-center justify-center">
                            <!-- Play icon -->
                            <div class="bg-white p-4 rounded-lg">
                                ▶
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <section class="flex items-center justify-center bg-white py-30">
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
                Are you interested?
            </h1>

            <p class="text-red-700">
                Here you can find more information about me!
            </p>

            <Link
                href="/tutorial"
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
                Tutorial
            </Link>

            <Link
                href="/user"
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
                Get Started
            </Link>
        </div>
    </section>

</template>
