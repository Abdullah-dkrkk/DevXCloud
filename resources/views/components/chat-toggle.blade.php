<button id="chat-toggle" class="chat-toggle-btn" aria-label="Toggle chat" aria-expanded="false">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 60 60" class="chat-toggle-icon">
        <path d="M41.216 29.026c0 3.576-.895 5.847-2.647 7.268l-.066.052c-.213.173-.448.362-.6.559a1.958 1.958 0 0 0-.311.562c-.086.233-.117.494-.144.719l-.008.062-.303 2.48c-.063.516-.102.834-.151 1.06a1.595 1.595 0 0 1-.04.151.091.091 0 0 1-.015.006 1.42 1.42 0 0 1-.137-.076 14.087 14.087 0 0 1-.868-.626l-2.98-2.244-.041-.03a3.046 3.046 0 0 0-.53-.343 2.061 2.061 0 0 0-.554-.17 3.13 3.13 0 0 0-.648-.016l-.054.002c-.496.023-1.014.034-1.553.034-4.41 0-7.28-.758-9.048-2.22-1.721-1.421-2.602-3.683-2.602-7.23 0-3.546.88-5.808 2.602-7.23 1.769-1.46 4.639-2.22 9.048-2.22 4.41 0 7.28.76 9.048 2.22 1.721 1.422 2.602 3.684 2.602 7.23Z" stroke="#fff" stroke-width="2" class="line-path"></path>
    </svg>
</button>

<div id="chat-panel" class="chat-panel" role="dialog" aria-label="Chat with DevXCloud Growth Advisor" aria-hidden="true" aria-modal="true">
    <div class="chat-panel__header">
        <div>
            <div class="chat-panel__title">DevXCloud Growth Advisor</div>
            <div class="chat-panel__subtitle"><i>How can we help you grow?</i></div>
        </div>
        <button id="chat-panel-close" class="chat-panel__close-btn" aria-label="Close chat">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
                <line x1="18" y1="6" x2="6" y2="18"/>
                <line x1="6" y1="6" x2="18" y2="18"/>
            </svg>
        </button>
    </div>

    <div id="chat-panel-body" class="chat-panel__body">
        <div id="chat-panel-empty" class="chat-panel__empty">
                        <svg class="chat-panel__empty-icon" width="54" height="54" viewBox="15 18 30 28" fill="none" stroke="#000" stroke-width="1.5">
                <path d="M41.216 29.026c0 3.576-.895 5.847-2.647 7.268l-.066.052c-.213.173-.448.362-.6.559a1.958 1.958 0 0 0-.311.562c-.086.233-.117.494-.144.719l-.008.062-.303 2.48c-.063.516-.102.834-.151 1.06a1.595 1.595 0 0 1-.04.151.091.091 0 0 1-.015.006 1.42 1.42 0 0 1-.137-.076 14.087 14.087 0 0 1-.868-.626l-2.98-2.244-.041-.03a3.046 3.046 0 0 0-.53-.343 2.061 2.061 0 0 0-.554-.17 3.13 3.13 0 0 0-.648-.016l-.054.002c-.496.023-1.014.034-1.553.034-4.41 0-7.28-.758-9.048-2.22-1.721-1.421-2.602-3.683-2.602-7.23 0-3.546.88-5.808 2.602-7.23 1.769-1.46 4.639-2.22 9.048-2.22 4.41 0 7.28.76 9.048 2.22 1.721 1.422 2.602 3.684 2.602 7.23Z"/>
            </svg>
            <p class="chat-panel__empty-title">Start a conversation</p>
            <p class="chat-panel__empty-text">Your Growth Advisor is ready to assist.</p>
        </div>
    </div>

    <div class="chat-panel__footer">
        <div class="chat-panel__input-wrapper">
            <input type="text" id="chat-panel-input" class="chat-panel__input" placeholder="Type your message..." aria-label="Type your message">
            <button id="chat-panel-send" class="chat-panel__send-btn" aria-label="Send message">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="5" y1="12" x2="19" y2="12"/>
                    <polyline points="12 5 19 12 12 19"/>
                </svg>
            </button>
        </div>
    </div>
</div>

<style>
.chat-msg {
    display: flex;
    gap: 8px;
    max-width: 92%;
    margin-bottom: 12px;
    font-size: 13px;
    line-height: 1.5;
    word-wrap: break-word;
    flex-shrink: 0;
    align-items: flex-end;
    opacity: 0;
    transform: translateY(15px);
    transition: all 0.3s ease;
}

.chat-msg.show {
    opacity: 1;
    transform: translateY(0);
}

.chat-msg--user {
    align-self: flex-end;
    flex-direction: row-reverse;
}

.chat-msg--bot {
    align-self: flex-start;
}

.chat-msg__avatar {
    width: 34px;
    height: 34px;
    border-radius: 50%;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
}

.chat-msg__avatar--user {
    background: #0176D3;
    color: #fff;
}

.chat-msg__avatar--bot {
    background: #fff;
    color: #000;
    border: 1.5px solid #e0e4e8;
}

.chat-msg__bubble {
    padding: 10px 14px;
    max-width: calc(100% - 42px);
    min-width: 60px;
}

.chat-msg--user .chat-msg__bubble {
    background: #0176D3;
    color: #fff;
    border-radius: 18px 18px 4px 18px;
}

