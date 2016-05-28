<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookcartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookcart', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('book_id');
            $table->string('volunteer_name');
            $table->string('customer_name');
            $table->string('customer_email');           
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
        Schema::drop('bookcart');
    }
}
