<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Emprunt;

class Livre extends Model
{
    use HasFactory;

    public function emprunt(){
        return $this->hasOne(Emprunt::class);
    }

    public function auteur(){
        return $this->belongsTo(Auteur::class);
    }
}
