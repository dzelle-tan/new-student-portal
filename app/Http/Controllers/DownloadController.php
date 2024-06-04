<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function download($file)
    {
        $filepath = public_path('download' . DIRECTORY_SEPARATOR . $file);
        if (file_exists($filepath)) {
            return response()->download($filepath);
        } else {
            return abort(404, 'File not found');
        }
    }
}

