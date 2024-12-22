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
        $urlOrder = "/api/orders/" . $id;
        $order = $curlGen->getIndex($urlOrder);
    
        $urlCustomer = "/api/customers/" . $order['customerId'];
        $customer = $curlGen->getIndex($urlCustomer);
    
        $urlAddress = "/api/customer-addresses?customerId=" . $order['customerId'];
        $addresses = $curlGen->getIndex($urlAddress);
    
        $urlOrderDetails = "/api/order-details?orderId=" . $id;
        $orderDetails = $curlGen->getIndex($urlOrderDetails);
    
        return view('detail-order.index', compact('order', 'customer', 'addresses', 'orderDetails'));
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
