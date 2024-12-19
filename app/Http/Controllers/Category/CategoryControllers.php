<?php

namespace App\Http\Controllers\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Library\CurlGen;
use yajra\Datatables\Datatables;
use Session;

class CategoryControllers extends Controller
{
  public function index()
  {
    return view('category.index');
  }
  public function getIndex(CurlGen $curlGen)
  {

    $urlData = "/api/categories?size=99999&sort=id%2Cdesc";
    $resultData = $curlGen->getIndex($urlData);

    return Datatables::of($resultData)->escapeColumns([])->make(true);
  }

  public function checkProduct(CurlGen $curlGen, $id)
  {

    $urlData = "/api/countByCategoryId/" . $id;
    $resultData = $curlGen->getIndex($urlData);

    return $resultData;
  }

  public function create()
  {
    return view('category.create');
  }
  public function edit(CurlGen $curlGen, $id)
  {

    $category = "/api/categories/" . $id;
    $result = $curlGen->getIndex($category);

    return view('category.edit')
      ->with('category', $result);
  }


  public function delete(CurlGen $curlGen, $id)
  {
    $category = "/api/categories/" . $id;
    $result = $curlGen->delete($category);

    return redirect(url('masterData/category'));
  }

  public function store(CurlGen $curlGen, Request $request)
  {
    // dd($request->all());
    $url = "/api/categories";
    $data = array(
      "categoryName" => $request->categoryName,
      "status" => $request->status
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
    return redirect(url('masterData/category'));
  }

  public function update(CurlGen $curlGen, Request $request, $id)
  {

    //getCreatedAt
    $urls = "/api/categories/" . $id;
    $results = $curlGen->getIndex($urls);
    //End
    $url = "/api/categories";
    $data = array(
      "id" => $id,
      "createdAt" => $results['createdAt'],
      "categoryName" => $request->categoryName,
      "status" => $request->status
    );

    $resultData = $curlGen->update($url, $data);

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
    return redirect(url('masterData/category'));
  }
}
