<!-- Chat Toggle -->
<div id="chat-toggle" class="chat-toggle-btn">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 60 60">
        <path d="M41.216 29.026c0 3.576-.895 5.847-2.647 7.268l-.066.052c-.213.173-.448.362-.6.559a1.958 1.958 0 0 0-.311.562c-.086.233-.117.494-.144.719l-.008.062-.303 2.48c-.063.516-.102.834-.151 1.06a1.595 1.595 0 0 1-.04.151.091.091 0 0 1-.015.006 1.42 1.42 0 0 1-.137-.076 14.087 14.087 0 0 1-.868-.626l-2.98-2.244-.041-.03a3.046 3.046 0 0 0-.53-.343 2.061 2.061 0 0 0-.554-.17 3.13 3.13 0 0 0-.648-.016l-.054.002c-.496.023-1.014.034-1.553.034-4.41 0-7.28-.758-9.048-2.22-1.721-1.421-2.602-3.683-2.602-7.23 0-3.546.88-5.808 2.602-7.23 1.769-1.46 4.639-2.22 9.048-2.22 4.41 0 7.28.76 9.048 2.22 1.721 1.422 2.602 3.684 2.602 7.23Z" stroke="#fff" stroke-width="2" class="line-path"></path>
    </svg>
</div>

<!-- Chatbox -->
<div id="chatbox" class="chatbox" data-user="{{ auth()->check() ? auth()->id() : 0 }}" data-session="{{ session()->getId() }}">

    <div class="chat-header d-flex justify-content-between align-items-center">
        <div>
            <div style="font-size:15px;font-weight:600;letter-spacing:0.3px;text-transform:none;">DevXCloud Growth Advisor</div>
            <div style="font-size:13px;opacity:0.8;font-weight:400;text-transform:none;letter-spacing:0.2px;"><i>How can we help you grow?</i></div>
        </div>
        <button id="closeChat" class="btn-close custom-close"></button>
    </div>

    <div id="chat-body" class="chat-body"></div>

    <div class="chat-input-wrapper">
        <div class="chat-input">
            <input type="text" id="message" placeholder="Ask about DevXCloud...">

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
#chatbox, .chat-toggle-btn {
    --theme-light-primary: #0176d3;
}
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
    width: 420px;
    max-width: calc(100vw - 40px);
    height: 580px;
    background: #fff;
    border-radius: 14px;
    display: flex; /* IMPORTANT */
    flex-direction: column;
    overflow: hidden;
    z-index: 10000;
    max-height: calc(100vh - 100px);
    box-shadow:
        0 10px 30px rgba(0,0,0,0.15),
        0 0 40px rgba(1,118,211,0.25);

    /* 🔥 Animation properties */
    opacity: 0;
    transform: translateY(20px); /* halki si slide */
    pointer-events: none;
    transition: all 0.3s ease;
}

/* ACTIVE STATE */
.chatbox.active {
    opacity: 1;
    transform: translateY(0);
    pointer-events: auto;
}


