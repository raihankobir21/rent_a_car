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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->integer('brand_id')->default(1);
            $table->integer('model_name_id')->default(1);
            $table->foreignId('color_id')->default(1);
            $table->string('registration_no')->unique();
            $table->string('car_type');
            $table->text('image')->nullable();
            $table->text('feature_image')->nullable();
            $table->text('description')->nullable();
            $table->integer('seating_capacity');
            $table->decimal('rental_price_per_day', 8, 2);

            $table->integer('status')->default(1)->comment('0= Inactive, 1= Active');
            $table->integer('created_by')->default(0);
			$table->integer('modified_by')->default(0);  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
