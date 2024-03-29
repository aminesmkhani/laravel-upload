<?php

namespace App\Http\Controllers;

use App\Models\File;
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

    public function index()
    {
        $files = File::all();
        return view('file.index',compact('files'));
    }

    public function show(File $file)
    {
        return $file->download();
    }

    public function create()
    {
        return view('file.create');
    }

    public function delete(File $file)
    {
        $file->delete();
        return redirect()->back()->withSuccess('File Delete has Successfully!');
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
