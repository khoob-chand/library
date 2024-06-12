<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
class ContactController extends Controller
{
    public function GetContactUs(){
        return view('contact-us');
    }
    public function SaveContactUsPage(Request $req) {
        $emailFrom =env('MAIL_FROM_ADDRESS');
        $req->validate(['name'=>'required','email'=>'required|email','usernumber'=>'required','message'=>'required']);
        $data =['name'=>$req['name'] ,"from"=> $emailFrom,'usernumber'=>$req['usernumber'],'message'=>$req['message'],'email'=>$req['email']];
        Mail::to($req['email'])->send(new ContactMail($data));
        return response()->json(['status'=>200,'success'=>'Thanks you for Contacting with us we will back to you soon']);
    }
}
