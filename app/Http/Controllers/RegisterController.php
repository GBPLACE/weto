<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterPartnerRequest;
use App\Partner;
use App\SiteContent;
use App\SiteSeo;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function becomeHost(){

        $homeContent = SiteContent::with('headerBannerContents')->where( 'id' , 1 )->get() ;
        $homeContent = $homeContent->toArray() ;

        $siteSeo = SiteSeo::where('site_page_number' , 3)->first() ;
        $siteSeo = $siteSeo->toArray() ;

        return view('front.becomeHost' ,compact("homeContent" , 'siteSeo'));
    }

    public function login(){

        $homeContent = SiteContent::with('headerBannerContents')->where( 'id' , 1 )->get() ;
        $homeContent = $homeContent->toArray() ;

        return view('front.login' , compact('homeContent'));
    }

    public function registerPartner(RegisterPartnerRequest $request){
        $random_token = Str::random(20);

        $tempDate = explode('/',$request->date_of_birth);
        $date_of_birth = $tempDate[2].'-'.$tempDate[1].'-'.$tempDate[0];
		
        $MAIL_USERNAME=env('MAIL_USERNAME');
        $MAIL_FROM_NAME=env('MAIL_FROM_NAME');
		
        $data = array('subject' => 'Partner Account Verification | WETO',
            'email' => $MAIL_USERNAME, 'Appname' => $MAIL_FROM_NAME, 'token' => $random_token,
            'to_name' => $request->name, 'to_email' => $request->email);

        Mail::send('emails.partnerRegisterVerificationMail', $data, function($message) use ($data) {
            $message->to($data['to_email'], $data['to_name'])
                ->subject($data['subject'])
                ->from($data['email'], $data['Appname']);
        });

        $partner= new Partner();
        $partner->name=$request->name;
        $partner->date_of_birth=$date_of_birth;
        $partner->email=$request->email;
        $partner->website=$request->website;
        $partner->password=Hash::make($request->password);
        $partner->token=$random_token;
        $partner->save();

        return redirect()->back()->with('message', 'Your account is created! Please check your inbox to verify your email address and access your account.');
    }

    public function checkPartnerVerifiedToken($token){
        if ($token!=''){
            $check=DB::table('partners')->where('token', '=' ,$token)->first();
            if ($check){
                $checkVerification=$check->email_verification;
                if ($checkVerification==1){
                    return redirect()->route('login')->with('message', 'Email is already Verified.');
                }
                else{
                    $query=DB::table('partners')->where('token', '=' ,$token)->update(['email_verification'=> 1]);
                    if ($query){
                        $MAIL_USERNAME=env('MAIL_USERNAME');
                        $MAIL_FROM_NAME=env('MAIL_FROM_NAME');
                        $to_email=env('MAIL_TO_ADDRESS');

                        $data = array('subject' => 'New Partner Signed Up | WETO',
                            'partner_name'=> $check->name, 'partner_email'=> $check->email, 'partner_dob'=> $check->date_of_birth, 'partner_website'=> $check->website,
                            'email' => $MAIL_USERNAME, 'Appname' => $MAIL_FROM_NAME,
                            'to_name' => 'WETO Admin', 'to_email' => $to_email);

                        Mail::send('emails.partnerRegisterAdminMail', $data, function($message) use ($data) {
                            $message->to($data['to_email'], $data['to_name'])
                                ->subject($data['subject'])
                                ->from($data['email'], $data['Appname']);
                        });

                        return redirect()->route('login')->with('message', 'Email Verified Successfully, Now You can login.');
                    }
                    else{
                        return redirect()->route('login')->with('error','Email verification failed.');
                    }
                }
            }
            else{
                return redirect()->route('login')->with('error','Email verification failed (Link Expired).');
            }
        }
        else{
            return redirect()->route('login')->with('error','Email verification failed (Link Expired).');
        }
    }

    public function loginSubmit(Request $request){
        $request->validate([
            'email' =>'required|email',
            'password' =>'required'
        ]);

        $partner = Partner::where('email',$request->email)->first();
        if ($partner!=null) {
            $checkVerification=$partner->email_verification;
            if ($checkVerification==0){
                return back()->withInput()->with('error', 'Your Account is not Verified yet.');
            }
            else {
                $password=$partner->password;
                if(Hash::check($request->password, $password)){
                    session()->forget('user');
                    session(['partner'=>$partner]);
                    return redirect()->route('partnerPropertyList');
                }
                else {
                    return back()->withInput()->with('error', 'Email or Password entered is incorrect.');
                }
            }
        }
        else {
            $user = User::where('email',$request->email)->first();
            if ($user!=null) {
                $checkVerification = $user->email_verification;
                if ($checkVerification == 0) {
                    return back()->withInput()->with('error', 'Your Account is not Verified yet.');
                }
                else {
                    $password=$user->password;
                    if(Hash::check($request->password, $password)){
                        session()->forget('partner');
                        session(['user'=>$user]);
                        return redirect()->route('index');
                    }
                    else {
                        return back()->withInput()->with('error', 'Email or Password entered is incorrect.');
                    }
                }
            }
            else{
                return back()->withInput()->with('error', 'Email or Password entered is incorrect.');
            }
        }
    }

    public function logout(){
        session()->forget('user');
        session()->forget('partner');
        return redirect()->route('login');
    }

    public function userSignup(){

        $homeContent = SiteContent::with('headerBannerContents')->where( 'id' , 1 )->get() ;
        $homeContent = $homeContent->toArray() ;

        return view('user.userSignup' , compact('homeContent'));
    }

    public function registerUser(Request $request){
        $request->validate([
            'name' => 'required|min:3|regex:/^[a-zA-Z\s]*$/',
            'email' => 'required|email|unique:partners,email|unique:users,email',
            'password' => 'required|min:8',
            'password_conformation' => 'required',
        ]);

        $random_token = Str::random(20);

        $MAIL_USERNAME=env('MAIL_USERNAME');
        $MAIL_FROM_NAME=env('MAIL_FROM_NAME');

        $data = array('subject' => 'User Account Verification | WETO',
            'email' => $MAIL_USERNAME, 'Appname' => $MAIL_FROM_NAME, 'token' => $random_token,
            'to_name' => $request->name, 'to_email' => $request->email);

        Mail::send('emails.userRegisterVerificationMail', $data, function($message) use ($data) {
            $message->to($data['to_email'], $data['to_name'])
                ->subject($data['subject'])
                ->from($data['email'], $data['Appname']);
        });

        $user= new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->token=$random_token;
        $user->save();

        return redirect()->back()->with('message', 'Your account is created! Please check your inbox to verify your email address and access your account.');
    }

    public function checkUserVerifiedToken($token){
        if ($token!=''){
            $check=DB::table('users')->where('token', '=' ,$token)->first();
            if ($check){
                $checkVerification=$check->email_verification;
                if ($checkVerification==1){
                    return redirect()->route('login')->with('message', 'Email is already Verified.');
                }
                else{
                    $query=DB::table('users')->where('token', '=' ,$token)->update(['email_verification'=> 1]);
                    if ($query){
                        $MAIL_USERNAME=env('MAIL_USERNAME');
                        $MAIL_FROM_NAME=env('MAIL_FROM_NAME');
                        $to_email=env('MAIL_TO_ADDRESS');

                        $data = array('subject' => 'New User Signed Up | WETO',
                            'user_name'=> $check->name, 'user_email'=> $check->email,
                            'email' => $MAIL_USERNAME, 'Appname' => $MAIL_FROM_NAME,
                            'to_name' => 'WETO Admin', 'to_email' => $to_email);

                        Mail::send('emails.userRegisterAdminMail', $data, function($message) use ($data) {
                            $message->to($data['to_email'], $data['to_name'])
                                ->subject($data['subject'])
                                ->from($data['email'], $data['Appname']);
                        });

                        return redirect()->route('login')->with('message', 'Email Verified Successfully, Now You can login.');
                    }
                    else{
                        return redirect()->route('login')->with('error','Email verification failed.');
                    }
                }
            }
            else{
                return redirect()->route('login')->with('error','Email verification failed (Link Expired).');
            }
        }
        else{
            return redirect()->route('login')->with('error','Email verification failed (Link Expired).');
        }
    }

    public function email(){

        $homeContent = SiteContent::with('headerBannerContents')->where( 'id' , 1 )->get() ;
        $homeContent = $homeContent->toArray() ;

        return view('front.email' , compact('homeContent'));
    }

    public function emailSubmit(Request $request){

        $request->validate([
            'email' => 'required|email',
        ]);

        $MAIL_USERNAME=env('MAIL_USERNAME');
        $MAIL_FROM_NAME=env('MAIL_FROM_NAME');
        $random_token = Str::random(20);

        $partner = Partner::where('email',$request->email)->first();
        if ($partner!=null) {
            $query=Partner::where('email',$request->email)->update(['token'=> $random_token]);
            if ($query){
                $data = array('subject' => 'Forgot Password | WETO',
                    'email' => $MAIL_USERNAME, 'Appname' => $MAIL_FROM_NAME, 'token' => $random_token,
                    'to_name' => $partner->name, 'to_email' => $partner->email);

                Mail::send('emails.forgotPasswordMail', $data, function($message) use ($data) {
                    $message->to($data['to_email'], $data['to_name'])
                        ->subject($data['subject'])
                        ->from($data['email'], $data['Appname']);
                });

                return redirect()->back()->with('message', 'A Password reset link is sent to your email address. Click that link to reset your password.');
            }
            else{
                return redirect()->back()->withInput()->with('error','Something went wrong.');
            }
        }
        else {
            $user = User::where('email', $request->email)->first();
            if ($user != null) {
                $query=User::where('email',$request->email)->update(['token'=> $random_token]);
                if ($query){
                    $data = array('subject' => 'Forgot Password | WETO',
                        'email' => $MAIL_USERNAME, 'Appname' => $MAIL_FROM_NAME, 'token' => $random_token,
                        'to_name' => $user->name, 'to_email' => $user->email);

                    Mail::send('emails.forgotPasswordMail', $data, function($message) use ($data) {
                        $message->to($data['to_email'], $data['to_name'])
                            ->subject($data['subject'])
                            ->from($data['email'], $data['Appname']);
                    });

                    return redirect()->back()->with('message', 'A Password reset link is sent to your email address. Click that link to reset your password.');
                }
                else{
                    return redirect()->back()->withInput()->with('error','Something went wrong.');
                }
            }
            else{
                return back()->withInput()->with('error', 'Email not found in our records.');
            }
        }
    }

    public function checkResetPasswordToken($token){
        if ($token!=''){
            $partner=Partner::where('token', '=' ,$token)->first();
            if ($partner!=null) {
                $token=$token;
                return view('front.resetPassword', compact('token'));
            }
            else{
                $user = User::where('token', '=' ,$token)->first();
                if ($user != null) {
                    $token=$token;
                    return view('front.resetPassword', compact('token'));
                }
                else{
                    return redirect()->route('email')->with('error','Password reset failed (Link Expired).');
                }
            }
        }
        else{
            return redirect()->route('email')->with('error','Password reset failed (Link Expired).');
        }
    }

    public function submitPasswordResetForm(Request $request){
        $request->validate([
            'password' => 'required|min:8',
            'password_conformation' => 'required',
        ]);

        if ($request->token!='') {
            $partner = Partner::where('token', '=', $request->token)->first();
            if ($partner != null) {
                $query = Partner::where('token', '=', $request->token)->update(['password' => Hash::make($request->password), 'token' => null]);
                if ($query) {
                    return redirect()->route('login')->with('message', 'Password reset successfully.');
                }
                else {
                    return redirect()->route('login')->with('error', 'Something went wrong.');
                }
            }
            else {
                $user = User::where('token', '=', $request->token)->first();
                if ($user != null) {
                    $query = User::where('token', '=', $request->token)->update(['password' => Hash::make($request->password), 'token' => null]);
                    if ($query) {
                        return redirect()->route('login')->with('message', 'Password reset successfully.');
                    }
                    else {
                        return redirect()->route('login')->with('error', 'Something went wrong.');
                    }
                }
                else {
                    return redirect()->route('login')->with('error', 'Password reset failed (Link Expired).');
                }
            }
        }
        else{
            return redirect()->route('login')->with('error','Password reset failed (Link Expired).');
        }
    }

}
