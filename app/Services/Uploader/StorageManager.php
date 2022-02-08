<?php

namespace App\Services\Uploader;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class StorageManager
{
    public function putFilesAsPrivate(string $name, UploadedFile $file,string $type)
    {
        return Storage::disk('private')->putFileAs($type, $file,$name);
    }
    public function putFilesAsPublic(string $name, UploadedFile $file,string $type)
    {
        return Storage::disk('public')->putFileAs($type, $file,$name);
    }
}
