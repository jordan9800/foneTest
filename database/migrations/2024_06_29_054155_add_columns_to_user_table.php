<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedTinyInteger('is_admin')->default(0)->comment('1-Admin, 0-Default')->after('password');
            $table->unsignedTinyInteger('notification_switch')->default(1)->comment('1-On, 0-Off')->after('is_admin');
            $table->unsignedInteger('phone')->nullable()->after('email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['is_admin', 'notification_switch', 'phone']);
        });
    }
};
