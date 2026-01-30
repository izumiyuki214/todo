<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    // カテゴリ一覧表示
    public function index() {
        $categories = category::all();
        return view('category', compact('categories'));
    }
}
