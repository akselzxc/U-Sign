<script setup lang="ts">
import { usePage } from "@inertiajs/vue3";
import { computed, nextTick, onBeforeUnmount, onMounted, ref } from 'vue';

import Fr_sidebar from '@/components/U-Sign Components/Fr_sidebar.vue';

const { auth } = usePage().props;
const user = auth.user;

type Sender = 'zoeey' | 'frontliner';
type Message = {
    id: string;
    sender: Sender;
    text: string;
    createdAt: number;
};

const quickReplies = [
    'Sure!',
    'Please wait for a while',
    'Okay!',
    'Thank you',
    "I'll check that",
    "Can I get your ID, please? Thank you.",
];

const messages = ref<Message[]>([]);

const messageInput = ref('');
const messagesEl = ref<HTMLElement | null>(null);

const isRecording = ref(false);
let recordingTimeout: number | undefined;

const scrollToBottom = async () => {
    await nextTick();
    if (messagesEl.value) {
        messagesEl.value.scrollTop = messagesEl.value.scrollHeight;
    }
};

const lastMessageBy = computed(() => {
    const by: Partial<Record<Sender, Message>> = {};
    for (const m of messages.value) by[m.sender] = m;
    return by;
});

const makeId = () => `${Date.now()}-${Math.random().toString(16).slice(2)}`;

const pushMessage = async (sender: Sender, text: string) => {
    messages.value.push({
        id: makeId(),
        sender,
        text,
        createdAt: Date.now(),
    });
    await scrollToBottom();
};

const maybeAutoReply = async (text: string) => {
    const normalized = text.trim().toLowerCase();

    let reply = 'Got it. Please wait a moment while I check.';
    if (normalized.includes('cor')) reply = 'Sure—please provide your student ID so I can verify.';
    if (normalized.includes('thank')) reply = "You're welcome!";
    if (normalized.includes('id')) reply = 'Thanks! One moment—checking your record now.';

    window.setTimeout(() => {
        void pushMessage('zoeey', reply);
    }, 650);
};

const sendMessage = async () => {
    const text = messageInput.value.trim();
    if (!text) return;

    messageInput.value = '';
    await pushMessage('frontliner', text);
    await maybeAutoReply(text);
};

const sendQuickReply = async (text: string) => {
    messageInput.value = '';
    await pushMessage('frontliner', text);
    await maybeAutoReply(text);
};

const toggleRecording = () => {
    if (isRecording.value) {
        isRecording.value = false;
        if (recordingTimeout) window.clearTimeout(recordingTimeout);
        recordingTimeout = undefined;
        return;
    }

    isRecording.value = true;
    // Dummy recording: after a short delay, stop and insert a fake transcript.
    recordingTimeout = window.setTimeout(() => {
        isRecording.value = false;
        messageInput.value = "Can you help me with my COR request?";
    }, 1800);
};

onMounted(() => {
    void scrollToBottom();
});

onBeforeUnmount(() => {
    if (recordingTimeout) window.clearTimeout(recordingTimeout);
});
</script>

