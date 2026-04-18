<!-- Chat Toggle -->
<div id="chat-toggle" class="chat-toggle-btn">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 60 60">
        <path d="M41.216 29.026c0 3.576-.895 5.847-2.647 7.268l-.066.052c-.213.173-.448.362-.6.559a1.958 1.958 0 0 0-.311.562c-.086.233-.117.494-.144.719l-.008.062-.303 2.48c-.063.516-.102.834-.151 1.06a1.595 1.595 0 0 1-.04.151.091.091 0 0 1-.015.006 1.42 1.42 0 0 1-.137-.076 14.087 14.087 0 0 1-.868-.626l-2.98-2.244-.041-.03a3.046 3.046 0 0 0-.53-.343 2.061 2.061 0 0 0-.554-.17 3.13 3.13 0 0 0-.648-.016l-.054.002c-.496.023-1.014.034-1.553.034-4.41 0-7.28-.758-9.048-2.22-1.721-1.421-2.602-3.683-2.602-7.23 0-3.546.88-5.808 2.602-7.23 1.769-1.46 4.639-2.22 9.048-2.22 4.41 0 7.28.76 9.048 2.22 1.721 1.422 2.602 3.684 2.602 7.23Z" stroke="#fff" stroke-width="2" class="line-path"></path>
    </svg>
</div>

<!-- Chatbox -->
<div id="chatbox" class="chatbox">

    <div class="chat-header d-flex justify-content-between align-items-center">
        <span><b>SUPPORT CHAT</b></span>
        <button id="closeChat" class="btn-close custom-close"></button>
    </div>

    <div id="chat-body" class="chat-body"></div>

    <div class="chat-input-wrapper">
        <div class="chat-input">
            <input type="text" id="message" placeholder="Type your message...">

            <button onclick="sendMessage()" class="send-btn" type="button" aria-label="Send message">
                <span class="send-btn-inner">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <path d="M2 12L22 2L13 22L11 13L2 12Z" stroke="white" stroke-width="2" stroke-linejoin="round" stroke-linecap="round"/>
                    </svg>
                </span>
            </button>
        </div>
    </div>

</div>

<style>
/* TOGGLE */
.chat-toggle-btn {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background: var(--theme-light-primary);
    color: #fff;
    width: 60px;
    height: 60px;
    border-radius: 50%;
    display:flex;
    align-items:center;
    justify-content:center;
    cursor: pointer;
    animation: pulse 2s infinite;
    z-index: 10000;
}

@keyframes pulse {
    0% {
        box-shadow: 0 0 0 0 var(--theme-light-primary);
    }
    70% {
        box-shadow: 0 0 0 15px rgba(69, 233, 172, 0);
    }
    100% {
        box-shadow: 0 0 0 0 rgba(69, 233, 172, 0);
    }
}

/* CHATBOX */
.chatbox {
    position: fixed;
    bottom: 90px;
    right: 20px;
    width: 420px; /* increased */
    max-width: calc(100vw - 40px); /* responsive fix */
    height: 580px;
    background: #fff;
    border-radius: 14px;
    display: none;
    flex-direction: column;
    overflow: hidden;
    z-index: 10000;
    max-height: calc(100vh - 100px);
    box-shadow:
        0 10px 30px rgba(0,0,0,0.15),
        0 0 40px rgba(1,118,211,0.25);
}

/* HEADER */
.chat-header {
    background: var(--theme-primary);
    color: #fff;
    padding: 14px 16px;
    font-size: 16px;
    text-transform: uppercase;
}

/* CLOSE FIX */
.custom-close {
    filter: invert(1);
}
.custom-close:focus,
.custom-close:active,
.custom-close:hover {
    outline: none !important;
    box-shadow: none !important;
}

/* BODY */
.chat-body {
    flex: 1;
    padding: 14px;
    overflow-y: auto;
    background: #f7f9fc;
    font-size: 14px;
}

/* MESSAGE ROW */
.message-row {
    display: flex;
    align-items: flex-end;
    margin-bottom: 12px;
}

.message-row.user {
    justify-content: flex-end;
}

