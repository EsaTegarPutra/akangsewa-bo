<?php

namespace App\Http\Controllers\Order\CompletedOrder;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Library\CurlGen;
use yajra\Datatables\Datatables;
use Session;

class CompletedOrderControllers extends Controller
{
    public function index()
    {
        return view('order.historyOrder.index');
    }

    public function getIndex(CurlGen $curlGen)
    {
        $completed = 'd';
        $urlData = "/api/orders/getAllOrdersByStatus/" . $completed . "?size=99999&sort=id%2Cdesc";
        $resultData = $curlGen->getIndex($urlData);

        return Datatables::of($resultData)->escapeColumns([])->make(true);
    }

    public function show()
    {
        return view('order.historyOrder.show');
    }
}
