<?php

namespace App\Services\Uploader;

use Illuminate\Http\Request;

class Uploader
{
    /**
     * @var Request
     */
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;    
    }

    public function upload ()
    {
        
    }
}
