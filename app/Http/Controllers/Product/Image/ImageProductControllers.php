<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Library\CurlGen;
use yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Storage;

class ImageProductControllers extends Controller
{
    public function index()
    {
        return view('product.image-repository.index');
    }

    public function getIndex(CurlGen $curlGen)
    {
        // Fetch product data
        $urlData = "/api/product-images?size=99999&sort=id%2Cdesc";
        $resultData = $curlGen->getIndex($urlData);

        // Fetch attribute values data
        $urlDataAttributeValues = "/api/attribute-values?size=99999&sort=id%2Cdesc";
        $attributeValues = $curlGen->getIndex($urlDataAttributeValues);

        // Fetch product data including product name
        $urlDataProducts = "/api/products?size=99999&sort=id%2Cdesc";
        $products = $curlGen->getIndex($urlDataProducts);

        // Map attribute values to their IDs
        $attributeValueMap = [];
        foreach ($attributeValues as $attributeValue) {
            $attributeValueMap[$attributeValue['id']] = $attributeValue['valuesAttribute'];
        }

        // Map product names to their IDs
        $productMap = [];
        foreach ($products as $product) {
            $productMap[$product['id']] = $product['productName'];
        }

        // Combine product and attribute data into the result
        foreach ($resultData as &$value) {
            // Attach attribute value
            $value['valuesAttribute'] = $attributeValueMap[$value['attributeValuesId']] ?? null;

            // Attach product name
            $value['productName'] = $productMap[$value['productId']] ?? null;
        }

        return Datatables::of($resultData)->escapeColumns([])->make(true);
    }


    public function create(CurlGen $curlGen)
    {
        $urlDataProducts = "/api/products?size=99999&sort=id%2Cdesc";
        $urlDataAttributeValues = "/api/attribute-values?size=99999&sort=id%2Cdesc";
        $products = $curlGen->getIndex($urlDataProducts);
        $attributeValues = $curlGen->getIndex($urlDataAttributeValues);

        return view('product.image-repository.create', compact('products', 'attributeValues'));
    }


    public function store(CurlGen $curlGen, Request $request)
    {
        // dd($request->all());
        $url = "/api/product-images";

        if ($request->hasFile('imagesProduct')) {
            $imageFile = $request->file('imagesProduct');

            $imageBase64 = base64_encode(file_get_contents($imageFile->getRealPath()));
        }

        $data = array(
            "productId" => $request->productId,
            "attributeValuesId" => $request->attributeValuesId,
            "imagesProduct" => $imageBase64,
            "imagesProductContentType" => $imageFile->getMimeType(),
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
        return redirect(url('product/imageRepository'));
    }

    public function edit(CurlGen $curlGen, $id)
    {

        $productImage = "/api/product-images/" . $id;
        $resultProductImage = $curlGen->getIndex($productImage);

        $products = "/api/products?size=99999&sort=id%2Cdesc";
        $resultProducts = $curlGen->getIndex($products);

        $pttributeValues = "/api/attribute-values?size=99999&sort=id%2Cdesc";
        $resultAttributeValues = $curlGen->getIndex($pttributeValues);

        return view('product.image-repository.edit')
            ->with('productImage', $resultProductImage)
            ->with('products', $resultProducts)
            ->with('attributeValues', $resultAttributeValues);
    }

    public function update(CurlGen $curlGen, Request $request, $id)
    {
        $url = "/api/product-images";

        $imageBase64 = null;
        $imageContentType = null;

        if ($request->hasFile('imagesProduct')) {
            $imageFile = $request->file('imagesProduct');

            $imageBase64 = base64_encode(file_get_contents($imageFile->getRealPath()));
            $imageContentType = $imageFile->getMimeType();
        } else {
            $imageBase64 = $request->input('existingImage');
            $imageContentType = $request->input('existingImageContentType'); 
        }

        $data = [
            "id" => $id,
            "productId" => $request->productId,
            "attributeValuesId" => $request->attributeValuesId,
            "imagesProduct" => $imageBase64,
            "imagesProductContentType" => $imageContentType,
            "status" => $request->status
        ];

        $resultData = $curlGen->update($url, $data);

        if ($resultData[0] != 201) {
            $info = "Error";
            $colors = "red";
            $icons = "fas fa-times";
            $msg = isset($resultData[1]['message']) ? $resultData[1]['message'] : "Internal Server Error [500]";
            $alert = $msg;
        } else {
            $info = "Success";
            $colors = "green";
            $icons = "fas fa-check-circle";
            $alert = 'Saved';
        }

        return redirect(url('product/imageRepository'));
    }


    public function delete(CurlGen $curlGen, $id)
    {
        $productImages = "/api/product-images/" . $id;

        $result = $curlGen->delete($productImages);

        return redirect(url('product/imageRepository'));
    }
}
