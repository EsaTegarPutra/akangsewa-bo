<?php

namespace App\Http\Controllers\Order\PendingOrder;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PendingControllers extends Controller
{
    public function index()
    {
        return view('pending-order.index');
    }
    public function create()
    {
        return view('pending-order.create');
    }
}
