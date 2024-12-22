<?php

namespace App\Http\Controllers\Order\Progress;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Library\CurlGen;
use Yajra\DataTables\Facades\DataTables;

class ProgressControllers extends Controller
{
    public function index()
    {
        return view('order.order-progress.index');
    }
    public function getIndex(CurlGen $curlGen)
    {
        $urlData = "/api/orders/getAllOrdersByStatus/O";
        $resultData = $curlGen->getIndex($urlData);
        return DataTables::of($resultData)->escapeColumns([])->make(true);
    }
}
