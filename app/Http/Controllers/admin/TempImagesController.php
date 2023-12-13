<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\TempImage;
use Illuminate\Http\Request;

class TempImagesController extends Controller
{
    public function create(Request $request)
    {
        $image = $request->image;

        if (!empty($image)) {
            $newName = time() . '.' . $image->extension();

            $tempImages = new TempImage();
            $tempImages->name =  $newName;
            $tempImages->save();

            $image->move(public_path() . '/temp', $newName);

            return response()->json([
                'status' => true,
                'image_id' => $tempImages->id,
                'imagePath' => asset('/temp/' . $newName),
                'message' => 'Image Uploaded Successfully'
            ]);
        }
    }
}
