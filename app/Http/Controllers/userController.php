<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\user;
use App\Models\employee;
use Session;
use Carbon\Carbon;

class userController extends Controller
{
	public function checkEmail(Request $request) {
		$email = $request->input('email');
		$exists = employee::where('email', $email)->exists();
		$user = user::where(['email' => $email])->first();

		if (!$exists) {
			$request->session()->put('wrongEmail', $email);
			$request->session()->put('error', 'Email does not exist. Please contact administrators.');
			return redirect('login');
		} else {
			if ($user && $exists) {
				$request->session()->put('email', $email);
				$request->session()->put('enterpassword', 'Enter your password.');
				return redirect('login');
			} else {
				$request->session()->put('signup', $email);
				$request->session()->put('needsignup', 'You need to register your email first.');
				return redirect('signup');
			}
		}
	}

	public function userAuth(Request $req)
	{
		$email = $req->input('email');
	    $password = $req->password;
		$exist = employee::where('email', $email)->exists();
	    $user = user::where(['email' => $email])->first();

		if ($exist && $user) {
			if (Hash::check($password, $user->password)){
				$req->session()->flush();
				$req->session()->put('user', $user);
				Auth::login($user);
				return redirect()->route('welcome');
			} else {
				$req->session()->put('wrongpassword', 'The password is incorrect.');
				return redirect('login');
			}
		} else {
			$req->session()->put('changeemail', 'The email you have entered was changed.');
			return redirect('login');
		}
	}

    public function saveRegistration(Request $request)
    {
		$validator = Validator::make($request->all(), [
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password',
        ]);

		if ($validator->fails()) {
            // validation failed, redirect back with errors
			$request->session()->put('status', 'Password does not match.');
            return redirect()->back()->withErrors($validator)->withInput();
        }

		$email = $request->email;

		$employees = employee::where(['email' => $email])->first();
    	$newReg = new user;
		$exists = user::where('username', $request->username)->exists();

		if ($exists) {
			$request->session()->put('status', 'Username already exist.');
            return redirect()->back()->withInput();
		}

    	$newReg->username = $request->username;
		$newReg->idemp = $employees->id;
    	$newReg->email = $request->email;
    	$newReg->password = hash::make($request->password);

		if ($employees->position == "Administrator") {
			$newReg->role = "Admin";
		} else {
			$newReg->role = "User";
		}

    	$newReg->save();
		$request->session()->forget('status');
    	return redirect('/login');
    }

    public function login()
    {
    	return view('login');
    }

    public function logout()
    {
    	Session::flush();
		Auth::logout();
    	return redirect('/login');
    }

    public function signup()
    {
    	return view('register');
    }

    public function welcome()
    {
		$today = Carbon::today();

        $countday = DB::table('attendances')
            ->whereDate('date', $today)
            ->count();
		$countmonth = DB::table('attendances')
			->whereMonth('date', $today->month)
			->count();
		$countevent = DB::table('events')
			->where('start', '>', Carbon::now())
			->count();
		$countemp = DB::table('employees')->count();
    	return view('welcome')->with('countday', $countday)->with('countmonth', $countmonth)->with('countevent', $countevent)->with('countemp', $countemp);
    }
}
