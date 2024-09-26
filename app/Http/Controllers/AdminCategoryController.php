<?php

namespace App\Http\Controllers;

use App\Models\Category;

use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    public function index()

    {
        $categories = Category::all();
        return view('admin.categories', compact('categories'));
    }
}

