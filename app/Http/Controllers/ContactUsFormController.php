<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Mail;

class ContactUsFormController extends Controller
{
    public function createForm(Request $request) {
        return view('pages.contact');
      }
  
    public function contactUsForm(Request $request) {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'subject'=>'required',
            'message' => 'required'
        ]);

        Contact::create($request->all());

        \Mail::send('mail', array(
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'subject' => $request->get('subject'),
            'msg' => $request->get('message'),
        ), function($message) use ($request){
            $message->from($request->email);
            $message->to('ivanovicwork@gmail.com', 'Admin')->subject($request->get('subject'));
        });

        return back()->with('success', 'We have received your message and would like to thank you for writing to us.');
    }
}
