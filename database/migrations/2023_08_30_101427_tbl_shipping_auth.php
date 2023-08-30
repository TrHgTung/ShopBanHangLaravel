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
        Schema::create('tbl_shipping_auth', function (Blueprint $table) {
            $table->Increments('shipper_id');
            $table->string('shipper_email');
            $table->string('shipper_password');
            $table->string('shipping_id');
            $table->string('shipping_status');
            $table->string('arrival_date');
            $table->string('shipping_fee');
            $table->string('arrival_image');
            // $table->Integer('product_sales_quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_shipping_auth');
    }
};
