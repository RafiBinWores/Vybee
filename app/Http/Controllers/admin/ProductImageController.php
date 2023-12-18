<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductImageController extends Controller
{

    // For uploading image
    public function update(Request $request)
    {
        $image = $request->image;
        $ext = $image->getClientOriginalExtension();

        $productImage = new ProductImage();
        $productImage->product_id = $request->product_id;
        $productImage->image = 'NULL';
        $productImage->save();

        $imageName = $request->product_id . '-' . $productImage->id . '-' . time() . '.' . $ext;
        Storage::disk('product')->put($imageName, file_get_contents($image));

        $productImage->image = $imageName;
        $productImage->save();

        return response()->json([
            'status' => true,
            'image_id' => $productImage->id,
            'imagePath' => asset('storage/product/' . $productImage->image),
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

        Storage::disk('product')->delete($productImage->image);
        $productImage->delete();

        return response()->json([
            'status' => true,
            'message' => 'Image deleted Successfully'
        ]);
    }
}
