<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileEditRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function show()
    {

        return view('profile.show', ['user' => Auth::user()]);
    }

    public function edit()
    {
        return view('profile.edit', ['user' => Auth::user()]);
    }

    public function update(ProfileEditRequest $request)
    {
        $user = Auth::user();
      
        $updated_data = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'bio' => $request->bio,
        ];

        if($request->file('avatar')->isValid()) {
            $updated_data['avatar'] = $request->file('avatar')->storePublicly('avatars');
        }
        if($user->email === $request->email) {
            $updated_data['email'] = $request->email;
        }
        if($request->password) {
            $updated_data['password'] = Hash::make($request->password);
        }

        DB::table('users')->where('id', $user->id)->update($updated_data);

        return redirect()->route('profile');
    }
}
