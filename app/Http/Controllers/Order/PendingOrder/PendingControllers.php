<?php

namespace App\Http\Controllers\Order\PendingOrder;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Library\CurlGen;
use Yajra\DataTables\Facades\DataTables;

class PendingControllers extends Controller
{
    public function index()
    {
        return view('order.pending-order.index');
    }
    public function create()
    {
        return view('order.pending-order.create');
    }

    public function getIndex(CurlGen $curlGen)
    {
        $urlData = "/api/orders?size=99999&sort=id%2Cdesc";
        $resultData = $curlGen->getIndex($urlData);

        return DataTables::of($resultData)->escapeColumns([])->make(true);
    }
}
