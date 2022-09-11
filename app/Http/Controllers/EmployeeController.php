<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['nav'] = "employee";
        $data['departments'] = array(1 => "HR", 2 => "IT", 3 => "Business Development", 4 => "Sales" );
        $data['positions'] = array(1 => "Manager", 2 => "Senior", 3 => "Developer", 4 => "Junior" );
        $data['employees'] = Employee::get();
  
        return view('employee.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['nav'] = "employee";
        $data['departments'] = array(1 => "HR", 2 => "IT", 3 => "Business Development", 4 => "Sales" );
        $data['positions'] = array(1 => "Manager", 2 => "Senior", 3 => "Developer", 4 => "Junior" );
        return view('employee.create',compact('data'));
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
            'name' => 'required|string|min:3',
            'email' => 'required|email',
            'address' => 'required|string|min:3',
        ]);
  
        $employee=new Employee;
        $employee->name=$request->input('name');
        $employee->department_id=$request->input('department_id');
        $employee->position_id=$request->input('position_id');
        $employee->address=$request->input('address');
        $employee->email=$request->input('email');
        $employee->status=1;

        if($employee->save()){
            return redirect()->route('employee.index')
                        ->with('success','Employee created successfully.');
        }else{
            return redirect()->route('employee.index')
                        ->with('error','Employee failed to create');
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
        $employee = Employee::find($id);
        $data['nav'] = "employee";
        $data['departments'] = array(1 => "HR", 2 => "IT", 3 => "Business Development", 4 => "Sales" );
        $data['positions'] = array(1 => "Manager", 2 => "Senior", 3 => "Developer", 4 => "Junior" );
        $data['employee'] = $employee;
        return view('employee.edit',compact('data'));
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
            'name' => 'required|string|min:3',
            'email' => 'required|email',
            'address' => 'required|string|min:3',
        ]);

        $employee = Employee::find($id);
        $data = $request->except('_method','_token','submit');
        if($employee->update($data)){
            return redirect()->route('employee.index')
                        ->with('success','Employee updated successfully');
        }else{
            return redirect()->route('employee.index')
                        ->with('error','Employee failed to update');
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
        Employee::destroy($id);
  
        return redirect()->route('employee.index')
                        ->with('success','Employee deleted successfully');
    }
}
