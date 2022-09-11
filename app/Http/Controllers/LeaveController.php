<?php

namespace App\Http\Controllers;

use App\Leave;
use App\Employee;
use App\LeaveType;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['nav'] = "leave";
        $data['leaves'] = leave::get();
  
        return view('leave.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['nav'] = "leave";
        $data['employees'] = Employee::get();
        $data['leavetypes'] = LeaveType::get();
        return view('leave.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);
  
        $leave = new Leave;
        $leave->employee_id = $request->input('employee_id');
        $leave->leave_type_id = $request->input('leave_type_id');
        $leave->start_date = $request->input('start_date');
        $leave->end_date = $request->input('end_date');
        $leave->reason = $request->input('reason');

        if($leave->save()){
            return redirect()->route('leave.index')
                        ->with('success','Leave created successfully.');
        }else{
            return redirect()->route('leave.index')
                        ->with('error','Leave failed to create');
        } 
   
            
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $leave = Leave::find($id);
        $data['nav'] = "leave";
        $data['leave'] = $leave;
        $data['employees'] = Employee::get();
        $data['leavetypes'] = LeaveType::get();
        return view('leave.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        $leave = Leave::find($id);
        $data = $request->except('_method','_token','submit');
        if($leave->update($data)){
            return redirect()->route('leave.index')
                        ->with('success','Leave updated successfully');
        }else{
            return redirect()->route('leave.index')
                        ->with('error','Leave failed to update');
        }  
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Leave::destroy($id);
  
        return redirect()->route('leave.index')
                        ->with('success','Leave deleted successfully');
    }
}
