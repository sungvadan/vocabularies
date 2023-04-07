<?php

namespace App\Http\Controllers;

use Illuminate\Http\UploadedFile;

trait UploadFileTrait
{
    private function uploadFile(UploadedFile $file): string
    {
        $fileName = time().'_'. $file->getClientOriginalName();
        $filePath = $file->storeAs('uploads', $fileName, 'public');

        return $filePath;
    }
}
