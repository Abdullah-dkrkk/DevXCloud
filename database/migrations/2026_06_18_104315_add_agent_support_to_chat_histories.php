<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('chat_histories', function (Blueprint $table) {
            if (!Schema::hasColumn('chat_histories', 'status')) {
                $table->string('status', 20)->default('bot_handled')->after('source');
            }
            if (!Schema::hasColumn('chat_histories', 'agent_assigned_at')) {
                $table->timestamp('agent_assigned_at')->nullable()->after('answered_at');
            }
            if (!Schema::hasColumn('chat_histories', 'conversation_id')) {
                $table->string('conversation_id', 36)->nullable()->after('id')->index();
            }
        });
    }

    public function down(): void
    {
        Schema::table('chat_histories', function (Blueprint $table) {
            $table->dropColumn(['status', 'agent_assigned_at', 'conversation_id']);
        });
    }
};
