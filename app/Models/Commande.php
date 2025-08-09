<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    /** @use HasFactory<\Database\Factories\CommandeFactory> */
    use HasFactory;
    protected $fillable = [
        'user_id',
        'table_id',
        'menu_id',
    ];

     public function table()
    {
        return $this->belongsTo(Table::class);
    }

     public function user()
    {
        return $this->belongsTo(User::class);
    }

     public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
