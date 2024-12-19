<?php

namespace App\Http\Controllers\Kurir;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Library\CurlGen;
use Illuminate\Support\Facades\Validator;
use yajra\Datatables\Datatables;

class KurirControllers extends Controller
{
    public function index()
    {
        return view('kurir.index');
    }

    public function getIndex(CurlGen $curlGen)
    {
        $urlData = "/api/kurirs?size=99999&sort=id%2Cdesc";
        $resultData = $curlGen->getIndex($urlData);

        return Datatables::of($resultData)->escapeColumns([])->make(true);
    }

    public function create()
    {
        return view('kurir.create');
    }

    public function store(CurlGen $curlGen, Request $request)
    {
        $url = "/api/kurirs";

        $imageBase64IdentityPhoto = null;
        $imageFileIdentityPhoto = null;
        $imageBase64SelfPhoto = null;
        $imageFileSelfPhoto = null;

        // identityPhoto
        if ($request->hasFile('identityPhoto')) {
            $imageFileIdentityPhoto = $request->file('identityPhoto');
            $imageBase64IdentityPhoto = base64_encode(file_get_contents($imageFileIdentityPhoto->getRealPath()));
        }

        // selfPhoto
        if ($request->hasFile('selfPhoto')) {
            $imageFileSelfPhoto = $request->file('selfPhoto');
            $imageBase64SelfPhoto = base64_encode(file_get_contents($imageFileSelfPhoto->getRealPath()));
        }

        $data = array(
            "active" => $request->active,
            "fullName" => $request->fullName,
            "identityPhoto" => $imageBase64IdentityPhoto,
            "identityPhotoContentType" => $imageFileIdentityPhoto->getMimeType(),
            "noTelp" => $request->noTelp,
            "selfPhoto" => $imageBase64SelfPhoto,
            "selfPhotoContentType" => $imageFileSelfPhoto->getMimeType(),
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
        return redirect(url('masterData/kurir'));
    }

    public function edit(CurlGen $curlGen, $id)
    {
        $kurir = "/api/kurirs/" . $id;
        $resultKurir = $curlGen->getIndex($kurir);

        return view('kurir.edit')
            ->with('kurir', $resultKurir);
    }

    public function update(CurlGen $curlGen, Request $request, $id)
    {
        $url = "/api/kurirs";

        $imageBase64IdentityPhoto = null;
        $imageIdentityPhotoContentType = null;
        $imageBase64SelfPhoto = null;
        $imageSelfPhotoContentType = null;

        // identityPhoto
        if ($request->hasFile('identityPhoto')) {
            $imageFileIdentityPhoto = $request->file('identityPhoto');

            $imageBase64IdentityPhoto = base64_encode(file_get_contents($imageFileIdentityPhoto->getRealPath()));
            $imageIdentityPhotoContentType = $imageFileIdentityPhoto->getMimeType();
        } else {
            $imageBase64IdentityPhoto = $request->input('existingIdentityPhoto');
            $imageIdentityPhotoContentType = $request->input('existingIdentityPhotoContentType');
        }

        // selfPhoto
        if ($request->hasFile('selfPhoto')) {
            $imageFileSelfPhoto = $request->file('selfPhoto');

            $imageBase64SelfPhoto = base64_encode(file_get_contents($imageFileSelfPhoto->getRealPath()));
            $imageSelfPhotoContentType = $imageFileSelfPhoto->getMimeType();
        } else {
            $imageBase64SelfPhoto = $request->input('existingSelfPhoto');
            $imageSelfPhotoContentType = $request->input('existingSelfPhotoContentType');
        }

        $data = array(
            "id" => $id,
            "active" => $request->active,
            "fullName" => $request->fullName,
            "identityPhoto" => $imageBase64IdentityPhoto,
            "identityPhotoContentType" => $imageIdentityPhotoContentType,
            "noTelp" => $request->noTelp,
            "selfPhoto" => $imageBase64SelfPhoto,
            "selfPhotoContentType" => $imageSelfPhotoContentType,
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

        return redirect(url('masterData/kurir'));
    }

    public function delete(CurlGen $curlGen, $id)
    {
        $kurir = "/api/kurirs/" . $id;

        $result = $curlGen->delete($kurir);

        return redirect(url('masterData/kurir'));
    }
}
