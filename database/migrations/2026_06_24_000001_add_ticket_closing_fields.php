<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('chat_tickets', function (Blueprint $table) {
            if (!Schema::hasColumn('chat_tickets', 'reminder_sent_at')) {
                $table->timestamp('reminder_sent_at')->nullable()->after('last_activity_at');
            }
            if (!Schema::hasColumn('chat_tickets', 'admin_notified_at')) {
                $table->timestamp('admin_notified_at')->nullable()->after('reminder_sent_at');
            }
        });
    }

    public function down(): void
    {
        Schema::table('chat_tickets', function (Blueprint $table) {
            $table->dropColumn(['reminder_sent_at', 'admin_notified_at']);
        });
    }
};
