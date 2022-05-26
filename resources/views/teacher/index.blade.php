@extends('layouts.adminapp')

@section('content')
                <a class="navbar-brand" href="{{ url('admin') }}">
                    {{ config('app.name', 'Laravel') }}管理画面
                </a>
                <h3>講師一覧</h3>
                <table>
                  <tr><th>名前</th><th>コメント</th></tr>
                  @foreach ($teachers as $teacher)
                      <tr>
                          <td>{{ $teacher->name }}</td>
                          <td>{{ $teacher->comment }}</td>
                          {{-- <td><th><a href="{{route('teachers.show',['id'=>$teacher->id])}}">詳細</a></th></td> --}}
                      </tr>
                  @endforeach
              </table>
@endsection
