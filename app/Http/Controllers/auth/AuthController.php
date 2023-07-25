<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AuthRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function registration()
    {
        return view('auth.register');
    }

    public function postLogin(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $roleId = Auth::user()->role_id;
            if($roleId == 1){
                return redirect()->route('homePage.index')->withSuccess('You have Successfully loggedin');
            }
            else{
                return redirect()->route('user.index')->withSuccess('You have Successfully loggedin');
            }
        }
        return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
    }

    public function postRegistration(RegisterRequest $request)
    {
        $data = $request->all();
        $check = $this->create($data);

        return redirect("login")->withSuccess('Great! You have successfully registred yourself!!');
    }

    public function create(array $data)
    {
      return User::create([
        'first_name' => $data['first_name'],
        'last_name' => $data['last_name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
        'phone_number' => $data['phone_number']
      ]);
    }

    public function logout() {

        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}
