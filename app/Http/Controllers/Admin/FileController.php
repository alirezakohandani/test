<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\admin\File;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FileController extends Controller
{
  
    public function showPanel()
    {
       return view('layouts.panel');
    }

    public function showFileForm()
    {
        return view('admin.fileUpload');
    }

    public function send(Request $request)
    {
    
        $this->validator($request);

        File::create([
            'title' => $request->title,
            'description' => $request->description,
            'type' => $request->type,
            'price' => $request->price,
            'thumb' => $request->file('thumb')->store('thumb'),
            'link' => $request->file('file')->store('file')
        ]);

        
        
    }

    protected function validator(Request $request)
    {
        return $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'type' => ['required'],
            'price' => ['required'],
            'thumb' => ['required'],
            'file' => ['required']
        ]);
    }

}
