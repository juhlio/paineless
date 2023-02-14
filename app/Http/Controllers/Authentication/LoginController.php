<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /**
     * Display login page.
     * 
     * @return Renderable
     */
    public function index()
    {
        return view('Auth.login');
    }



    public function authenticate(Request $request)
    {
        $data = $request->only([
            'email',
            'password',
            'remember_token'
        ]);

        $validator = $this->validator($data);

        if ($validator->fails()) {
            return redirect()->route('login')
                ->withErrors($validator)
                ->withInput();
        }


        if (Auth::attempt($data)) {
            return redirect()->route('dashboard');
        } else {
            return back()->withErrors([
                'email' => 'Não foi possível logar.',
            ])->onlyInput('email');
        }
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:100'],
            'password' => ['required', 'string', 'min:4']
        ]);
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
