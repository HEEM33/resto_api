<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    /** @use HasFactory<\Database\Factories\TableFactory> */
    use HasFactory;
    protected $fillable = [
        'restaurant_id',
        'name',
    ];

    public function menu()
    {
        return $this->hasMany(Menu::class);
    }

     public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
