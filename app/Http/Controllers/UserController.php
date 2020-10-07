<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function register(Request $request)
    {
        if(Auth::check()){
            return redirect(route('decks.index'));
        }
        if ($request->method() == "POST") {
            Validator::make($request->all(), [
                'name' => 'required|min:8',
                'password' => 'required|min:8'
            ])->validate();
            $user = User::whereName( $request->name)->first();
            if ($user) {
                if (Hash::check($request->password, $user->password)) {
                    Auth::loginUsingId($user->id);
                    return redirect(route('decks.index'));
                }else{
                    return redirect(route('login'));
                }
            }
            $user = User::create([
                'name' => $request->name,
                'password' => Hash::make($request->password),
            ]);
            Auth::loginUsingId($user->id);
            return redirect(route('decks.index'));
        }
        return view('register');
    }
}

