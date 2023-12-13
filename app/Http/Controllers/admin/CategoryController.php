<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\TempImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    // View category page
    public function index(Request $request)
    {
        $categories = Category::latest();

        if (!empty($request->get('keyword'))) {
            $categories = $categories->where('name', 'like', '%' . $request->keyword . '%');
        }

        $categories = $categories->paginate(10);
        return view('admin.category.categoryList', compact('categories'));
    }

    // Get category add page
    public function create()
    {
        return view('admin.category.createCategory');
    }

    // Store category 
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'slug' => 'required|unique:categories',
            'image' => 'nullable|image|mimes:png,jpg,jpeg|max:5048',
            'status' => 'required',
            'is_featured' => 'required',
        ]);

        if ($validator->passes()) {

            $category = new Category();
            $category->name = trim($request->name);
            $category->slug = $request->slug;
            $category->status = $request->status;
            $category->is_featured = $request->is_featured;
            $category->save();

            //Upload category image
            if (!empty($request->image_id)) {
                $tempImage = TempImage::find($request->image_id);
                $extArray = explode('.', $tempImage->name);
                $ext = last($extArray);

                $newImageName = $category->id . '.' . $ext;
                $sourcePath = public_path() . '/temp/' . $tempImage->name;
                $destPath = public_path() . '/uploads/category/' . $newImageName;

                File::copy($sourcePath, $destPath);

                $category->image = $newImageName;
                $category->save();
            }

            $request->session()->flash('success', 'Category added successfully.');
            return response()->json([
                'status' => true,
                'message' => 'Category added successfully.'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    // Get category edit page
    public function edit($id, Request $request)
    {
        $category = Category::find($id);

        if (empty($category)) {
            return redirect()->route('categories.index')->with('error', 'Category not found!');
        }
        return view('admin.category.editCategory', compact('category'));
    }

    // Update category
    public function update($id, Request $request)
    {
        $category = Category::find($id);

        if (empty($category)) {
            return response()->json([
                'status' => false,
                'notFound' => true,
                'message' => 'Category not found!'
            ]);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'slug' => 'required|unique:categories,slug,' . $category->id . ',id',
            'image' => 'nullable|image|mimes:png,jpg,jpeg|max:5048',
            'status' => 'required',
            'is_featured' => 'required',
        ]);

        if ($validator->passes()) {

            $category->name = trim($request->name);
            $category->slug = $request->slug;
            $category->status = $request->status;
            $category->is_featured = $request->is_featured;
            $category->save();

            $oldImage = $category->image;

            //Upload category image
            if (!empty($request->image_id)) {
                $tempImage = TempImage::find($request->image_id);
                $extArray = explode('.', $tempImage->name);
                $ext = last($extArray);

                $newImageName = $category->id . '-' . time() . '.' . $ext;
                $sourcePath = public_path() . '/temp/' . $tempImage->name;
                $destPath = public_path() . '/uploads/category/' . $newImageName;

                File::copy($sourcePath, $destPath);

                $category->image = $newImageName;
                $category->save();

                // Delete old image
                File::delete(public_path() . '/uploads/category/' . $oldImage);
            }

            $request->session()->flash('success', 'Category updated successfully.');
            return response()->json([
                'status' => true,
                'message' => 'Category updated successfully.'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    // Delete category 
    public function destroy($categoryId)
    {
        $category = Category::find($categoryId);

        if ($category) {

            File::delete(public_path() . '/uploads/category/' . $category->image);
            $category->delete();

            return redirect()->route('categories.index');
        }

        return redirect()->route('categories.index');
    }
}
