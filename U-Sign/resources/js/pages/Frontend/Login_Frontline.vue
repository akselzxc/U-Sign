<!-- Login_Frontline.vue -->
<script>
import { router } from "@inertiajs/vue3";

export default {
    name: 'UsignLogin',
    data() {
        return {
            form: {
                email: '',
                password: ''
            },
            isLoading: false,
            errorMessage: '',
            showLogin: false,
            countdown: 1,
            showPassword: false
        }
    },
    mounted() {
        const interval = setInterval(() => {
            this.countdown--;
            if (this.countdown <= 0) {
                this.showLogin = true;
                clearInterval(interval);
            }
        }, 500);
    },
    methods: {
        togglePasswordVisibility() {
            this.showPassword = !this.showPassword;
        },
        
        handleLogin() {
            this.errorMessage = '';

            if (!this.form.email || !this.form.password) {
                this.errorMessage = 'Please fill in all fields';
                return;
            }

            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(this.form.email)) {
                this.errorMessage = 'Please enter a valid email address';
                return;
            }
            
            this.isLoading = true;

            router.post('/login', this.form, {
                preserveState: true,
                preserveScroll: true,
                onSuccess: () => {
                    // Success - redirect handled by controller
                },
                onError: (errors) => {
                    this.errorMessage = errors.email || errors.password || 'Invalid email or password';
                },
                onFinish: () => {
                    this.isLoading = false;
                }
            });
        }
    }
}
</script>

<template>
    <div class="min-h-screen bg-gray-100 flex items-center justify-center">
        <!-- Fullscreen Red Panel with Countdown Animation -->
        <div
            :class="[
                'fixed inset-0 bg-gradient-to-br from-[#FF0202] via-[#CA0202] to-[#990101] flex items-center justify-center transition-all duration-300 ease-in-out z-50',
                showLogin ? 'translate-x-0 w-1/2' : 'translate-x-0 w-full'
            ]"
        >
            <div class="text-white text-center px-8 flex flex-col justify-center h-full -mt-25">
                <!-- 3D Avatar Character - Centered and Larger -->
                <div class="flex justify-center -mt-12">
                    <div class="w-100 h-100 flex items-center justify-center">
                        <img src="/Images/Avatar.png"
                             alt="Sign Language Avatar"
                             class="w-full h-full object-contain"
                             onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';" />
                        <!-- Fallback if image doesn't exist -->
                        <div class="hidden w-full h-full items-center justify-center">
                            <div class="text-7xl">🧏‍♀️</div>
                        </div>
                    </div>
                </div>

                <h1 class="text-6xl font-bold tracking-wider mb-8" style="font-family: 'Michroma', sans-serif;">U'SIGN</h1>

                <p class="text-xl leading-relaxed max-w-2xl mx-auto px-4" style="font-family: 'Michroma', sans-serif;">
                    "Bridging the communication gap between frontliners and the deaf community through innovative 3D sign language technology"
                </p>

                <!-- Countdown (only show when fullscreen) -->
<!--                <div v-if="!showLogin" class="mt-16">-->
<!--                    <div class="text-9xl font-bold animate-pulse">-->
<!--                        {{ countdown }}-->
<!--                    </div>-->
<!--                </div>-->
            </div>
        </div>

        <!-- Login Form Panel (slides in from right) -->
        <div
            :class="[
                'fixed right-0 top-0 h-full w-1/2 bg-white flex items-center justify-center transition-all duration-300 ease-in-out',
                showLogin ? 'translate-x-0 opacity-100' : 'translate-x-full opacity-0'
            ]"
        >
            <div class="w-full max-w-md px-4 -mt-12">
                <!-- Logo -->
                <div class="text-center -mt-12" >
                    <div class="inline-flex items-center justify-center">
                        <img src="/Images/USignLogo.png"
                             alt="U-Sign Logo"
                             class="h-80 w-auto" />
                    </div>
                </div>
                <form @submit.prevent="handleLogin" class="space-y-4">
                <div class="space-y-4">
                    <!-- Error Message -->
                    <div v-if="errorMessage"
                         class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg -mt-12 mb-15">
                        <p class="text-sm">{{ errorMessage }}</p>
                    </div>

                    <!-- Email Field -->
                    <div>
                        <label for="email" class="block text-red-900 font-semibold mb-2 -mt-12">
                            Email:
                        </label>
                        <input
                            type="email"
                            id="email"
                            v-model="form.email"
                            placeholder="Enter your Email"
                            autocomplete="email"
                            class="w-full px-5 py-3 text-red-900 bg-gray-200 border border-gray-300 rounded-lg placeholder-gray-500
                            focus:outline-none focus:border-red-600 focus:ring-2 focus:ring-red-200 transition"
                            required
                        />
                    </div>

                    <!-- Password Field -->
                    <div>
                        <label for="password" class="block text-red-900 font-semibold mb-2">
                            Password:
                        </label>
                        <div class="relative">
                            <input
                                :type="showPassword ? 'text' : 'password'"
                                id="password"
                                v-model="form.password"
                                placeholder="Enter your password"
                                autocomplete="current-password"
                                class="w-full px-5 py-3 text-red-900 bg-gray-200 border border-gray-300 rounded-lg placeholder-gray-500
                                focus:outline-none focus:border-red-600 focus:ring-2 focus:ring-red-200 transition pr-12"
                                required
                            />
                            <button
                                type="button"
                                @click="togglePasswordVisibility"
                                class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-600 hover:text-red-600 transition"
                            >
                                <!-- Eye Icon (Show) -->
                                <svg v-if="!showPassword" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                <!-- Eye Slash Icon (Hide) -->
                                <svg v-else xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                </svg>
                            </button>
                        </div>
                        <!-- Password Options -->
                        <div class="mt-3 flex justify-between items-start gap-2 text-sm">
                            <p class="text-gray-600 flex-1">
                                If you want to execute American Sign Language,
                                <a href="/home" class="text-red-600 font-semibold hover:underline">
                                    Click here.
                                </a>
                            </p>
                            <a href="#forgot" class="text-gray-600 hover:text-red-600 transition whitespace-nowrap">
                                Forgot password?
                            </a>
                        </div>
                    </div>

                    <!-- Login Button -->
                    <button
                        type="submit"
                        :disabled="isLoading"
                        class="w-55 mx-auto block bg-gradient-to-r from-[#FF0202] to-[#990101] text-white py-3  rounded-lg font-bold text-lg
                        hover:bg-red-700 transition mt-8 disabled:opacity-50 disabled:cursor-not-allowed"
                    >
                        <span v-if="!isLoading">LOGIN</span>
                        <span v-else class="flex items-center justify-center">
                            <svg class="animate-spin h-5 w-5 mr-3" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" fill="none"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Logging in...
                        </span>
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>
</template>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Michroma&display=swap');

/* Apply Michroma font globally to the component */
* {
    font-family: 'Michroma', sans-serif;
}
</style>