<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


use App\Models\Category;
class ContactController extends Controller
{
    public function show()
    {
        $categorysLimit = Category::where('parent_id', 0)->take(3)->get();
        return view('contacts.contact',compact('categorysLimit'));
    }
    public function send(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
             'subject'=>'required',
             'phone'=>'required',
             'message'=>'required',
        ]);
        if($this->isOnline()){
            $mail_data=[
                'recipent'=>'quickfoodstore9@gmail.com',
                'fromEmail'=>$request->email,
                'fromName'=>$request->email,
                'subject'=>$request->subject,
                'fromPhone'=>$request->phone,
                'content'=>$request->message,
            ];
            Mail::send('contacts.email',$mail_data,function($message)use($mail_data){
             $message->to($mail_data['recipent'])
                     ->from($mail_data['fromName'],$mail_data['fromEmail'])
                     ->subject($mail_data['subject']);
            });
           return redirect()->back()->with('success','Email sent!');
        }else{
            return redirect()->back()->withInput()->with('error',"Check your internet connection");
        }
    }
    public function isOnline($site="http://youtube.com/")
    {
        if(@fopen($site,"r")){
            return true;
        }else{
            return false;
        }
    }
}
