<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Yaml\Yaml;

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

    private function arrayToXml(array $data, &$xmlData)
    {
        foreach ($data as $key => $value) {
            $key = preg_replace('/[^a-z_]/i', '_', $key);
            $subnode = is_numeric($key) ? $xmlData->addChild('item') : $xmlData->addChild($key);

            if (is_array($value)) {
                $this->arrayToXml($value, $subnode);
            } else {
                $xmlData->addChild($key, htmlspecialchars((string)$value));
            }
        }
    }

    public function convertCSV(Request $request)
    {
        $jsonData = $request->input('content_formatter');
        $arrayData = json_decode($jsonData, true);

        if (!is_array($arrayData) || empty($arrayData)) {
            return response()->json(['error' => 'Invalid or empty JSON data'], 400);
        }

        $csvOutput = $this->generateCSV($arrayData);

        return response($csvOutput)
            ->header('Content-Type', 'text/csv')
            ->header('Content-Disposition', 'attachment; filename="data.csv"');
    }

    private function generateCSV(array $data): string
    {
        $csvData = fopen('php://temp', 'r+');
        $headers = $this->getHeaders($data);
        fputcsv($csvData, $headers);

        foreach ($data as $item) {
            fputcsv($csvData, $this->formatRow($item, $headers));
        }

        rewind($csvData);
        $csvOutput = stream_get_contents($csvData);
        fclose($csvData);

        return $csvOutput;
    }

    private function getHeaders(array $data): array
    {
        $headers = [];
        foreach ($data as $item) {
            $headers = array_merge($headers, array_keys($item));
        }
        return array_unique($headers);
    }

    private function formatRow(array $item, array $headers): array
    {
        return array_map(function ($header) use ($item) {
            return isset($item[$header]) ? $this->formatArrayValue($item[$header]) : '';
        }, $headers);
    }

    private function formatArrayValue($value)
    {
        if (is_array($value)) {
            return implode("|", array_map('json_encode', $value));
        }
        return (string)$value;
    }

    public function convertYaml(Request $request)
    {
        $jsonData = $request->input('content_formatter');
        $arrayData = json_decode($jsonData, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            return response()->json(['error' => 'Invalid JSON data'], 400);
        }

        $yamlData = Yaml::dump($arrayData, 4, 2, Yaml::DUMP_MULTI_LINE_LITERAL_BLOCK);

        return response($yamlData)
            ->header('Content-Type', 'application/x-yaml');
    }
}
