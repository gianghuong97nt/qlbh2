<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestImage;
use Illuminate\Support\Facades\File;

class ImageController extends Controller
{
    public function uploadImage(RequestImage $imageRequest)
    {
        $extension = $imageRequest->file('file')->getClientOriginalExtension();
        $dir = 'uploads/';
        $filename = uniqid() . '_' . time() . '.' . $extension;
        $imageRequest->file('file')->move($dir, $filename);

        return $filename;
    }

    public function deleteImage(RequestImage $imageRequest)
    {
        $filename = $imageRequest->input('filename');
        File::delete('uploads/' . $filename);
    }
}
