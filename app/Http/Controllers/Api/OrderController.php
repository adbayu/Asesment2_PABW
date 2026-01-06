<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
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

        return response()->json(['data' => $orders]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'product_name' => ['required', 'string', 'max:255'],
            'product_price' => ['required', 'integer', 'min:0'],
            'status' => ['required', 'in:dikemas,dalam perjalanan,sampai'],
        ]);

        $data['nim_penjual'] = $request->user()->nim;

        $order = Order::create($data);

        return response()->json(['data' => $order], 201);
    }

    public function show(Request $request, $id)
    {
        $order = Order::where('nim_penjual', $request->user()->nim)->findOrFail($id);

        return response()->json(['data' => $order]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'product_name' => ['required', 'string', 'max:255'],
            'product_price' => ['required', 'integer', 'min:0'],
            'status' => ['required', 'in:dikemas,dalam perjalanan,sampai'],
        ]);

        $order = Order::where('nim_penjual', $request->user()->nim)->findOrFail($id);
        $order->update($data);

        return response()->json(['data' => $order]);
    }

    public function destroy(Request $request, $id)
    {
        $order = Order::where('nim_penjual', $request->user()->nim)->findOrFail($id);
        $order->delete();

        return response()->noContent();
    }
}
