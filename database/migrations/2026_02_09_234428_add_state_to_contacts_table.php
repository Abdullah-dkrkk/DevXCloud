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
             | Add NEW field required by updated contact form
             |------------------------------------------------------------
             */

            $table->string('state', 100)->after('country');
        });
    }

    public function down(): void
    {
        Schema::table('contacts', function (Blueprint $table) {

            /*
             |------------------------------------------------------------
             | Rollback support
             |------------------------------------------------------------
             */

            $table->dropColumn('state');
        });
    }
};
