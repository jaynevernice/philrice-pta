<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\ForgotPasswordMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

// use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function login()
    {
        // dd(Hash::make('123456'));

        // para hindi bumalik sa login page kung talagang nakalog in na
        if (!empty(Auth::check())) {
            if (Auth::user()->user_type == 'super_admin') {
                return redirect('/super_admin/overview');
            } elseif (Auth::user()->user_type == 'admin') {
                return redirect('/admin/overview');
            } elseif (Auth::user()->user_type == 'encoder') {
                return redirect('/encoder/overview');
            } elseif (Auth::user()->user_type == 'viewer') {
                return redirect('/viewer/overview');
            }
        }

        return view('login');
    }

    public function AuthLogin(Request $request)
    {
        // dd($request->all());
        $user = User::getEmailSingle($request->email);

        // $remember = !empty($request->remember) ? true : false;

        if (!empty($user)) {
            if ($user->email_verified_at == '') {
                return redirect()->back()->with('error', 'Please check your email to verify your account.');
            }

            // if(Auth::attempt(['email' => $request->email, 'password' => $request->password], true)) {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

                // Check if user is authenticated and not blocked, if blocked logs the user out and gives an error message
                if (Auth::check() && Auth::user()->isBlocked) {
                    Auth::logout();
                    return redirect()->back()->with('error', 'Your account is blocked. Please contact philrice.tmsd@gmail.com for assistance.');
                }

                if (!empty(Auth::check())) {
                    if (Auth::user()->user_type == 'super_admin') {
                        // Alert::success('Login Successful', 'Welcome Super Admin');
                        return redirect('/super_admin/overview');
                    } elseif (Auth::user()->user_type == 'admin') {
                        // Alert::success('Login Successful', 'Welcome Admin');
                        return redirect('/admin/overview');
                    } elseif (Auth::user()->user_type == 'encoder') {
                        // Alert::success('Login Successful', 'Welcome Encoder')->autoClose(2000);
                        return redirect('/encoder/overview');
                    } elseif (Auth::user()->user_type == 'viewer') {
                        return redirect('/viewer/overview');
                    }
                }
            } else {
                return redirect()->back()->with('error', 'Please enter correct email and password');
            }
        } else {
            return redirect()->back()->with('error', 'Please create an account before logging in.');
        }
    }

    public function PostForgot(Request $request)
    {
        $user = User::getEmailSingle($request->email);
        // dd($user);
        if (!empty($user)) {
            $user->remember_token = Str::random(30);
            $user->save();

            Mail::to($user->email)->send(new ForgotPasswordMail($user));

            return redirect()->back()->with('success', 'Please check your email and reset your password.');
        } else {
            return redirect()->back()->with('error', 'Email is not existing');
        }
    }

    public function PostSecurityQuestions(Request $request)
    {
        // dd($request->all());

        $user = User::where('philrice_id', '=', $request->philrice_id)->first();

        if (!empty($user->email_verified_at)) {
            $auth_user = User::where('philrice_id', '=', $request->philrice_id)
                ->where($request->security_question, '=', strtolower($request->answer))
                ->first();

            if (!empty($auth_user)) {
                $auth_user->remember_token = Str::random(30);
                $auth_user->save();

                Mail::to($auth_user->email)->send(new ForgotPasswordMail($auth_user));

                return redirect()
                    ->back()
                    ->with('success', 'Please check your email: ' . $auth_user->email . ' and reset your password.');
            } else {
                return redirect()->back()->with('error', 'Your PhilRice ID or your answer is incorrect');
            }
        } else {
            return redirect()->back()->with('error', 'Your PhilRice ID is not existing or not verified');
        }

        // $user = User::where('remember_token', '=', $remember_token)->first();
    }

    public function reset($remember_token)
    {
        $user = User::getTokenSingle($remember_token);

        if (!empty($user)) {
            $data['user'] = $user;

            return view('reset', $data);
        } else {
            abort(404);
        }
    }

    public function PostReset($remember_token, Request $request)
    {
        if ($request->password == $request->confirm_password) {
            $request->validate([
                'password' => 'required|min:8|regex:/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&()\-^\/])/',
            ]);

            $user = User::getTokenSingle($remember_token);
            $user->password = Hash::make($request->password);
            $user->remember_token = Str::random(30);
            $user->save();

            return redirect(url('/login'))->with('success', 'Password successfully reset.');
        } else {
            return redirect()->back()->with('error', 'Password and Confirm Password does not match.');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
        // return redirect(url(''));
    }
}
