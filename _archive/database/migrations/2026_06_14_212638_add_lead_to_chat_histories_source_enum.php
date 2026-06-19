<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("ALTER TABLE chat_histories MODIFY COLUMN source ENUM('bot', 'admin', 'pending', 'lead') DEFAULT 'bot'");
    }

    public function down(): void
    {
        DB::statement("ALTER TABLE chat_histories MODIFY COLUMN source ENUM('bot', 'admin', 'pending') DEFAULT 'bot'");
    }
};
