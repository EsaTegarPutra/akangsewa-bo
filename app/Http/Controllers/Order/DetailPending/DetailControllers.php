<?php

namespace App\Http\Controllers\Order\DetailPending;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Library\CurlGen;
use Yajra\DataTables\Facades\DataTables;

class DetailControllers extends Controller
{
    public function index()
    {
        return view('detail-pending.index');
    }

    public function getIndex(CurlGen $curlgen)
    {
        $urlData = '/api/order-details/pending';
        $resultData = $curlgen->getIndex($urlData);
        return DataTables::of($resultData)->escapeColumns([])->make(true);
    }

    public function show($id)
    {
        
    }

    
}
