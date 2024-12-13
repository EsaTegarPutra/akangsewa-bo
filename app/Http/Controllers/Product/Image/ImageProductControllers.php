<?php

namespace App\Http\Controllers\Product\Image;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Library\CurlGen;
use Illuminate\Support\Facades\Validator;
use yajra\Datatables\Datatables;

class ImageProductControllers extends Controller
{
    public function index()
    {
        return view('image-repository.index');
    }

    public function getIndex(CurlGen $curlGen)
    {
        $urlData = "/api/product-images?size=99999&sort=id%2Cdesc";
        $resultData = $curlGen->getIndex($urlData);

        return Datatables::of($resultData)->escapeColumns([])->make(true);
    }


    public function create(CurlGen $curlGen)
    {
        $urlDataProductVariant = "/api/product-variants?size=99999&sort=id%2Cdesc";
        $productVariants = $curlGen->getIndex($urlDataProductVariant);

        return view('image-repository.create', compact('productVariants'));
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
            "productVariantId" => $request->productVariantId,
            "imagesProduct" => $imageBase64,
            "imagesProductContentType" => $imageFile->getMimeType(),
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

        $productVariants = "/api/product-variants?size=99999&sort=id%2Cdesc";
        $resultProductVariants = $curlGen->getIndex($productVariants);

        return view('image-repository.edit')
            ->with('productImage', $resultProductImage)
            ->with('productVariants', $resultProductVariants);
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

        $data = array(
            "id" => $id,
            "productVariantId" => $request->productVariantId,
            "imagesProduct" => $imageBase64,
            "imagesProductContentType" => $imageContentType,
        );

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
