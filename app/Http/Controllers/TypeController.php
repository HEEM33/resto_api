<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Type::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $fields = $request->validate([
            'name' => 'required',  
        ]);

        $type = Type::create($fields);

        return $type;
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        return ['type' => $type];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Type $type)
    {
         $fields = $request->validate([
            'name' => 'required',  
        ]);

        $type->update($fields);

        return $type;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        $type->delete();

        return ['message' => 'supprime'];
    }
}
