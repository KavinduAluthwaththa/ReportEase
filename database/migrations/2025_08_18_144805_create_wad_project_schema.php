<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWadProjectSchema extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create Roles table first (referenced by Users)
        Schema::create('Roles', function (Blueprint $table) {
            $table->increments('role_id');
            $table->string('role_name');
        });

        // Create Section table (referenced by Users)
        Schema::create('Section', function (Blueprint $table) {
            $table->increments('section_id');
            $table->string('section_name');
            $table->text('description');
        });

        // Create Users table
        Schema::create('Users', function (Blueprint $table) {
            $table->increments('user_id');
            $table->string('full_name');
            $table->string('email');
            $table->string('password');
            $table->integer('phone_number');
            $table->string('ID')->comment('student registration ID or employee ID likewise');
            $table->unsignedInteger('role_id');
            $table->unsignedInteger('section_id')->nullable();
            $table->timestamp('created_at');

            // Add unique constraints
            $table->unique('email');
            $table->unique('phone_number');
            $table->unique('ID');
            
            // Add foreign key constraints
            $table->foreign('role_id')->references('role_id')->on('Roles');
            $table->foreign('section_id')->references('section_id')->on('Section');
        });

        // Create Issues table
        Schema::create('Issues', function (Blueprint $table) {
            $table->increments('issue_id');
            $table->string('title');
            $table->text('description');
            $table->binary('evidence');
            $table->string('location');
            $table->string('status');
            $table->unsignedInteger('assigned_to_user_id')->nullable();
            $table->unsignedInteger('reported_by_user_id');
            $table->timestamp('reported_at');
            $table->timestamp('resolved_at')->nullable();
            $table->integer('upVotes')->nullable();
            
            $table->foreign('assigned_to_user_id')->references('user_id')->on('Users');
            $table->foreign('reported_by_user_id')->references('user_id')->on('Users');
        });

        // Create Issue_Updates table
        Schema::create('Issue_Updates', function (Blueprint $table) {
            $table->increments('update_id');
            $table->unsignedInteger('issue_id');
            $table->unsignedInteger('user_id');
            $table->text('comment');
            $table->string('new_status');
            $table->timestamp('created_at');
            
            $table->foreign('issue_id')->references('issue_id')->on('Issues');
            $table->foreign('user_id')->references('user_id')->on('Users');
        });

        // Create Issue_Upvote table
        Schema::create('Issue_Upvote', function (Blueprint $table) {
            $table->integer('upvote_id')->primary();
            $table->unsignedInteger('issue_id');
            $table->unsignedInteger('user_id');
            
            $table->foreign('issue_id')->references('issue_id')->on('Issues');
            $table->foreign('user_id')->references('user_id')->on('Users');
        });

        // Create Notifications table
        Schema::create('Notifications', function (Blueprint $table) {
            $table->integer('notific_id')->primary();
            $table->string('notific_type')->comment("e.g: 'ISSUE_ASSIGNED', 'STATUS_UPDATED' , 'Announcement'");
            $table->string('notific_head');
            $table->text('notific_body')->nullable();
        });

        // Create Notify table
        Schema::create('Notify', function (Blueprint $table) {
            $table->integer('notific_log')->primary();
            $table->integer('notific_id');
            $table->unsignedInteger('receiver_id');
            $table->timestamp('notific_sent_time');
            $table->timestamp('notific_seen_time')->nullable();
            
            $table->foreign('notific_id')->references('notific_id')->on('Notifications');
            $table->foreign('receiver_id')->references('user_id')->on('Users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Notify');
        Schema::dropIfExists('Notifications');
        Schema::dropIfExists('Issue_Upvote');
        Schema::dropIfExists('Issue_Updates');
        Schema::dropIfExists('Issues');
        Schema::dropIfExists('Users');
        Schema::dropIfExists('Section');
        Schema::dropIfExists('Roles');
    }
}
