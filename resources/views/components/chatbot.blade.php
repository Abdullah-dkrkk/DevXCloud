<!-- Chat Toggle -->
<div id="chat-toggle" class="chat-toggle-btn">
    <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="2">
        <path d="M21 15a4 4 0 0 1-4 4H7l-4 4V5a4 4 0 0 1 4-4h10a4 4 0 0 1 4 4z"/>
    </svg>
</div>

<!-- Chatbox -->
<div id="chatbox" class="chatbox">

    <div class="chat-header d-flex justify-content-between align-items-center">
        <span><b>SUPPORT CHAT</b></span>
        <button id="closeChat" class="btn-close custom-close"></button>
    </div>

    <div id="chat-body" class="chat-body">
        <div id="faq-list">
            <button class="faq-btn">What services do you offer?</button>
            <button class="faq-btn">How can I get a quote?</button>
            <button class="faq-btn">Do you build custom web apps?</button>
        </div>
    </div>

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
    width: 55px;
    height: 55px;
    border-radius: 50%;
    display:flex;
    align-items:center;
    justify-content:center;
    cursor: pointer;
    z-index: 10000;
}

/* CHATBOX */
.chatbox {
    position: fixed;
    bottom: 90px;
    right: 20px;
    width: 400px; /* increased */
    max-width: calc(100vw - 40px); /* responsive fix */
    height: 520px;
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
    background: #e9eef5;
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
    line-height: 1.4;
    overflow: visible;
}

/* USER */
.user .chat-bubble {
    background: var(--theme-light-primary);
    color: #fff;
    border-bottom-right-radius: 6px;
}

/* BOT */
.bot .chat-bubble {
    background: #f1f3f5;
    color: var(--theme-dark);
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
    background: var(--theme-light-primary);
    clip-path: path("M0 0 C8 0, 14 6, 14 14 L0 14 Z");
}

.bot .chat-bubble::before {
    content: "";
    position: absolute;
    left: -7px;
    bottom: 0px;
    width: 14px;
    height: 14px;
    background: #f1f3f5;
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
    width: 100%;
    text-align: left;
    padding: 10px;
    margin-bottom: 8px;
    border-radius: 8px;
    border: 1px solid #ddd;
    background: #fff;
    font-size: 13px;
    transition: background-color 0.22s ease, color 0.22s ease, border-color 0.22s ease, transform 0.18s ease, box-shadow 0.22s ease;
}

.faq-btn:hover {
    background: var(--theme-light-primary);
    color: #fff;
    border-color: var(--theme-light-primary);
    box-shadow: 0 6px 14px rgba(1,118,211,0.16);
}

/* MOBILE RESPONSIVE */
@media (max-width: 576px) {
    .chatbox {
        right: 0px;
        left: 10px;
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
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const toggleBtn = document.getElementById('chat-toggle');
    const chatbox = document.getElementById('chatbox');
    const closeBtn = document.getElementById('closeChat');
    const input = document.getElementById('message');

    // TOGGLE OPEN / CLOSE
    toggleBtn.onclick = function () {
        if (chatbox.style.display === 'flex') {
            chatbox.style.display = 'none';
        } else {
            chatbox.style.display = 'flex';
        }
    };

    // CLOSE BUTTON
    closeBtn.onclick = function () {
        chatbox.style.display = 'none';
    };

    // FAQ CLICK
    document.querySelectorAll('.faq-btn').forEach(btn => {
        btn.addEventListener('click', function () {
            sendMessage(this.innerText);
        });
    });

    // ✅ ENTER KEY SEND
    input.addEventListener('keydown', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            sendMessage();
        }
    });

});

// SEND MESSAGE (UNCHANGED)
function sendMessage(customMsg = null) {

    let input = document.getElementById('message');
    let message = customMsg || input.value;

    if (!message) return;

    let chatBody = document.getElementById('chat-body');

    let faq = document.getElementById('faq-list');
    if (faq) faq.remove();

    chatBody.innerHTML += `
    <div class="message-row user">
        <div class="chat-bubble">${message}</div>
        <div class="msg-icon">👤</div>
    </div>
    `;

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
        chatBody.innerHTML += `
        <div class="message-row bot">
            <div class="msg-icon">🤖</div>
            <div class="chat-bubble">${data.reply}</div>
        </div>
        `;
        chatBody.scrollTop = chatBody.scrollHeight;
    });

    input.value = '';
}
</script>