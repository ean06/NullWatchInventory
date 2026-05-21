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
        schema::create('transaction', function(Blueprint $table){
            $table->id('transactionId');
            $table->foreignId('unitId')
                ->constrained('watch_unit', 'unitId')
                ->onDelete('cascade');
            $table->enum('type', [
                'purchase',
                'sale',
                'expenses'
            ]);
            $table->enum('expenses_detail', [
                'shippingcost',
                'advert',
                'pakaging'
            ]);
            $table->integer('amount');
            $table->string('buyer_name');
            $table->string('buyer_contact');
            $table->date('transaction_date');
            $table->string('notes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