.chat-msg--bot .chat-msg__bubble {
    background: #fff;
    color: #1a2a3a;
    border-radius: 18px 18px 18px 4px;
    box-shadow: 0 1px 4px rgba(0,0,0,0.06);
}

.chat-msg__options {
    display: flex;
    flex-wrap: wrap;
    gap: 6px;
    margin-top: 8px;
    width: 100%;
}

.chat-msg__option-btn {
    background: #fff;
    border: 1.5px solid #0176D3;
    color: #0176D3;
    border-radius: 100px;
    padding: 6px 14px;
    font-size: 12px;
    font-family: 'Montserrat', sans-serif;
    font-weight: 500;
    cursor: pointer;
    text-align: start;
    white-space: nowrap;
    transition: background 0.2s ease, color 0.2s ease, opacity 0.25s ease, transform 0.25s ease;
    opacity: 0;
    transform: translateY(10px);
}

.chat-msg__option-btn.show {
    opacity: 1;
    transform: translateY(0);
}

.chat-msg__option-btn:hover {
    background: #0176D3;
    color: #fff;
}

.chat-typing {
    display: flex;
    align-items: center;
    gap: 4px;
    padding: 10px 14px;
}

.chat-typing__dot {
    width: 7px;
    height: 7px;
    background: #b8c8dc;
    border-radius: 50%;
    animation: chat-bounce 1.4s ease-in-out infinite;
}

.chat-typing__dot:nth-child(2) { animation-delay: 0.2s; }
.chat-typing__dot:nth-child(3) { animation-delay: 0.4s; }

@keyframes chat-bounce {
    0%, 80%, 100% { transform: scale(0.6); opacity: 0.4; }
    40% { transform: scale(1); opacity: 1; }
}

@keyframes chat-spin {
    to { transform: rotate(360deg); }
}

.btn-spinner {
    display: inline-block;
    width: 14px;
    height: 14px;
    border: 2px solid rgba(255,255,255,0.3);
    border-top-color: #fff;
    border-radius: 50%;
    animation: chat-spin 0.6s linear infinite;
    margin-right: 6px;
    vertical-align: middle;
}

.chat-starter-questions {
    margin-top: 8px;
    display: flex;
    flex-direction: column;
    gap: 6px;
    width: 100%;
    max-width: 260px;
    align-self: center;
}

.chat-starter-question {
    background: #fff;
    border: 1.5px solid #e0e4e8;
    border-radius: 100px;
    padding: 8px 16px;
    font-size: 12px;
    font-family: 'Montserrat', sans-serif;
    color: #1a2a3a;
    cursor: pointer;
    text-align: center;
    transition: border-color 0.2s ease, background 0.2s ease, opacity 0.25s ease, transform 0.25s ease;
    opacity: 0;
    transform: translateY(10px);
}

.chat-starter-question.show {
    opacity: 1;
    transform: translateY(0);
}

.chat-starter-question:hover {
    border-color: #0176D3;
    background: #f0f7ff;
}



.chat-toggle-btn {
    position: fixed;
    bottom: 24px;
    right: 24px;
    z-index: 99999;
    width: 52px;
    height: 52px;
    padding: 0;
    border: none;
    border-radius: 50%;
    background: #0176D3;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 16px rgba(1, 118, 211, 0.35);
    transition: background 0.2s ease, transform 0.2s ease, box-shadow 0.2s ease;
    outline: none;
}

.chat-toggle-btn:hover {
    background: #026bbd;
    transform: scale(1.06);
    box-shadow: 0 6px 24px rgba(1, 118, 211, 0.45);
}

.chat-toggle-btn:focus-visible {
    outline: 3px solid rgba(1, 118, 211, 0.5);
    outline-offset: 3px;
}

.chat-toggle-icon {
    width: 44px;
    height: 44px;
    display: block;
    transition: transform 0.2s ease;
}

.chat-toggle-btn:hover .chat-toggle-icon {
    transform: scale(1.04);
}

@media (prefers-reduced-motion: reduce) {
    .chat-toggle-btn:hover { transform: none; }
    .chat-toggle-icon { transition: none; }
}

.chat-panel {
    position: fixed;
    bottom: calc(24px + 52px + 16px);
    right: 24px;
    width: 420px;
    height: 600px;
    max-height: calc(100vh - 120px);
    z-index: 99999;
    background: #fff;
    font-family: 'Montserrat', sans-serif;
    border-radius: 14px;
    box-shadow: 0 16px 56px rgba(0, 0, 0, 0.16), 0 4px 20px rgba(0, 0, 0, 0.06);
    display: flex;
    flex-direction: column;
    overflow: hidden;
    opacity: 0;
    transform: translateY(40px);
    visibility: hidden;
    pointer-events: none;
    transition: opacity 0.3s ease, transform 0.3s ease, visibility 0.3s ease;
}

.chat-panel--open {
    opacity: 1;
    transform: translateY(0);
    visibility: visible;
    pointer-events: all;
}

.chat-panel__header {
    position: relative;
    background: #0176D3;
    padding: 22px 18px 28px;
    color: #fff;
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    flex-shrink: 0;
    z-index: 1;
}

