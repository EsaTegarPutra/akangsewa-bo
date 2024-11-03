<?php

namespace App\Http\Controllers\Order\DetailOrder;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DetailControllers extends Controller
{
    public function index()
    {
        return view('detail-order.index');
    }
}
