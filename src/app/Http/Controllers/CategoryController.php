<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    // カテゴリ一覧表示
    public function index() {
        $categories = Category::all();
        return view('category', compact('categories'));
    }

    // 追加機能
    public function store(CategoryRequest $request) {
        $category = $request->only('name');
        Category::create($category);
        return redirect('/categories')->with('message', 'カテゴリを作成しました');
    }
}
