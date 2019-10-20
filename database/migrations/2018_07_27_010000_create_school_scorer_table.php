<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolScorerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_scorer', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('scorer_id');
            $table->unsignedInteger('school_id');
            $table->timestamps();
            $table->unique(['scorer_id', 'school_id']);

            $table->foreign('school_id')
                ->references('id')
                ->on('schools')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('school_scorer');
    }
}
