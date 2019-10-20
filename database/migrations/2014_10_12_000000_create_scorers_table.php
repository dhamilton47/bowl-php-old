<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScorersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scorers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('scorer_name')->nullable();
            $table->string('scorer_username')->unique();
            $table->string('scorer_email')->unique();
            $table->string('scorer_password');
            $table->string('scorer_avatar_path')->nullable();
            $table->boolean('scorer_confirmed')->default(false);
            $table->string('scorer_confirmation_token', 25)->nullable()->unique();
            $table->string('scorer_remember_token', 100)->nullable();
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
        Schema::dropIfExists('scorers');
    }
}
