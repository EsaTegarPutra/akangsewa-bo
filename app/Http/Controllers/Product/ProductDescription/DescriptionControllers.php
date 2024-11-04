<?php

namespace App\Http\Controllers\Product\ProductDescription;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Library\CurlGen;
use Yajra\DataTables\Facades\DataTables;
use Session;

class DescriptionControllers extends Controller
{
    public function index()
    {
        return view('desc-product.index');
    }
    public function getIndex(CurlGen $curlGen)
    {

        $urlData = "/api/product-descriptions?size=99999&sort=id%2Cdesc";
        $resultData = $curlGen->getIndex($urlData);

        return DataTables::of($resultData)->escapeColumns([])->make(true);
    }
    public function create(CurlGen $curlGen)
    {
        $urlData = "/api/products?size=99999&sort=id%2Cdesc";
        $products = $curlGen->getIndex($urlData);
        return view('desc-product.create', compact('products'));
    }
    public function edit(CurlGen $curlGen, $id)
    {
        $urlData = "/api/products?size=99999&sort=id%2Cdesc";
        $products = $curlGen->getIndex($urlData);
        $description = "/api/product-descriptions/" . $id;
        $result = $curlGen->getIndex($description);

        return view('desc-product.edit', compact('products'))
            ->with('description', $result);
    }
    public function delete(CurlGen $curlGen, $id)
    {
        $description = "/api/product-descriptions/" . $id;
        $result = $curlGen->delete($description);
        return redirect(url('product/description'));
    }
    public function store(CurlGen $curlGen, Request $request)
    {
        // dd($request->all());
        $url = "/api/product-descriptions";
        $data = array(
            "descriptionValue" => $request->descriptionValue,
            "productId" => $request->productId,
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

        return redirect(url('product/description'))->with('status', $alert);
    }

    public function update(CurlGen $curlGen, Request $request, $id)
    {

        $url = "/api/product-descriptions";
        $data = array(
            "id" => $id,
            "descriptionValue" => $request->descriptionValue,
            "productId" => $request->productId,
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

        return redirect(url('product/description'));
    }
}
