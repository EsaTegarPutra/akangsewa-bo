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

    public function getIndex(CurlGen $curlGen)
    {
        $urlData = "/api/banners?size=99999&sort=id%2Cdesc";
        $resultData = $curlGen->getIndex($urlData);

        return DataTables::of($resultData)->escapeColumns([])->make(true);
    }
    public function create(CurlGen $curlGen)
    {
        $urlData = "/api/banners?size=99999&sort=id%2Cdesc";
        $banners = $curlGen->getIndex($urlData);
        return view('banner.create', compact('banners'));
    }

    public function edit(CurlGen $curlGen, $id)
    {
        $bannerImage = "/api/banners/" . $id;
        $result = $curlGen->getIndex($bannerImage);

        return view('banner.edit')
            ->with('bannerImage', $result);
    }

    public function delete(CurlGen $curlGen, $id)
    {
        $images = "/api/banners/" . $id;

        $result = $curlGen->delete($images);

        return redirect(url('masterData/banner'));
    }

    public function store(CurlGen $curlGen, Request $request)
    {
        // dd($request->all());
        $url = "/api/banners";

        if ($request->hasFile('images')) {
            $imageFile = $request->file('images');

            $imageBase64 = base64_encode(file_get_contents($imageFile->getRealPath()));
        }

        $data = array(
            "bannerName" => $request->bannerName,
            "links" => $request->links,
            "status" => $request->status,
            "images" => $imageBase64,
            "imagesContentType" => $imageFile->getMimeType(),
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

        $imageBase64 = null;
        $imageContentType = null;

        if ($request->hasFile('images')) {
            $imageFile = $request->file('images');

            $imageBase64 = base64_encode(file_get_contents($imageFile->getRealPath()));
            $imageContentType = $imageFile->getMimeType();
        } else {
            $imageBase64 = $request->input('existingImage');
            $imageContentType = $request->input('existingImageContentType');
        }

        $data = array(
            "id" => $id,
            "bannerName" => $request->bannerName,
            "links" => $request->links,
            "status" => $request->status,
            "images" => $imageBase64,
            "imagesContentType" => $imageContentType,
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
