<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Library\CurlGen;
use Yajra\DataTables\Facades\DataTables;
use Session;

class ProductControllers extends Controller
{
    public function index()
    {
        return view('product.index');
    }

    public function getIndex(CurlGen $curlGen)
    {

        $urlData = "/api/products?size=99999&sort=id%2Cdesc";
        $resultData = $curlGen->getIndex($urlData);

        return DataTables::of($resultData)->escapeColumns([])->make(true);
    }

    public function checkProductDescription(CurlGen $curlGen, $id)
    {
        $descriptionData = "/api/product-descriptions/countByProductId/" . $id;
        $descriptions = $curlGen->getIndex($descriptionData);

        return $descriptions;
    }
    public function checkProductVariant(CurlGen $curlGen, $id)
    {
        $variantData = "/api/product-variants/countByProductId/" . $id;
        $variants = $curlGen->getIndex($variantData);

        return $variants;
    }

    public function create(CurlGen $curlGen)
    {
        $urlData = "/api/categories?size=99999&sort=id%2Cdesc";
        $categories = $curlGen->getIndex($urlData);

        // dd($categories);

        return view('product.create', compact('categories'));
    }


    public function edit(CurlGen $curlGen, $id)
    {
        $urlData = "/api/categories?size=99999&sort=id%2Cdesc";
        $categories = $curlGen->getIndex($urlData);
        $product = "/api/products/" . $id;
        $result = $curlGen->getIndex($product);

        return view('product.edit', compact('categories'))
            ->with('product', $result);
    }


    public function delete(CurlGen $curlGen, $id)
    {

        $product = "/api/products/" . $id;
        $result = $curlGen->delete($product);

        return redirect(url('product/master'))->with('success', 'berhasil');
    }
    public function store(CurlGen $curlGen, Request $request)
    {
        // dd($request->all());
        $url = "/api/products";
        $data = array(
            "productName" => $request->productName,
            "price" => $request->price,
            "avabilityStatus" => $request->avabilityStatus,
            "categoryId" => $request->categoryId,
        );

        $resultData = $curlGen->store($url, $data);
        // dd($resultData);

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
        // dd($data);
        return redirect(url('product/master'))->with('status', $alert);
    }

    public function update(CurlGen $curlGen, Request $request, $id)
    {

        $url = "/api/products";
        $data = array(
            "id" => $id,
            "productName" => $request->productName,
            "price" => $request->price,
            "avabilityStatus" => $request->avabilityStatus,
            "categoryId" => $request->categoryId,
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

        return redirect(url('product/master'));
    }
}
