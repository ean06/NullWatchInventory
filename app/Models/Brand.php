<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'brands';
    protected $primaryKey = 'brandId';
    protected $fillable = [
        'name',
        'desc'
    ];
    public function watchModels(){
        return $this->hasMany(WatchModel::class, 'brandId');
    }
}
