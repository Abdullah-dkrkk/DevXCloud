<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (DB::getDriverName() === 'mysql') {
            DB::statement("ALTER TABLE chat_histories MODIFY COLUMN source ENUM('bot', 'admin', 'pending', 'lead') DEFAULT 'bot'");
        }
    }

    public function down(): void
    {
        if (DB::getDriverName() === 'mysql') {
            DB::statement("ALTER TABLE chat_histories MODIFY COLUMN source ENUM('bot', 'admin', 'pending') DEFAULT 'bot'");
        }
    }
};
