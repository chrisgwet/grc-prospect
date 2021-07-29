<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domaine extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'slug'
    ];

    public function prospect(){
        return $this->hasMany('App\Models\Prospect');
    }
}
