<?php

namespace App\Services\Uploader;

use FFMpeg\FFProbe;

class FFMpegService
{
    private $ffprobe;

    public function __construct()
    {
        $this->ffprobe = FFProbe::create([
            'ffprobe.binaries'  => config('services.ffmpeg.ffprobe_path')
        ]);
    }

    public function durationOf(string $path)
    {
        return $this->ffprobe->format($path)->get('duration');
    }
}
