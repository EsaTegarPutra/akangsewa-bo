<?php

namespace App\Http\Controllers\Order\DetailPending;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Library\CurlGen;

class DetailControllers extends Controller
{
    public function index()
    {
        return view('detail-pending.index');
    }

    
}
