<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    /** @use HasFactory<\Database\Factories\MenuFactory> */
    use HasFactory;
    protected $fillable = [
        'type_id',
        'categorie_id',  
        'name', 
        'prix',
        'description',
        'image',
               
    ];

     public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

     public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function commande()
    {
        return $this->hasMany(Commande::class);
    }
}
