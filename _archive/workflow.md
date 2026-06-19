# DevXCloud - Project Workflow

## Overview
Corporate SaaS/marketing landing page for **DevXCloud** ("Growth Systems" company). Offers 5 growth products:
- **GreenScale Formula** - Vegan meal kit brands
- **CommerceAI** - E-commerce brands
- **LaunchPadAI** - Founders & early-stage startups
- **ScaleCloud** - SaaS companies
- **EliteScale** - High-revenue digital brands

## Tech Stack
- Laravel 10 + MySQL
- Bootstrap 5 + Tailwind CSS (Vite)
- Google Gemini 2.5 Flash API (chatbot)
- Laravel Breeze (auth)
- Sanctum (API tokens)
- `nnjeim/world` (countries/states)
- Resend (email)

## Key Files
| File | Purpose |
|------|---------|
| `app/Http/Controllers/ChatbotController.php` | Chatbot reply logic (typo fix → exact match → fuzzy match → Gemini fallback) |
| `app/Models/ChatbotFaq.php` | FAQ model (question: pipe-delimited keywords, answer: text) |
| `resources/views/components/chatbot.blade.php` | Chatbot UI + guided conversation flow JS |
| `resources/chatbot/faqs.json` | FAQ backup/reference |
| `resources/chatbot/prompt.txt` | Gemini system prompt template |
| `database/seeders/ChatbotFaqSeeder.php` | Seeds 23 FAQ entries into `chatbot_faqs` |
| `database/seeders/UserSeeder.php` | Seeds admin + test user |
| `app/Models/ChatHistory.php` | Logs all Q&A (bot, pending, admin answers) |
| `app/Http/Controllers/Admin/QuestionController.php` | Admin panel for viewing/answering pending questions |
| `app/Http/Controllers/UserChatHistoryController.php` | User dashboard showing personal chat history |
| `resources/views/admin/questions/index.blade.php` | Admin: list all support questions with stats |
| `resources/views/admin/questions/answer.blade.php` | Admin: form to answer a pending question |
| `resources/views/user/chat-history.blade.php` | User: personal chat history with bot/admin status |
| `routes/web.php` | All web routes (home, about, contact, product pages, chatbot POST, admin, chat-history) |

## Chatbot Flow (with History)
1. **normalizeTypo()** - Regex-based typo correction (devxxcloud→devxcloud, etc.)
2. **exactMatch()** - Check if input exactly matches any FAQ keyword variation → saved as `bot`
3. **fuzzyMatch()** - `similar_text()` + word overlap scoring (threshold: 65%) → saved as `bot`
4. **Gemini API** - Fallback to Google Gemini 2.5 Flash with FAQ context
5. If all fail → saved as `pending` and shows fallback message
6. **All Q&A saved to `chat_histories` table** with source tracking (`bot`/`pending`/`admin`)

## Chat History System (New Feature)

### Guest Users
- Chats tracked via `session_id` (no login required)
- After 3 messages, a subtle prompt appears: "Create an account to keep your chat history"
- Guest chats are stored with `user_id = NULL`

### Logged-in Users
- All Q&A linked to their user account
- Dashboard at `/chat-history` shows full history with status:
  - 🤖 **Bot** — answered by FAQ/Gemini
  - 👨‍💼 **Admin** — answered manually by admin team
  - ⏳ **Pending** — waiting for admin reply
- Stats: total questions, bot-answered, admin-answered, pending

### Guest → User Merge
- When a guest registers or logs in, their `session_id`-based chats are automatically linked to their user account
- Merge happens in `AuthenticatedSessionController::store()` and `RegisteredUserController::store()`

### Admin Panel
- `/admin/questions` — Full list of all support questions
- Filter: Pending / Answered / All
- Stats cards: Total, Pending, Bot-answered, Admin-answered
- Click "Answer" on pending questions → type reply → submit
- Only users with email in `config('admin.emails')` can access

## Database Tables
- `users` - Auth users
- `chatbot_faqs` - FAQ question/answer pairs (question is pipe-separated)
- `chat_histories` - All chatbot Q&A (user_id, session_id, question, answer, source[bot|admin|pending], answered_by, asked_at, answered_at)
- `contacts` - Contact form submissions
- `password_reset_tokens`, `personal_access_tokens`, `failed_jobs`

## Routes (web.php)
- `GET /` → home, `/about`, `/commerce-ai`, `/launchpad-ai`, `/scalecloud-ai`, `/elitescale-ai`, `/greenscale-ai`
- `GET /contact`, `POST /contact-submit`
- `POST /chatbot` → ChatbotController@reply
- `GET /dashboard` → dashboard (auth+verified)
- `GET /chat-history` → user chat history (auth+verified), name: `user.chat-history`
- `GET /admin/questions` → admin list (auth+verified+admin), name: `admin.questions.index`
- `GET /admin/questions/{id}/answer` → answer form, name: `admin.questions.answer`
- `POST /admin/questions/{id}/answer` → submit answer, name: `admin.questions.answer.submit`
- `GET /states/{countryCode}` → World states API
- Auth routes from `auth.php`

## Admin
- Admin middleware checks email against `config('admin.emails')` (currently `testing.testing@gmail.com`)
- Admin navbar link appears only for whitelisted emails
- Full support question management at `/admin/questions`

## Seeding
```bash
php artisan migrate:fresh --seed
```
This runs UserSeeder + ChatbotFaqSeeder.

```bash
# Run just new migrations (without dropping data)
php artisan migrate
```

## Common Commands
```bash
# Fresh DB + seed
php artisan migrate:fresh --seed

# Run pending migrations only
php artisan migrate

# Run just seeder
php artisan db:seed

# Clear cache
php artisan optimize:clear

# Check syntax
php -l app/Http/Controllers/ChatbotController.php
```

## Chatbot Typo Patterns Handled
- `devxxcloud`, `devvscloud`, `devx cloud`, `dxcloud`, `devxxxcloud`, `devvxcloud` → devxcloud
- `green scale`, `greenscale` → greenscale
- `launch pad`, `launch-pad`, `launchpad` → launchpadai
- `scale cloud`, `scalecloud` → scalecloud
- `elite scale`, `elitescale` → elitescale
- `commerce ai`, `commerceai` → commerceai
