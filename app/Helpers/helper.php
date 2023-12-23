<?php

use App\Models\Category;

function getCategories()
{
    return Category::orderBy('name', 'ASC')->with('sub_category')->where('status', 1)->get();
}

function getFeaturedCategories()
{
    return Category::orderBy('id', 'DESC')
        ->with('sub_category')
        ->where('status', 1)
        ->where('is_featured', 'Yes')
        ->get();
}
