<?php

namespace App\Http\Controllers\TenantShipping;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Library\CurlGen;
use Yajra\DataTables\Facades\DataTables;

class TenantShippingControllers extends Controller
{
    public function index(){
        return view('tenant-shipping.index');
    }
    public function getIndex(CurlGen $curlGen){
        $urlData = '/api/tenant-shippings';
        $resultData = $curlGen->getIndex($urlData);

        return DataTables::of($resultData)->escapeColumns([])->make(true);
    }
    public function create(){
        return view('tenant-shipping.create');
    }
    public function edit(CurlGen $curlGen, $id){
        $shipping = '/api/tenant-shippings/'. $id;
        $resultData = $curlGen->getIndex($shipping);
        // dd($resultData);
        return view('tenant-shipping.edit')->with('shipping', $resultData);
    }
    public function store(CurlGen $curlGen, Request $request){
        $url = '/api/tenant-shippings';
        $data = array(
            "shippingName" => $request->shippingName,
            "shippingPrice" => $request->shippingPrice,
            "shippingType" => $request->shippingType,
            "status" => $request->status,
        );
       
        $resultData = $curlGen->store($url, $data);
        if ($resultData[0] != 201) {
            $info = "Error";
            $colors = "red";
            $icons = "fas fa-times";
            if ($resultData['1']['message'] == null) {
              $msg = "Internal Server Error [500]";
            } else {
              $msg = $resultData['1']['message'];
            }
            $alert = $msg;
          } else {
            $info = "Success";
            $colors = "green";
            $icons = "fas fa-check-circle";
            $alert = 'Saved';
          }
          return redirect(url('masterData/tenantShipping'));
    }

    public function update(CurlGen $curlGen, Request $request, $id){
        $url = '/api/tenant-shippings';
        $data = array(
            "id" => $id,
            "shippingName" => $request->shippingName,
            "shippingPrice" => $request->shippingPrice,
            "shippingType" => $request->shippingType,
            "status" => $request->status,
        );
       
        $resultData = $curlGen->update($url, $data);
        // dd($resultData);
        if ($resultData[0] != 200) {
            $info = "Error";
            $colors = "red";
            $icons = "fas fa-times";
            if ($resultData['1']['message'] == null) {
              $msg = "Internal Server Error [500]";
            } else {
              $msg = $resultData['1']['message'];
            }
            $alert = $msg;
          } else {
            $info = "Success";
            $colors = "green";
            $icons = "fas fa-check-circle";
            $alert = 'Saved';
          }
          return redirect(url('masterData/tenantShipping'));
    }

    public function delete(CurlGen $curlGen, $id){
        $urlData = '/api/tenant-shippings/'. $id;
        $resultData = $curlGen->delete($urlData);
        return redirect(url('masterData/tenantShipping')); 
    }
}
