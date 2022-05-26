@extends('layouts.app')

@section('content')
<h3>コース申し込み</h3>
<table>
    <tr><th>タイトル</th><th>開催日</th><th>講師</th><th>価格</th></tr>
    <tr>
        <td>{{ $form->title }}</td>
        <td>{{ $form->date }}</td>
        <td>{{ $form->teacher_id }}</td>
        <td>{{ $form->amount }}</td>
    </tr>
</table>
<form action="{{ route('booking_apply') }}" method="POST">
    @csrf
    <input type="hidden" name="course_id" value={{ $form->id }}>
    <input type="hidden" name="user_id" value={{ $user->id }}>
    <input type="hidden" name="amount" value={{ $form->amount }}>
    <tr>
        <td><b> 名前：</b></td>
        <td><input type="text" name="name" value={{ $user->name }}></td>
    </tr><br>
    <tr>
        <td><b> メール：</b></td>
        <td><input type="text" name="email" value={{ $user->email }}></td>
    </tr><br>
    <tr>
        <td><b> クーポン：</b></td>
        <td><input type="text" name="coupon"></td>
    </tr><br>
    <td>
        <input type="submit" value="申し込む">
    </td>
</form>
@endsection