<template>
    <div class="min-h-screen bg-gradient-to-b from-gray-50 to-gray-100 flex">
        <!-- Sidebar -->
        <Fr_sidebar :user="user" />

        <!-- Main Content -->
        <div class="flex-1 p-6 md:p-8 ml-64 h-screen overflow-hidden">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-8 h-full min-h-0">
                <!-- LEFT -->
                <div class="flex flex-col gap-6">
                    <!-- Zoeey -->
                    <div class="bg-white/80 backdrop-blur border border-gray-200 rounded-2xl p-5 shadow-sm flex-1 overflow-hidden">
                        <div class="flex items-center justify-between mb-3">
                            <p class="text-red-700 font-bold lg:text-xl">Zoeey</p>
                            <span class="text-[11px] px-2 py-1 rounded-full bg-red-50 text-red-700 border border-red-100">Deaf User</span>
                        </div>

                        <div class="relative flex flex-col items-center h-full justify-center -mt-20">
                            <!-- Avatar -->
                            <img
                                src="Images/Avatar.png"
                                class="h-75 z-0 drop-shadow-md"
                            />

                            <!-- Subtitle (on top of image) -->
                            <div
                                class="absolute bottom-4 z-10 -mb-15 max-w-[90%] text-center"
                            >
                                <div class="inline-flex items-center gap-2 bg-gray-900/70 text-white px-4 py-2 rounded-2xl shadow-sm">
                                    <span class="h-2 w-2 rounded-full bg-red-300" />
                                    <span class="text-sm">{{ lastMessageBy.zoeey?.text ?? '...' }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Frontliner -->
                    <div class="bg-white/80 backdrop-blur border border-gray-200 rounded-2xl p-5 shadow-sm flex-1 overflow-hidden">
                        <div class="flex items-center justify-between mb-3">
                            <p class="text-red-700 font-bold lg:text-xl">Frontliner</p>
                            <span class="text-[11px] px-2 py-1 rounded-full bg-gray-50 text-gray-700 border border-gray-200">You</span>
                        </div>

                        <div class="relative flex flex-col items-center h-full justify-center -mt-20">
                            <!-- Avatar -->
                            <img
                                src="Images/Avatar.png"
                                class="h-75 z-0 drop-shadow-md"
                            />

                            <!-- Subtitle (on top of image) -->
                            <div
                                class="absolute bottom-4 z-10 -mb-15 max-w-[90%] text-center"
                            >
                                <div class="inline-flex items-center gap-2 bg-gray-900/70 text-white px-4 py-2 rounded-2xl shadow-sm">
                                    <span class="h-2 w-2 rounded-full bg-emerald-300" />
                                    <span class="text-sm">{{ lastMessageBy.frontliner?.text ?? '...' }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- RIGHT -->
                <div class="bg-white/85 backdrop-blur border border-gray-200 rounded-2xl shadow-sm flex flex-col min-h-0 overflow-hidden">
                    <!-- Title / Header -->
                    <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
                        <div>
                            <h2 class="text-lg font-bold text-gray-900">Conversation</h2>
                            <p class="text-xs text-gray-500">Quick replies + voice (dummy) supported</p>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="inline-flex items-center gap-1 text-xs px-2 py-1 rounded-full border border-gray-200 bg-gray-50 text-gray-700">
                                <span class="h-2 w-2 rounded-full bg-emerald-500" />
                                Active
                            </span>
                        </div>
                    </div>

                    <!-- Messages Container with scroll -->
                    <div
                        ref="messagesEl"
                        class="chat-scroll flex flex-col gap-3 flex-1 min-h-0 overflow-y-auto px-6 py-4 scroll-smooth"
                    >
                        <div
                            v-if="messages.length === 0"
                            class="flex flex-1 items-center justify-center"
                        >
                            <div class="text-center">
                                <div class="mx-auto mb-3 h-10 w-10 rounded-2xl bg-red-50 border border-red-100 flex items-center justify-center text-red-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M2 5a2 2 0 012-2h12a2 2 0 012 2v7a2 2 0 01-2 2H7l-4 3v-3H4a2 2 0 01-2-2V5z" />
                                    </svg>
                                </div>
                                <p class="text-sm text-gray-700 font-semibold">No messages yet</p>
                                <p class="text-xs text-gray-500 mt-1">Send a message, use a quick reply, or tap the mic.</p>
                            </div>
                        </div>
                        <div
                            v-for="m in messages"
                            :key="m.id"
                            class="w-full"
                        >
                            <!-- Zoeey (left) -->
                            <div v-if="m.sender === 'zoeey'" class="flex items-start gap-2">
                                <img src="/Images/Avatar.png" class="w-8 h-8 rounded-full ring-2 ring-red-100 flex-shrink-0" />
                                <div class="bg-gradient-to-br from-red-700 to-red-800 text-white px-4 py-2 rounded-2xl max-w-[80%] shadow-sm">
                                    {{ m.text }}
                                </div>
                            </div>

                            <!-- Frontliner (right) -->
                            <div v-else class="flex justify-end">
                                <div class="bg-gradient-to-br from-gray-700 to-gray-900 text-white px-4 py-2 rounded-2xl max-w-[80%] shadow-sm">
                                    {{ m.text }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Responses - Fixed positioning -->
                    <div class="px-6 pb-3 flex-none">
                        <div class="flex flex-wrap gap-2 justify-center">
                        <button
                            v-for="reply in quickReplies"
                            :key="reply"
                            type="button"
                            class="bg-white hover:bg-gray-50 active:scale-[0.99] text-gray-700 px-4 py-2 rounded-full text-sm transition shadow-sm border border-gray-200"
                            @click="sendQuickReply(reply)"
                        >
                            {{ reply }}
                        </button>
                        </div>
                    </div>

                    <!-- Input Field with Voice Icon -->
                    <div class="px-6 pb-6 flex-none">
                        <div class="flex items-center gap-2 bg-gray-100 border border-gray-200 py-2 px-4 rounded-2xl">
                        <input
                            type="text"
                            placeholder="Enter text..."
                            class="flex-1 px-3 py-2 rounded-xl outline-none text-gray-900 bg-transparent placeholder:text-gray-500"
                            v-model="messageInput"
                            :disabled="isRecording"
                            @keydown.enter.prevent="sendMessage"
                        />
                        <!-- Small waveform indicator while recording -->
                        <div v-if="isRecording" class="flex items-end gap-1 px-2" aria-hidden="true">
                            <span class="record-bar record-bar-1" />
                            <span class="record-bar record-bar-2" />
                            <span class="record-bar record-bar-3" />
                            <span class="record-bar record-bar-4" />
                        </div>
                        <!-- Voice/Mic Button -->
                        <button
                            type="button"
                            class="relative text-white p-2 rounded-full transition shadow-sm"
                            :class="isRecording ? 'bg-red-900' : 'bg-red-700 hover:bg-red-800'"
                            @click="toggleRecording"
                            :title="isRecording ? 'Recording…' : 'Record (dummy)'"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M7 4a3 3 0 016 0v4a3 3 0 11-6 0V4zm4 10.93A7.001 7.001 0 0017 8a1 1 0 10-2 0A5 5 0 015 8a1 1 0 00-2 0 7.001 7.001 0 006 6.93V17H6a1 1 0 100 2h8a1 1 0 100-2h-3v-2.07z" clip-rule="evenodd" />
                            </svg>
                            <!-- Recording indicator (animated beats) -->
                            <span
                                v-if="isRecording"
                                class="absolute -top-1 -right-1 inline-flex items-center justify-center w-3 h-3"
                                aria-hidden="true"
                            >
                                <span class="absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75 record-ping" />
                                <span class="relative inline-flex rounded-full h-2 w-2 bg-red-200" />
                            </span>
                        </button>
                        <!-- Send Button -->
                        <button
                            type="button"
                            class="w-10 h-10 rounded-full bg-white hover:bg-white transition flex items-center justify-center shadow-sm border border-gray-200"
                            @click="sendMessage"
                            :disabled="isRecording"
                            title="Send"
                        >
                            <img src="/Images/Send.png" class="w-7 h-7" />
                        </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.chat-scroll::-webkit-scrollbar {
    width: 10px;
}
.chat-scroll::-webkit-scrollbar-track {
    background: transparent;
}
.chat-scroll::-webkit-scrollbar-thumb {
    background: rgba(156, 163, 175, 0.35); /* gray-400 */
    border-radius: 9999px;
    border: 3px solid transparent;
    background-clip: padding-box;
}
.chat-scroll::-webkit-scrollbar-thumb:hover {
    background: rgba(107, 114, 128, 0.45); /* gray-500 */
    border: 3px solid transparent;
    background-clip: padding-box;
}

.record-ping {
    animation: recordPing 1.2s cubic-bezier(0, 0, 0.2, 1) infinite;
}

@keyframes recordPing {
    0% {
        transform: scale(0.85);
        opacity: 0.75;
    }
    70% {
        transform: scale(1.8);
        opacity: 0;
    }
    100% {
        transform: scale(1.8);
        opacity: 0;
    }
}

.record-bar {
    width: 4px;
    border-radius: 9999px;
    background: rgb(185 28 28); /* red-700 */
    animation: recordBars 0.9s ease-in-out infinite;
}
.record-bar-1 { animation-delay: 0s; }
.record-bar-2 { animation-delay: 0.12s; }
.record-bar-3 { animation-delay: 0.24s; }
.record-bar-4 { animation-delay: 0.36s; }

@keyframes recordBars {
    0%, 100% { height: 6px; opacity: 0.5; }
    50% { height: 18px; opacity: 1; }
}
</style>
