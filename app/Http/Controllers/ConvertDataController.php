<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConvertDataController extends Controller
{
    public function convertXml(Request $request)
    {
        $jsonData = $request->input('content_formatter');
        $arrayData = json_decode($jsonData, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            return response()->json(['error' => 'Invalid JSON format'], 400);
        }

        $xmlData = new \SimpleXMLElement('<?xml version="1.0"?><data></data>');
        $this->arrayToXml($arrayData, $xmlData);

        $dom = new \DOMDocument('1.0', 'UTF-8');
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;

        $dom->loadXML($xmlData->asXML());

        return response($dom->saveXML(), 200)
            ->header('Content-Type', 'application/xml');
    }

    public function arrayToXml($data, &$xmlData)
    {
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                if (is_numeric($key)) {
                    $key = 'item' . $key; // rename if it is number
                }
                $subnode = $xmlData->addChild($key);
                $this->arrayToXml($value, $subnode);
            } else {
                $xmlData->addChild("$key", htmlspecialchars("$value"));
            }
        }
    }
}
