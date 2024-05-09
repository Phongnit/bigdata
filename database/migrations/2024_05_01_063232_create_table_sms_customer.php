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
        Schema::create('table_sms_customer', function (Blueprint $table) {
            $table->unsignedBigInteger('sms_id');
            $table->foreign('sms_id')->references('id')->on('table_sms');
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('table_submit');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_sms_customer');
    }
};
