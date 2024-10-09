<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileHandlingController extends Controller
{
    public function download(Request $request)
    {
        $contentFormatter = $request->input('content_formatter');

        if (empty($contentFormatter)) {
            return response()->json(['error' => 'No content found'], 404);
        }
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $host = $_SERVER['HTTP_HOST'];

        $fileExtensions = [
            'json' => '.txt',
            'xml' => '.xml',
        ];

        $fileExtension = $fileExtensions[$request->input('fileExtension')] ?? '.txt';

        $filename = $protocol . $host . '/' . time() . $fileExtension;

        return response()->stream(function () use ($contentFormatter) {
            echo $contentFormatter;
        }, 200, [
            'Content-Type' => 'text/plain',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ]);
    }
}
