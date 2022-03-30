<?php

namespace App\Http\Controllers;

use finfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    protected function descargarArchivo($src){
        if(is_file($src)){
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $content_type = finfo_file($finfo, $src);
            finfo_close($finfo);
            $file_name = basename($src).PHP_EOL;
            $size = filesize($src);
            header("Content-Type: $content_type");
            header("Content-Disposition: attachment; filename=$file_name");
            header("Content-Transfer-Encoding: binary");
            header("Content-Length: $size");
            readfile($src);
            return true;
        }
        else{
            return false;
        }
    }

    public function descargar(){
        if(!$this->downloadFile(app_path()."/files/terminos.pdf")){
            return redirect()->back();
        }
    }

    public function saveFileSpaces(Request $request){
        if($request->hasFile('txt')){
            $file = $request->file('txt');
            $name = $file->getClientOriginalName();

            $store = Storage::put('public/uploads/' . $name,
            file_get_contents($request->file('txt')->getReslPath()));
        }
    }
}
