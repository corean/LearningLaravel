<?php

namespace App\Http\Controllers\admin;

use App\Category;
use App\Http\Requests\CategoryFormRequest;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('backend.categories.index')->with('categories', $categories);
//        return view('backend.categories.index', compact('categories'));
    }
    public function create()
    {
        return view('backend.categories.create');
    }
    public function store(CategoryFormRequest $request)
    {
        $category = new Category([
            'name' => $request->get('name'),
        ]);

        $category->save();

        return redirect('admin/categories/create')->with('status', 'A new category has been created!');
//        Session::flash('status', 'A new category has been created!');
//        return view('backend.categories.create');
    }
}
