<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeEvidenceNullableInIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Issues', function (Blueprint $table) {
            $table->string('evidence')->nullable()->change();
            $table->string('location')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Issues', function (Blueprint $table) {
            $table->string('evidence')->nullable(false)->change();
            $table->string('location')->nullable(false)->change();
        });
    }
}
