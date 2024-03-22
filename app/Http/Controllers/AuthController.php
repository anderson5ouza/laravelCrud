<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
  
class AuthController extends Controller
{
    public function registrar()
    {
        return view('registrar');
    }
  
    public function criarConta(Request $request)
    {
        Validator::make($request->all(), 
            [
                'name'     => 'required|min:10',
                'email'    => 'required|email',
                'password' => 'required|min:5|confirmed',
                'password_confirmation' => 'required'
            ],
            [
                'name.required'      => 'Informe seu nome completo!',
                'name.min'           => 'O seu nome deve ter pelo menos 10 letras!',
                'email.required'     => 'Informe seu e-mail!',
                'email'              => 'Informe um e-mail válido!',
                'password.required'  => 'Informe uma senha!',
                'password.min'       => 'Sua senha deve ter pelo menos 5 caracteres!',
                'password.confirmed' => 'A senha deve coincidir com a confirmação!',
                'password_confirmation.required' => 'Repita sua senha!'
            ]
        )->validate();
  
        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);
  
        return redirect()->route('login')->with('sucesso', 'Sua conta foi criada com sucesso!');
    }
  
    public function login()
    {
        if(!Auth::check())
            return view('login');  
        else
            return redirect()->route('painel');   
        
    }
  
    public function autenticar(Request $request)
    {

        Validator::make($request->all(), 
            [
                'email'    => 'required|email',
                'password' => 'required'
            ],
            [
                'email.required' => 'Informe seu e-mail!',
                'email'          => 'Informe um e-mail válido!',
                'required'       => 'Informe e-mail e senha!' 
            ],
        )->validate();
  
        if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'email' => trans('auth.failed')
            ]);
        }
  
        $request->session()->regenerate();
  
        return redirect()->route('painel');
    }
  
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
  
        $request->session()->invalidate();
  
        return redirect('/');
    }
 
    public function perfil()
    {
        return view('perfil');
    }
    
}