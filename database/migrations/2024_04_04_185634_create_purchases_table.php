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
        Schema::create('purchases', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('suppliers_id')->nullable();
            $table->integer('invoices_id')->nullable();
            $table->string('voucher_number')->nullable();
            $table->date('purchase_date')->nullable();
            $table->string('total_amount')->nullable();
            $table->tinyInteger('payment_status')->default(1)->comment('1:pendint;2:accept;3:cencel');
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchases');
    }
};
