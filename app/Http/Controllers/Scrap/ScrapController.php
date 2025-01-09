<?php

namespace App\Http\Controllers\Scrap;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Library\CurlGen;
use Yajra\DataTables\Facades\DataTables;

class ScrapController extends Controller
{
    public function index(){
        return view('scrap.index');
    }

    public function getIndex(CurlGen $curlGen){
        $urlData = "/api/scraps?size=200";
        $resultData = $curlGen->getIndex($urlData);
        return DataTables::of($resultData)->escapeColumns([])->make(true);
    }

    public function details(CurlGen $curlGen, $id){
        $urlData = "/api/scraps/" . $id;
        $scrap = $curlGen->getIndex($urlData);
        return view('scrap.details', compact('scrap'));
    }

    public function getByType(CurlGen $curlGen, $type){
        $urlData = "/api/scraps/getByType/" . $type;
        $resultData = $curlGen->getIndex($urlData);
        return DataTables::of($resultData)->escapeColumns([])->make(true);
    }
    
}
