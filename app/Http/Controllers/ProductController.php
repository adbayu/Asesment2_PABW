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

        $data['nim_penjual'] = $request->user()->nim;

        Product::create($data);

        return redirect()->route('seller.products.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    
    public function edit(Request $request, $id)
    {
        $product = Product::where('nim_penjual', $request->user()->nim)->findOrFail($id);

        return view('seller.products.edit', compact('product'));
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

        return redirect()->route('seller.products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $product = Product::where('nim_penjual', $request->user()->nim)->findOrFail($id);
        $product->delete();

        return redirect()->route('seller.products.index')->with('success', 'Produk berhasil dihapus.');
    }
}
