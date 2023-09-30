<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bookingdetail;


class BookingdetailsController extends Controller
{
    public function index()
    {
        $book = Bookingdetail::get();
        return view('Book.index',compact('book'));
    }
    public function create()
    {
       
        return view('Book.index');
    }

    public function store(Request $request, Bookingdetail $bookingdetail)
    {
        $request->validate([
            
            'name' => 'required|string',
            'email' => 'required|string',
            'start_date' => 'date|nullable',
            'finish_date' => 'date|nullable',
            'start_time' => 'required',
            'finish_time' => 'required',
            'mobile' => 'required|string',

        ]);

        $bookingdetail->name = $request->name;
        $bookingdetail->email = $request->email;
        $bookingdetail->start_date = $request->start_date;
        $bookingdetail->finish_date = $request->finish_date;
        $bookingdetail->start_time = $request->start_time;
        $bookingdetail->finish_time = $request->finish_time;
        $bookingdetail->mobile = $request->mobile;

        $bookingdetail->save();

        return redirect()->route('book.index');
    }

    public function postSolitudeStepTwo(Request $request)
{
    $rules = [
        'start_date' => 'required|date',
        'finish_date' => 'required|finish_date_check',
        'start_time' => 'required|time',
        'finish_time' => 'required|finish_time_check',
       
    ];

    

    $messages = [
        'finish_date_check' => 'Finish date can\'t be smaller then Start date.Please check your dates.'
    ];
    $messages = [
        'finish_time_check' => 'Finish time can\'t be smaller then Start time.Please check your times.'
    ];


    $validation = validator(
        $request->toArray(),
        $rules,
        $messages
    );

    //If validation fail send back the Input with errors
    if($validation->fails()) {
        //withInput keep the users info
        return redirect()->back()->withInput()->withErrors($validation->messages());
    } else {
        MySession::setSessionData('start_date', $request);
        MySession::setSessionData('finish_date', $request);
        MySession::setSessionData('start_time', $request);
        MySession::setSessionData('finish_time', $request);

        //return $request->session()->all();
        return redirect("/getSolitudeStepThree");
    }
}

}
