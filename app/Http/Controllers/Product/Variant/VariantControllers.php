<?php

namespace App\Http\Controllers\Product\Variant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Library\CurlGen;
use Yajra\DataTables\DataTables;

class VariantControllers extends Controller
{
    public function index()
    {
        return view('variant.index');
    }
    public function getIndex(CurlGen $curlGen)
    {

        $urlData = "/api/product-variants?size=99999&sort=id%2Cdesc";
        $resultData = $curlGen->getIndex($urlData);

        return DataTables::of($resultData)->escapeColumns([])->make(true);
    }

    public function checkProductImage(CurlGen $curlGen, $id)
    {
        $imageData = "/api/product-images/countByProductId/" . $id;
        $images = $curlGen->getIndex($imageData);

        return $images;
    }

    public function create(CurlGen $curlGen)
    {
        $urlData = "/api/products?size=99999&sort=id%2Cdesc";
        $products = $curlGen->getIndex($urlData);
        return view('variant.create', compact('products'));
    }
    public function edit(CurlGen $curlGen, $id)
    {

        $urlData = "/api/products?size=99999&sort=id%2Cdesc";
        $products = $curlGen->getIndex($urlData);
        $variant = "/api/product-variants/" . $id;
        $result = $curlGen->getIndex($variant);

        return view('variant.edit', compact('products'))->with('variant', $result);
    }
    public function delete(CurlGen $curlGen, $id)
    {
        $variant = "/api/product-variants/" . $id;
        $result = $curlGen->delete($variant);
        // dd($result);
        return redirect(url('product/variant'));
    }

    public function store(CurlGen $curlGen, Request $request)
    {
        // dd($request->all());
        $url = "/api/product-variants";
        $data = array(
            "productId" => $request->productId,
            "variantName" => $request->variantName,
            "stock" => $request->stock,
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
        return redirect(url('product/variant'));
    }

    public function update(CurlGen $curlGen, Request $request, $id)
    {
        // dd($request->all());


        $url = "/api/product-variants";
        $data = array(
            "id" => $id,
            "productId" => $request->productId,
            "variantName" => $request->variantName,
            "stock" => $request->stock,
        );
        // dd($data);

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

        return redirect(url('product/variant'));
    }
}
