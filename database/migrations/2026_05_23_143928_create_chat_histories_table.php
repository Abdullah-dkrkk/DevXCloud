<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('chat_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('session_id')->nullable()->index();
            $table->text('question');
            $table->text('answer')->nullable();
            $table->enum('source', ['bot', 'admin', 'pending'])->default('bot');
            $table->foreignId('answered_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('asked_at');
            $table->timestamp('answered_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('chat_histories');
    }
};
