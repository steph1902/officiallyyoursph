<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InvoiceDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('invoice_details', function (Blueprint $table) {
            $table->id;
            $table->string('invoice_id');
            $table->string('customer_id');
            $table->string('product_name');
            $table->integer('product_price');
            $table->string('product_image');
            $table->string('product_size');
            $table->string('product_color');
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
        //
    }
}
