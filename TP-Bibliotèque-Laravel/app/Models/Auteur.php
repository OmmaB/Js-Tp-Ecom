<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Livre;

class Auteur extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'prenom',
    ];
    
    public function livre(){
        return $this->hasMany(Livre::class);
    }
}
