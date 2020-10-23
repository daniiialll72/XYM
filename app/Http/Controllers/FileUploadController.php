<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fileUpload()
    {
        return view('test');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fileUploadPost(Request $request)
    {
        $request->validate([
            'file' => 'required',
        ]);
        $fileName = $request->file;
        foreach ($fileName as $file) {

            $file->move(public_path('file'), $file);
            File::create(['name' => $file]);
        }

        $res['status'] = 'success';
        $res['message'] = 'files uploaded successfully';
        return $res;
    }
}
