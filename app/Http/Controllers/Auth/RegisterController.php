<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Requests\TestRegisterRequest;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
// use Illuminate\Http\Request;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest');
    // }


    public function registerForm()
    {

        return view('auth.register');
    }


    public function register(TestRegisterRequest $request)
    {


        if ($request->isMethod('post')) {


            // $request->validate([
            //     'username' => 'required|max:12|min:2',
            //     'mail' => 'required|max:40|min:5|unique:users,mail|email',
            //     'password' => 'required|confirmed|max:20|min:8|alpha_num',
            // ]);



            $username = $request->input('username');
            $mail = $request->input('mail');
            $password = $request->input('password');

            User::create([
                'username' => $username,
                'mail' => $mail,
                'password' => bcrypt($password),
            ]);

            // $request->session()->put('key', 値);
            $request->session()->put('username',  $username);
            $request = session()->get('username');
            return redirect('added');
        }


        return view('auth.register');
    }

    public function added()
    {
        return view('auth.added');
    }
}
