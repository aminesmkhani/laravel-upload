<?php

namespace App\Services\Uploader;

use Illuminate\Http\Request;

class Uploader
{
    /**
     * @var Request
     */
    private $request;
    /**
     * @var StorageManager
     */
    private $storageManager;

    private $file;
    /**
     * @var FFMpegService
     */
    private $ffmpeg;

    public function __construct(Request $request, StorageManager $storageManager, FFMpegService $ffmpeg)
    {
        $this->request = $request;
        $this->storageManager = $storageManager;
        $this->file = $request->file;
        $this->ffmpeg = $ffmpeg;
    }

    public function upload ()
    {
        $this->putFileIntoStorage();
        dd($this->ffmpeg->durationOf($this->storageManager->getAbsolutePathOf($this->file->getClientOriginalName(), $this->getType(),$this->isPrivate())));
    }

    private function putFileIntoStorage()
    {
        $method = $this->isPrivate() ? 'putFilesAsPrivate' : 'putFilesAsPublic';
        $this->storageManager->$method($this->file->getClientOriginalName(),$this->file,$this->getType());
    }

    private function isPrivate()
    {
        return $this->request->has('is-private');
    }

    private function getType(){
        return[
            'image/jpeg' => 'image',
            'video/mp4' => 'video',
            'application/zip' => 'archive',
            'application/x-zip-compressed' =>'archive'
        ][$this->file->getClientMimeType()];
    }
}
