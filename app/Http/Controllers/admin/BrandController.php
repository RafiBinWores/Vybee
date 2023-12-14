<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BrandController extends Controller
{
    // View brand page
    public function index(Request $request)
    {
        $brands = Brand::latest();

        if (!empty($request->get('keyword'))) {
            $brands = $brands->where('name', 'like', '%' . $request->keyword . '%');
        }

        $brands = $brands->paginate(10);
        return view('admin.brand.brandList', compact('brands'));
    }

    // Get brand add page
    public function create()
    {
        return view('admin.brand.createBrand');
    }

    // Store brand 
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'slug' => 'required|unique:brands',
            'status' => 'required',
        ]);

        if ($validator->passes()) {

            $brand = new Brand();
            $brand->name = trim($request->name);
            $brand->slug = $request->slug;
            $brand->status = $request->status;
            $brand->save();

            $request->session()->flash('success', 'Brand added successfully.');
            return response()->json([
                'status' => true,
                'message' => 'Brand added successfully.'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }


    // Get brand edit page
    public function edit($id, Request $request)
    {
        $brand = Brand::find($id);

        if (empty($brand)) {
            return redirect()->route('brands.index')->with('error', 'Brand not found!');
        }
        return view('admin.brand.editBrand', compact('brand'));
    }

    // Update brand
    public function update($id, Request $request)
    {
        $brand = Brand::find($id);

        if (empty($brand)) {
            return redirect()->route('categories.index');
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'slug' => 'required|unique:categories,name,' . $brand->id . ',id',
            'image' => 'nullable|image|mimes:png,jpg,jpeg|max:5048',
            'status' => 'required',
        ]);

        if ($validator->passes()) {

            $brand->name = trim($request->name);
            $brand->slug = $request->slug;
            $brand->status = $request->status;
            $brand->save();

            $request->session()->flash('success', 'Brand updated successfully.');
            return response()->json([
                'status' => true,
                'message' => 'Brand updated successfully.'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    // Delete brand 
    public function destroy($id)
    {
        Brand::findOrFail($id)->delete();
        return redirect()->route('brands.index');
    }
}
