<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class ContactController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contact');
    }

    public function store(Request $request)
    {



        $this->validate($request,[
            'firstname' => 'required',
            'email' => 'required',
            'subject' => 'required'
        ]);

        Mail::send('emails.contact-message', [
            'msg' => $request->message
        ], function($mail) use ($request)  {

            $mail->from($request->subject, $request->firstname);
            $mail->to('merouanehadid@gmail.com')->subject('message contact');

        });
        return redirect()->to('/home');
    }



}
