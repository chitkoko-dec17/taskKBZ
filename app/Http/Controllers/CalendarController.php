<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Holiday;
use App\Leave;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['nav'] = "calendar";
        $data['employees'] = Employee::get();
        $data['holidays'] = Holiday::get();
        $data['leaves'] = leave::get();
  
        return view('dashboard',compact('data'));
    }
}
