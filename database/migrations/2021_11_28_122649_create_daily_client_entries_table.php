<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyClientEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_client_entries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id')->on('clients');
            $table->string('hawb_number')->unique();
            $table->bigInteger('weight_range')->nullable();
            $table->bigInteger('weight_cost')->nullable();
            $table->string('destination');
            $table->string('mode')->nullable();
            $table->bigInteger('total_charges');
            $table->string('date_of_entry')->nullable();
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
        Schema::dropIfExists('daily_client_entries');
    }
}
