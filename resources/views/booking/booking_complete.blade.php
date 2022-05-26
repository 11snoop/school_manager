@extends('layouts.app')

@section('content')
<h3>コース申し込み完了</h3>
<h3>ありがとうございました</h3>
<h3>今すぐ決済{{ $booking->amount }}円</h3>

<form  action="{{route("payment")}}" method="post" class="center">
    @csrf
         <script type="text/javascript"
                 src="https://checkout.pay.jp/"
                 class="payjp-button"
                 data-key="pk_test_b9dad166cd3cf49fa38411b9"
                 data-text="クレジットカード登録">
         </script>
         <input type="hidden" name="price" value={{$booking->amount}}>
     </form>

{{--  <form action="{{ route('bookings.store') }}" method="POST">
    @csrf

    <input type="hidden" name="course_id" value={{ $form->id }}>
    
    <table>
        <tr><th>タイトル</th><th>開催日</th><th>講師</th><th>名前</th><th>メール</th><th>クーポン</th><th>最終価格</th></tr>
        <tr>
            <td>{{ $form->title }}</td>
            <td>{{ $form->date }}</td>
            <td>{{ $form->teacher_id }}</td>
            <td>{{ $apply['name'] }}</td>
            <td>{{ $apply['email'] }}</td>
            <td>{{ $apply['coupon'] }}</td>
            <td>{{ $apply['final_amount'] }}</td>
        </tr>
    </table>
    <td>
        <input type="submit" value="申し込む">
    </td>
</form> --}}
@endsection
