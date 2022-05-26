@extends('layouts.adminapp')

@section('content')
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('admin') }}">
                    {{ config('app.name', 'Laravel') }}管理画面
                </a>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <a href="teachers/create">講師作成</a>
                <a href="teachers">講師一覧</a>
                <a href="courses/create">講座作成</a>
                <a href="courses">講座一覧</a>
                <a href="#">クーポン作成</a>
                <a href="#">ユーザー一覧</a>
                <a href="#">申込一覧</a>
                <a href="#">問い合わせ</a>
            </div>
        </nav>
    </div>
@endsection
