<?php

namespace App\Http\Controllers\Order\Progress;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProgressControllers extends Controller
{
    public function index(){
        return view('order-progress.index');
    }
}
