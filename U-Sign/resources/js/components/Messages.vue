<template>
  <div class="messenger-content">
    <!-- Header -->
    <div class="header">
      <h2>Conversation</h2>
    </div>

    <!-- Messages Container -->
    <div class="messages-container" ref="messagesContainer">
      <div v-if="messages.length === 0" class="no-messages">
        No messages yet
      </div>
      <div v-else>
        <div
          v-for="message in messages"
          :key="message.id"
          :class="['message-wrapper', message.sender === 'user' ? 'user-message' : 'bot-message']"
        >
          <div v-if="message.sender === 'bot'" class="avatar">
            👤
          </div>
          <div :class="['message-bubble', message.sender]">
            {{ message.text }}
          </div>
        </div>
      </div>
    </div>

    <!-- Done Button -->
    <div class="done-section">
      <button @click="goToHome" class="done-button">
        Done
      </button>
    </div>

    <!-- Input Area -->
    <div class="input-section">
      <div class="input-wrapper">
        <input
          v-model="inputText"
          @keypress.enter="handleSend"
          type="text"
          placeholder="Enter text..."
          class="text-input"
        />
        <button @click="handleSend" class="send-button">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M8.75 17.612v4.638a.751.751 0 0 0 1.354.444l2.713-3.692zM23.685.139a.75.75 0 0 0-.782-.054l-22.5 11.75a.752.752 0 0 0 .104 1.375l6.255 2.138 13.321-11.39L9.775 16.377l10.483 3.583a.753.753 0 0 0 .984-.599l2.75-18.5a.751.751 0 0 0-.307-.722z" fill="currentColor"/>
            </svg>
        </button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Messages',
  data() {
    return {
      messages: [],
      inputText: ''
    };
  },
  methods: {
    handleSend() {
      if (this.inputText.trim()) {
        // Add user message
        const userMessage = {
          id: Date.now(),
          text: this.inputText,
          sender: 'user',
          timestamp: new Date()
        };
        
        this.messages.push(userMessage);
        this.inputText = '';

        // Scroll to bottom
        this.$nextTick(() => {
          this.scrollToBottom();
        });

        // Simulate bot response after a short delay
        setTimeout(() => {
          const botMessage = {
            id: Date.now() + 1,
            text: 'Yes, you can',
            sender: 'bot',
            timestamp: new Date()
          };
          this.messages.push(botMessage);
          
          this.$nextTick(() => {
            this.scrollToBottom();
          });
        }, 1000);
      }
    },
    scrollToBottom() {
      const container = this.$refs.messagesContainer;
      if (container) {
        container.scrollTop = container.scrollHeight;
      }
    },
    goToHome() {
      window.location.href = '/home';
    }
  }
};
</script>

<style scoped>
.messenger-content {
  display: flex;
  flex-direction: column;
  height: 100%;
  background-color: white;
  border-radius: 0.75rem;
  overflow: hidden;
}

.header {
  background-color: #e5e7eb;
  padding: 0.75rem 1rem;
  text-align: center;
  flex-shrink: 0;
}

.header h2 {
  font-size: 1.125rem;
  font-weight: 600;
  color: #1f2937;
  margin: 0;
}

.messages-container {
  flex: 1;
  overflow-y: auto;
  padding: 1rem;
  background-color: white;
  min-height: 0;
}

.no-messages {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 100%;
  color: #9ca3af;
  font-size: 0.875rem;
}

.message-wrapper {
  display: flex;
  margin-bottom: 0.75rem;
}

.user-message {
  justify-content: flex-end;
}

.bot-message {
  justify-content: flex-start;
}

.avatar {
  width: 2rem;
  height: 2rem;
  border-radius: 50%;
  background-color: #d1d5db;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-right: 0.5rem;
  flex-shrink: 0;
  font-size: 0.75rem;
}

.message-bubble {
  max-width: 18rem;
  padding: 0.5rem 1rem;
  border-radius: 1rem;
}

.message-bubble.user {
  background-color: #dc2626;
  color: white;
  border-bottom-right-radius: 0.25rem;
}

.message-bubble.bot {
  background-color: #d1d5db;
  color: #1f2937;
  border-bottom-left-radius: 0.25rem;
}

.done-section {
  padding: 0.75rem 1rem;
  display: flex;
  justify-content: center;
  border-top: 1px solid #e5e7eb;
  flex-shrink: 0;
}

.done-button {
  background-color: #dc2626;
  color: white;
  padding: 0.5rem 2rem;
  border-radius: 0.375rem;
  border: none;
  font-weight: 500;
  cursor: pointer;
  transition: transform 0.2s ease, color 0.2s ease;
}

.done-button:hover {
  transform: scale(1.1);
}

.input-section {
  border-top: 1px solid #e5e7eb;
  padding: 0.75rem 1rem;
  background-color: #f9fafb;
  flex-shrink: 0;
}

.input-wrapper {
  display: flex;
  align-items: center;
  gap: 0.5rem;
}

.text-input {
  flex: 1;
  padding: 0.5rem 1rem;
  border: 1px solid #d1d5db;
  border-radius: 9999px;
  background-color: #f3f4f6;
  font-size: 0.875rem;
  outline: none;
}

.text-input:focus {
  ring: 2px;
  ring-color: #dc2626;
}

.send-button {
  width: 2.5rem;
  height: 2.5rem;
  background-color: #dc2626;
  color: white;
  border-radius: 50%;
  border: none;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  flex-shrink: 0;
  transition: transform 0.2s ease, color 0.2s ease;
}

.send-button:hover {
  transform: scale(1.1);
}

.send-icon {
  width: 1.25rem;
  height: 1.25rem;
}
</style>