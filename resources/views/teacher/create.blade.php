@extends('layouts.adminapp')

@section('content')
    <a class="navbar-brand" href="{{ url('admin') }}">
        {{ config('app.name', 'Laravel') }}管理画面
    </a>
    <h3>講師作成</h3>

    <form action="{{ route('teachers.store') }}" method="POST" enctype="multipart/form-data" name="form1">
        @csrf
        <tr>
            <td><b> 名前：</b></td>
            <td><input type="text" name="name"></td>
        </tr>
        <tr>
            <td><b> コメント：</b></td>
            <td><input type="text" name="comment"></td>
        </tr>
        <td>
            <input type="submit" value="登録">
        </td>
    </form>
@endsection
