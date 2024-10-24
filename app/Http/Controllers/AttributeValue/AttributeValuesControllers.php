<?php

namespace App\Http\Controllers\AttributeValue;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Library\CurlGen;
use yajra\Datatables\Datatables;
use Session;
use File;

class AttributeValuesControllers extends Controller
{
    public function index()
    {
        return view('product.attribute-values.index');
    }
    public function getIndex(CurlGen $curlGen)
    {
        $urlData = "/api/attribute-values?size=99999&sort=id%2Cdesc";
        $resultData = $curlGen->getIndex($urlData);

        // Fetch attributes if necessary
        $urlDataAttribute = "/api/attributes?size=99999&sort=id%2Cdesc";
        $attributes = $curlGen->getIndex($urlDataAttribute);

        // Assuming you have a way to map attribute values to their names
        $attributeMap = [];
        foreach ($attributes as $attribute) {
            $attributeMap[$attribute['id']] = $attribute['name'];
        }

        // Map attribute values to their names
        foreach ($resultData as &$value) {
            $value['attribute_name'] = $attributeMap[$value['attributeId']] ?? null; // Assuming 'attribute_id' is in the result
        }

        return Datatables::of($resultData)->escapeColumns([])->make(true);
    }
    public function create(CurlGen $curlGen)
    {
        $urlDataAttribute = "/api/attributes?size=99999&sort=id%2Cdesc";
        $attributes = $curlGen->getIndex($urlDataAttribute);

        return view('product.attribute-values.create', compact('attributes'));
    }
    public function edit(CurlGen $curlGen, $id)
    {
        $attributes = "/api/attributes?size=99999&sort=id%2Cdesc";
        $resultAttributes = $curlGen->getIndex($attributes);

        $attributeValue = "/api/attribute-values/" . $id;
        $resultAttributeValue = $curlGen->getIndex($attributeValue);

        return view('product.attribute-values.edit')
            ->with('attributes', $resultAttributes)
            ->with('attributeValue', $resultAttributeValue);
    }


    public function delete(CurlGen $curlGen, $id)
    {

        $attributeValues = "/api/attribute-values/" . $id;
        $result = $curlGen->delete($attributeValues);
        return redirect(url('product/attributeValues'));
    }
    public function store(CurlGen $curlGen, Request $request)
    {
        // dd($request->all());
        $url = "/api/attribute-values";
        $data = array(
            "attributeId" => $request->attributeId,
            "valuesAttribute" => $request->valuesAttribute
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
        return redirect(url('product/attributeValues'));
    }

    public function update(CurlGen $curlGen, Request $request, $id)
    {

        $url = "/api/attribute-values";
        $data = array(
            "id" => $id,
            "attributeId" => $request->attributeId,
            "valuesAttribute" => $request->valuesAttribute
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

        return redirect(url('product/attributeValues'));
    }
}