/* HEADER */
.chat-header {
    background: var(--theme-primary);
    color: #fff;
    padding: 14px 16px;
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

.brand-icon {
    background: var(--theme-primary);
    border: none;
    color: #fff;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 0.5px;
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

.bot .nudge-bubble {
    background: #10b981;
}

.bot .nudge-bubble::before {
    background: #10b981;
}

/* INPUT */
.chat-input-wrapper {
    padding: 12px;
    background: #fff;
    transition: background 0.3s;
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
    transition: transform 0.2s;
}

.chat-input.busy .send-btn {
    animation: send-pulse 1.2s ease-in-out infinite;
}

@keyframes send-pulse {
    0%, 100% { transform: scale(1); box-shadow: 0 0 0 0 rgba(1, 118, 211, 0.5); }
    50% { transform: scale(1.05); box-shadow: 0 0 0 6px rgba(1, 118, 211, 0.1); }
}

.chat-input.busy {
    animation: input-pulse 1.5s ease-in-out infinite;
}

@keyframes input-pulse {
    0%, 100% { box-shadow: inset 0 0 0 1px rgba(1, 118, 211, 0.15); }
    50% { box-shadow: inset 0 0 0 2px rgba(1, 118, 211, 0.35); }
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
    opacity: 0.8 !important;
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

/* .message-row.bot + div:has(button.faq-btn) {
    display:flex;
    align-items:center;
    justify-content:start;
    flex-wrap:wrap;
    gap: 8px;
    margin-bottom: 24px;
} */

    .faq-wrapper .faq-btn {
    margin: 0;
}


    .faq-wrapper {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    margin-top: 6px;
    margin-bottom: 20px;
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

/* ===== MESSAGE ANIMATION ===== */
.message-row {
    opacity: 0;
    transform: translateY(15px);
    transition: all 0.3s ease;
}

.message-row.show {
    opacity: 1;
    transform: translateY(0);
}

/* ===== BUTTON STAGGER ANIMATION ===== */
.faq-btn {
    opacity: 0;
    transform: translateY(10px);
    transition: all 0.25s ease;
}

.faq-btn.show {
    opacity: 1;
    transform: translateY(0);
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
    let branch = null;
    let guestMsgCount = 0;
    let formFlow = null;
    let formData = {};
    let formStep = 0;
    let chatMessages = [];
    let chatOffset = 0;
    let chatHasMore = false;
    let loadingHistory = false;
    const isLoggedIn = parseInt(document.getElementById('chatbox').dataset.user) > 0;
    const guestSessionId = document.getElementById('chatbox').dataset.session;
    const STORAGE_KEY = 'devxcloud_chat_state';

    let chatContentLoaded = false;

    function setInputBusy() {
        input.disabled = true;
    }

    function setInputReady() {
        input.disabled = false;
        input.placeholder = 'Ask about DevXCloud...';
    }

    const guidanceSteps = [
        { field: 'name', question: "To provide more specific guidance, please share a few details about your business and what you need help with.\n\nWhat is your name?" },
        { field: 'email', question: "Thanks! What is your email address?" },
        { field: 'business_type', question: "What type of business do you run?" },
        { field: 'question', question: "And what specific question or challenge do you need help with?" }
    ];

    const discoverySteps = [
        { field: 'name', question: "Before booking, please share a few details so the call is more useful.\n\nWhat is your name?" },
        { field: 'email', question: "What is your email address?" },
        { field: 'business_name', question: "What is your business name?" },
        { field: 'business_type', question: "What type of business do you run?" },
        { field: 'current_stage', question: "What stage is your business at? (e.g. idea stage, just launched, growing, established)" },
        { field: 'main_challenge', question: "What is the main challenge you're facing right now?" }
    ];

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
        input.placeholder = 'Ask about DevXCloud...';
        clearChatState();
    }

    // =========================
    // LOCALSTORAGE HELPERS
    // =========================
    function saveChatState() {
        let state = {
            messages: chatMessages,
            flowStarted: flowStarted,
            currentFlow: currentFlow,
            currentStep: currentStep,
            branch: branch,
            guestMsgCount: guestMsgCount,
            formFlow: formFlow,
            formData: formData,
            formStep: formStep,
            flowLocked: flowLocked,
            chatOpen: chatbox.classList.contains('active')
        };
        try { localStorage.setItem(STORAGE_KEY, JSON.stringify(state)); } catch(e) {}
    }

    function clearChatState() {
        chatMessages = [];
        try { localStorage.removeItem(STORAGE_KEY); } catch(e) {}
    }

    function loadLoggedInHistory(append = false) {
        if (loadingHistory) return;
        loadingHistory = true;
        if (!append) setInputBusy('Loading history...');

        let url = '/chatbot/history?offset=' + chatOffset + '&limit=20';
        fetch(url)
            .then(res => res.json())
            .then(data => {
                let chatBody = document.getElementById('chat-body');
                let prevHeight = chatBody.scrollHeight;

                if (!append) {
                    chatBody.innerHTML = '';
                    chatMessages = [];
                }

                if (append) {
                    data.messages.slice().reverse().forEach(msg => {
                        if (msg.type === 'user') {
                            appendUser(msg.text, true, true);
                        } else {
                            appendBot(msg.text, msg.options || [], true, true);
                        }
                    });
                } else {
                    data.messages.forEach(msg => {
                        if (msg.type === 'user') {
                            appendUser(msg.text, true);
                        } else {
                            appendBot(msg.text, msg.options || [], true);
                        }
                    });
                }

                chatHasMore = data.has_more;
                chatOffset = data.next_offset || chatOffset;

                if (append) {
                    let newHeight = chatBody.scrollHeight;
                    if (chatBody.scrollTop < 50) {
                        chatBody.scrollTop = newHeight - prevHeight;
                    }
                    setTimeout(() => { loadingHistory = false; }, 100);
                } else {
                    if (!data.messages.length && !flowStarted) {
                        flowStarted = true;
                        setInputReady();
                        setTimeout(() => botReply("Hey — quick question so I don't point you in the wrong direction… what kind of business are you running?", [
                            "E-commerce",
                            "SaaS",
                            "Startup / Founder",
                            "Established Business",
                            "Vegan Meal Kit",
                            "Just exploring"
                        ]), 200);
                    } else {
                        if (data.messages.length) flowStarted = true;
                        setInputReady();
                        chatBody.scrollTop = chatBody.scrollHeight;
                    }
                    loadingHistory = false;
                }
            })
            .catch(() => { loadingHistory = false; setInputReady(); });
    }

    function restoreChatState() {
        let saved;
        try { saved = JSON.parse(localStorage.getItem(STORAGE_KEY)); } catch(e) {}
        if (!saved || !saved.messages || !saved.messages.length) return;

        chatMessages = saved.messages;
        flowStarted = saved.flowStarted || false;
        currentFlow = saved.currentFlow || null;
        currentStep = saved.currentStep || 0;
        branch = saved.branch || null;
        guestMsgCount = saved.guestMsgCount || 0;
        formFlow = saved.formFlow || null;
        formData = saved.formData || {};
        formStep = saved.formStep || 0;
        flowLocked = saved.flowLocked || false;

        let chatBody = document.getElementById('chat-body');
        chatBody.innerHTML = '';

        saved.messages.forEach(msg => {
            if (msg.type === 'user') {
                appendUser(msg.text, true);
            } else if (msg.type === 'bot') {
                appendBot(msg.text, msg.options || [], true);
            } else if (msg.type === 'nudge') {
                let nudge = document.createElement('div');
                nudge.className = 'message-row bot';
                nudge.innerHTML = `
                    <div class="msg-icon">💡</div>
                    <div class="chat-bubble nudge-bubble" style="color:#fff;font-size:12px;padding:8px 12px;">
                        Create an account to keep your chat history forever!
                        <a href="/register?gsession=${guestSessionId}" style="color:#fff;text-decoration:underline;display:inline-block;margin-top:4px;">Register here</a>
                        or <a href="/login?gsession=${guestSessionId}" style="color:#fff;text-decoration:underline;">Login</a>
                    </div>
                `;
                chatBody.appendChild(nudge);
                setTimeout(() => nudge.classList.add('show'), 50);
            }
        });

        chatBody.scrollTop = chatBody.scrollHeight;

        if (saved.chatOpen) {
            chatbox.classList.add('active');
        }
    }

    function loadMoreHistory() {
        if (!chatHasMore || loadingHistory || !isLoggedIn) return;
        loadLoggedInHistory(true);
    }

    function loadChatContent() {
        if (chatContentLoaded) return;
        chatContentLoaded = true;

        if (isLoggedIn) {
            let saved;
            try { saved = JSON.parse(localStorage.getItem(STORAGE_KEY)); } catch(e) {}

            if (saved?.messages?.length > 0) {
                if (!flowStarted) flowStarted = true;
                setInputBusy('Syncing your previous chat...');
                restoreChatState();
                migrateGuestToServer(saved.messages).then(() => {
                    clearChatState();
                    chatOffset = 0;
                    loadLoggedInHistory();
                });
            } else {
                loadLoggedInHistory();
            }
        } else {
            restoreChatState();
            if (!flowStarted) {
                flowStarted = true;
                setTimeout(() => botReply("Hey — quick question so I don't point you in the wrong direction… what kind of business are you running?", [
                    "E-commerce",
                    "SaaS",
                    "Startup / Founder",
                    "Established Business",
                    "Vegan Meal Kit",
                    "Just exploring"
                ]), 300);
            }
        }
    }

    function migrateGuestToServer(messages) {
        let pairs = [];
        for (let i = 0; i < messages.length; i++) {
            if (messages[i].type === 'user' && i + 1 < messages.length && messages[i+1].type === 'bot') {
                pairs.push({ question: messages[i].text, answer: messages[i+1].text });
                i++;
            } else if (messages[i].type === 'user') {
                pairs.push({ question: messages[i].text, answer: null });
            }
        }
        if (!pairs.length) return Promise.resolve();
        return fetch('/chatbot/migrate', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ pairs: pairs })
        }).then(res => res.json());
    }

    // =========================
    // TOGGLE
    // =========================
    toggleBtn.onclick = function () {
        const isOpen = chatbox.classList.contains('active');

        if (isOpen) {
            chatbox.classList.remove('active');
            saveChatState();
        } else {
            chatbox.classList.add('active');
            saveChatState();
            loadChatContent();
        }
    };

    closeBtn.onclick = function () {
        chatbox.classList.remove('active');
        saveChatState();
    };

    document.addEventListener('click', function (e) {
        if (!chatbox.classList.contains('active')) return;
        if (chatbox.contains(e.target) || toggleBtn.contains(e.target)) return;
        chatbox.classList.remove('active');
        saveChatState();
    });

    // =========================
    // TYPING
    // =========================
    function showTyping() {
        setInputBusy();
        let chatBody = document.getElementById('chat-body');

        chatBody.insertAdjacentHTML('beforeend', `
        <div class="message-row bot typing-row">
                <div class="msg-icon brand-icon">DX</div>
            <div class="chat-bubble typing-bubble">
                <span></span><span></span><span></span>
            </div>
        </div>
        `);

        setTimeout(() => {
            chatBody.scrollTo({
                top: chatBody.scrollHeight,
                behavior: 'smooth'
            });
        }, 100);
    }

    function removeTyping() {
        setInputReady();
        let typing = document.querySelector('.typing-row');
        if (typing) {
            typing.style.opacity = '0';
            typing.style.transform = 'translateY(10px)';
            setTimeout(() => typing.remove(), 200);
        }
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

        input.disabled = true;

        appendUser(message);

        if (formFlow) {
            handleFormInput(message);
            input.value = '';
            return;
        }

        showTyping();

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
            removeTyping();
            input.disabled = false;
            appendBot(data.reply, data.options || []);
                    if (!isLoggedIn) {
                guestMsgCount++;
                saveChatState();
                if (guestMsgCount === 5) {
                    setTimeout(() => {
                        let chatBody = document.getElementById('chat-body');
                        let nudge = document.createElement('div');
                        nudge.className = 'message-row bot';
                        nudge.innerHTML = `
                            <div class="msg-icon">💡</div>
                            <div class="chat-bubble nudge-bubble" style="color:#fff;font-size:12px;padding:8px 12px;">
                                Create an account to keep your chat history forever!
                                <a href="/register?gsession=' + guestSessionId + '" style="color:#fff;text-decoration:underline;display:inline-block;margin-top:4px;">Register here</a>
                                or <a href="/login?gsession=' + guestSessionId + '" style="color:#fff;text-decoration:underline;">Login</a>
                            </div>
                        `;
                        chatBody.appendChild(nudge);
                        setTimeout(() => nudge.classList.add('show'), 50);
                        setTimeout(() => chatBody.scrollTo({ top: chatBody.scrollHeight, behavior: 'smooth' }), 100);
                        chatMessages.push({type: 'nudge'});
                        saveChatState();
                    }, 1200);
                }
            }
        })
        .catch(() => {
            removeTyping();
            input.disabled = false;
            appendBot("Something went wrong. Please try again.");
        });

        input.value = '';
    };

    // =========================
    // APPEND USER
    // =========================
    // function appendUser(msg) {
    //     let chatBody = document.getElementById('chat-body');

    //     chatBody.innerHTML += `
    //     <div class="message-row user">
    //         <div class="chat-bubble">${msg}</div>
    //         <div class="msg-icon">👤</div>
    //     </div>
    //     `;

    //     chatBody.scrollTop = chatBody.scrollHeight;
    // }
    function appendUser(msg, skipSave = false, prepend = false) {
        let chatBody = document.getElementById('chat-body');

        let wrapper = document.createElement('div');
        wrapper.innerHTML = `
            <div class="message-row user">
                <div class="chat-bubble">${msg}</div>
                <div class="msg-icon">👤</div>
            </div>
        `;

        let el = wrapper.firstElementChild;
        if (prepend && chatBody.firstChild) {
            chatBody.insertBefore(el, chatBody.firstChild);
        } else {
            chatBody.appendChild(el);
        }

        setTimeout(() => el.classList.add('show'), 50);

        if (!skipSave) {
            setTimeout(() => {
                chatBody.scrollTo({
                    top: chatBody.scrollHeight,
                    behavior: 'smooth'
                });
            }, 100);
            chatMessages.push({type: 'user', text: msg});
            saveChatState();
        }
    }

    // =========================
    // APPEND BOT
    // =========================
    // window.appendBot = function(msg, options = []) {

    //     let chatBody = document.getElementById('chat-body');

    //     let buttons = options.map(opt => 
    //         `<button class="faq-btn" onclick="handleOption('${opt}')">${opt}</button>`
    //     ).join('');

    //     chatBody.innerHTML += `
    //     <div class="message-row bot">
    //         <div class="msg-icon">🤖</div>
    //         <div class="chat-bubble" style="white-space: pre-line;">${msg}</div>
    //     </div>
    //     <div>${buttons}</div>
    //     `;

    //     chatBody.scrollTop = chatBody.scrollHeight;
    // };
    window.appendBot = function(msg, options = [], skipSave = false, prepend = false) {

        let chatBody = document.getElementById('chat-body');

        let wrapper = document.createElement('div');
        wrapper.innerHTML = `
            <div class="message-row bot">
                <div class="msg-icon brand-icon">DX</div>
                <div class="chat-bubble" style="white-space: pre-line;">${msg}</div>
            </div>
        `;

        let messageEl = wrapper.firstElementChild;
        if (prepend && chatBody.firstChild) {
            chatBody.insertBefore(messageEl, chatBody.firstChild);
        } else {
            chatBody.appendChild(messageEl);
        }

        setTimeout(() => {
            messageEl.classList.add('show');
        }, 50);

        if (options.length) {

            let btnWrapper = document.createElement('div');
            btnWrapper.className = 'faq-wrapper';
            if (prepend && chatBody.firstChild) {
                chatBody.insertBefore(btnWrapper, chatBody.firstChild);
            } else {
                chatBody.appendChild(btnWrapper);
            }

            options.forEach((opt, index) => {

                let btn = document.createElement('button');
                btn.className = 'faq-btn';
                btn.innerText = opt;
                btn.onclick = () => handleOption(opt);

                btnWrapper.appendChild(btn);

                setTimeout(() => {
                    btn.classList.add('show');
                }, 200 + (index * 120));
            });
        }

        if (!skipSave) {
            setTimeout(() => {
                chatBody.scrollTo({
                    top: chatBody.scrollHeight,
                    behavior: 'smooth'
                });
            }, 100);
            chatMessages.push({type: 'bot', text: msg, options: options});
            saveChatState();
        }
    };

    // =========================
    // START FORM FLOW
    // =========================
    function startFormFlow(type) {
        formFlow = type;
        formData = {};
        formStep = 0;
        flowLocked = true;
        input.disabled = true;
        currentFlow = null;
        currentStep = 0;

        let steps = type === 'guidance' ? guidanceSteps : discoverySteps;
        botReply(steps[0].question);

        setTimeout(() => {
            flowLocked = false;
            input.disabled = false;
        }, 1200);
    }

    // =========================
    // HANDLE FORM INPUT
    // =========================
    function handleFormInput(value) {
        let steps = formFlow === 'guidance' ? guidanceSteps : discoverySteps;
        let currentField = steps[formStep];

        formData[currentField.field] = value;

        formStep++;

        if (formStep >= steps.length) {
            submitFormFlow();
        } else {
            flowLocked = true;
            input.disabled = true;
            botReply(steps[formStep].question);
            setTimeout(() => {
                flowLocked = false;
                input.disabled = false;
            }, 1200);
        }
    }

    // =========================
    // SUBMIT FORM FLOW
    // =========================
    function submitFormFlow() {
        flowLocked = true;
        input.disabled = true;
        botReply("Thanks! Let me submit your details...");

        fetch('/chatbot/submit-form', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                type: formFlow,
                data: formData
            })
        })
        .then(res => res.json())
        .then(result => {
            if (formFlow === 'guidance') {
                formFlow = null;
                formData = {};
                formStep = 0;
                flowLocked = false;
                input.disabled = false;
                saveChatState();
                botReply("Thank you! We have received your details. Our team will review your request and get back to you shortly.");
            } else {
                botReply("Thank you! We have saved your details. Let me take you to the booking page.");
                setTimeout(() => {
                    resetChat();
                    window.location.assign("/contact");
                }, 1500);
            }
        })
        .catch(() => {
            formFlow = null;
            formData = {};
            formStep = 0;
            flowLocked = false;
            input.disabled = false;
            saveChatState();
            botReply("Something went wrong. Please try again or contact us directly.");
        });
    }

    // =========================
    // HANDLE OPTION
    // =========================
    window.handleOption = function(option) {

        appendUser(option);
        flowLocked = true;
        input.disabled = true;

        setTimeout(() => {
            if (option === "Get Personalized Guidance") {
                startFormFlow('guidance');
                return;
            }
            if (option === "Book Discovery Call") {
                startFormFlow('discovery');
                return;
            }
            if (option === "Explore Services") {
                resetChat();
                window.location.assign("/about");
                return;
            }

            if (currentFlow === null) {
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
        }, 200);
    };

    // =========================
    // FLOW A — GreenScale (Vegan Meal Kit)
    // =========================
    function flowA(option = null) {

        switch (currentStep) {

            case 1:
                botReply(
                    "Got it. Meal-kit businesses usually struggle in one of three areas: attracting customers, keeping customers, or managing operations as demand grows. Which feels most familiar right now?", [
                    "Getting consistent customers",
                    "Customers are not staying long enough",
                    "Operations become harder as orders grow",
                    "Not sure yet"
                ]);
                break;

            case 2:
                if (option === "Getting consistent customers") {
                    branch = "customers";
                    botReply("What feels like the biggest challenge?", [
                        "Not enough traffic",
                        "Traffic isn't converting",
                        "Marketing feels inconsistent",
                        "Not sure"
                    ]);
                } else if (option === "Customers are not staying long enough") {
                    branch = "retention";
                    botReply("What is happening most often?", [
                        "Customers order once and leave",
                        "Subscription cancellations are high",
                        "Repeat purchases are low",
                        "Not sure"
                    ]);
                } else if (option === "Operations become harder as orders grow") {
                    branch = "operations";
                    botReply("When orders increase, what usually happens next?", [
                        "Fulfillment becomes stressful",
                        "Inventory planning gets harder",
                        "Profitability becomes unpredictable",
                        "Not sure"
                    ]);
                } else {
                    branch = "unsure";
                    currentStep++;
                    flowA();
                    return;
                }
                break;

            case 3:
                botReply(
                    "Understood. That usually means growth is creating pressure instead of stability. Many meal-kit businesses reach a point where more activity does not automatically create better results. That is exactly the type of challenge GreenScale Formula was designed to address.\n\nWhat stage is your business currently at?", [
                    "Idea Stage",
                    "Website In Progress",
                    "Already Selling",
                    "Growing But Stuck"
                ]);
                break;

            case 4:
                let stageMsg = "";
                if (option === "Idea Stage") {
                    stageMsg = "You are early enough to avoid many of the mistakes that become expensive later. The right systems from the beginning can save significant time and resources as you grow.";
                } else if (option === "Website In Progress") {
                    stageMsg = "This is usually the best time to build growth systems because your foundation is still flexible.";
                } else if (option === "Already Selling") {
                    stageMsg = "You already have real customer data, which makes it easier to identify where growth opportunities exist.";
                } else {
                    stageMsg = "This is often where small bottlenecks create the biggest limitations on growth.";
                }
                botReply(stageMsg + "\n\nBased on what you shared, the next step is understanding where your biggest growth opportunities and bottlenecks actually are. Would you like to explore that further?", [
                    "Book Growth Discovery Call",
                    "See How GreenScale Works",
                    "Ask a Specific Question"
                ]);
                break;

            case 5:
                if (option === "Ask a Specific Question") {
                    flowLocked = false;
                    input.disabled = false;
                    currentFlow = null;
                    currentStep = 0;
                    branch = null;
                    botReply("Sure! What would you like to know about DevXCloud or our solutions?");
                } else if (option === "Book Growth Discovery Call") {
                    startFormFlow('discovery');
                } else {
                    resetChat();
                    window.location.assign("/greenscale-ai");
                }
                break;
        }
    }

    // =========================
    // FLOW B — General Business Flow
    // =========================
    function flowB(option = null) {

        switch (currentStep) {

            case 1:
                let b1Msg = "Thanks for that. To help point you in the right direction, what feels the most frustrating or unclear about your growth right now?";
                if (option === "Just exploring") {
                    b1Msg = "No problem at all. To help point you in the right direction, what best describes where you are right now?";
                }
                botReply(b1Msg, [
                    "Getting consistent sales",
                    "Ads or marketing not performing",
                    "Low repeat customers",
                    "Not sure what's wrong",
                    "Just exploring"
                ]);
                break;

            case 2:
                botReply("When things do work for a moment, does the growth actually hold or does it fade again?", [
                    "It fades again",
                    "Feels unpredictable",
                    "Never really stabilizes"
                ]);
                break;

            case 3:
                botReply("Do you already have a website live right now, or are you still setting things up?", [
                    "Yes, it's live",
                    "Not yet"
                ]);
                break;

            case 4:
                if (option === "Yes, it's live") {
                    botReply(
                        "That gives us something real to work with. Many businesses reach a point where more activity doesn't create more results. That usually means a system issue, not a channel issue.\n\nWe can help identify what's actually holding things back — and what to fix first so growth becomes more consistent.", [
                        "Book Growth Discovery Call",
                        "Explore Growth Systems",
                        "Ask a Specific Question"
                    ]);
                } else {
                    botReply(
                        "That is actually a good position to be in. Getting the foundation right early makes everything easier later. Many businesses spend more fixing problems that could have been avoided with better setup.\n\nWe can walk through what you need and help you build the right foundation.", [
                        "Book Growth Discovery Call",
                        "Explore Growth Systems",
                        "Ask a Specific Question"
                    ]);
                }
                break;

            case 5:
                if (option === "Ask a Specific Question") {
                    flowLocked = false;
                    input.disabled = false;
                    currentFlow = null;
                    currentStep = 0;
                    branch = null;
                    botReply("Sure! What would you like to know about DevXCloud or our solutions?");
                } else if (option === "Book Growth Discovery Call") {
                    startFormFlow('discovery');
                } else {
                    resetChat();
                    window.location.assign("/about");
                }
                break;
        }
    }

    let chatBody = document.getElementById('chat-body');
    chatBody.addEventListener('scroll', function () {
        if (chatBody.scrollTop < 50) {
            loadMoreHistory();
        }
    });

    let savedChat;
    try { savedChat = JSON.parse(localStorage.getItem(STORAGE_KEY)); } catch(e) {}

    const autoOpen = savedChat?.chatOpen || new URLSearchParams(window.location.search).has('chat');
    if (autoOpen) {
        chatbox.classList.add('active');
        if (new URLSearchParams(window.location.search).has('chat')) {
            history.replaceState(null, '', window.location.pathname);
        }
        loadChatContent();
    }

});
</script>