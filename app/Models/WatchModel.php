<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WatchModel extends Model
{
    protected $table = 'watch_model';
    protected $primaryKey = 'modelId';
    protected $fillable = [
        'brandId',
        'model_name',
        'year',
        'movement_type',
        'desc',
        'image',
        'reference_number'
    ];

    public function brand(){
        return $this->belongsTo(Brand::class, 'brandId');
    }

    public function watchUnits(){
        return $this->hasMany(WatchUnit::class, 'modelId');
    }
}
