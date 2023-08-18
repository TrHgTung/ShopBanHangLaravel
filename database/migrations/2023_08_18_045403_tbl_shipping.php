<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tbl_shipping', function (Blueprint $table) {
            $table->Increments('shipping_id');
            // $table->string('shipping_name');
            $table->Integer('customer_id');
            $table->string('customer_sex');
            $table->string('shipping_address');
            $table->string('shipping_phone');
            $table->string('shop_note');
            $table->string('delivery_note');
            $table->string('recipients_name');
            $table->string('recipients_sex');
            $table->string('recipients_address');
            $table->string('recipients_phone');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_shipping');
    }
};
