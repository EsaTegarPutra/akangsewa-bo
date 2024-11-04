<?php

namespace App\Http\Controllers\Order;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HistoryOrderControllers extends Controller
{
    public function index(){
        return view('order.historyOrder.index');
    }

    public function show(){
        return view('order.historyOrder.show');
    }
}
