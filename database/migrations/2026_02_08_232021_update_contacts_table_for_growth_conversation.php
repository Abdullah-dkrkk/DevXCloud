<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('contacts', function (Blueprint $table) {

            /*
             |------------------------------------------------------------
             | Drop OLD fields (no longer used by form)
             |------------------------------------------------------------
             */
            $table->dropColumn([
                'first_name',
                'last_name',
                'job_title',
                'employed',
                'mobile',
                'language',
            ]);

            /*
             |------------------------------------------------------------
             | Add NEW fields (as per updated form)
             |------------------------------------------------------------
             */

            // New: Full name (replaces first_name + last_name)
            $table->string('full_name', 100)->after('id');

            // New: phone (replaces mobile)
            $table->string('phone', 20)->after('company');

            // New: website decision + url
            $table->enum('has_website', ['yes', 'no'])->after('phone');
            $table->string('website_url', 255)->nullable()->after('has_website');

            // New: what brings you here today (optional)
            $table->string('reason', 100)->nullable()->after('website_url');

            // New: situation textarea (optional)
            $table->text('message')->nullable()->after('reason');

            // work_email, company, country already exist and will remain
            // terms_accepted, terms_accepted_at, ip_address, user_agent remain
        });
    }

    public function down(): void
    {
        Schema::table('contacts', function (Blueprint $table) {

            /*
             |------------------------------------------------------------
             | Remove NEW fields
             |------------------------------------------------------------
             */
            $table->dropColumn([
                'full_name',
                'phone',
                'has_website',
                'website_url',
                'reason',
                'message',
            ]);

            /*
             |------------------------------------------------------------
             | Restore OLD fields (rollback support)
             |------------------------------------------------------------
             */
            $table->string('first_name', 50)->after('id');
            $table->string('last_name', 50)->after('first_name');
            $table->string('job_title', 100)->nullable()->after('last_name');
            $table->enum('employed', ['yes', 'no'])->after('company');
            $table->string('mobile', 20)->after('employed');
            $table->string('language', 50)->after('country');
        });
    }
};
