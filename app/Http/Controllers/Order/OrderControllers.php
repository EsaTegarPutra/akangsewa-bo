<?php

namespace App\Http\Controllers\Order;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderControllers extends Controller
{
    public function index(){
        
    }
    public function detailOrder(){
        return view('detail-order.index');
    }
    public function trackingDelivery(){
        return view('tracking-delivery.index');
    }
    public function trackingDeliveryDetail(){
        return view('tracking-delivery.detail-tracking');
    }
}
