@extends('layouts.adminapp')

@section('content')
    <a class="navbar-brand" href="{{ url('admin') }}">
        {{ config('app.name', 'Laravel') }}管理画面
    </a>
    <h3>講座作成</h3>

    <form action="{{ route('courses.store') }}" method="POST">
        @csrf
        <tr>
            <td><b> 講師：</b></td>
                <select size="1" name="teacher_id">
                    @foreach ($teachers as $teacher)
                        <option value={{ $teacher->id }}>{{ $teacher->name }}</option>
                    @endforeach
                </select>
        </tr><br>
        <tr>
            <td><b> 金額：</b></td>
            <td><input type="number" name="amount" min=1></td>
        </tr><br>
        <tr>
            <td><b> コース：</b></td>
            

            <select size="1" name="type">
                @foreach (App\Models\Course::OPTION_LIST as $key =>$val)
                    <option value={{ $key }}>{{ $val }}</option>
                @endforeach
            </select>

        </tr><br>
        <tr>
            <td><b> タイトル：</b></td>
            <td><input type="text" name="title"></td>
        </tr><br>
        <tr>
            <td><b> 内容：</b></td>
            <td><input type="text" name="content"></td>
        </tr><br>
        <tr>
            <td><b> 実施日：</b></td>
            <td><input type="date" name="date"></td>
        </tr><br>
        <tr>
            <td><b> 受講人数：</b></td>
            <td><input type="number" name="capacity" value=5 min=1></td>
        </tr><br>
        <tr>
            <td><b> 公開設定：</b></td>
            <td><input type="text" name="is_public"></td>
        </tr><br>
        <tr>
            <td><b> 申込期日：</b></td>
            <td><input type="date" name="booking_deadline"></td>
        </tr><br>
        <td>
            <input type="submit" value="登録">
        </td>
    </form>
@endsection
