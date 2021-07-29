<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class Prospect extends Model
{
    use HasFactory,Sortable, SoftDeletes;

    protected $fillable = [
        'domain_id',
        'nom',
        'telephone',
        'addresse',
        'latitude',
        'longitude',
    ];

    public function relances(){
        return $this->hasMany(Relance::class);
    }

    public function domain(){
        return $this->belongsTo(Domaine::class);
    }
}
