<?php

namespace App\Http\Controllers;

use App\Mail\SendUserMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //
    public function Register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:6',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        User::create(array_merge(
            $validator->validated(),
            [
                'password' => bcrypt($request->password),
            ]
        ));
        return back()->with(['message' => 'user created successfully']);
    }

    public function Login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:100',
            'password' => 'required|string|min:6',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }
        $user = User::where('email', $request->email)->first();
        if ($user != null) {
            if ($user->status != 'blocked') {
                $credentials = $request->only('email', 'password');
                if (Auth::attempt($credentials)) {
                    $user->update([
                        'attempt' => 0,
                    ]);
                    return back()->with(['message' => 'Login successfully']);
                } else {
                    $current = now();
                    $last_update = $user->updated_at;
                    $interval = $current->diff($last_update);
                    $seconds = $interval->s;
                    if ($seconds <= 30 && $user->attempt >= 3) {
                        return back()->withErrors('try again after 30 sec (' . $seconds . ')');
                    }
                    $user->update([
                        'attempt' => $user->attempt + 1,
                    ]);
                    if ($user->attempt == 4) {
                        $user->update([
                            'status' => 'blocked'
                        ]);
                        Mail::to($user->email)->send(new SendUserMail($user));
                        return back()->withErrors('Your account has blocked');
                    }
                    return back()->withErrors('Error in username or password, please check');
                }
            } else {
                return back()->withErrors('Your account is blocked');
            }
        } else {
            return back()->withErrors('Error in username or password, please check');
        }
    }
}
