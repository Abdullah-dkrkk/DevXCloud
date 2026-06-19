# Approved & Finalized Features

These features/modules have been reviewed, tested, and approved. Do NOT modify them without explicit permission.

## ✅ Guest Mode Chatting
- Full guest chat flow with localStorage persistence
- Nudge message after 5 guest messages prompting registration
- Guest session tracked via `session_id` in `chat_history` table

## ✅ Register/Login Flow with Chat Linking
- Guest messages linked to user account on register/login via `gsession` parameter
- Hidden `<input name="gsession">` in both login and register forms
- Controllers capture old session ID before `session()->regenerate()` and link chats via `ChatHistory::where('session_id', $oldSession)->whereNull('user_id')->update(['user_id' => auth()->id()])`
- Guest-to-server migration via `POST /chatbot/migrate` endpoint with dedup (1-hour window)

## ✅ Chatbot Pipeline
- Pipeline order: `isGreeting` → `exactMatch` → `bestMatch` (word-overlap + Dice bigram) → Gemini → fallback
- `bestMatch` uses: array_intersect (≥4 char or 3-char non-stop-word), Dice coefficient (≥50%, same first letter) for typo-tolerant matching, threshold ≥40
- No regex normalization (no `normalizeHinglish`, `normalizeTypo`, `fuzzyMatch`)
- On Gemini failure/429: saves fallback text as answer (not null/pending)

## ✅ FAQ Seeder
- 27 FAQs with Roman Urdu variations and extreme typos
- Run via: `php artisan db:seed --class=ChatbotFaqSeeder`

## ✅ History Ordering
- Paginated via offset + limit (default 20)
- Ordered by `asked_at DESC, id DESC` with `->reverse()` for oldest-first output
- Bot messages with null answer excluded from output

## ✅ Redirect After Login/Register
- Both controllers redirect to `/?chat=open` (homepage)
- Chatbot auto-opens on first redirect after auth

## ✅ Commit/Push Policy
- No commits or pushes without explicit permission
