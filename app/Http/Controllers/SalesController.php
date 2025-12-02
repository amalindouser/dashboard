<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index(Request $request)
    {
        $query = Sale::query();

        
        if ($request->start_date && $request->end_date) {
            $query->whereBetween('sale_date', [
                $request->start_date,
                $request->end_date
            ]);
        }

        $sales = $query->orderBy('sale_date')->get();

        $total = $sales->sum(fn($s) => $s->quantity * $s->price);

        return view('sales.index', compact('sales', 'total'));
    }
}
