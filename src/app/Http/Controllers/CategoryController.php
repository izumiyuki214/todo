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

    // 編集機能
    public function update(CategoryRequest $request) {
        $category = $request->only(['name']);
        Category::find($request->id)->update($category);
        return redirect('/categories')->with('message', 'カテゴリを更新しました');
    }

    // 削除機能
    public function destroy(request $request) {
        Category::find($request->id)->delete();
        return redirect('/categories')->with('message', 'カテゴリを削除しました');
    }
}