.message-row.bot {
    justify-content: flex-start;
}

/* ICON */
.msg-icon {
    width: 32px;
    height: 32px;
    min-width: 32px;
    border-radius: 50%;
    background: #fff;
    border:1px solid #d6d6d6;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size: 14px;
    margin-right: 16px;
}

.user .msg-icon {
    margin-left: 16px;
    margin-right: 0;
}

/* BUBBLE */
.chat-bubble {
    padding: 10px 14px;
    border-radius: 16px;
    max-width: 75%;
    position: relative;
    font-size: 14px;
    line-height: 1.5;
    overflow: visible;
}

/* USER */
.user .chat-bubble {
    background: #004174;
    color: #fff;
    border-bottom-right-radius: 6px;
}

/* BOT */
.bot .chat-bubble {
    background: var(--theme-light-primary);
    color: #fff;
    border-bottom-left-radius: 6px;
}

/* IMPROVED TAIL */
.user .chat-bubble::before {
    content: "";
    position: absolute;
    right: -7px;
    bottom: 0px;
    width: 14px;
    height: 14px;
    background: #004174;
    clip-path: path("M0 0 C8 0, 14 6, 14 14 L0 14 Z");
}

.bot .chat-bubble::before {
    content: "";
    position: absolute;
    left: -7px;
    bottom: 0px;
    width: 14px;
    height: 14px;
    background: var(--theme-light-primary);
    clip-path: path("M14 0 C6 0, 0 6, 0 14 L14 14 Z");
}

/* INPUT */
.chat-input-wrapper {
    padding: 12px;
    background: #fff;
}

.chat-input {
    display: flex;
    align-items: center;
    background: #f1f1f1;
    border-radius: 100px;
    padding: 8px;
}

.chat-input input {
    flex: 1;
    padding: 10px 12px;
    border: none;
    background: transparent;
    outline: none;
    font-size: 14px;
}

/* SEND BUTTON */
.send-btn {
    width: 43px;
    height: 43px;
    min-width: 43px;
    background: var(--theme-light-primary);
    border-radius: 50%;
    display:flex;
    align-items:center;
    justify-content:center;
    border: none;
    padding: 0;
    margin-left: 4px;
}



.send-btn-inner {
    width: 28px;
    height: 28px;
    display:flex;
    align-items:center;
    justify-content:center;
}

.send-btn:hover {
    background: #015ea8;
}

/* FAQ */
.faq-btn {
    /* width: 100%; */
    text-align: left;
    padding: 10px 12px;
    border-radius: 8px;
    border: none;
    background: #fff;
    font-size: 12px;
    text-transform: uppercase;
    letter-spacing: 0.2px;
    color: #fff;
    background: #0ba0fd;
    border-radius: 100px;
    transition: 0.2s;
}
.faq-btn:hover {
    opacity: 0.7;
}

/* .faq-btn:hover {
    background: var(--theme-light-primary);
    color: #fff;
    border-color: var(--theme-light-primary);
    box-shadow: 0 6px 14px rgba(1,118,211,0.16);
} */

/* MOBILE RESPONSIVE */
@media (max-width: 576px) {
    .chatbox {
        right: 0px;
        left: 8px;
        width: auto;
        height: 85vh;
        bottom: 80px;
        min-width: calc(100% - 16px) !important;
        right: 8px;
    }
    .chat-toggle-btn {
        right: 8px;
        bottom: 8px;
    }
}

/* ===== SCROLLBAR FIX ===== */
.chat-body {
    flex: 1;
    padding: 14px;
    overflow-y: auto;
    background: #f7f9fc;
    font-size: 14px;

    scrollbar-width: thin;
    scrollbar-color: var(--theme-light-primary) transparent;
}

/* Chrome / Edge / Safari */
.chat-body::-webkit-scrollbar {
    width: 5px;
}

.chat-body::-webkit-scrollbar-track {
    background: transparent;
}

.chat-body::-webkit-scrollbar-thumb {
    background: var(--theme-light-primary);
    border-radius: 10px;
}

