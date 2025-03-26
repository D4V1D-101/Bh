<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
//kell
class DownloadController extends Controller
{
    public function download()
    {
        $filePath = 'front/BrickHub-Installer.exe';
        return response()->download(public_path($filePath));
    }
}
