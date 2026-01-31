@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="todo__alert">
  @if(session('message'))
  <div class="todo__success">
    {{ session('message') }}
  </div>
  @endif
  @if ($errors->any())
  <div class="todo__error">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif
</div>
<div class="todo__content">
  <div class="section__title">
    <h2>新規作成</h2>
  </div>
  <form action="todos" class="add-form" method="post">
  @csrf
    <div class="add-form__item">
      <input
        class="create-form__item-input"
        type="text"
        name="content"
        value="{{ old('content') }}"
      />
      <select class="create-form__item-select" name="category_id">
        @foreach($categories as $category)
        <option value="{{ $category['id'] }}">{{ $category -> name }}</option>
        @endforeach
      </select>
    </div>
    <div class="add-form__button">
      <button class="add-form__submit">作成</button>
    </div>
  </form>
  <div class="section__title">
    <h2>Todo検索</h2>
  </div>
  <form action="/todos/search" class="search-form" class="get">
  @csrf
    <div class="search-form__item">
      <input type="text" class="search-form__item-input" name="keyword" value="{{ old('keyword') }}">
      <select class="search-form__item-select" name="category_id">
      @foreach ($categories as $category)
        <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
      @endforeach
      </select>
    </div>
    <div class="search-form__button">
      <button class="search-form__button-submit">検索</button>
    </div>
  </form>
  <div class="todo-table">
    <div class="todo-content__row">
      <span class="todo-content__row-span">Todo</span>
      <span class="todo-content__row-span">カテゴリ</span>
    </div>
    <div class="todo-content__element">
        @if (!empty($todos))
        @foreach ($todos as $todo)
        <div class="todo-content__index">
            <form action="todos/update?id={{ $todo->id }}" class="edit-form" method="post">
                @csrf
                @method('PATCH')
                <div class="edit-form__item">
                    <input class="edit-form__til-text" type="text" name="content" value="{{ $todo->content }}" />
                </div>
                <div class="edit-form__item">
                    <p class="edit-form__item-p">{{ $todo['category']['name'] }}</p>
                </div>
                <div class = "edit-form__btn">
                    <button class="edit-form__btn-update">更新</button>
                </div>
            </form>
            <form action="todos/delete?id={{ $todo->id }}" class="dlt-form" method="post">
                @csrf
                @method('DELETE')
                <button class="edit-form__btn-delete">削除</button>
            </form>
        </div>
        @endforeach
        @endif
    </div>
  </div>
</div>
@endsection