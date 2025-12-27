<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {

        //$products = Product::query()
        //->when()
        //->get();

        $products = Product::query()
            ->when($request->filled('search'), function ($query) use ($request) {
                $searchTerm = $request->input('search');

                $query->where(function ($subQuery) use ($searchTerm) {
                    $subQuery->where('name', 'like', "%{$searchTerm}%")
                        ->orWhere('description', 'like', "%{$searchTerm}%");
                });
            })
            ->orderByDesc('id')
            ->get();

        return view('seller.products.index', compact('products'));
    }

    public function search(Request $request)
    {
        return $this->index($request);
    }

    public function create()
    {
        return view('seller.products.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'integer', 'min:0'],
            'condition' => ['required', 'in:baru,bekas'],
            'description' => ['nullable', 'string'],
        ]);

        Product::create($data);

        return redirect()->route('seller.products.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    
    public function edit(Product $product)
    {
        return view('seller.products.edit', compact('product'));
    }


    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'integer', 'min:0'],
            'condition' => ['required', 'in:baru,bekas'],
            'description' => ['nullable', 'string'],
        ]);

        $product->update($data);

        return redirect()->route('seller.products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('seller.products.index')->with('success', 'Produk berhasil dihapus.');
    }
}
