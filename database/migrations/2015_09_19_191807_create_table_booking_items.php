<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBookingItems extends Migration
{

    public function up()
    {
        Schema::create('booking_items', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('booking_id');
            $table->integer('packet_id');
            $table->integer('file_id');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::drop('booking_items');
    }
}
