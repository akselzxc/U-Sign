<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import AppLayout from "@/layouts/AppLayout.vue";
import { Link } from "@inertiajs/vue3";

defineOptions({
    layout: AppLayout,
});
</script>

<template>
    <Head title="TUTORIAL" />
    <section class="flex items-center justify-center bg-white px-6 -mt-15">
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
                        font-michroma
                        text-red-700
                        text-2xl
                        sm:text-6xl
                        md:text-7xl
                        lg:text-5xl
                        lg:text-center
                      ">
                    How you can use me
                </h1>

                <p class="text-red-700 lg:text-center font-medium">
                    Your personal assistant for seamless communication at the University of Southeastern Philippines, Tagum Unit. Whether you are a student, staff, or visitor, U’Sign bridges the gap between sign language and spoken language, making frontline services more accessible for everyone.
                </p>

<!--                <Link class="underline text-red-700">-->
<!--                    How to use U'Sign ➝-->
<!--                </Link>-->

            </div>

        </div>
    </section>

<!--    #1-->
    <section class="flex items-center justify-center bg-[#960202] min-h-screen">
        <div class="flex w-full max-w-6xl flex-col items-center lg:flex-row lg:items-center lg:justify-start lg:gap-35">
            <!-- Avatar -->
            <div class="flex lg:flex-col gap-6">
                <h1 class="
                        text-center
                        font-michroma
                        text-white
                        text-2xl
                        sm:text-6xl
                        md:text-7xl
                        lg:text-6xl
                        lg:text-left
                      ">
                    1. Communicate Through Sign Languages
                </h1>

                <p class="">
                    If you are more comfortable using sign language, simply perform your signs in front of the camera. I will recognize your gestures and instantly convert them into text or speech so that the university staff can understand you clearly.
                </p>

<!--                <Link class="underline">-->
<!--                    How to use U'Sign ➝-->
<!--                </Link>-->

            </div>

            <img src="/Images/WhiteVid.png" alt="Avatar" class="
                        w-60
                        sm:w-72
                        md:w-80
                        lg:w-[350px]
                        h-auto
                      " />


        </div>
    </section>

<!--    #2-->
    <section class="flex items-center justify-center bg-white  min-h-screen">
        <div class="flex w-full max-w-6xl flex-col items-center lg:flex-row lg:items-center lg:justify-start lg:gap-35">
            <!-- Avatar -->
            <div class="flex lg:flex-col gap-6">
                <h1 class="
                        text-center
                        font-michroma
                        text-red-700
                        text-2xl
                        sm:text-6xl
                        md:text-7xl
                        lg:text-6xl
                        lg:text-left
                      ">
                    2. Communicate Through Speech
                </h1>

                <p class="text-red-700">
                    You can also speak naturally into the microphone. I will translate your spoken words into sign language animations, allowing Deaf or hard-of-hearing staff and students to understand you without barriers.
                </p>

                <!--                <Link class="underline">-->
                <!--                    How to use U'Sign ➝-->
                <!--                </Link>-->

            </div>

            <img src="/Images/RedVid.png" alt="Avatar" class="
                        w-60
                        sm:w-72
                        md:w-80
                        lg:w-[350px]
                        h-auto
                      " />


        </div>
    </section>

<!--    #3-->
    <section class="flex items-center justify-center bg-[#960202] min-h-screen">
        <div class="flex w-full max-w-6xl flex-col items-center lg:flex-row lg:items-center lg:justify-start lg:gap-35">
            <!-- Avatar -->
            <div class="flex lg:flex-col gap-6">
                <h1 class="
                        text-center
                        font-michroma
                        text-white
                        text-2xl
                        sm:text-6xl
                        md:text-7xl
                        lg:text-6xl
                        lg:text-left
                      ">
                    3. Access Frontline Services Easily
                </h1>

                <p class="">
                    Use me when interacting with USeP Registrar Office

                    I ensure that your requests and questions are understood accurately and efficiently, reducing delays and misunderstandings.
                </p>

            </div>

            <img src="/Images/WhiteVid.png" alt="Avatar" class="
                        w-60
                        sm:w-72
                        md:w-80
                        lg:w-[350px]
                        h-auto
                      " />


        </div>
    </section>

    <!--    #4-->
    <section class="flex items-center justify-center bg-white  min-h-screen">
        <div class="flex w-full max-w-6xl flex-col items-center lg:flex-row lg:items-center lg:justify-start lg:gap-35">
            <!-- Avatar -->
            <div class="flex lg:flex-col gap-6">
                <h1 class="
                        text-center
                        font-michroma
                        text-red-700
                        text-2xl
                        sm:text-6xl
                        md:text-7xl
                        lg:text-6xl
                        lg:text-left
                      ">
                    4. Real-Time, Bidirectional Communication
                </h1>

                <p class="text-red-700">
                    I am designed to provide real-time translations, allowing conversations to flow naturally. Whether you are signing to speak or speaking to sign, I make sure your message is conveyed instantly.
                </p>

            </div>

            <img src="/Images/RedVid.png" alt="Avatar" class="
                        w-60
                        sm:w-72
                        md:w-80
                        lg:w-[350px]
                        h-auto
                      " />

        </div>
    </section>

    <!--    #5-->
    <section class="flex items-center justify-center bg-[#960202] min-h-screen">
        <div class="flex w-full max-w-6xl flex-col items-center lg:flex-row lg:items-center lg:justify-start lg:gap-35">
            <!-- Avatar -->
            <div class="flex lg:flex-col gap-6">
                <h1 class="
                        text-center
                        font-michroma
                        text-white
                        text-2xl
                        sm:text-6xl
                        md:text-7xl
                        lg:text-6xl
                        lg:text-left
                      ">
                    5. User-Friendly and Accessible
                </h1>

                <p class="">
                    No technical expertise is needed! Simply access U’Sign via your device, follow the on-screen prompts, and start communicating effortlessly. I am your companion for a smoother, inclusive, and stress-free experience at the university.
                </p>

            </div>

            <img src="/Images/WhiteVid.png" alt="Avatar" class="
                        w-60
                        sm:w-72
                        md:w-80
                        lg:w-[350px]
                        h-auto
                      " />


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
                href="/faqs"
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
                FAQs
            </Link>

            <Link
                href="/sign-time"
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
