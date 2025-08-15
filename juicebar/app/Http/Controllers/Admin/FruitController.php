<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Fruit;
use Illuminate\Http\Request;

class FruitController extends Controller
{
    public function index()
    {
        $fruits = Fruit::latest()->paginate(10);
        return view('admin.fruits.index', compact('fruits'));
    }

    public function create()
    {
        return view('admin.fruits.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'emoji' => 'required|string|max:10',
            'color' => 'required|string|max:50',
            'price_per_serving' => 'required|numeric|min:0',
            'description' => 'required|string',
            'nutritional_benefits' => 'nullable|string',
            'stock_level' => 'required|integer|min:0',
            'is_available' => 'boolean'
        ]);

        $data = $request->all();
        $data['is_available'] = $request->has('is_available');
        
        if ($request->filled('nutritional_benefits')) {
            $data['nutritional_benefits'] = array_map('trim', explode(',', $request->nutritional_benefits));
        }

        Fruit::create($data);

        return redirect()->route('admin.fruits.index')->with('success', 'Fruit added successfully!');
    }

    public function show(Fruit $fruit)
    {
        return view('admin.fruits.show', compact('fruit'));
    }

    public function edit(Fruit $fruit)
    {
        return view('admin.fruits.edit', compact('fruit'));
    }

    public function update(Request $request, Fruit $fruit)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'emoji' => 'required|string|max:10',
            'color' => 'required|string|max:50',
            'price_per_serving' => 'required|numeric|min:0',
            'description' => 'required|string',
            'nutritional_benefits' => 'nullable|string',
            'stock_level' => 'required|integer|min:0',
            'is_available' => 'boolean'
        ]);

        $data = $request->all();
        $data['is_available'] = $request->has('is_available');
        
        if ($request->filled('nutritional_benefits')) {
            $data['nutritional_benefits'] = array_map('trim', explode(',', $request->nutritional_benefits));
        }

        $fruit->update($data);

        return redirect()->route('admin.fruits.index')->with('success', 'Fruit updated successfully!');
    }

    public function destroy(Fruit $fruit)
    {
        $fruit->delete();
        return redirect()->route('admin.fruits.index')->with('success', 'Fruit deleted successfully!');
    }
}
