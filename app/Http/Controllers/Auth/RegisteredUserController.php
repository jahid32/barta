<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    public function create(): View
    {
        return view('auth.register');
    }

    public function store(RegisterRequest $request)
    {
        // create first name, last name form name
       
        $name = explode(' ', $request->name);
        $first_name = array_shift($name);
        $last_name = implode(' ', $name) ?? '';
        $user = DB::table('users')->insert([
            'first_name' => $first_name,
            'last_name' => $last_name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($user) {
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();

                return redirect()->route('profile');
            }
        }

        return back();
    }
}
