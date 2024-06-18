<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailSend;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\IpUtils;
class UserController extends Controller
{
    public function GetUserLoginForm(){

        if(!Auth::check()){
            return view('login-form');

        }
        return redirect ('/');

    }
    public function PostUserLoginForm(Request $request){


        // login capatcha validation
        $recaptcha = $request->input('g-recaptcha-response');
        if (is_null($recaptcha)) {
            $data = [
                'error' => 'Please click on reCAPTCHA  to login.',
            ];
                return view('login-form')->withErrors($data);
        }

        $url = "https://www.google.com/recaptcha/api/siteverify";

        $params = [
         'secret' => config('services.recaptcha.secret'),
         'response' => $recaptcha,
         'remoteip' => IpUtils::anonymize($request->ip())
        ];

         $response = Http::asForm()->post($url, $params);
            $result = json_decode($response->body());

        $result = json_decode($response);

        if ($response->successful() && $result->success == true) {

            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);
            $credentials = $request->only('email', 'password');
            $user =User::where('email',$request['email'])->first();
            if ($user=="") {

                return back()->withErrors([
                    'error' => 'Email not found Please register !',
                ]);
            }else{
                if (Auth::attempt($credentials) && ($user->status >= 1 && !is_null($user->email_verified_at))) {
                    $data = [
                        'msg' => 'Welcome to out site '.$user->name
                    ];
                    $token = $user->createToken('auth_token')->plainTextToken;
                    session(['auth_token' => $token]);
                    return redirect('/')->with($data);
                }elseif($user->status == 0 && is_null($user->email_verified_at)){
                    $data = [
                        'error' => 'Email Register but verification of email is pending',
                    ];
                    return view('login-form')->withErrors($data);
                }
                $data = [
                    'error' => 'Email Register but verification of email is pending',
                ];
                return view('login-form')->withErrors($data);
            }
        } else {

            $data = [
                'error' => 'Invalid: Please complete the reCAPTCHA again to proceed.',
            ];

                return view('login-form')->withErrors($data);
        }

    }
    public function GetUserRegistrationForm(){
        return view('registration-form');
    }
    public function PostUserRegistrationForm(Request $req){
        $token  =Carbon::now();
        $req->validate(['name'=>'required',
        'email'=>'required|email',
        'password'=>'required',
        'cpassword'=>'required|same:password']);
        $user =User::where('email',$req['email'])->first();
        if( $user) {
            return back()->withErrors([
                'error' => 'Email already found found Please login now !',
            ]);
        }else{
            $user =new User;
            $user->name =$req['name'];
            $user->email =$req['email'];
            $user->password =Hash::make($req['password']);
            $user->remember_token =$token;
            $user->save();

            $emailFrom=env('MAIL_FROM_ADDRESS');
            $data = [
                'name' => 'khoobchandjhariya48@gmail.com',
                'from'=> $emailFrom,
                'token'=>$token,
                'msg'=>"You have been successfully register to our site  please verify your Email"
            ];
            Mail::to($req['email'])->send(new EmailSend($data));
            return view('view-email')->with($data);

        }

    }
    public function LogoutUser() {
        Auth::logout();
        return redirect('/');
      }
     public function EmailVerification($token) {

        $user =User::where('remember_token',$token)->first();

        if ($user && is_null($user->email_verified_at)) {
            if ($user->remember_token == $token) {
                $verificationDateTime = Carbon::createFromTimestamp($token);
                $currentDateTime=Carbon::now();
                $diffence_in_minutes = $currentDateTime->diffInMinutes($user->created_at);
                if ($diffence_in_minutes > 25) {
                    return view('view-email')->with('msg','Verification Link Expired');
                } else {
                    $user->email_verified_at = $currentDateTime;
                    $user->status = 1;
                    $user->save();
                    return view('view-email')->with('msg','Successfully Verified Please login Now');
                }
            }
        }else if($user && !is_null($user->email_verified_at)) {
            return view('view-email')->with('msg','Email Already Verified please login now');
        }else{
            return view('view-email')->with('msg','Invalid token Or Linked Expired please verify Email Again');

        }

    }
}
