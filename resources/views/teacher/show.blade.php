@extends('layouts.adminapp')

@section('content')
                <a class="navbar-brand" href="{{ url('admin') }}">
                    {{ config('app.name', 'Laravel') }}管理画面
                </a>
                <h3>講師詳細</h3>
                <table>
                  <tr><th>名前</th><th>コメント</th></tr>
                  <tr>
                      <td>{{ $form->name }}</td>
                      <td>{{ $form->comment }}</td>
                  </tr>
              </table>
@endsection