.chat-body::-webkit-scrollbar-thumb:hover {
    background: var(--theme-primary);
}

.message-row.bot + div:has(button.faq-btn) {
    display:flex;
    align-items:center;
    justify-content:start;
    flex-wrap:wrap;
    gap: 8px;
    margin-bottom: 24px;
}

.typing-bubble {
    display: flex;
    align-items: center;
    gap: 4px;
}

.typing-bubble span {
    width: 6px;
    height: 6px;
    background: #fff;
    border-radius: 50%;
    display: inline-block;
    animation: bounce 1.2s infinite ease-in-out;
}

.typing-bubble span:nth-child(2) {
    animation-delay: 0.2s;
}
.typing-bubble span:nth-child(3) {
    animation-delay: 0.4s;
}

@keyframes bounce {
    0%, 80%, 100% { transform: scale(0.6); opacity: 0.3; }
    40% { transform: scale(1); opacity: 1; }
}

</style>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const toggleBtn = document.getElementById('chat-toggle');
    const chatbox = document.getElementById('chatbox');
    const closeBtn = document.getElementById('closeChat');
    const input = document.getElementById('message');

    let flowStarted = false;
    let flowLocked = false;
    let currentFlow = null;
    let currentStep = 0;

    // =========================
    // RESET FUNCTION (FIX)
    // =========================
    function resetChat() {
        flowStarted = false;
        flowLocked = false;
        currentFlow = null;
        currentStep = 0;

        document.getElementById('chat-body').innerHTML = '';
        input.disabled = false;
    }

    // =========================
    // TOGGLE
    // =========================
    toggleBtn.onclick = function () {
        const isOpen = chatbox.style.display === 'flex';

        chatbox.style.display = isOpen ? 'none' : 'flex';

        if (!isOpen && !flowStarted) {

            flowStarted = true;

            botReply("Hey — quick question so I don’t point you in the wrong direction… what kind of business are you running?", [
                "E-commerce",
                "SaaS",
                "Startup / Founder",
                "Vegan Meal Kit",
                "Just exploring"
            ]);
        }
    };

    closeBtn.onclick = function () {
        chatbox.style.display = 'none';
    };

    // =========================
    // TYPING
    // =========================
    function showTyping() {
        let chatBody = document.getElementById('chat-body');

        chatBody.innerHTML += `
        <div class="message-row bot typing-row">
            <div class="msg-icon">🤖</div>
            <div class="chat-bubble typing-bubble">
                <span></span><span></span><span></span>
            </div>
        </div>
        `;

        chatBody.scrollTop = chatBody.scrollHeight;
    }

    function removeTyping() {
        let typing = document.querySelector('.typing-row');
        if (typing) typing.remove();
    }

    function botReply(msg, options = []) {
        showTyping();

        setTimeout(() => {
            removeTyping();
            appendBot(msg, options);
        }, 800);
    }

    // =========================
    // ENTER KEY
    // =========================
    input.addEventListener('keydown', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            sendMessage();
        }
    });

    // =========================
    // SEND MESSAGE
    // =========================
    window.sendMessage = function(customMsg = null) {

        if (flowLocked) return;

        let message = customMsg || input.value;
        if (!message) return;

        appendUser(message);

        // 🔥 SPLIT MULTIPLE QUESTIONS
        // let questions = message.split(/and|\?|,/i).filter(q => q.trim() !== '');
        fetch('/chatbot', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ message: message })
        })
        .then(res => res.json())
        .then(data => {
            botReply(data.reply);
        })
        .catch(() => {
            botReply("Something went wrong. Please try again.");
        });

        // questions.forEach(q => {

        //     fetch('/chatbot', {
        //         method: 'POST',
        //         headers: {
        //             'Content-Type': 'application/json',
        //             'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        //         },
        //         body: JSON.stringify({ message: q.trim() })
        //     })
        //     .then(res => res.json())
        //     .then(data => {
        //         botReply(data.reply);
        //     });

        // });

        input.value = '';
    };

    // =========================
    // APPEND USER
    // =========================
    function appendUser(msg) {
        let chatBody = document.getElementById('chat-body');

        chatBody.innerHTML += `
        <div class="message-row user">
            <div class="chat-bubble">${msg}</div>
            <div class="msg-icon">👤</div>
        </div>
        `;

        chatBody.scrollTop = chatBody.scrollHeight;
    }

    // =========================
    // APPEND BOT
    // =========================
    window.appendBot = function(msg, options = []) {

        let chatBody = document.getElementById('chat-body');

        let buttons = options.map(opt => 
            `<button class="faq-btn" onclick="handleOption('${opt}')">${opt}</button>`
        ).join('');

        chatBody.innerHTML += `
        <div class="message-row bot">
            <div class="msg-icon">🤖</div>
            <div class="chat-bubble" style="white-space: pre-line;">${msg}</div>
        </div>
        <div>${buttons}</div>
        `;

        chatBody.scrollTop = chatBody.scrollHeight;
    };

    // =========================
    // HANDLE OPTION
    // =========================
    window.handleOption = function(option) {

        appendUser(option);

        flowLocked = true;
        input.disabled = true;

        if (!flowStarted) {
            flowStarted = true;

            if (option === "Vegan Meal Kit") {
                currentFlow = "A";
                currentStep = 1;
                flowA();
            } else {
                currentFlow = "B";
                currentStep = 1;
                flowB();
            }
        } else {
            currentStep++;
            currentFlow === "A" ? flowA(option) : flowB(option);
        }
    };

    // =========================
    // FLOW A
    // =========================
    function flowA(option = null) {

        switch (currentStep) {

            case 1:
                botReply("Got it — that space can get tricky fast...", [
                    "Managing demand vs ingredients",
                    "Customers not sticking long-term",
                    "Getting consistent orders",
                    "Not sure what’s breaking"
                ]);
                break;

            case 2:
                botReply("When orders increase… does it feel like growth?", [
                    "Creates more pressure",
                    "Feels unpredictable",
                    "Doesn’t really stabilize"
                ]);
                break;

            case 3:
                botReply(`We built GreenScale Formula to fix this.<br><br>Do you already have your meal kit website live?`, [
                    "Yes",
                    "Not yet"
                ]);
                break;

            case 4:
                botReply("Do you already have your meal kit website live?", [
                    "Yes",
                    "Not yet"
                ]);
                break;

            case 5:
                botReply(option === "Yes"
                    ? "Perfect — that gives us real data."
                    : "That’s a great place to start."
                );
                currentStep++;
                flowA();
                break;

            case 6:
                botReply("Want help fixing this?", [
                    "Book Growth Discovery Call",
                    "See How GreenScale Works"
                ]);
                break;

            case 7:
                resetChat();
                window.location.assign(
                    option === "Book Growth Discovery Call"
                    ? "/contact"
                    : "/greenscale-ai"
                );
                break;
        }
    }

    // =========================
    // FLOW B
    // =========================
    function flowB(option = null) {

        switch (currentStep) {

            case 1:
                botReply("Got it — thanks for that.", [
                    "Getting consistent sales",
                    "Ads not performing",
                    "Low repeat customers",
                    "Not sure what’s wrong",
                    "Just exploring"
                ]);
                break;

            case 2:
                botReply("Does your growth sustain?", [
                    "It drops again",
                    "Very unpredictable",
                    "Never really stabilizes"
                ]);
                break;

            case 3:
                botReply(`We fix this by connecting everything.<br><br>Do you already have a website live?`, [
                    "Yes, it’s live",
                    "Not yet"
                ]);
                break;

            case 4:
                botReply("Next step?", [
                    "Book Growth Discovery Call",
                    "Explore Growth Systems",
                    "Learn About GreenScale"
                ]);
                break;

            case 5:
            case 6:

                resetChat();

                if (option === "Book Growth Discovery Call") {
                    window.location.assign("/contact");
                } 
                else if (option === "Learn About GreenScale") {
                    window.location.assign("/greenscale-ai");
                } 
                else if (option === "Explore Growth Systems") {
                    window.location.assign("/contact");
                }

                break;
        }
    }

});
</script>