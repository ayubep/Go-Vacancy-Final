<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBookings extends Migration
{

    public function up()
    {
        Schema::create('bookings', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('user_id');
            $table->float('total_paid');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('bookings');
    }
}
