<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Relance extends Model
{
    use HasFactory,Sortable;

    protected $fillable = [
        'prospect_id',
        'user_id',
        'dateRelance',
        'effectuee'
    ];

    public function prospect(){
        return $this->belongsTo(Prospect::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
