<?php

namespace App\Http\Controllers\Attribute;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Library\CurlGen;
use Yajra\DataTables\DataTables;

class AttributeControllers extends Controller
{
    public function index(){
        return view('attribute.index');
      }
      public function getIndex(CurlGen $curlGen){
  
        $urlData = "/api/attributes?size=99999&sort=id%2Cdesc";
        $resultData = $curlGen->getIndex($urlData);
  
        return DataTables::of($resultData)->escapeColumns([])->make(true);
      }
      public function create(){
        return view('attribute.create');
      }
      public function edit(CurlGen $curlGen, $id){
  
        $attribute = "/api/attributes/".$id;
        $result = $curlGen->getIndex($attribute);
  
        return view('attribute.edit')
        ->with('attribute', $result);
  
      }
      public function delete(CurlGen $curlGen, $id){
  
        $attribute = "/api/attributes/".$id;
        $result = $curlGen->delete($attribute);
        return redirect(url('product/attribute'));
  
      }
      public function store(CurlGen $curlGen, Request $request){
        // dd($request->all());
        $url = "/api/attributes";
        $data = array(
            "name" => $request->name,
        );
  
        $resultData = $curlGen->store($url, $data);
        if($resultData[0]!=201){
          $info = "Error";
          $colors = "red";
          $icons = "fas fa-times";
          if($resultData['1']['message']==null){$msg="Internal Server Error [500]";}
          else{$msg = $resultData['1']['message'];}
          $alert = $msg;
      }else{
          $info = "Success";
          $colors = "green";
          $icons = "fas fa-check-circle";
          $alert = 'Saved';
      } 
        //  dd($data);
      return redirect(url('product/attribute'));
      }
  
      public function update(CurlGen $curlGen, Request $request, $id){
  
        $url = "/api/attributes";
        $data = array(
            "id" => $id,
            "name" => $request->name,
        );
  
        $resultData = $curlGen->update($url, $data);
        
        if($resultData[0]!=200){
          $info = "Error";
          $colors = "red";
          $icons = "fas fa-times";
          if($resultData['1']['message']==null){$msg="Internal Server Error [500]";}
          else{$msg = $resultData['1']['message'];}
          $alert = $msg;
      }else{
          $info = "Success";
          $colors = "green";
          $icons = "fas fa-check-circle";
          $alert = 'Saved';
      }
  
      return redirect(url('product/attribute'));
      }
}
