<?php

namespace App\Http\Controllers;

use App\Holiday;
use Illuminate\Http\Request;

class HolidayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['nav'] = "holiday";
        $data['holidays'] = Holiday::get();
  
        return view('holiday.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['nav'] = "holiday";
        return view('holiday.create',compact('data'));
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
            'title' => 'required|string|min:3',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);
  
        $holiday=new Holiday;
        $holiday->title=$request->input('title');
        $holiday->start_date=$request->input('start_date');
        $holiday->end_date=$request->input('end_date');

        if($holiday->save()){
            return redirect()->route('holiday.index')
                        ->with('success','Holiday created successfully.');
        }else{
            return redirect()->route('holiday.index')
                        ->with('error','Holiday failed to create');
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
        $holiday = holiday::find($id);
        $data['nav'] = "holiday";
        $data['holiday'] = $holiday;
        return view('holiday.edit',compact('data'));
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
            'title' => 'required|string|min:3',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        $holiday = holiday::find($id);
        $data = $request->except('_method','_token','submit');
        if($holiday->update($data)){
            return redirect()->route('holiday.index')
                        ->with('success','Holiday updated successfully');
        }else{
            return redirect()->route('holiday.index')
                        ->with('error','Holiday failed to update');
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
        Holiday::destroy($id);
  
        return redirect()->route('holiday.index')
                        ->with('success','Holiday deleted successfully');
    }
}
