<script setup lang="ts">
import AppLayout from "@/layouts/AppLayout.vue";
import { Link } from "@inertiajs/vue3";
import Login from "@/pages/auth/Login.vue";
import { ref, onMounted } from 'vue';
import Messages from '@/components/Messages.vue';

const camera = ref<HTMLVideoElement | null>(null)

onMounted(async () => {
    const stream = await navigator.mediaDevices.getUserMedia({
        video: true,
        audio: false,
    })

    if (camera.value) {
        camera.value.srcObject = stream
    }
})


// defineOptions({
//     layout: AppLayout,
// });
</script>

<template>
    <div class="min-h-screen bg-gray-100 p-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 h-full">
            <!-- LEFT -->
            <div class="flex flex-col gap-6">
                <!-- Frontliner -->
                <div class="bg-[#EDEDED] rounded-xl p-4">
                    <p class="text-red-700 font-semibold mb-2 lg:text-xl">Frontliner</p>

                    <div class="relative flex flex-col items-center">
                        <!-- Avatar -->
                        <img
                            src="Images/Avatar.png"
                            class="h-55 z-0"
                        />

                        <!-- Subtitle (on top of image) -->
                        <div
                            class="absolute bottom-1 bg-gray-700/60 text-white px-4 py-2 rounded-lg z-10"
                        >
                            Yes, you can.
                        </div>
                    </div>
                </div>


                <!-- Camera -->
                <div class="bg-gray-200 rounded-xl p-4">
                    <div class="relative flex flex-col items-center">
                        <!-- Camera video -->
                        <video
                            ref="camera"
                            autoplay
                            playsinline
                            muted
                            class="w-full h-75 bg-black scale-x-[-1] ring-2 z-0"
                        ></video>

                        <!-- Subtitle on top of video -->
                        <div
                            class="absolute bottom-4 bg-gray-700/60 text-white px-4 py-2 rounded-lg z-10"
                        >
                            Hello, can I get my COR?
                        </div>
                    </div>
                </div>

            </div>

            <!-- RIGHT -->
            <div>

                <Messages />

            </div>

        </div>
    </div>

</template>

<style scoped>

</style>
