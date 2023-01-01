<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\attendance;
use App\Models\employee;
use Session;

use Carbon\Carbon;

class attendController extends Controller
{
    //
    public function morning() {
        $today = date('Y-m-d');
        $mornings = attendance::where('date', $today)->get();
        $employees = [];
        foreach ($mornings as $morning) {
            $employee = employee::where('id', $morning->idemp)->first();
            $employees[] = $employee;
        }
        return view('/attendance/morning')->with('mornings', $mornings)->with('employees', $employees);
    }

    public function afternoon() {
        $current_month = date('Y-m');
        $afternoons = attendance::where('date', 'LIKE', "$current_month%")->get();
        $employees = [];
        foreach ($afternoons as $afternoon) {
            $employee = employee::where('id', $afternoon->idemp)->first();
            $employees[] = $employee;
        }
        return view('/attendance/afternoon')->with('afternoons', $afternoons)->with('employees', $employees);
    }

    public function dtr() {
        $today = Carbon::now();

        if ($today->isWeekend()) {
            // do something if today is a weekend day
        } else {
            // do something if today is not a weekend day
        }
        $dtrs = attendance::all();
        $emps = employee::all();
        $employees = [];
        foreach ($dtrs as $dtr) {
            $employee = employee::where('id', $dtr->idemp)->first();
            $employees[] = $employee;
        }
        return view('/dtr')->with('dtrs', $dtrs)->with('employees', $employees)->with('emps', $emps);
    }
}
