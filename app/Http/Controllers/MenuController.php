<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Menu::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required', 
            'prix' => 'required',
            'description' => 'required',
            'type' => 'required|exists:types,id',
            'categorie' => 'required|exists:categories,id', 
            'image' => 'required|file', 
        ]);

         $imagePath = $request->file('image')->store('menus', 'public');

         $menu = Menu::create([
        'name' => $fields['name'],
        'prix' => $fields['prix'],
        'description' => $fields['description'],
        'type_id' => $fields['type'],
        'categorie_id' => $fields['categorie'],
        'image' => $imagePath,
        
        ]);

        return $menu;
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        return ['menu' => $menu];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        
    $fields = $request->validate([
        'name' => 'sometimes|required',
        'prix' => 'sometimes|required|numeric',
        'description' => 'sometimes|required',
        'type' => 'sometimes|required|exists:types,id',
        'categorie' => 'sometimes|required|exists:categories,id',
        'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    if ($request->hasFile('image')) {
        if ($menu->image) {
            Storage::disk('public')->delete($menu->image);
        }

        $fields['image'] = $request->file('image')->store('menus', 'public');
    }

    $menu->update([
        'name' => $fields['name'] ?? $menu->name,
        'prix' => $fields['prix'] ?? $menu->prix,
        'description' => $fields['description'] ?? $menu->description,
        'type_id' => $fields['type'] ?? $menu->type_id,
        'categorie_id' => $fields['categorie'] ?? $menu->categorie_id,
        'image' => $fields['image'] ?? $menu->image,
    ]);


        return $menu;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
         $menu->delete();

        return ['message' => 'supprime'];
    }
}
