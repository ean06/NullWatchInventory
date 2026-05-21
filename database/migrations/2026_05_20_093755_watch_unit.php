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
        schema::create('watch_unit', function (Blueprint $table){
            $table->id('unitId');
            $table->foreignId('modelId')
                ->constrained('watch_model', 'modelId')
                ->onDelete('cascade');
            $table->string('sku');
            $table->enum('condition', [
                'minus',
                'excellent',
                'good',
                'fair',
                'poor'
            ]);
            $table->enum('status', [
                'availabel',
                'reserved',
                'sold',
                'inServices'
            ]);
            $table->integer('purchase_price');
            $table->integer('asking_price');
            $table->integer('sold_price');
            $table->date('purchase_date');
            $table->date('sold_date');
            $table->string('note');
            $table->string('held');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        schema::dropIfExists('watch_unit');
    }
};
