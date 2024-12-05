<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\EmailService;

class FileController extends Controller
{
    public function download(Request $request)
    {
        $filePath = storage_path('app/files/example.pdf');
        $fileName = 'example.pdf';

        if (!file_exists($filePath)) {
            return response()->json(['error' => 'File not found.'], 404);
        }

        EmailService::sendDownloadNotification($request->user(), $fileName);

        return response()->download($filePath);
    }
}


