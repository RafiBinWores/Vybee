<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ProductImageController extends Controller
{

    // For uploading image
    public function update(Request $request)
    {
        $image = $request->image;
        $ext = $image->getClientOriginalExtension();
        $sourcePath = $image->getPathName();

        $productImage = new ProductImage();
        $productImage->product_id = $request->product_id;
        $productImage->image = 'NULL';
        $productImage->save();

        $imageName = $request->product_id . '-' . $productImage->id . '-' . time() . '.' . $ext;
        $productImage->image = $imageName;
        $productImage->save();

        // small image
        $manager = new ImageManager(Driver::class);
        $image = $manager->read($sourcePath);
        $image->cover(250, 250);
        $image->toJpeg()->save(storage_path("app/public/product/small/{$imageName}"));

        // large image
        $manager = new ImageManager(Driver::class);
        $image = $manager->read($sourcePath);
        $image->cover(570, 570);
        $image->toJpeg()->save(storage_path("app/public/product/large/{$imageName}"));

        return response()->json([
            'status' => true,
            'image_id' => $productImage->id,
            'imagePath' => asset('storage/product/small/' . $productImage->image),
            'message' => 'Image Uploaded Successfully'
        ]);
    }

    // For delete image
    public function destroy(Request $request)
    {
        $productImage = ProductImage::find($request->id);

        if (empty($productImage)) {
            return response()->json([
                'status' => false,
                'message' => 'Image not found!'
            ]);
        }

        Storage::disk('small')->delete($productImage->image);
        Storage::disk('large')->delete($productImage->image);
        $productImage->delete();

        return response()->json([
            'status' => true,
            'message' => 'Image deleted Successfully'
        ]);
    }
}
