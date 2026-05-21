<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WatchUnit extends Model
{
    protected $table = 'watch_unit';
    protected $primaryKey = 'unitId';
    protected $fillable = [
        'modelId',
        'sku',
        'condition',
        'status',
        'purchase_price',
        'asking_price',
        'sold_price',
        'purchase_date',
        'sold_date',
        'note',
        'held'
    ];

    public function watchModel(){
        return $this->belongsTo(WatchModel::class, 'modelId');
    }

    public function transactions(){
        return $this->hasMany(Transaction::class, 'unitId');
    }

    public function restorations(){
        return $this->hasMany(Restoration::class, 'unitId');
    }

}
