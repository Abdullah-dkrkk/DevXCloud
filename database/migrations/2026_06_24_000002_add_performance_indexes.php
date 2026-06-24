<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    private array $indexes = [
        'users' => [
            'users_role_is_available_last_active_at_index' => 'ALTER TABLE users ADD INDEX `users_role_is_available_last_active_at_index`(`role`, `is_available`, `last_active_at`)',
        ],
        'chat_tickets' => [
            'chat_tickets_status_assigned_to_created_at_index' => 'ALTER TABLE chat_tickets ADD INDEX `chat_tickets_status_assigned_to_created_at_index`(`status`, `assigned_to`, `created_at`)',
            'chat_tickets_last_activity_at_index' => 'ALTER TABLE chat_tickets ADD INDEX `chat_tickets_last_activity_at_index`(`last_activity_at`)',
            'chat_tickets_email_index' => 'ALTER TABLE chat_tickets ADD INDEX `chat_tickets_email_index`(`email`)',
        ],
        'chat_messages' => [
            'chat_messages_ticket_id_id_index' => 'ALTER TABLE chat_messages ADD INDEX `chat_messages_ticket_id_id_index`(`ticket_id`, `id`)',
            'chat_messages_ticket_id_created_at_index' => 'ALTER TABLE chat_messages ADD INDEX `chat_messages_ticket_id_created_at_index`(`ticket_id`, `created_at`)',
        ],
        'chat_histories' => [
            'chat_histories_asked_at_index' => 'ALTER TABLE chat_histories ADD INDEX `chat_histories_asked_at_index`(`asked_at`)',
            'chat_histories_user_id_asked_at_index' => 'ALTER TABLE chat_histories ADD INDEX `chat_histories_user_id_asked_at_index`(`user_id`, `asked_at`)',
        ],
    ];

    public function up(): void
    {
        foreach ($this->indexes as $table => $indexes) {
            foreach ($indexes as $name => $sql) {
                try {
                    DB::statement("ALTER TABLE {$table} DROP INDEX `{$name}`");
                } catch (\Exception $e) {}
                try {
                    DB::statement($sql);
                } catch (\Exception $e) {}
            }
        }
    }

    public function down(): void
    {
        foreach ($this->indexes as $table => $indexes) {
            foreach ($indexes as $name => $sql) {
                try {
                    DB::statement("ALTER TABLE {$table} DROP INDEX `{$name}`");
                } catch (\Exception $e) {}
            }
        }
    }
};
