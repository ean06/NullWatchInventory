<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restoration extends Model
{
    protected $table = 'restoration';
    protected $primaryKey = 'restId';
    protected $fillable = [
        'unitId',
        'detail_services',
        'cost',
        'vendor',
        'services_date',
        'completed_date',
        'note'
    ];

    public function watchUnit(){
        return $this->belongsTo(WatchUnit::class, 'unitId');
    }

}
