<?php

namespace App\Http\Controllers;

use App\Leave;
use App\Employee;
use App\LeaveType;
use Illuminate\Http\Request;
use App\Exports\LeavesExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function leavereport(Request $request)
    {
        $data['nav'] = "report";
        $data['employees'] = Employee::get();
        $data['leavetypes'] = LeaveType::get();

        $employee_id  = $request->input('employee_id') ;
        $leave_type_id = $request->input('leave_type_id');
        $data['employee_id'] = 0;
        $data['leave_type_id'] = 0;

        if($employee_id && !$leave_type_id){
            $data['leaves'] = leave::where('employee_id', $employee_id)->get();
            $data['employee_id'] = $employee_id;
        }elseif (!$employee_id && $leave_type_id) {
            $data['leaves'] = leave::where('leave_type_id', $leave_type_id)->get();
            $data['leave_type_id'] = $leave_type_id;
        }elseif ($employee_id && $leave_type_id){
            $data['leaves'] = leave::where('employee_id', $employee_id)->where('leave_type_id', $leave_type_id)->get();
            $data['employee_id'] = $employee_id;
            $data['leave_type_id'] = $leave_type_id;
        }else{
            $data['leaves'] = leave::get();
        }
  
        return view('report.leave',compact('data'));
    }

    //export the excel format
    public function exportexcel(Request $request) 
    {
        $employee_id  = $request->input('export_employee_id') ;
        $leave_type_id = $request->input('export_leave_type_id');

        $exportdata = $this->getFilterData($employee_id, $leave_type_id);
        if(!$exportdata){
            return back()->with('error','No Data');
        }

        $export = new LeavesExport($exportdata);
        return Excel::download($export, 'leave_report.xlsx');
    }

    //export the pdf format
    public function exportpdf(Request $request) 
    {
        $employee_id = $request->input('export_employee_id') ;
        $leave_type_id = $request->input('export_leave_type_id');
        $data['exportdata'] = $this->getFilterData($employee_id, $leave_type_id);

        if(!$data['exportdata']){
            return back()->with('error','No Data');
        }

        $pdf = PDF::loadView('report.leavepdf', $data);
        return $pdf->download('leave_report.pdf');
    }

    //data formatting before export action
    private function getFilterData($employee_id, $leave_type_id)
    {
        if($employee_id && !$leave_type_id){
            $leaves = leave::where('employee_id', $employee_id)->get();
        }elseif (!$employee_id && $leave_type_id) {
            $leaves = leave::where('leave_type_id', $leave_type_id)->get();
        }elseif ($employee_id && $leave_type_id){
            $leaves = leave::where('employee_id', $employee_id)->where('leave_type_id', $leave_type_id)->get();
        }else{
            $leaves = leave::get();
        }

        $leavedata = array();
        foreach($leaves as $index => $leave){
            $leavedata[$index]['employee'] = $leave->employee['name'];
            $leavedata[$index]['leavetype'] = $leave->leavetype['name'];
            $leavedata[$index]['start_date'] = $leave->start_date;
            $leavedata[$index]['end_date'] = $leave->end_date;
            $leavedata[$index]['reason'] = $leave->reason;
        }
        return $leavedata;

    }
}
