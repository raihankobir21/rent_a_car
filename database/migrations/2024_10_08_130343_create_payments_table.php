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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rental_id')->constrained('rentals');
            $table->decimal('amount', 8, 2);
            $table->string('payment_method');

            $table->integer('status')->default(1)->comment('0= Inactive, 1= Active');
            $table->integer('created_by')->default(0);
			$table->integer('modified_by')->default(0);
			//$table->dateTime('created_at')->nullable();
			//$table->dateTime('modified_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
