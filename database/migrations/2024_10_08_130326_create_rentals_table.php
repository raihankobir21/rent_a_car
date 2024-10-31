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
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('car_id')->constrained('cars');
            $table->foreignId('customer_id')->constrained('customers');
            $table->date('rental_date');
            $table->date('return_date')->nullable();
            $table->decimal('total_amount', 8, 2);

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
        Schema::dropIfExists('rentals');
    }
};