.chat-panel__header::after {
    content: '';
    position: absolute;
    bottom: -12px;
    left: 0;
    right: 0;
    height: 28px;
    background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 420 28' preserveAspectRatio='none'%3E%3Cpath d='M0,0 Q210,28 420,0 L420,28 L0,28 Z' fill='%23f5f7fa'/%3E%3C/svg%3E") no-repeat;
    background-size: 100% 100%;
    pointer-events: none;
}

.chat-panel__title {
    font-size: 15px;
    font-weight: 700;
    line-height: 1.3;
    letter-spacing: -0.01em;
    font-family: 'Montserrat', sans-serif;
}

.chat-panel__subtitle {
    font-size: 12px;
    font-weight: 400;
    opacity: 0.88;
    margin-top: 3px;
    line-height: 1.4;
}

.chat-panel__close-btn {
    background: rgba(255, 255, 255, 0.25);
    border: none;
    border-radius: 50%;
    color: #fff;
    width: 28px;
    height: 28px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    flex-shrink: 0;
    margin-left: 12px;
    margin-top: 1px;
    transition: background 0.2s ease, transform 0.2s ease;
}


.chat-panel__body {
    flex: 1;
    background: #f5f7fa;
    overflow-y: auto;
    padding: 12px 18px 24px;
    display: flex;
    flex-direction: column;
    align-items: stretch;
    justify-content: center;
}

.chat-panel__body--has-messages {
    justify-content: flex-start;
}

.chat-panel__body::-webkit-scrollbar {
    width: 4px;
}

.chat-panel__body::-webkit-scrollbar-track {
    background: transparent;
}

.chat-panel__body::-webkit-scrollbar-thumb {
    background: #d0d8e0;
    border-radius: 4px;
}

.chat-panel__empty {
    text-align: center;
    max-width: 220px;
    align-self: center;
}

.chat-panel__empty-icon {
    display: block;
    margin: 0 auto;
    opacity: 0.4;
}

.chat-panel__empty-title {
    font-size: 15px;
    font-weight: 600;
    color: #2c3e50;
    margin: 8px 0 0;
    letter-spacing: -0.01em;
    font-family: 'Montserrat', sans-serif;
}

.chat-panel__empty-text {
    font-size: 11px;
    color: #000;
    line-height: 1.5;
    margin: 6px 0 0;
    white-space: nowrap;
}

.chat-panel__footer {
    background: #fff;
    border-top: 1px solid #e8ecf0;
    padding: 10px 14px;
    flex-shrink: 0;
}

.chat-panel__input-wrapper {
    display: flex;
    gap: 8px;
    align-items: center;
}

.chat-panel__input {
    flex: 1;
    border: none;
    border-radius: 8px;
    padding: 9px 14px;
    font-size: 13px;
    font-family: inherit;
    outline: none;
    color: #1a2a3a;
    background: transparent;
    transition: border-color 0.2s ease;
}

.chat-panel__input::placeholder {
    color: #a0b0be;
    font-size: 13px;
}

.chat-panel__input:focus {
    border-color: #0176D3;
    background: #fff;
}

.chat-panel__send-btn {
    width: 36px;
    height: 36px;
    border-radius: 100px;
    background: #0176D3;
    border: none;
    color: #fff;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    transition: background 0.2s ease, transform 0.2s ease;
}


.chat-panel__send-btn:active {
    transform: scale(0.95);
}

@media (max-width: 480px) {
    .chat-panel {
        width: calc(100vw - 32px);
        right: 16px;
        bottom: calc(16px + 52px + 12px);
        height: 540px;
        max-height: calc(100vh - 96px);
        border-radius: 12px;
    }
    .chat-toggle-btn {
        bottom: 16px;
        right: 16px;
    }
}

