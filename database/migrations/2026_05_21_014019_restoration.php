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
        schema::create('restoration', function(Blueprint $table){
            $table->id('restId');
            $table->foreignId('unitId')
                ->constrained('watch_unit', 'unitId')
                ->onDelete('cascade');
            $table->string('detail_services');
            $table->integer('cost');
            $table->string('vendor');
            $table->date('services_date');
            $table->date('completed_date');
            $table->string('note');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        schema::dropIfExists('restoration');
    }
};
