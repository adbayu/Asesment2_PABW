<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $status = $request->input('status');
        $allowedStatuses = ['dikemas', 'dalam perjalanan', 'sampai'];

        $orders = Order::where('nim_penjual', $request->user()->nim)
            ->when($search, function ($query) use ($search) {
                $query->where('product_name', 'like', "%{$search}%");
            })
            ->when($status && in_array($status, $allowedStatuses, true), function ($query) use ($status) {
                $query->where('status', $status);
            })
            ->orderByDesc('id')
            ->get();

        return view('seller.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('seller.orders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'product_name' => ['required', 'string', 'max:255'],
            'product_price' => ['required', 'integer', 'min:0'],
            'status' => ['required', 'in:dikemas,dalam perjalanan,sampai'],
        ]);

        $data['nim_penjual'] = $request->user()->nim;

        Order::create($data);

        return redirect()->route('seller.orders.index')->with('success', 'Pesanan berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $order = Order::where('nim_penjual', $request->user()->nim)->findOrFail($id);

        return view('seller.orders.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'product_name' => ['required', 'string', 'max:255'],
            'product_price' => ['required', 'integer', 'min:0'],
            'status' => ['required', 'in:dikemas,dalam perjalanan,sampai'],
        ]);

        $order = Order::where('nim_penjual', $request->user()->nim)->findOrFail($id);
        $order->update($data);

        return redirect()->route('seller.orders.index')->with('success', 'Pesanan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $order = Order::where('nim_penjual', $request->user()->nim)->findOrFail($id);
        $order->delete();

        return redirect()->route('seller.orders.index')->with('success', 'Pesanan berhasil dihapus.');
    }
}
