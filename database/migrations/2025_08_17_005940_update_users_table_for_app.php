<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTableForApp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Drop the existing 'name' column and add new columns
            $table->dropColumn('name');
            $table->string('full_name')->after('id');
            $table->string('phone_number')->nullable()->after('email');
            $table->foreignId('role_id')->nullable()->constrained('roles')->after('phone_number');
            $table->foreignId('section_id')->nullable()->constrained('sections')->after('role_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['role_id']);
            $table->dropForeign(['section_id']);
            $table->dropColumn(['full_name', 'phone_number', 'role_id', 'section_id']);
            $table->string('name')->after('id');
        });
    }
}
