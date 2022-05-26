@extends('layouts.app')

@section('content')
<h3>講座一覧</h3>
                <table>
                  <tr><th>タイトル</th><th>内容</th><th>金額</th><th>実施日</th></tr>
                  @foreach ($courses as $course)
                      <tr>
                          <td>{{ $course->title }}</td>
                          <td>{{ $course->content }}</td>
                          <td>{{ $course->amount }}</td>
                          <td>{{ $course->date }}</td>
                          <td><th><a href="{{route('bookings.create',['id'=>$course->id])}}">詳細</a></th></td>
                      </tr>
                  @endforeach
              </table>
@endsection
