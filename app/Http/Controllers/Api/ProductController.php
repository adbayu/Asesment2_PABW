<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $condition = $request->input('condition');
        $allowedConditions = ['baru', 'bekas'];

        $products = Product::query()
            ->where('nim_penjual', $request->user()->nim)
            ->when($request->filled('search'), function ($query) use ($request) {
                $searchTerm = $request->input('search');

                $query->where(function ($subQuery) use ($searchTerm) {
                    $subQuery->where('name', 'like', "%{$searchTerm}%")
                        ->orWhere('description', 'like', "%{$searchTerm}%");
                });
            })
            ->when($condition && in_array($condition, $allowedConditions, true), function ($query) use ($condition) {
                $query->where('condition', $condition);
            })
            ->orderByDesc('id')
            ->get();

        return response()->json(['data' => $products]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'integer', 'min:0'],
            'condition' => ['required', 'in:baru,bekas'],
            'description' => ['nullable', 'string'],
        ]);

        $data['nim_penjual'] = $request->user()->nim;

        $product = Product::create($data);

        return response()->json(['data' => $product], 201);
    }

    public function show(Request $request, $id)
    {
        $product = Product::where('nim_penjual', $request->user()->nim)->findOrFail($id);

        return response()->json(['data' => $product]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'integer', 'min:0'],
            'condition' => ['required', 'in:baru,bekas'],
            'description' => ['nullable', 'string'],
        ]);

        $product = Product::where('nim_penjual', $request->user()->nim)->findOrFail($id);
        $product->update($data);

        return response()->json(['data' => $product]);
    }

    public function destroy(Request $request, $id)
    {
        $product = Product::where('nim_penjual', $request->user()->nim)->findOrFail($id);
        $product->delete();

        return response()->noContent();
    }
}
