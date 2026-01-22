<script setup lang="ts">

</script>

<template>
    <footer class="bg-[#404040] text-white">
        <div
            class="
              mx-auto
              grid
              max-w-7xl
              grid-cols-1
              gap-10
              px-6
              py-12
              md:grid-cols-3
            "
        >
            <!-- LEFT: Logo + Description -->
            <div class="space-y-4">
                <img src="/Images/USignLogo.png" alt="U'Sign Logo" class="h-20 w-auto" />
                <p class="text-sm leading-relaxed text-gray-200">
                    A Bidirectional Sign Language and Speech Translator for Frontline
                    Services at the University of Southeastern Philippines Tagum Unit
                </p>
            </div>

            <!-- MIDDLE: Contact -->
            <div>
                <h3 class="mb-4 text-lg font-semibold uppercase">Contact</h3>
                <ul class="space-y-2 text-sm text-gray-200">
                    <li>Brgy. Apokon, Tagum City</li>
                    <li>Davao del Norte, Philippines</li>
                    <li>+63 912 234 5678</li>
                    <li>u.sign@gmail.com</li>
                </ul>
            </div>

            <!-- RIGHT: Site Map -->
            <div>
                <h3 class="mb-4 text-lg font-semibold uppercase">Site Map</h3>
                <ul class="space-y-2 text-sm text-gray-200">
                    <li><a href="/home" class="hover:underline">Home</a></li>
                    <li><a href="/tutorial" class="hover:underline">Tutorial</a></li>
                    <li><a href="/faqs" class="hover:underline">Frequently Asked Questions</a></li>
                    <li><a href="/user" class="hover:underline">Get Started</a></li>
                </ul>
            </div>
        </div>
    </footer>


    <div class="flex h-14 items-center justify-center bg-[#373737] text-center text-white">
        © 2026 ANK DEVS
    </div>
</template>

<style scoped>

</style>
