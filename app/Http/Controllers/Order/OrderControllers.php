<?php

namespace App\Http\Controllers\Order;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Library\CurlGen;
use Yajra\DataTables\Facades\DataTables;

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
        return view('tracking-delivery.show');
    }
    public function getIndex(CurlGen $curlGen)
    {
        $urlData = "/api/orders/getAllOrdersByStatus/p?size=99999&sort=id%2Cdesc";
        $resultData = $curlGen->getIndex($urlData);
        return DataTables::of($resultData)->escapeColumns([])->make(true);
    }
}
