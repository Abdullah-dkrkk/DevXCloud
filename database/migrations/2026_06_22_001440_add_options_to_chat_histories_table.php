<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('chat_histories', function (Blueprint $table) {
            if (!Schema::hasColumn('chat_histories', 'options')) {
                $table->json('options')->nullable()->after('answer');
            }
        });
    }

    public function down(): void
    {
        Schema::table('chat_histories', function (Blueprint $table) {
            $table->dropColumn('options');
        });
    }
};
