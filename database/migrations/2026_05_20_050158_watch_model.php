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
        schema::create('watch_model', function (Blueprint $table){
            $table->id('modelId');
            $table->foreignId('brandId')
                ->constrained('brands', 'brandId')
                ->onDelete('cascade');
            $table->string('model_name', 50);
            $table->year('year');
            $table->enum('movement_type', [
                'manual',
                'automatic',
                'quartz'
            ]);
            $table->string('desc', 150);
            $table->string('image');
            $table->string('reference_number', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('watch_model');
    }
};
