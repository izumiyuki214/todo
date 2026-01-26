@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="todo__content">
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
  <form action="todos" class="add-form" method="post">
  @csrf
    <div class="add-form__til">
      <input class="add-form__til-text" type="text" name="content">
    </div>
    <div class="add-form__btn">
      <button class="add-form__submit">作成</button>
    </div>
  </form>
  <div class="todo-content">
    <h2 class="todo-content__til">Todo</h2>
    <div class="todo-content__element">
        @if (!empty($todos))
        @foreach ($todos as $todo)
        <div class="todo-content__index">
            <form action="todos/update?id={{ $todo->id }}" class="edit-form" method="post">
                @csrf
                @method('PATCH')
                <div class="edit-form__til">
                    <input class="edit-form__til-text" type="text" name="content" value="{{ $todo->content }}" />
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