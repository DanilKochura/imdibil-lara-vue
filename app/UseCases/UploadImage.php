<?php
namespace App\UseCases;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UploadImage {
    public static function uploadImage(Request $request, $dir = '')
    {
        if ($request->hasFile('file')) {
            $name = Str::uuid() . '.' . $request->file->extension();
            $request->file->move(public_path("images/posts/$dir"), $name);
            return response("https://imdibil.ru/images/posts/$dir/$name");
        }
        return false;
    }
}
