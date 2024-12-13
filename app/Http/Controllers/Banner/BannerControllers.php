<?php

namespace App\Http\Controllers\Banner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Library\CurlGen;
use Yajra\DataTables\Facades\DataTables;

class BannerControllers extends Controller
{
    public function index()
    {
        return view('banner.index');
    }

    public function create(CurlGen $curlGen)
    {
        $urlData = "/api/banners?size=99999&sort=id%2Cdesc";
        $banners = $curlGen->getIndex($urlData);
        return view('banner.create', compact('banners'));
    }


    public function getIndex(CurlGen $curlGen)
    {
        $urlData = "/api/banners?size=99999&sort=id%2Cdesc";
        $resultData = $curlGen->getIndex($urlData);

        return DataTables::of($resultData)->escapeColumns([])->make(true);
    }

    public function edit(CurlGen $curlGen, $id)
    {

        $urlData = "/api/banners?size=99999&sort=id%2Cdesc";
        $orders = $curlGen->getIndex($urlData);
        $banner = "/api/banners/" . $id;
        $result = $curlGen->getIndex($banner);
        return view('banner.edit', compact('banners'))->with('banner', $result);
    }
    public function delete(CurlGen $curlGen, $id)
    {
        $banner = "/api/banners/" . $id;
        $result = $curlGen->delete($banner);

        // dd($result);
        return redirect(url('masterData/banner'));
    }

    public function store(CurlGen $curlGen, Request $request)
    {
        // dd($request->all());
        $url = "/api/banners";

        $imageBase64 = null;
        $imageMimeType = null;

        if ($request->hasFile('images')) {
            $imageFile = $request->file('images');

            $imageBase64 = base64_encode(file_get_contents($imageFile->getRealPath()));
            $imageMimeType = $imageFile->getMimeType();
        }

        $data = array(
            "bannerName" => $request->bannerName,
            "images" => $imageBase64,
            "imagesContentType" => $imageMimeType,
            "links" => $request->links,
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
        return redirect(url('masterData/banner'));
    }
    public function update(CurlGen $curlGen, Request $request, $id)
    {
        $url = "/api/banners";

        
        $imageBase64Images = null;
        $imageImagesContentType = null;

       
    
        if ($request->hasFile('images')) {
            $imageFileImages = $request->file('images');

            $imageBase64Images = base64_encode(file_get_contents($imageFileImages->getRealPath()));
            $imageImagesContentType = $imageFileImages->getMimeType();
        } else {
            $imageBase64Images = $request->input('existingImages');
            $imageImagesContentType = $request->input('existingImagesContentType');
        }

        $data = array(
            "id" => $id,
            "bannerName" => $request->bannerName,
            "images" => $imageBase64Images,
            "imagesContentType" => $imageImagesContentType,
            "links" => $request->links,
            "status" => $request->status
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

        return redirect(url('masterData/banner'));
    }
}
