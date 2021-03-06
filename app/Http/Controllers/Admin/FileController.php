<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\admin\File;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FileController extends Controller
{
  
    /**
     * show Uploade Form
     *
     * @return void
     */
    public function showFileForm()
    {
        return view('admin.fileUpload');
    }

    /**
     * store File
     *
     * @return void
     */
    public function store(Request $request)
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

        return redirect()->back()->with('success', 'فایل با موفقیت بارگذاری شد.');
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

    public function showMange()
    {
        $files = File::withTrashed()->orderBy('created_at', 'DESC')->get();
        return view('admin.fileManage', [
            'files' => $files,
        ]);
    }
    /**
     * store File With Ajax
     *
     * @return void
     */
    public function storeWithAjax(Request $request)
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

        alert()->success('فایل با موفقیت بارگذاری شد.');
        
        return redirect()->back();
      
 }


    public function delete(Request $request)
    {
        $file_id = $request->id;

        $file = File::where('id', $file_id)->findOrFail($file_id);

        $file->delete();
    
        alert()->error("فایل با عنوان $file->title حذف شد");
        
        return redirect()->back();
    }

    public function showUpdateForm($id)
    {
        $file = File::findOrFail($id);
     
        return view('admin.fileUpdate', compact('file'));
    }

    public function update(Request $request)
    {
        //$this->validator($request);

        $file = File::findOrFail($request->id);

        $file->update([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        alert()->success('فایل با موفقیت به روز رسانی شد.');

        return redirect()->back();
    }

    public function softDelete($id)
    {
        File::withTrashed()->where('id', $id)->restore();

        alert()->success('فایل به لیست محصولات اضافه شد');

        return redirect()->back();
    }
}