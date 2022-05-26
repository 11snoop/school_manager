@extends('layouts.adminapp')

@section('content')
    <a class="navbar-brand" href="{{ url('admin') }}">
        {{ config('app.name', 'Laravel') }}管理画面
    </a>
    <h3>講師編集</h3>

    <form action="{{ route('teachers.update', $form->id) }}" method="POST">
        @csrf
        @method('patch')
        <input type="hidden" name="id" value="{{ $form->id }}">
        <tr>
            <td><b> 名前：</b></td>
            <td><input type="text" name="name" value="{{ $form->name }}"></td>
        </tr>
        <tr>
            <td><b> コメント：</b></td>
            <td><input type="text" name="comment" value="{{ $form->comment }}"></td>
        </tr>
        <td>
            <input type="submit" value="登録">
        </td>
    </form>
    <form action="{{route('teachers.destroy', $form->id)}}" method="post">
      @csrf
      @method('delete')
      <input type="submit" value="削除" onclick='return confirm("削除しますか？");'>
  </form>
@endsection
