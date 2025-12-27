<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    // public function index(Request $request)
    // {
    //     $statuses = ['menunggu konfirmasi', 'Berhasil', 'Ditolak'];

    //     $payments = Payment::query()
    //         ->when(
    //             $request->filled('status') && in_array($request->status, $statuses, true),
    //             fn($query) => $query->where('status', $request->status)
    //         )
    //         ->orderByDesc('id')
    //         ->paginate(10)
    //         ->withQueryString();

    //     return view('seller.payments.index', compact('payments', 'statuses'));
    // }
}