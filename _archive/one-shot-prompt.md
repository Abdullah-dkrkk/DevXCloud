# ONE-SHOT PROMPT — Help Scout–Style Customer Support Agent for DevXCloud

## PROJECT VISION

Build a **Help Scout–like customer support system** where:
- **Customers** chat with an AI bot → can escalate to a human agent at any time
- **Agents** have a real-time mailbox (queue) with conversation threading, assignment, status tracking
- **Real-time** via WebSockets (Laravel Reverb): typing indicators, live message delivery, instant queue updates
- **Multi-tab**: an agent can handle many conversations simultaneously (like Help Scout's inbox)
- **Conversations** are threaded (not single Q&A) — ongoing back-and-forth between customer and agent
- **Status workflow**: Pending → Active (claimed) → Resolved (answered)
- **Email notifications** when agent replies (like Help Scout's customer notification)

### Help Scout Feature Map

| Help Scout Feature | DevXCloud Equivalent | Status |
|---|---|---|
| Mailbox (conversation list) | Agent dashboard queue panel | ✅ Built |
| Conversation threading | `chatMessages` array in Livewire component | ✅ Built |
| Assignment | `claimQuestion()` / `answered_by` | ✅ Built |
| Status: active/pending/resolved | `source` + `status` on ChatHistory | ✅ Built |
| Real-time (WebSockets) | Laravel Reverb + Echo | ✅ Events exist |
| Customer profile | User model + ChatHistory relationship | ✅ Built |
| Agent typing indicator | `AgentTyping` event → Echo | ✅ Built |
| Customer typing indicator | `CustomerTyping` event → Echo | ✅ Built |
| Bot auto-reply | Gemini + FAQ pipeline | ✅ Built |
| Guest chat → account merge | Session merge on login/register | ✅ Built |
| Email notification | `QuestionAnswered` mailable | ✅ Built |
| **Live queue updates** | `NewPendingQuestion` event → Livewire listener | ❌ **Bugged** |
| **Agent → customer real-time** | Echo on public frontend | ❌ **Bugged** |
| **Multi-conversation agent view** | Agent dashboard with chat switching | ⚠️ Partial |
| **Internal notes** | Not implemented | ❌ Missing |
| **Conversation history per customer** | Chat history page | ✅ Built |
| **Knowledge base integration** | FAQ system + Gemini | ✅ Built |

## PROJECT CONTEXT

**Stack:** Laravel 10.48.29, PHP 8.2.29, MySQL, Livewire 4.3.1 (single-file `⚡` components), Laravel Reverb 1.10.2 for WebSockets, Pusher JS + Laravel Echo on frontend.
**PHP:** `D:\laragon\bin\php\php-8.2.29-Win32-vs16-x64\php.exe`
**Composer:** `D:\laragon\bin\composer\composer.phar`
**Working directory:** `D:\laragon\www\DevXCloud`
**Git:** Clean at `2282476` on `main`, origin `https://github.com/Abdullah-dkrkk/DevXCloud`
**Dev server:** `php artisan serve --port=8088`
**Reverb:** `php artisan reverb:start` — uses port 8081
**Admin email:** abdullahsaifullah988@gmail.com
**Node:** npm scripts use Vite, but app uses CDN for Bootstrap/jQuery/Owl

## ALREADY INSTALLED / CONFIGURED

- `livewire/livewire` v4.3.1 — single-file components (`⚡` prefix in `resources/views/components/`)
- `laravel/reverb` v1.10.2
- `.env`: `BROADCAST_DRIVER=reverb`, `REVERB_APP_KEY=devxcloud-key`, `REVERB_APP_SECRET=devxcloud-secret`, `REVERB_APP_ID=devxcloud-app`, `REVERB_HOST=localhost`, `REVERB_PORT=8081`, `REVERB_SCHEME=http`
- `config/broadcasting.php` — pusher connection reading REVERB_* env vars
- `config/reverb.php` — published, apps using config provider
- Broadcast events: `AgentMessageSent`, `AgentTyping`, `NewPendingQuestion`, `CustomerTyping`
- `routes/channels.php` — default `App.Models.User.{id}` channel + custom channels via event `broadcastOn()` methods
- `routes/web.php` — chatbot POST routes, admin group with agent dashboard
- `app/Http/Controllers/ChatbotController.php` — full chatbot pipeline + escalateToAgent + typing + submitForm + migrateGuest
- `app/Http/Controllers/Admin/QuestionController.php` — questions index/answer
- `app/Http/Controllers/UserChatHistoryController.php` — user chat history
- `app/Models/ChatHistory.php` — Q&A model with user_id, session_id, question, answer, source (bot/admin/pending/lead), status, answered_by, conversation_id
- `app/Models/ChatbotFaq.php` — FAQ model
- `app/Mail/QuestionAnswered.php` — notification when agent answers
- `app/Mail/LeadWelcome.php` — welcome email for leads
- `app/Mail/AdminQuestionNotification.php` — notification of new question
- Migrations: agent support fields added (status, agent_assigned_at, conversation_id)

## EXISTING FILES — DO NOT DELETE UNLESS INSTRUCTED

### `resources/views/components/chatbot.blade.php` — "Customer Side"
The chat widget on the public site. CSS (lines 37-455) = **DO NOT CHANGE**. JS (lines 457+) = fix only listed bugs.

**BOT SIDE — DO NOT TOUCH:**
- `flowA()` (GreenScale vegan meal kit) — entire decision tree
- `flowB()` (General Business) — entire decision tree
- `handleOption()`, `appendUser()`, `appendBot()`, `botReply()`
- `showTyping()` / `removeTyping()`
- `resetChat()`
- Auto-open via `?chat` URL param
- Greeting + 6 options
- Form cards: `showGuidanceForm()`, `showDiscoveryForm()`, `submitGuidanceForm()`, `submitDiscoveryForm()`
- All CSS (lines 37-455)

**AGENT HANDOFF — CAN FIX BUGS:**
- `escalateToAgent()` — creates pending ChatHistory with UUID conversation_id
- `initEcho()` — subscribes to `conversation.user.{id}` or `conversation.guest.{sessionId}`
- `appendAgent()` — displays agent message with green styling
- `broadcastTyping()` — POST to `/chatbot/typing`
- `sendMessage()` — handles bot reply + captures `conversation_id` for Echo init
- `agentConnected` state variable

### `resources/views/components/⚡agent-dashboard.blade.php` — "Agent Side" (Help Scout Mailbox)
Livewire single-file (PHP class + Blade + CSS + JS). This is the **agent's Help Scout inbox**.

**Features:**
- Queue with 4 filters: Pending / Active / Resolved / Leads
- Search questions
- Claim button per question
- Chat panel: shows customer question + agent messages + typing indicator
- `claimQuestion()` — assigns to agent
- `openChat()` — loads conversation
- `sendMessage()` — saves answer + broadcasts `AgentMessageSent` + emails customer
- `updatedMessageText()` — broadcasts `AgentTyping`
- `getListeners()` — supposed to listen for `NewPendingQuestion`
- Alpine JS `agentDashboard()` — supposed to listen for `CustomerTyping`

### `resources/views/admin/agent-dashboard.blade.php`
Admin layout wrapper. Has `<livewire:agent-dashboard />`. Pushes Echo/Pusher using `config()`.

### `resources/views/layouts/app.blade.php`
Public layout. Includes chatbot. **Missing Echo/Pusher JS** — logged-in users can't receive real-time agent messages.

### `resources/views/layouts/admin.blade.php`
Admin layout with `@stack('scripts')`.

### `resources/views/components/agent-dashboard-view.blade.php`
Empty placeholder — **dead code**, not referenced anywhere.

### Other files (workflow.md docs)
- `app/Http/Controllers/Admin/QuestionController.php` — admin CRUD
- `app/Http/Controllers/UserChatHistoryController.php` — user history
- `resources/views/admin/questions/` — admin blade views
- `resources/views/user/chat-history.blade.php` — user history view

## CRITICAL BUGS — BREAKING THE HELP SCOUT–LIKE FLOW

These bugs are why the current custom functionality isn't working end-to-end. Fix in this order:

### @senior-developer — BUG 1: Livewire Echo Listener Syntax (BLOCKS QUEUE UPDATES)

**File:** `⚡agent-dashboard.blade.php:141`

**Problem:** `getListeners()` returns `'echo:agent.questions,new.pending.question'`. This is Livewire v3 syntax. In Livewire v4, dots in channel names must be replaced with hyphens, and event names need a leading dot.

**Fix:**
```php
protected function getListeners()
{
    return [
        'echo-agent-questions,.new.pending.question' => 'refreshQuestions',
    ];
}
```

**Why this breaks Help Scout flow:** Without this fix, when a customer clicks "Talk to an Agent", the agent dashboard never receives the new pending question in real-time. Agent has to manually refresh the page to see new conversations — defeats the entire purpose of a Help Scout–style mailbox.

---

### @senior-developer — BUG 2: Alpine Echo Listener Never Runs (BLOCKS TYPING INDICATOR)

**File:** `⚡agent-dashboard.blade.php:303-319`

**Problem:** The Alpine `initEcho()` is wrapped in Blade `@if($activeChat)`:
```alpine
@if($activeChat)
    const convId = '...';
    window.Echo.channel('agent.conversation.' + convId)...listen('.customer.typing', ...);
@endif
```

On page load, `$activeChat` is `null`, so the `@if` renders nothing. When the agent opens a chat via Livewire (`openChat()`), Alpine's `x-init` does NOT re-run. Result: **agent dashboard NEVER listens for customer typing**.

**Fix:** Remove Blade conditional and use Alpine `$watch`:
```alpine
function agentDashboard() {
    return {
        customerTyping: false,
        _typingChannel: null,
        initEcho() {
            if (typeof window.Echo === 'undefined') return;
            this.$watch('$wire.activeChat', (val) => {
                if (val?.conversation_id) {
                    this.listenToCustomerTyping(val.conversation_id);
                }
            });
            if (this.$wire.activeChat?.conversation_id) {
                this.listenToCustomerTyping(this.$wire.activeChat.conversation_id);
            }
        },
        listenToCustomerTyping(convId) {
            if (this._typingChannel) {
                window.Echo.leaveChannel(this._typingChannel.name);
            }
            this._typingChannel = window.Echo.channel('agent.conversation.' + convId);
            this._typingChannel.listen('.customer.typing', (e) => {
                this.customerTyping = e.isTyping;
            });
        },
        closeChat() {
            if (this._typingChannel) {
                window.Echo.leaveChannel(this._typingChannel.name);
                this._typingChannel = null;
            }
            this.customerTyping = false;
            $wire.closeChat();
        }
    }
}
```

Also add `x-on:chat-updated.window="..."` or Livewire event dispatch to re-evaluate. The key issue: when `openChat()` Livewire method fires, it sets `$activeChat` on the server, Alpine needs to detect this change.

**Alternative simpler fix:** Move Echo subscription to a Livewire event listener approach:
```alpine
// After openChat() / sendMessage() response, dispatch a browser event:
$this->dispatch('chat-opened', conversationId: $question->conversation_id);

// In Alpine:
$watch('$wire.activeChat', ...) or listen for Livewire dispatched events
```

---

### @backend-architect — BUG 3: Public Frontend Missing Echo (BLOCKS CUSTOMER SIDE REAL-TIME)

**File:** `resources/views/layouts/app.blade.php`

**Problem:** The public app layout includes the chatbot component but has ZERO Pusher/Echo JS. The chatbot's `initEcho()` silently returns when `window.Echo` is undefined. This means:
- Logged-in users NEVER receive real-time agent messages
- `Echo.private('conversation.user.' + userId)` is dead code
- Agent replies only appear if user refreshes the page

**Fix:** Add Pusher + Echo before `@stack('scripts')` in `app.blade.php`:
```html
<script src="https://cdn.jsdelivr.net/npm/pusher-js@8.2.0/dist/web/pusher.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/laravel-echo@1.16.1/dist/echo.iife.js"></script>
<script>
    window.Pusher = Pusher;
    window.Echo = new Echo({
        broadcaster: 'reverb',
        key: '{{ config("reverb.apps.apps.0.key") }}',
        wsHost: '{{ config("reverb.servers.reverb.hostname", "localhost") }}',
        wsPort: {{ config("reverb.servers.reverb.port", 8081) }},
        wssPort: {{ config("reverb.servers.reverb.port", 8081) }},
        forceTLS: false,
        enabledTransports: ['ws', 'wss'],
    });
</script>
```

**Why this breaks Help Scout flow:** In Help Scout, customers see agent replies instantly. Without this fix, the customer side is blind — defeats the purpose of real-time support.

---

### @senior-developer — BUG 4: Duplicate Echo Subscriptions (MEDIUM)

**File:** `chatbot.blade.php:526-566`

**Problem:** `initEcho()` is called from `loadChatContent()` and from `sendMessage()` callback. Each call creates a NEW channel subscription without cleanup. After 3-4 escalations, there are 3-4 duplicate listeners — causing memory leaks and duplicate message displays.

**Fix:** Add guard:
```javascript
let echoSubscribed = false;

function initEcho() {
    if (typeof window.Echo === 'undefined') return;
    if (echoSubscribed) return;

    let channel = isLoggedIn
        ? window.Echo.private('conversation.user.' + isLoggedIn)
        : window.Echo.channel('conversation.guest.' + guestSessionId);

    channel.listen('.agent.message.sent', (e) => appendAgent(e.message));
    channel.listen('.agent.typing', (e) => {
        let existing = document.querySelector('.agent-typing-row');
        if (e.isTyping) {
            if (!existing) appendAgentTypingIndicator();
        } else {
            if (existing) removeAgentTypingIndicator();
        }
    });
    echoSubscribed = true;
}
// In resetChat():
echoSubscribed = false;
```

---

### @backend-architect — BUG 5: Channel Auth for Private User Channels (MEDIUM)

**File:** `routes/channels.php`

**Problem:** `AgentMessageSent` and `AgentTyping` broadcast to `PrivateChannel('conversation.user.' . $userId)` when user is logged in. The channel authorization in `routes/channels.php` only has the default `App.Models.User.{id}` pattern, NOT `conversation.user.{id}`.

**Fix:**
```php
Broadcast::channel('conversation.user.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
```

---

### @minimal-change-engineer — BUG 6: Dead Code (LOW)

**File:** `resources/views/components/agent-dashboard-view.blade.php`

**Fix:** Delete this file. It's a 1-line comment placeholder not used anywhere.

---

## IMPLEMENTATION ORDER

```
BUG 1 (Livewire syntax)   ── @senior-developer ── 5 min fix
        │
        ▼
BUG 2 (Alpine initEcho)   ── @senior-developer ── 30 min fix
        │
        ▼
BUG 3 (app.blade.php Echo) ── @backend-architect ── 10 min fix
        │
        ▼
BUG 4 (chatbot duplicate)  ── @senior-developer ── 10 min fix
        │
        ▼
BUG 5 (channel auth)       ── @backend-architect ── 5 min fix
        │
        ▼
BUG 6 (dead code)          ── @minimal-change-engineer ── 1 min
        │
        ▼
@reality-checker ── FULL VERIFICATION
```

## VERIFICATION — Help Scout Flow Test

After all bugs are fixed:

1. **Customer starts chat** → bot greets → customer asks question → gets bot reply
2. **Customer escalates** → clicks "Talk to an Agent" → pending question created
3. **Agent dashboard** → new question appears in real-time in Pending tab (no refresh)
4. **Agent claims** → clicks Claim → question moves to Active tab
5. **Agent replies** → types message + hits Send → customer receives in real-time on public site
6. **Agent typing** → agent types → customer sees "Agent typing..." indicator in chat
7. **Customer typing** → customer types → agent sees "Customer typing..." in dashboard
8. **Multi-conversation** → agent switches between different customer chats
9. **Email notification** → after agent sends, customer gets email with the answer
10. **Guest → Login** → guest chats → logs in → redirected to `/?chat=open` → chat auto-opens

## OVERALL RULES

- Do NOT change any CSS in `chatbot.blade.php` (lines 37-455)
- Do NOT delete/modify `flowA()` / `flowB()` — every branch and message stays exactly as-is
- Do NOT remove localStorage, guest nudge, or any `approved-features.md` functionality
- All real-time MUST use existing events and channel routes
- Use `config()` not `env()` in Blade views
- Keep CSRF token via meta tag
- After all fixes: run `php artisan optimize:clear`
- **No commits or pushes without explicit permission**
