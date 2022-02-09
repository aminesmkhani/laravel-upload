<?php

namespace App\Http\Controllers;

use App\Services\Uploader\Uploader;
use Illuminate\Http\Request;

class FileController extends Controller
{

    /**
     * @var Uploader
     */
    private $uploader;

    public function __construct(Uploader $uploader)
    {
        $this->uploader = $uploader;
    }

    public function create()
    {
        return view('file.create');
    }


    public function new(Request $request)
    {
        try {
            $this->validateFile($request);
            $this->uploader->upload();
            return redirect()->back()->withSuccess('File has Uploaded successfully');
        }catch (\Exception $e){
            return redirect()->back()->withError('file already uploaded');
        }
    }


    private function validateFile($request)
    {
        $request->validate([
           'file' => ['required','file','mimetypes:image/jpeg,video/mp4,application/zip']
        ]);
    }
}
