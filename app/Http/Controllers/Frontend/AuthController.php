<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Notifications\RegistrationEmailNotification;
use App\Models\User;
use App\Models\Order;
use Carbon\Carbon;

class AuthController extends Controller
{
    public function __construct(){
        $this->middleware('auth',['only' => 'logout']);
    }


    public function showLoginForm(){
        return view('frontend.auth.login');
    }


    public function processLogin(){
        $validator = Validator::make(request()->all(),[
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $credentials = request()->only(['email','password']);

        if(auth()->attempt($credentials)){
            $user = auth()->user();

            if($user->email_verified_at === null){
                $this->setError('Your account is not verified');
                return redirect()->route('login');
            }

            $this->setSuccess('User logged in .');
            return redirect('/');
        }

        $this->setError('Invalid credentials');
        return redirect()->back();


    }


    public function showRegisterForm(){
        return view('frontend.auth.register');
    }


    public function processRegister(){
        $validator = Validator::make(request()->all(),[
            'name'         => 'required',
            'email'        => 'required|email|unique:users,email',
            'phone_number' => 'required|min:11|max:13|unique:users,phone_number',
            'password'     => 'required|min:6',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

       
        try {
            $user = User::create([
                'name' => request()->input('name'),
                'email' => strtolower(request()->input('email')),
                'phone_number' => request()->input('phone_number'),
                'password' => bcrypt(request()->input('password')),
                'email_verification_token' => uniqid(time(),true).str_random(16),
            ]);
    
            $user->notify( new RegistrationEmailNotification($user));
    
            $this->setSuccess('Account Registered');

            return redirect()->route('login');

        } catch (\Exception $e) {
            
            $this->setError($e->getMessage());

        }
        
    }



    public function activate( $token ){

        if ( $token === null){
            return redirect('/');
        }

        $user = User::where('email_verification_token', $token)->first();

        if ( $user ){
            $user->update([
                'email_verified_at'        => Carbon::now(),
                'email_verification_token' => null,
            ]);

            $this->setError('Account Activate. You can login now.');

            return redirect()->route('login');
        }

        $this->setError('Invalid token');

        return redirect()->route('login');
    }



    public function logout(){
        auth()->logout();

        return redirect('/');
    }


    public function profile(){
        $data = [];
        $data['orders'] = Order::where('user_id',auth()->user()->id)->get();
        
        return view('frontend.auth.profile',$data);
    }










}
