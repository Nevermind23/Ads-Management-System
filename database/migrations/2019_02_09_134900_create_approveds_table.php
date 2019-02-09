<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApprovedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('approveds', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('click_id');
            $table->decimal('amount', 10, 2);
            $table->timestamps();

            $table->foreign('click_id')->references('id')->on('clicks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('approveds');
    }
}
