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

    private function arrayToXml($data, &$xmlData)
    {
        if (is_array($data)) {
            foreach ($data as $key => $value) {
                $nodeName = is_numeric($key) ? 'item' : $key;
                $subnode = $xmlData->addChild($nodeName);

                if (is_array($value) || is_object($value)) {
                    $this->arrayToXml($value, $subnode);
                } else {
                    $subnode[0] = htmlspecialchars((string)$value);
                }
            }
        } else {
            $xmlData[0] = htmlspecialchars((string)$data);
        }
    }

    public function convertCSV(Request $request)
    {
        $jsonData = $request->input('content_formatter');
        $arrayData = json_decode($jsonData, true);

        // Kiểm tra định dạng JSON và sự tồn tại của mảng 'employee'
        if (!isset($arrayData['employees']['employee']) || !is_array($arrayData['employees']['employee'])) {
            return response()->json(['error' => 'Invalid or empty JSON data'], 400);
        }

        // Gọi hàm generateCSV để tạo CSV từ mảng 'employee'
        $csvOutput = $this->generateCSV($arrayData['employees']['employee']);

        return response($csvOutput)
            ->header('Content-Type', 'text/csv')
            ->header('Content-Disposition', 'attachment; filename="employees.csv"');
    }

    private function generateCSV(array $data): string
    {
        // Mở stream tạm để ghi CSV
        $csvData = fopen('php://temp', 'r+');

        // Lấy các tiêu đề từ đối tượng đầu tiên
        $headers = array_keys($data[0]);
        fputcsv($csvData, $headers); // Ghi tiêu đề vào CSV

        // Lặp qua từng mục 'employee' và ghi vào CSV
        foreach ($data as $item) {
            $row = [];
            foreach ($headers as $header) {
                $row[] = isset($item[$header]) ? $item[$header] : '';
            }
            fputcsv($csvData, $row);
        }

        // Đọc lại nội dung CSV từ stream tạm
        rewind($csvData);
        $csvOutput = stream_get_contents($csvData);
        fclose($csvData);

        return $csvOutput;
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
