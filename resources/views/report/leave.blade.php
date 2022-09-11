@extends('layout')
 
@section('content')
 	<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Leave Report</h2>
            </div>
            <br><br>
            <div class="pull-left">
                <div class="row">
                    <form action="{{ route('leave.report') }}" method="GET">
                        <div class="col col-lg-5">
                            <select name="employee_id" class="form-control" id="employee-id">
                                <option value="">Select Employee Name</option>
                                @foreach($data['employees'] as $employee)
                                    @if($data['employee_id'] == $employee->id)
                                        <option value="{!! $employee->id !!}" selected>{!! $employee->name !!}</option>
                                    @else
                                        <option value="{!! $employee->id !!}">{!! $employee->name !!}</option>
                                    @endif
                                    
                                @endforeach
                            </select>
                        </div>
                        <div class="col col-lg-5">
                            <select name="leave_type_id" class="form-control" id="leave-type-id">
                                <option value="">Select Leave Type</option>
                                @foreach($data['leavetypes'] as $leavetype)
                                    @if($data['leave_type_id'] == $leavetype->id)
                                        <option value="{!! $leavetype->id !!}" selected>{!! $leavetype->name !!}</option>
                                    @else
                                        <option value="{!! $leavetype->id !!}">{!! $leavetype->name !!}</option>
                                    @endif
                                    
                                @endforeach
                            </select>
                        </div>
                        <div class="col col-lg-1">
                            <button type="submit" class="btn btn-primary mb-3">Filter</button>
                        </div> 
                    </form>
                </div>               
            </div>
            <form id="frmexport" method="get">
                <input type="hidden" name="export_employee_id" id="export-employee-id" />
                <input type="hidden" name="export_leave_type_id" id="export-leave-type-id" />
            </form>
            <div class="col col-lg-1 pull-right">
                <a class="btn btn-success" href="javascript:void(0)" onclick="reportexport('excel')"> Excel</a>
            </div> 
            <div class="col col-lg-1 pull-right">
                <a class="btn btn-success" href="javascript:void(0)" onclick="reportexport('pdf')"> PDF</a>
            </div>
            <br>
            <br>
        </div>
    </div>
   
    @if ($message = Session::get('error'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th width="50px">No</th>
            <th>Employee</th>
            <th>Leave Type</th>
            <th>Date</th>
            <th>Reason</th>
        </tr>
        @foreach ($data['leaves'] as $index => $leave)
        <tr>
            <td>{{ ++$index }}</td>
            <td>{{ $leave->employee['name'] }}</td>
            <td>{{ $leave->leavetype['name'] }}</td>
            <td>{{ $leave->start_date ." To ". $leave->end_date }}</td>
            <td>{{ $leave->reason }}</td>
        </tr>
        @endforeach
    </table>
 
@endsection

@push('scripts')
    <script type="text/javascript">

        var exportexcelurl = '{{ route("leave.reportexcel") }}';
        var exportpdfurl = '{{ route("leave.reportpdf") }}';
        
        function reportexport(type){
            var action = '';
            var employee_id = $('#employee-id').val();
            var leave_type_id = $('#leave-type-id').val();
            $('#export-employee-id').val(employee_id);
            $('#export-leave-type-id').val(leave_type_id);
            if(type == 'excel'){
                action = exportexcelurl;
            }else if(type == 'pdf'){
                action = exportpdfurl;
            }
            $('#frmexport').attr('action', action);
            $('#frmexport').submit();
        }

        //hide alert message after 5 sec 
        setTimeout(function() {
           $('.alert').fadeOut('fast');
        }, 5000);
    </script>
@endpush