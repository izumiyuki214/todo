<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use App\Models\Category;

class TodoController extends Controller
{
    // 一覧表示
    public function index() {
        $todos = Todo::with('category')->get();
        $categories = Category::all();
        return view('index', compact('todos', 'categories'));
    }

    // 追加機能
    public function store(TodoRequest $request) {
        $form = $request->only(['content', 'category_id']);
        Todo::create($form);
        return redirect('/')->with('message', 'Todoを作成しました');
    }

    // 更新機能
    public function update(TodoRequest $request) {
        $form = $request->only('content');
        Todo::find($request->id)->update($form);
        return redirect('/')->with('message', 'Todoを更新しました');
    }

    // 削除機能
    public function destroy(Request $request) {
        Todo::find($request->id)->delete();
        return redirect('/')->with('message', 'Todoを削除しました');
    }

    public function search(Request $request)
    {
    $todos = Todo::with('category')->CategorySearch($request->category_id)->KeywordSearch($request->keyword)->get();
    $categories = Category::all();

    return view('index', compact('todos', 'categories'));
    }

}
