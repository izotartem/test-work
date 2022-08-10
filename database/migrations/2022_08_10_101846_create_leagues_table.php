<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leagues', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('league_id');
            $table->string('name');
            $table->integer('tier');
            $table->integer('region');
            $table->bigInteger('most_recent_activity');
            $table->integer('total_prize_pool');
            $table->unsignedBigInteger('start_timestamp');
            $table->unsignedBigInteger('end_timestamp');
            $table->integer('status');
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
        Schema::dropIfExists('leagues');
    }
};
