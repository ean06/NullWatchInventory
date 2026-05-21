<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transaction';
    protected $primaryKey = 'transactionId';
    protected $fillable = [
        'unitId',
        'type',
        'expenses_detail',
        'amount',
        'buyer_name',
        'buyer_contact',
        'transaction_date',
        'notes'
    ];

    public function watchUnit(){
        return $this->belongsTo(WatchUnit::class, 'unitId');
    }

}