@media (prefers-reduced-motion: reduce) {
    .chat-panel { transition: none; }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    'use strict';

    var toggleBtn = document.getElementById('chat-toggle');
    var chatPanel = document.getElementById('chat-panel');
    var closeBtn = document.getElementById('chat-panel-close');
    var body = document.getElementById('chat-panel-body');
    var input = document.getElementById('chat-panel-input');
    var sendBtn = document.getElementById('chat-panel-send');
    var emptyState = document.getElementById('chat-panel-empty');

    var flowStarted = false;
    var flowLocked = false;
    var currentFlow = null;
    var currentStep = 0;
    var branch = null;
    var typingStartTime = 0;

    if (!toggleBtn || !chatPanel || !body) return;

    function openPanel() {
        chatPanel.classList.add('chat-panel--open');
        chatPanel.setAttribute('aria-hidden', 'false');
        toggleBtn.setAttribute('aria-expanded', 'true');
        if (body.children.length === 0 || (emptyState && body.children.length === 1 && body.contains(emptyState))) {
            loadChatContent();
        }
        if (input) {
            setTimeout(function() { input.focus(); }, 350);
        }
    }

    function closePanel() {
        chatPanel.classList.remove('chat-panel--open');
        chatPanel.setAttribute('aria-hidden', 'true');
        toggleBtn.setAttribute('aria-expanded', 'false');
        toggleBtn.focus();
    }

    function togglePanel() {
        if (chatPanel.classList.contains('chat-panel--open')) {
            closePanel();
        } else {
            openPanel();
        }
    }

    function loadChatContent() {
        if (!flowStarted) {
            flowStarted = true;
            if (emptyState) emptyState.style.display = 'none';
            setTimeout(function() {
                botReply("Hey \u2014 quick question so I don\u2019t point you in the wrong direction\u2026 what kind of business are you running?", [
                    "E-commerce",
                    "SaaS",
                    "Startup / Founder",
                    "Vegan Meal Kit",
                    "Established Business",
                    "Exploring Options"
                ]);
            }, 400);
        }
    }

    var USER_ICON = '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21c0-3.3-2.7-6-6-6h-4c-3.3 0-6 2.7-6 6"/><circle cx="12" cy="8" r="4"/></svg>';
    var BOT_ICON = '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2v2"/><rect x="4" y="6" width="16" height="12" rx="2"/><circle cx="9" cy="11" r="1"/><circle cx="15" cy="11" r="1"/><path d="M9 16c1.5.7 3 .7 4.5 0"/></svg>';


    function validateField(field) {
        var errorEl = field._errorEl;
        var val = field.value.trim();
        var label = field.getAttribute('data-label') || field.placeholder || 'This field';
        var error = '';
        if (field.hasAttribute('required') && !val) {
            error = label + ' is required';
        } else if (field.type === 'email' && val && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(val)) {
            error = 'Please enter a valid email address';
        }
        if (error) {
            field.style.borderColor = '#e74c3c';
            field.style.backgroundColor = '#fff6f6';
            if (!errorEl) {
                errorEl = document.createElement('div');
                errorEl.className = 'field-error';
                var mt = field.tagName === 'TEXTAREA' ? '-4px' : '0px';
                errorEl.style.cssText = 'color:#e74c3c;font-size:11px;margin-top:' + mt + ';margin-bottom:10px;line-height:1.3';
                field.insertAdjacentElement('afterend', errorEl);
                field._errorEl = errorEl;
            }
            errorEl.textContent = error;
            return false;
        } else {
            field.style.borderColor = '#d0d8e0';
            field.style.backgroundColor = '';
            if (errorEl) {
                errorEl.remove();
                field._errorEl = null;
            }
            return true;
        }
    }

    function setupFormValidation(formId, fieldIds) {
        fieldIds.forEach(function(id) {
            var el = document.getElementById(formId + '-' + id);
            if (!el) return;
            el.addEventListener('blur', function() { validateField(el); });
            el.addEventListener('keydown', function(e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    var submitBtn = document.getElementById(formId + '-submit');
                    if (submitBtn && !submitBtn.disabled) {
                        if (formId === 'gf') submitGuidanceForm();
                        else submitDiscoveryForm();
                    }
                }
            });
        });
    }

    function botReply(text, options) {
        var elapsed = Date.now() - typingStartTime;
        var delay = Math.max(0, 500 - elapsed);
        if (delay > 0) {
            setTimeout(function() {
                hideTyping();
                addMessage('bot', text, options);
            }, delay);
        } else {
            hideTyping();
            addMessage('bot', text, options);
        }
    }

    function addMessage(type, text, options) {
        if (emptyState) emptyState.style.display = 'none';
        var starters = body.querySelector('.chat-starter-questions');
        if (starters) starters.remove();
        var oldBtns = body.querySelectorAll('.chat-msg__option-btn');
        for (var i = 0; i < oldBtns.length; i++) {
            oldBtns[i].disabled = true;
            oldBtns[i].style.pointerEvents = 'none';
            oldBtns[i].style.opacity = '0.35';
        }
        var msg = document.createElement('div');
        msg.className = 'chat-msg chat-msg--' + type;

        var avatar = document.createElement('div');
        avatar.className = 'chat-msg__avatar chat-msg__avatar--' + type;
        avatar.innerHTML = type === 'user' ? USER_ICON : BOT_ICON;
        msg.appendChild(avatar);

        var bubble = document.createElement('div');
        bubble.className = 'chat-msg__bubble';
        bubble.textContent = text;
        msg.appendChild(bubble);

        if (options && options.length > 0) {
            var optionsDiv = document.createElement('div');
            optionsDiv.className = 'chat-msg__options';
            options.forEach(function(opt, i) {
                var btn = document.createElement('button');
                btn.className = 'chat-msg__option-btn';
                btn.textContent = opt;
                btn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    handleOption(opt);
                });
                optionsDiv.appendChild(btn);
                setTimeout(function() { btn.classList.add('show'); }, 200 + i * 120);
            });
            bubble.appendChild(optionsDiv);
        }

        body.appendChild(msg);
        body.classList.add('chat-panel__body--has-messages');
        setTimeout(function() { msg.classList.add('show'); }, 50);
        body.scrollTop = body.scrollHeight;
    }

    function clearMessages() {
        var msgs = body.querySelectorAll('.chat-msg, .chat-typing, .chat-starter-questions');
        msgs.forEach(function(el) { el.remove(); });
    }

    function unlockInput() {
        flowLocked = false;
        currentFlow = null;
        currentStep = 0;
        branch = null;
        input.disabled = false;
        input.focus();
    }

    function handleOption(option) {
        addMessage('user', option);
        showTyping();
        typingStartTime = Date.now();
        flowLocked = true;
        input.disabled = true;

        setTimeout(function() {
            if (option === "Get Personalized Guidance") { showGuidanceForm(); return; }
            if (option === "Book Discovery Call") { showDiscoveryForm(); return; }
            if (option === "Explore Services") { exploreServices(); return; }
            if (option === "Talk to an Agent") { escalateToAgent(); return; }
            if (option === "Ask a Specific Question") { unlockInput(); botReply("Please feel free to ask me anything about DevXCloud."); return; }

            if (currentFlow === null) {
                if (option === "Vegan Meal Kit") {
                    currentFlow = "A";
                    currentStep = 1;
                    flowA();
                } else {
                    currentFlow = "B";
                    currentStep = 1;
                    flowB(option);
                }
            } else {
                currentStep++;
                if (currentFlow === "A") flowA(option);
                else flowB(option);
            }
        }, 200);
    }

    function flowA(option) {
        if (currentStep === 1) {
            botReply("Got it. Meal-kit businesses usually struggle in one of three areas: attracting customers, keeping customers, or managing operations as demand grows. Which feels most familiar right now?", [
                "Getting consistent customers",
                "Customers are not staying long enough",
                "Operations harder as orders grow",
                "Not sure yet"
            ]);
        } else if (currentStep === 2) {
            branch = option;
            if (option === "Getting consistent customers") {
                botReply("What feels like the biggest challenge?", [
                    "Not enough traffic",
                    "Traffic isn't converting",
                    "Marketing feels inconsistent",
                    "Not sure"
                ]);
            } else if (option === "Customers are not staying long enough") {
                botReply("What is happening most often?", [
                    "Customers order once and leave",
                    "Subscription cancellations are high",
                    "Repeat purchases are low",
                    "Not sure"
                ]);
            } else if (option === "Operations harder as orders grow") {
                botReply("When orders increase, what usually happens next?", [
                    "Fulfillment becomes stressful",
                    "Inventory planning gets harder",
                    "Profitability becomes unpredictable",
                    "Not sure"
                ]);
            } else {
                currentStep = 3;
                showUnderstoodThenStage();
            }
        } else if (currentStep === 3) {
            showUnderstoodThenStage();
        } else if (currentStep === 4) {
            showStageResponse(option);
        } else {
            handleEndOption(option);
        }
    }

    function showUnderstoodThenStage() {
        botReply("Understood. That usually means growth is creating pressure instead of stability. Many meal-kit businesses reach a point where more activity does not automatically create better results. That is exactly the type of challenge GreenScale Formula was designed to address.\n\nWhat stage is your business currently at?", [
            "Idea Stage",
            "Website In Progress",
            "Already Selling",
            "Growing But Stuck"
        ]);
    }

    function showStageResponse(option) {
        var stageMsg = "";
        if (option === "Idea Stage") {
            stageMsg = "You are early enough to avoid many of the mistakes that become expensive later. The right systems from the beginning can save significant time and resources as you grow.";
        } else if (option === "Website In Progress") {
            stageMsg = "This is usually the best time to build growth systems because your foundation is still flexible.";
        } else if (option === "Already Selling") {
            stageMsg = "You already have real customer data, which makes it easier to identify where growth opportunities exist.";
        } else {
            stageMsg = "This is often where small bottlenecks create the biggest limitations on growth.";
        }
        currentStep = 6;
        botReply(stageMsg + "\n\nBased on what you shared, the next step is understanding where your biggest growth opportunities and bottlenecks actually are. Would you like to explore that further?", [
            "Book Growth Discovery Call",
            "See How GreenScale Works",
            "Ask a Specific Question"
        ]);
    }

    function flowAStage() {
        currentStep = 3;
        showUnderstoodThenStage();
    }

    function flowB(option) {
        if (currentStep === 1) {
            var msg = "Thanks for that. To help point you in the right direction, what feels the most frustrating or unclear about your growth right now?";
            var opts = [
                "Getting consistent sales",
                "Ads or marketing not performing",
                "Low repeat customers",
                "Not sure what's wrong"
            ];
            if (option === "Exploring Options") {
                msg = "No problem at all. To help point you in the right direction, what best describes where you are right now?";
                opts = [
                    "Getting consistent sales",
                    "Ads or marketing not performing",
                    "Low repeat customers",
                    "Not sure what's wrong",
                    "Exploring Options"
                ];
            }
            botReply(msg, opts);
        } else if (currentStep === 2) {
            botReply("When things do work for a moment, does the growth actually hold or does it fade again?", [
                "It fades again",
                "Feels unpredictable",
                "Never really stabilizes"
            ]);
        } else if (currentStep === 3) {
            botReply("Do you already have a website live right now, or are you still setting things up?", [
                "Yes, it's live",
                "Not yet"
            ]);
        } else if (currentStep === 4) {
            if (option === "Yes, it's live") {
                botReply("That gives us something real to work with. Based on what you shared, you might benefit from a quick growth discovery call.", [
                    "Book Growth Discovery Call",
                    "Explore Growth Systems",
                    "Ask a Specific Question"
                ]);
            } else {
                botReply("That is actually a good position to be in\u2014you can build the right foundation from the start. Would you like to explore how?", [
                    "Book Growth Discovery Call",
                    "Explore Growth Systems",
                    "Ask a Specific Question"
                ]);
            }
        } else {
            handleEndOption(option);
        }
    }

    function handleEndOption(option) {
        if (option === "Book Growth Discovery Call") {
            showDiscoveryForm();
        } else if (option === "See How GreenScale Works") {
            window.location.href = "/greenscale-ai";
        } else if (option === "Explore Growth Systems") {
            exploreServices();
        } else if (option === "Ask a Specific Question") {
            unlockInput();
            botReply("Please feel free to ask me anything about DevXCloud.");
        }
    }

    function showGuidanceForm() {
        var elapsed = Date.now() - typingStartTime;
        var delay = Math.max(0, 500 - elapsed);
        setTimeout(function() {
            hideTyping();
            flowLocked = true;
            input.disabled = true;
            var formHtml = '<div style="font-weight:600;font-size:13px;margin-bottom:4px">Get Personalized Guidance</div>';
            formHtml += '<div style="font-size:12px;color:#5a6a7a;margin-bottom:10px;line-height:1.4">To provide more specific guidance, please share a few details about your business and what you need help with.</div>';
            formHtml += '<input type="text" id="gf-name" data-label="Name" placeholder="Name" required style="width:100%;padding:8px;border:1px solid #d0d8e0;border-radius:6px;margin-bottom:6px;font-size:12px;font-family:inherit;box-sizing:border-box">';
            formHtml += '<input type="email" id="gf-email" data-label="Email Address" placeholder="Email Address" required style="width:100%;padding:8px;border:1px solid #d0d8e0;border-radius:6px;margin-bottom:6px;font-size:12px;font-family:inherit;box-sizing:border-box">';
            formHtml += '<input type="text" id="gf-btype" data-label="Business Type" placeholder="Business Type" required style="width:100%;padding:8px;border:1px solid #d0d8e0;border-radius:6px;margin-bottom:6px;font-size:12px;font-family:inherit;box-sizing:border-box">';
            formHtml += '<textarea id="gf-question" data-label="Question" placeholder="Question" required style="width:100%;padding:8px;border:1px solid #d0d8e0;border-radius:6px;margin-bottom:6px;font-size:12px;font-family:inherit;resize:none;box-sizing:border-box;min-height:50px"></textarea>';
            formHtml += '<button id="gf-submit" style="width:100%;padding:8px;margin-bottom:14px;background:#0176D3;color:#fff;border:none;border-radius:6px;font-size:12px;font-family:inherit;font-weight:600;cursor:pointer">Submit</button>';

            var bubble = document.createElement('div');
            bubble.id = 'gf-form-bubble';
            bubble.className = 'chat-msg__bubble';
            bubble.style.background = '#fff';
            bubble.style.borderRadius = '18px 18px 18px 4px';
            bubble.style.boxShadow = '0 1px 4px rgba(0,0,0,0.06)';
            bubble.innerHTML = formHtml;

            var msg = document.createElement('div');
            msg.className = 'chat-msg chat-msg--bot';
            var av = document.createElement('div');
            av.className = 'chat-msg__avatar chat-msg__avatar--bot';
            av.innerHTML = BOT_ICON;
            msg.appendChild(av);
            msg.appendChild(bubble);
            body.appendChild(msg);
            body.classList.add('chat-panel__body--has-messages');
            setTimeout(function() { msg.classList.add('show'); }, 50);
            body.scrollTop = body.scrollHeight;

            document.getElementById('gf-submit').addEventListener('click', function(e) { e.stopPropagation(); submitGuidanceForm(); });
            setupFormValidation('gf', ['name', 'email', 'btype', 'question']);
            setTimeout(function() { document.getElementById('gf-name').focus(); }, 100);
        }, delay);
    }

    function submitGuidanceForm() {
        var nameEl = document.getElementById('gf-name');
        var emailEl = document.getElementById('gf-email');
        var btypeEl = document.getElementById('gf-btype');
        var questionEl = document.getElementById('gf-question');
        if (!nameEl || !emailEl) return;

        var valid = true;
        [nameEl, emailEl, btypeEl, questionEl].forEach(function(el) {
            if (el && !validateField(el)) valid = false;
        });
        if (!valid) {
            var firstInvalid = document.querySelector('#gf-form-bubble input:invalid, #gf-form-bubble textarea:invalid');
            if (firstInvalid) firstInvalid.focus();
            return;
        }

        var name = nameEl.value.trim();
        var email = emailEl.value.trim();
        var btype = btypeEl ? btypeEl.value.trim() : '';
        var question = questionEl ? questionEl.value.trim() : '';

        var submitBtn = document.getElementById('gf-submit');
        if (submitBtn) {
            submitBtn.disabled = true;
            submitBtn.style.background = '#95b8d9';
            submitBtn.style.cursor = 'default';
            submitBtn.innerHTML = '<span class="btn-spinner"></span>Submitting...';
        }

        var formData = new FormData();
        formData.append('name', name);
        formData.append('email', email);
        formData.append('type', 'guidance');
        formData.append('form_data[business_type]', btype);
        formData.append('form_data[question]', question);

        fetch('/chat/submit-form', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json',
            },
            body: formData
        })
        .then(function(res) { return res.json(); })
        .then(function(data) {
            var bubble = document.getElementById('gf-form-bubble');
            if (bubble) {
                bubble.innerHTML = '<div style="font-size:13px;line-height:1.5;color:#1a2a3a;padding:4px 0">Thanks for submitting your details! One of our human agents will get in touch with you for your personalized guidance.</div>';
            }
            addMessage('user', "Guidance: " + name + " (" + email + ")");
            flowLocked = false;
            input.disabled = false;
        })
        .catch(function() {
            var submitBtn = document.getElementById('gf-submit');
            if (submitBtn) {
                submitBtn.disabled = false;
                submitBtn.style.background = '#0176D3';
                submitBtn.style.cursor = 'pointer';
                submitBtn.innerHTML = 'Submit';
            }
            botReply("Something went wrong. Please try again.");
        });
    }

    function showDiscoveryForm() {
        var elapsed = Date.now() - typingStartTime;
        var delay = Math.max(0, 500 - elapsed);
        setTimeout(function() {
            hideTyping();
            flowLocked = true;
            input.disabled = true;
            var formHtml = '<div style="font-weight:600;font-size:13px;margin-bottom:4px">Book Discovery Call</div>';
            formHtml += '<div style="font-size:12px;color:#5a6a7a;margin-bottom:10px;line-height:1.4">Before booking, please share a few details so the call is more useful.</div>';
            formHtml += '<input type="text" id="df-name" data-label="Name" placeholder="Name" required style="width:100%;padding:8px;border:1px solid #d0d8e0;border-radius:6px;margin-bottom:6px;font-size:12px;font-family:inherit;box-sizing:border-box">';
            formHtml += '<input type="email" id="df-email" data-label="Email Address" placeholder="Email Address" required style="width:100%;padding:8px;border:1px solid #d0d8e0;border-radius:6px;margin-bottom:6px;font-size:12px;font-family:inherit;box-sizing:border-box">';
            formHtml += '<input type="text" id="df-business" data-label="Business Name" placeholder="Business Name" required style="width:100%;padding:8px;border:1px solid #d0d8e0;border-radius:6px;margin-bottom:6px;font-size:12px;font-family:inherit;box-sizing:border-box">';
            formHtml += '<input type="text" id="df-btype" data-label="Business Type" placeholder="Business Type" required style="width:100%;padding:8px;border:1px solid #d0d8e0;border-radius:6px;margin-bottom:6px;font-size:12px;font-family:inherit;box-sizing:border-box">';
            formHtml += '<input type="text" id="df-stage" data-label="Current Stage" placeholder="Current Stage" required style="width:100%;padding:8px;border:1px solid #d0d8e0;border-radius:6px;margin-bottom:6px;font-size:12px;font-family:inherit;box-sizing:border-box">';
            formHtml += '<textarea id="df-challenge" data-label="Main Challenge" placeholder="Main Challenge" required style="width:100%;padding:8px;border:1px solid #d0d8e0;border-radius:6px;margin-bottom:6px;font-size:12px;font-family:inherit;resize:none;box-sizing:border-box;min-height:50px"></textarea>';
            formHtml += '<button id="df-submit" style="width:100%;padding:8px;margin-bottom:14px;background:#0176D3;color:#fff;border:none;border-radius:6px;font-size:12px;font-family:inherit;font-weight:600;cursor:pointer">Submit</button>';

            var bubble = document.createElement('div');
            bubble.id = 'df-form-bubble';
            bubble.className = 'chat-msg__bubble';
            bubble.style.background = '#fff';
            bubble.style.borderRadius = '18px 18px 18px 4px';
            bubble.style.boxShadow = '0 1px 4px rgba(0,0,0,0.06)';
            bubble.innerHTML = formHtml;

            var msg = document.createElement('div');
            msg.className = 'chat-msg chat-msg--bot';
            var av = document.createElement('div');
            av.className = 'chat-msg__avatar chat-msg__avatar--bot';
            av.innerHTML = BOT_ICON;
            msg.appendChild(av);
            msg.appendChild(bubble);
            body.appendChild(msg);
            body.classList.add('chat-panel__body--has-messages');
            setTimeout(function() { msg.classList.add('show'); }, 50);
            body.scrollTop = body.scrollHeight;

            document.getElementById('df-submit').addEventListener('click', function(e) { e.stopPropagation(); submitDiscoveryForm(); });
            setupFormValidation('df', ['name', 'email', 'business', 'btype', 'stage', 'challenge']);
            setTimeout(function() { document.getElementById('df-name').focus(); }, 100);
        }, delay);
    }

    function submitDiscoveryForm() {
        var nameEl = document.getElementById('df-name');
        var emailEl = document.getElementById('df-email');
        var businessEl = document.getElementById('df-business');
        var btypeEl = document.getElementById('df-btype');
        var stageEl = document.getElementById('df-stage');
        var challengeEl = document.getElementById('df-challenge');
        if (!nameEl || !emailEl) return;

        var valid = true;
        [nameEl, emailEl, businessEl, btypeEl, stageEl, challengeEl].forEach(function(el) {
            if (el && !validateField(el)) valid = false;
        });
        if (!valid) {
            var firstInvalid = document.querySelector('#df-form-bubble input:invalid, #df-form-bubble textarea:invalid');
            if (firstInvalid) firstInvalid.focus();
            return;
        }

        var name = nameEl.value.trim();
        var email = emailEl.value.trim();
        var business = businessEl ? businessEl.value.trim() : '';
        var btype = btypeEl ? btypeEl.value.trim() : '';
        var stage = stageEl ? stageEl.value.trim() : '';
        var challenge = challengeEl ? challengeEl.value.trim() : '';

        var submitBtn = document.getElementById('df-submit');
        if (submitBtn) {
            submitBtn.disabled = true;
            submitBtn.style.background = '#95b8d9';
            submitBtn.style.cursor = 'default';
            submitBtn.innerHTML = '<span class="btn-spinner"></span>Submitting...';
        }

        var formData = new FormData();
        formData.append('name', name);
        formData.append('email', email);
        formData.append('type', 'discovery');
        formData.append('form_data[business_name]', business);
        formData.append('form_data[business_type]', btype);
        formData.append('form_data[stage]', stage);
        formData.append('form_data[challenge]', challenge);

        fetch('/chat/submit-form', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json',
            },
            body: formData
        })
        .then(function(res) { return res.json(); })
        .then(function(data) {
            var bubble = document.getElementById('df-form-bubble');
            if (bubble) {
                bubble.innerHTML = '<div style="font-size:13px;line-height:1.5;color:#1a2a3a;padding:4px 0">Thanks for submitting your details! One of our human agents will get in touch with you for your growth discovery call.</div>';
            }
            addMessage('user', "Discovery: " + name + " (" + email + ")");
            flowLocked = false;
            input.disabled = false;
        })
        .catch(function() {
            var submitBtn = document.getElementById('df-submit');
            if (submitBtn) {
                submitBtn.disabled = false;
                submitBtn.style.background = '#0176D3';
                submitBtn.style.cursor = 'pointer';
                submitBtn.innerHTML = 'Submit';
            }
            botReply("Something went wrong. Please try again.");
        });
    }

    function exploreServices() {
        clearMessages();
        flowStarted = false;
        flowLocked = false;
        currentFlow = null;
        currentStep = 0;
        branch = null;
        input.disabled = false;
        loadChatContent();
    }

    function escalateToAgent() {
        addMessage('user', 'Talk to an Agent');
        flowLocked = true;
        input.disabled = true;
        setTimeout(function() {
            botReply("Let me find an available agent for you. In the meantime, feel free to share more details about what you need help with.");
            unlockInput();
        }, 300);
    }

    function showTyping() {
        var existing = body.querySelector('.chat-typing-msg');
        if (existing) return;
        var msg = document.createElement('div');
        msg.className = 'chat-msg chat-msg--bot chat-typing-msg';
        var av = document.createElement('div');
        av.className = 'chat-msg__avatar chat-msg__avatar--bot';
        av.innerHTML = BOT_ICON;
        msg.appendChild(av);
        var bubble = document.createElement('div');
        bubble.className = 'chat-msg__bubble';
        bubble.style.padding = '0';
        var typing = document.createElement('div');
        typing.className = 'chat-typing';
        for (var i = 0; i < 3; i++) {
            var dot = document.createElement('span');
            dot.className = 'chat-typing__dot';
            typing.appendChild(dot);
        }
        bubble.appendChild(typing);
        msg.appendChild(bubble);
        body.appendChild(msg);
        body.classList.add('chat-panel__body--has-messages');
        setTimeout(function() { msg.classList.add('show'); }, 50);
        body.scrollTop = body.scrollHeight;
    }

    function hideTyping() {
        var typing = body.querySelector('.chat-typing-msg');
        if (typing) typing.remove();
    }

    function sendMessage(text) {
        if (!text || text.trim() === '') return;
        var msg = text.trim();

        addMessage('user', msg);

        if (input) input.value = '';
        showTyping();
        typingStartTime = Date.now();

        var formData = new FormData();
        formData.append('message', msg);

        fetch('/chat/reply', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json',
            },
            body: formData
        })
        .then(function(res) { return res.json(); })
        .then(function(data) {
            var elapsed = Date.now() - typingStartTime;
            var delay = Math.max(0, 500 - elapsed);
            setTimeout(function() {
                hideTyping();
                if (data.reply) {
                    addMessage('bot', data.reply, data.options || null);
                }
            }, delay);
        })
        .catch(function() {
            var elapsed = Date.now() - typingStartTime;
            var delay = Math.max(0, 500 - elapsed);
            setTimeout(function() {
                hideTyping();
                addMessage('bot', 'Sorry, something went wrong. Please try again.');
            }, delay);
        });
    }

    toggleBtn.addEventListener('click', togglePanel);

    if (closeBtn) {
        closeBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            closePanel();
        });
    }

    document.addEventListener('click', function(e) {
        if (!chatPanel.classList.contains('chat-panel--open')) return;
        if (!chatPanel.contains(e.target) && !toggleBtn.contains(e.target)) {
            closePanel();
        }
    });

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && chatPanel.classList.contains('chat-panel--open')) {
            closePanel();
        }
    });

    if (sendBtn) {
        sendBtn.addEventListener('click', function() {
            if (input && input.value.trim() !== '') {
                sendMessage(input.value);
            }
        });
    }

    if (input) {
        input.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' && input.value.trim() !== '') {
                e.preventDefault();
                sendMessage(input.value);
            }
        });
    }
});
</script>
