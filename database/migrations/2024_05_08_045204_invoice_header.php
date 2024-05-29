<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InvoiceHeader extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('external_id')->nullable();
            $table->string('user_id')->nullable();
            $table->string('status')->nullable();
            $table->string('merchant_name')->nullable();
            $table->string('merchant_profile_picture_url')->nullable();
            $table->integer('amount')->nullable();
            $table->string('description')->nullable();
            $table->datetime('expiry_date')->nullable();
            $table->string('invoice_url')->nullable();
            $table->boolean('should_exclude_credit_card')->nullable();
            $table->boolean('should_send_email')->nullable();
            $table->timestamps();
            $table->string('currency')->nullable();
            $table->datetime('reminder_date')->nullable();
            $table->json('metadata')->nullable();
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
