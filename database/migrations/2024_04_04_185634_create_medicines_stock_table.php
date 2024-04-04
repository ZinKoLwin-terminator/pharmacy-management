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
        Schema::create('medicines_stock', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('medicines_id')->nullable();
            $table->string('batch_id')->nullable();
            $table->date('expiry_date')->nullable();
            $table->string('quantity')->nullable();
            $table->string('mrp')->nullable();
            $table->string('rate')->nullable();
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
        Schema::dropIfExists('medicines_stock');
    }
};
