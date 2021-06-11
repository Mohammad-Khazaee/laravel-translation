<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ZipCreator {

    public function CreateZip($files)
    {
        $folderpath = 'storfiles/' . Str::uuid();
        $zip_path = 'storage/' . $folderpath . '/'. Str::uuid() . '.zip';
        Storage::disk('public')->makeDirectory($folderpath);
        $zip = new \ZipArchive();
        $zip->open(public_path($zip_path), \ZipArchive::CREATE | \ZipArchive::OVERWRITE);
        foreach ($files as $file){
            $zip->addFile($file->path(),Str::uuid() .'.'. $file->extension());
        };
        $zip->close();

        return json_encode($zip_path);
    }

}