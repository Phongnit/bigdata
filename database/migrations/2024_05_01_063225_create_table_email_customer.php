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
        Schema::create('table_email_customer', function (Blueprint $table) {
            $table->unsignedBigInteger('mail_id');
            $table->foreign('mail_id')->references('id')->on('table_emails');
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
        Schema::dropIfExists('table_email_customer');
    }
};
