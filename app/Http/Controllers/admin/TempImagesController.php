<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\TempImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TempImagesController extends Controller
{
    public function create(Request $request)
    {
        $image = $request->image;

        if (!empty($image)) {
            $newName = time() . '.' . $image->getClientOriginalExtension();

            $tempImages = new TempImage();
            $tempImages->name =  $newName;
            $tempImages->save();

            Storage::disk('temp')->put($newName, file_get_contents($image));

            return response()->json([
                'status' => true,
                'image_id' => $tempImages->id,
                'imagePath' => asset('storage/temp/' . $newName),
                'message' => 'Image Uploaded Successfully'
            ]);
        }
    }
}
