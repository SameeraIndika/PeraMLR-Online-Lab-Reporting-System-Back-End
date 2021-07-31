<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class FileController extends Controller
{
    public function file(Request $request) {
        $image = new Image;
        if($request->hasFile('image')) {
            //dd('image');
            $completeFileName = $request->file('image')->getClientOriginalName();
            $fileNameOnly = pathinfo($completeFileName, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $comPic = str_replace(' ', '_', $fileNameOnly).'-'.rand() . '_'.time(). '.'.$extension;
            //dd($comPic);
            $path = $request->file('image')->storeAs('public/images', $comPic);
            //dd($path);
            $image->image = $comPic;
            //$image->name = $request->$name;
        }
        
        if($image->save() ) {
            return ['status' => true, 'message' => 'File Uploaded Successfully!'];
        } else {
            return ['status' => false, 'message' => 'Error Occured in file uploading!'];
        }
    }

    public function getFile() {
        return response()->json(Image::all(), 200);
    }
}
