<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIssueImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issue_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('issue_id');
            $table->string('original_path');
            $table->string('thumbnail_path');
            $table->timestamps();

            $table->foreign('issue_id')->references('issue_id')->on('Issues');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('issue_images');
    }
}
