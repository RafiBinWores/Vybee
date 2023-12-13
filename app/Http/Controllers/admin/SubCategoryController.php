<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubCategoryController extends Controller
{
    //Get subcategory list page
    public function index(Request $request)
    {
        $subcategories = SubCategory::select('sub_categories.*', 'categories.name as categoryName')->latest()->leftJoin('categories', 'categories.id', 'sub_categories.category_id');

        if (!empty($request->get('keyword'))) {
            $subcategories = $subcategories->where('name', 'like', '%' . $request->keyword . '%');
        }

        $subcategories = $subcategories->paginate(10);
        return view('admin.subCategory.subcategoryList', compact('subcategories'));
    }

    //Get subcategory add page
    public function create()
    {
        $categories = Category::latest()->get();
        return view('admin.subCategory.createSubcategory', compact('categories'));
    }

    //Store subcategory 
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'slug' => 'required|unique:sub_categories',
            'status' => 'required',
            'category' => 'required',
        ]);

        if ($validator->passes()) {

            $subcategory = new SubCategory();
            $subcategory->category_id = $request->category;
            $subcategory->name = trim($request->name);
            $subcategory->slug =  $request->slug;
            $subcategory->status = $request->status;
            $subcategory->save();

            $request->session()->flash('success', 'Sub-Category added successfully.');
            return response()->json([
                'status' => true,
                'message' => 'Sub-Category added successfully.'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    //Get subcategory edit page
    public function edit($id)
    {
        $subCategory = SubCategory::find($id);

        if (empty($subCategory)) {
            return redirect()->route('subcategories.index')->with('error', 'Subcategory not found!');
        }

        $categories = Category::orderBy('name', 'ASC')->get();

        $data['categories'] = $categories;
        $data['subCategory'] = $subCategory;
        return view('admin.subCategory.editSubcategory', $data);
    }

    //Update subcategory 
    public function update($id, Request $request)
    {
        $subcategory = SubCategory::find($id);

        if (empty($subcategory)) {
            $request->session()->flash('error', 'Sub-category not found!');
            return redirect()->route('subcategories.index');
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'slug' => 'required|unique:sub_categories,slug,' . $subcategory->id . ',id',
            'status' => 'required',
            'category' => 'required',
        ]);

        if ($validator->passes()) {

            $subcategory->category_id = $request->category;
            $subcategory->name = trim($request->name);
            $subcategory->slug = $request->slug;
            $subcategory->status = $request->status;
            $subcategory->save();

            $request->session()->flash('success', 'Sub-Category updated successfully.');
            return response()->json([
                'status' => true,
                'message' => 'Sub-Category updated successfully.'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    //Delete subcategory
    public function destroy($id)
    {
        $categoryId = SubCategory::where('id', $id)->value('category_id');
        SubCategory::findOrFail($id)->delete();

        return redirect()->route('subcategories.index');
    }
}
