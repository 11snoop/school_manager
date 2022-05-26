<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $course = Course::find($request->id);
        $user = Auth::user();
        return view('booking.create', ['form' => $course, 'user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $apply = session("apply");
        //dd($apply);
        $booking = new Booking;
        //$booking->course_id = $apply->course_id;
        $booking->course_id = $apply['course_id'];
        $booking->user_id = $apply['user_id'];
        $booking->coupon = $apply['coupon'];
        $booking->message = "test";
        $booking->amount = $apply['final_amount'];
        $booking->save();
        session()->forget('apply');
        return redirect()->route('booking_complete', ['id' => $booking->id])->with('status', 'お申し込み完了しました。');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        //
    }

    public function booking_apply(Request $request)
    {
        session(["apply" => $request->all()]);
        return redirect('booking_confirm');
    }
    public function booking_confirm(Request $request)
    {
    
        $apply = session("apply");


        $apply['final_amount'] = $apply['amount'];
        if($apply['coupon'] == 123){
            $apply['final_amount'] = $apply['amount'] - 1000;
        }

        session(["apply" => $apply]);
            
            
        //dd($apply);
        $course = Course::find($apply['course_id']);
        return view('booking.booking_confirm', ['form' => $course, 'apply' => $apply]);
    }
    
    public function booking_complete(Request $request)
    {
        //dump($request->all());
        $booking = Booking::find($request['id']);
        return view('booking.booking_complete', ['booking' => $booking]);
    }

    public function payment(Request $request)
    {
        $all = $request->all();
          $secret ="sk_test_437d4dfa13b0a65761175418";
                  \Payjp\Payjp::setApiKey($secret);
                  $description = 'テスト';
                  //ユーザーの作成
                  $customer = \Payjp\Customer::create(array('card' => $all['payjp-token'], 'description' => $description));
                  //チャージの作成
                  $charge = \Payjp\Charge::create(array('customer' => $customer->id, 'amount' => 5000, 'currency' => 'jpy', 'description' => $description));
                  dump($charge);
    }
}
