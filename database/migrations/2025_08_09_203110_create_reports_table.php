<?php

// a dummy report table created for testing the previous report page

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('issue_no')->unique();        // e.g. IS1001
            $table->string('title');                      // e.g. Projector in the NLH is not working
            $table->text('description')->nullable();     // Description text (Lorem Ipsum)
            $table->string('reporter_name');
            $table->string('index_no');
            $table->string('reporter_email');
            $table->date('date');
            $table->json('attachments')->nullable();     // Store file names or paths as JSON array
            $table->json('status')->nullable();          // Store status for departments as JSON: {"Faculty Administration":"To be reviewed", "Maintenance department":"To be reviewed"}
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports');
    }
}
