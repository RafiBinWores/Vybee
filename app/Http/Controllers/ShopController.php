<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request, $categorySlug = null, $subCategorySlug = null)
    {
        $selectedCategory = '';
        $selectedSubCategory = '';
        $brandArr = [];

        $categories  = Category::orderBy('name', 'ASC')->with('sub_category')->where('status', 1)->get();
        $brands  = Brand::orderBy('name', 'ASC')->where('status', 1)->get();
        $products  = Product::where('status', 1);
        $minPrice = Product::min('price');
        $maxPrice = Product::max('price');

        // Filter product by product category
        if (!empty($categorySlug)) {
            $category = Category::where('slug', $categorySlug)->first();
            $products = $products->where('category_id', $category->id);
            $selectedCategory = $category;
        }

        // Filter product by product sub category
        if (!empty($subCategorySlug)) {
            $subCategory = SubCategory::where('slug', $subCategorySlug)->first();
            $products = $products->where('sub_category_id', $subCategory->id);
            $selectedSubCategory = $subCategory;
        }

        // Filter product by product brand 
        if (!empty($request->get('brand'))) {
            $brandArr = explode(',', $request->get('brand'));
            $products = $products->whereIn('brand_id', $brandArr);
        }

        // Filter product by product price 
        if ($request->get('min-price') != '' && $request->get('min-price') != '') {
            $products = $products->whereBetween('price', [intval($request->get('min-price')), intval($request->get('max-price'))]);
        }

        if ($request->get('sort')) {
            if ($request->get('sort') == 'default') {
                $products = $products->orderBy('id', 'DESC');
            } elseif ($request->get('sort') == 'price_asc') {
                $products = $products->orderBy('price', 'ASC');
            } elseif ($request->get('sort') == 'price_desc') {
                $products = $products->orderBy('price', 'DESC');
            }
        } else {
            $products = $products->orderBy('id', 'DESC');
        }

        $products = $products->paginate(6);

        $data['categories'] = $categories;
        $data['brands'] = $brands;
        $data['products'] = $products;
        $data['selectedCategory'] = $selectedCategory;
        $data['selectedSubCategory'] = $selectedSubCategory;
        $data['brandArr'] = $brandArr;
        $data['minPrice'] = $minPrice;
        $data['maxPrice'] = $maxPrice;
        $data['min_price'] = intval($request->get('min-price'));
        $data['max_price'] = intval($request->get('max-price'));
        $data['sort'] = $request->get('sort');

        return view('frontend.shop', $data);
    }
}
