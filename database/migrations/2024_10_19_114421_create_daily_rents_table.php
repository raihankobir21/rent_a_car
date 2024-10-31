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
        Schema::create('daily_rents', function (Blueprint $table) {
            $table->id();
            $table->integer('brand_id')->default(1);
            $table->integer('model_name_id')->default(1);
            //$table->foreignId('color_id')->default(1);
            $table->text('dhaka_city')->nullable();
            $table->text('outside_dhaka')->nullable();
            $table->decimal('cng_rate', 8, 2);
            $table->decimal('octane_rate', 8, 2);

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
        Schema::dropIfExists('daily_rents');
    }
};
