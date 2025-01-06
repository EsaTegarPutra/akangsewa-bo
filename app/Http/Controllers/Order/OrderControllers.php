<?php

namespace App\Http\Controllers\Order;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Library\CurlGen;
use Yajra\DataTables\Facades\DataTables;

class OrderControllers extends Controller
{
    public function index() {}
    public function detailOrder(CurlGen $curlGen, $id) {
        $order = $curlGen->getIndex("/api/orders/" . $id);
    
        if (!$order) {
            abort(404, "Order not found");
        }
    
        $customer = $curlGen->getIndex("/api/customers/" . $order['customerId']);
    
        $customerAddresses = $curlGen->getIndex("/api/customer-addresses");
        $filteredAddresses = collect($customerAddresses)
            ->where('customerId', $order['customerId'])
            ->values();
    
        $orderDetails = $curlGen->getIndex("/api/order-details?orderId=" . $id);
    
        return view('detail-order.index', compact('order', 'customer', 'filteredAddresses', 'orderDetails'));
    }
    
    
    
    
    public function trackingDelivery()
    {
        return view('tracking-delivery.index');
    }
    public function trackingDeliveryDetail()
    {
        return view('tracking-delivery.show');
    }
    // public function getIndex(CurlGen $curlGen)
    // {
    //     $urlDetails = "";
    //     $resultDetails = $curlGen->getIndex($urlDetails);
    //     return DataTables::of($resultDetails)->escapeColumns([])->make(true);
    // }
    public function getIndexOrderDetail(CurlGen $curlGen)
    {
        $urlDetails = "/api/order-details?size=99999&sort=id%2Cdesc";
        $resultDetails = $curlGen->getIndex($urlDetails);
        return DataTables::of($resultDetails)->escapeColumns([])->make(true);
    }
}
