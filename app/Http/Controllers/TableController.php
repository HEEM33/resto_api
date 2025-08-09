<?php

namespace App\Http\Controllers;

use App\Models\Table;
use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class TableController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
      /*  return [
            new Middleware('auth:sanctum', except: ['index', 'show'])
        ];*/

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Table::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $fields = $request->validate([
            'name' => 'required',  
            'restaurant' => 'required|exists:restaurants,id',
        ]);
        
         $restaurant = Restaurant::findOrFail($fields['restaurant']);

            $table = $restaurant->tables()->create([
                'name' => $fields['name']
            ]);

        return $table;
    }

    /**
     * Display the specified resource.
     */
    public function show(Table $table)
    {
        return ['table' => $table];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Table $table)
    {
        $fields = $request->validate([
        'name' => 'sometimes|required',
        'restaurant' => 'sometimes|required|exists:restaurants,id',
        
    ]);

    

    $table->update([
        'name' => $fields['name'] ?? $table->name,
        'restaurant_id' => $fields['resstaurant'] ?? $table->restaurant_id,
    ]);


        return $table;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Table $table)
    {
         $table->delete();

        return ['message' => 'supprime'];
    }
}
