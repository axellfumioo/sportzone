  <style>
      @keyframes bounce {

          0%,
          20%,
          53%,
          80%,
          100% {
              transform: translateY(0);
          }

          40%,
          43% {
              transform: translateY(-8px);
          }
      }

      .typing-indicator {
          animation: bounce 1.4s infinite ease-in-out;
      }

      .typing-indicator:nth-child(1) {
          animation-delay: -0.32s;
      }

      .typing-indicator:nth-child(2) {
          animation-delay: -0.16s;
      }

      @keyframes pulse-ring {
          0% {
              transform: scale(0.33);
          }

          80%,
          100% {
              opacity: 0;
          }
      }

      .pulse-ring {
          animation: pulse-ring 1.25s cubic-bezier(0.215, 0.61, 0.355, 1) infinite;
      }

  </style>
  <div id="chatWidget" class="fixed bottom-6 right-6 z-50">
      <!-- Chat Bubble -->
      <div id="chatBubble" class="relative cursor-pointer">
          <div class="relative w-16 h-16 bg-gradient-to-tr from-[#9E1D1D] to-[#C82828] rounded-full shadow-lg flex items-center justify-center group">
              <i class="fa-solid fa-robot text-white text-2xl"></i>
          </div>
          <div class="absolute -top-1 -right-1 w-6 h-6 bg-red-500 rounded-full flex items-center justify-center">
              <span class="font-semibold text-white text-xs">AI</span>
          </div>
      </div>

      <!-- Chat Box -->
      <div id="chatBox" class="hidden absolute bottom-20 right-0 w-96 h-[30rem] bg-white rounded-lg shadow-2xl border border-gray-200 flex flex-col overflow-hidden transform scale-95 group-hover:scale-100 transition-all duration-200 group-hover:opacity-100 group-hover:visible group-hover:translate-y-0">
          <!-- Header -->
          <div class="bg-gradient-to-tr from-[#C82828] to-[#9E1D1D] p-4 flex items-center justify-between">
              <div class="flex items-center space-x-3">
                  <div class="relative">
                      <img src="{{ asset('img/robot.png') }}" class="w-8 h-8 rounded-full" alt="Agent" />
                      <div class="absolute -bottom-1 -right-1 w-3 h-3 bg-green-400 rounded-full border-2 border-white"></div>
                  </div>
                  <div>
                      <h3 class="text-white font-semibold text-sm">Jamal</h3>
                      <p class="text-blue-100 text-xs">AI Support Agent</p>
                  </div>
              </div>
              <button id="closeChat" class="text-white cursor-pointer">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                  </svg>
              </button>
          </div>

          <!-- Status -->
          {{-- <div class="bg-gray-50 px-4 py-2 border-b border-gray-200 text-xs text-gray-600">
              <div class="flex items-center space-x-2">
                  <div class="w-2 h-2 rounded-full relative">
                      <svg class="w-4 h-4 absolute -top-1 -left-1" viewBox="0 0 126 127" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet">
                          <path d="M117.569 51.932C120.432 43.3101 119.441 33.8723 114.851 26.0353C107.948 14.0192 94.0759 7.83757 80.5291 10.7417C68.7206 -2.39461 48.5037 -3.46967 35.3683 8.33943C31.1999 12.0879 28.0897 16.8639 26.3514 22.194C17.451 24.0207 9.77046 29.5934 5.27389 37.4876C-1.70281 49.4846 -0.119088 64.6188 9.19031 74.9128C6.31783 83.53 7.29991 92.9702 11.8845 100.81C18.7946 112.83 32.6766 119.012 46.2305 116.103C52.2608 122.894 60.9211 126.759 70.0022 126.706C83.889 126.718 96.1921 117.751 100.432 104.527C109.33 102.698 117.01 97.1253 121.509 89.2335C128.403 77.2579 126.812 62.2047 117.569 51.9344V51.932ZM70.0022 118.425C64.4594 118.434 59.0901 116.491 54.8361 112.935L55.5851 112.512L80.7787 97.965C82.0533 97.2157 82.8403 95.8505 82.8499 94.3711V58.8415L93.5004 65.0041C93.6074 65.0588 93.6811 65.1611 93.7001 65.2776V94.7183C93.6716 107.798 83.0782 118.394 70.0022 118.422V118.425ZM19.068 96.6686C16.2883 91.8689 15.2895 86.2415 16.2502 80.7757L16.9992 81.2253L42.2167 95.7696C43.4865 96.5165 45.063 96.5165 46.3328 95.7696L77.1382 78.0072V90.3086C77.1311 90.4371 77.0669 90.556 76.9646 90.6321L51.4476 105.352C40.1075 111.886 25.6214 108.002 19.0703 96.6686H19.068ZM12.4338 41.7783C15.2325 36.9453 19.6506 33.261 24.9057 31.3749V61.3151C24.8866 62.7874 25.669 64.155 26.9507 64.8828L57.6063 82.5715L46.9557 88.7341C46.8392 88.7959 46.699 88.7959 46.5824 88.7341L21.1153 74.0375C9.79902 67.4777 5.91838 52.9976 12.4338 41.6523V41.7783ZM99.9349 62.1119L69.1794 44.2472L79.8038 38.1107C79.9203 38.0489 80.0606 38.0489 80.1771 38.1107L105.644 52.8311C116.98 59.3743 120.865 73.871 114.323 85.2068C111.57 89.9804 107.24 93.6433 102.077 95.5698V65.6296C102.032 64.1597 101.217 62.823 99.9325 62.1119H99.9349ZM110.536 46.169L109.786 45.7195L84.619 31.0491C83.3397 30.2998 81.756 30.2998 80.4791 31.0491L49.6998 48.8115V36.51C49.6879 36.384 49.7451 36.2579 49.8497 36.1866L75.3167 21.49C86.6687 14.9492 101.174 18.8499 107.713 30.2047C110.476 34.9997 111.475 40.6105 110.538 46.0643V46.1642L110.536 46.169ZM43.8883 67.9748L33.2378 61.8383C33.1308 61.7741 33.0571 61.6623 33.0381 61.5387V32.1717C33.0547 19.0663 43.691 8.45834 56.7907 8.47499C62.3193 8.48213 67.6742 10.4206 71.9259 13.9574L71.1769 14.3808L45.9832 28.9275C44.7087 29.6767 43.9216 31.0419 43.9121 32.5213L43.8883 67.9748ZM49.6737 55.4997L63.3917 47.5913L77.1359 55.4997V71.3166L63.4416 79.2274L49.6998 71.3166L49.6761 55.4997H49.6737Z" fill="currentColor" class="text-gray-600" />
                      </svg>
                  </div>
                  <span class="text-sm text-gray-600">Powered by GPT 4.1</span>
              </div>
          </div> --}}

          <!-- Messages -->
          <div id="messagesContainer" class="flex-1 overflow-y-auto p-4 space-y-3 bg-gray-50">
              <div class="flex items-start space-x-2">
                  <img src="{{ asset('img/robot.png') }}" class="w-6 h-6 rounded-full mt-1" alt="Bot" />
                  <div class="bg-white rounded-lg rounded-tl-none p-3 shadow-sm max-w-xs">
                      <p class="text-sm text-gray-800">Hello! 👋 I'm here to help you. How can I assist you today?</p>
                      <span class="text-xs text-gray-500 mt-1 block">just now</span>
                  </div>
              </div>
          </div>

          <!-- Input -->
          <div class="p-4 bg-white border-t border-gray-200">
              <div class="flex space-x-2">
                  <input type="text" id="messageInput" placeholder="Type your message..." class="flex-1 border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-[#9E1D1D] outline-none" />
                  <button id="sendButton" class="bg-gradient-to-tr from-[#9E1D1D] to-[#C82828] hover:bg-[#9E1D1D] text-white p-2 rounded-lg disabled:opacity-50">
                      <i class="fa-solid fa-paper-plane mx-2"></i>
                  </button>
              </div>
          </div>
      </div>
  </div>
  <script>
      const chatBubble = document.getElementById("chatBubble");
      const chatBox = document.getElementById("chatBox");
      const closeChat = document.getElementById("closeChat");
      const sendButton = document.getElementById("sendButton");
      const messageInput = document.getElementById("messageInput");
      const messagesContainer = document.getElementById("messagesContainer");

      document.addEventListener('DOMContentLoaded', () => {
          loadChatHistory();
      });

      function loadChatHistory() {
          const history = JSON.parse(sessionStorage.getItem("chatHistory")) || [];
          history.forEach(msg => {
              createBubble(msg.message, msg.type, false); // ⛔️ jangan simpan ulang
          });
      }


      // Save chat history to sessionStorage
      function saveMessageToHistory(message, type) {
          const history = JSON.parse(sessionStorage.getItem("chatHistory")) || [];
          history.push({
              message
              , type
          });
          sessionStorage.setItem("chatHistory", JSON.stringify(history));
      }

      chatBubble.addEventListener('click', () => {
          if (chatBox.classList.contains('hidden')) {
              chatBox.classList.remove('hidden');
              scrollToBottom();
          } else {
              chatBox.classList.add('hidden');
          }
      });

      document.addEventListener('click', (event) => {
          // Check if the click is outside both the chatBox and chatBubble
          if (!chatBox.contains(event.target) && !chatBubble.contains(event.target)) {
              chatBox.classList.add('hidden');
          }
      });

      closeChat.addEventListener("click", () => {
          chatBox.classList.add("hidden");
      });

      messageInput.addEventListener('keydown', function(e) {
          if (e.key === 'Enter' && !e.shiftKey) {
              e.preventDefault();
              sendButton.click();
          }
      });

      // Function to format message with link and bold parsing
      function formatMessage(message) {
          // First, handle markdown-style links [text](url)
          let formattedMessage = message.replace(/\[([^\]]+)\]\(([^)]+)\)/g, '<a href="$2" class="text-blue-500 underline hover:text-blue-700">$1</a>');

          // Then, handle bold formatting ****text****
          formattedMessage = formattedMessage.replace(/\*{2}([^*]+)\*{2}/g, '<strong class="font-bold">$1</strong>');

          return formattedMessage;
      }

      function createBubble(message, type = "user", saveToHistory = true) {
          const wrapper = document.createElement("div");
          wrapper.className = `flex items-start space-x-2 ${type === "user" ? "justify-end" : ""}`;

          const avatar = document.createElement("img");
          avatar.className = "w-6 h-6 rounded-full mt-1";
          avatar.src = type === "user" ?
              "https://ui-avatars.com/api/?name=U&background=1E3A8A&color=fff" :
              "{{ asset('img/robot.png') }}";

          const bubble = document.createElement("div");
          bubble.className = `bg-white rounded-lg ${type === "user" ? "rounded-tr-none" : "rounded-tl-none"} p-3 shadow-sm max-w-xs`;

          const formattedMessage = formatMessage(message);
          bubble.innerHTML = `<p class="text-sm text-gray-800">${formattedMessage}</p><span class="text-xs text-gray-500 mt-1 block">just now</span>`;

          if (type === "user") {
              wrapper.appendChild(bubble);
              wrapper.appendChild(avatar);
          } else {
              wrapper.appendChild(avatar);
              wrapper.appendChild(bubble);
          }

          messagesContainer.appendChild(wrapper);
          messagesContainer.scrollTop = messagesContainer.scrollHeight;

          // Simpan ke history hanya kalau diminta
          if (saveToHistory) saveMessageToHistory(message, type);
      }


      function showTypingIndicator() {
          const wrapper = document.createElement("div");
          wrapper.className = "flex items-start space-x-2 typing-wrapper";
          wrapper.innerHTML = `
      <img src="{{ asset('img/robot.png') }}" class="w-6 h-6 rounded-full mt-1" />
      <div class="bg-white rounded-lg rounded-tl-none p-3 shadow-sm max-w-xs flex space-x-1">
          <span class="typing-indicator w-2 h-2 bg-gray-400 rounded-full"></span>
          <span class="typing-indicator w-2 h-2 bg-gray-400 rounded-full"></span>
          <span class="typing-indicator w-2 h-2 bg-gray-400 rounded-full"></span>
      </div>
  `;
          messagesContainer.appendChild(wrapper);
          messagesContainer.scrollTop = messagesContainer.scrollHeight;
      }

      function removeTypingIndicator() {
          const typing = messagesContainer.querySelector(".typing-wrapper");
          if (typing) typing.remove();
      }

      async function sendMessage() {
          const token = await getChatToken();
          const userMessage = messageInput.value.trim();
          if (!userMessage) return;

          // Show user bubble
          createBubble(userMessage, "user");
          messageInput.value = "";

          // Show typing indicator
          showTypingIndicator();

          try {
              const response = await fetch("/api/handler/ai/receive", {
                  method: "POST"
                  , headers: {
                      "Content-Type": "application/json"
                      , 'X-Chat-Token': token
                  , }
                  , body: JSON.stringify({
                      message: userMessage
                  })
              });

              const data = await response.json();
              removeTypingIndicator();

              // Show response bubble
              createBubble(data.message || "Sorry, no response received.", "bot");
          } catch (err) {
              removeTypingIndicator();
              createBubble("Something went wrong. Please try again later.", "bot");
              console.error("Error sending message:", err);
              scrollToBottom();
          }
      }

      sendButton.addEventListener("click", sendMessage);

      document.addEventListener('click', (event) => {
          // Check if the click is outside both the chatBox and chatBubble
          if (!chatBox.contains(event.target) && !chatBubble.contains(event.target)) {
              chatBox.classList.add('hidden');
          }
      });

      function scrollToBottom() {
          requestAnimationFrame(() => {
              messagesContainer.scrollTop = messagesContainer.scrollHeight;
          });
      }

      chatBubble.addEventListener('click', () => {
          setTimeout(() => messageInput.focus(), 300);
      });

  </script>
