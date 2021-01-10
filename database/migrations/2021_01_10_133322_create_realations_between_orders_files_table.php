<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealationsBetweenOrdersFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_file', function (Blueprint $table) {
            $table->bigInteger('order_id')->unsigned();
            $table->bigInteger('file_id')->unsigned();

            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('file_id')->references('id')->on('files')->onDelete('cascade');
         
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('realations_between_orders_files');
    }
}
