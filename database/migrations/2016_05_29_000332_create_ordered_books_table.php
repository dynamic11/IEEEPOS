<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderedBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderedBooks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('book_id');
            $table->string('volunteer_name');
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('payment_type');
            $table->string('order_code');
            $table->string('order_status');
            $table->timestamp('order_date');            
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
        Schema::drop('orderedBooks');
    }
}
