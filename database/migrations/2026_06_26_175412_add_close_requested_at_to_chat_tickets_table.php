<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('chat_tickets', function (Blueprint $table) {
            if (!Schema::hasColumn('chat_tickets', 'close_requested_at')) {
                $table->timestamp('close_requested_at')->nullable()->after('admin_notified_at');
            }
        });
    }

    public function down(): void
    {
        Schema::table('chat_tickets', function (Blueprint $table) {
            $table->dropColumn('close_requested_at');
        });
    }
};
