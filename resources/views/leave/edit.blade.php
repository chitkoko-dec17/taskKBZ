@extends('layout')
 
@section('content')
 
	<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Leave</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('leave.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('leave.update',$data['leave']->id) }}" method="POST">
        @csrf
        @method('PATCH')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
	            <div class="form-group">
	                <strong>Employee:</strong>
	                <select name="employee_id" class="form-control">
	                	@foreach($data['employees'] as $employee)
	                		@if($data['leave']->employee_id == $employee->id)
	                			<option value="{!! $employee->id !!}" selected>{!! $employee->name !!}</option>
	                		@else
	                			<option value="{!! $employee->id !!}">{!! $employee->name !!}</option>
	                		@endif	                		
	                	@endforeach
	                </select>
	            </div>
	        </div>
	        <div class="col-xs-12 col-sm-12 col-md-12">
	            <div class="form-group">
	                <strong>Leave Type:</strong>
	                <select name="leave_type_id" class="form-control">
	                	@foreach($data['leavetypes'] as $leavetype)
	                		@if($data['leave']->leave_type_id == $leavetype->id)
	                			<option value="{!! $leavetype->id !!}" selected>{!! $leavetype->name !!}</option>
	                		@else
	                			<option value="{!! $leavetype->id !!}">{!! $leavetype->name !!}</option>
	                		@endif
	                	@endforeach
	                </select>
	            </div>
	        </div>
	        <div class="col-xs-12 col-sm-12 col-md-12">
	        	<div class="form-group">
	        		<strong>Start Date:</strong>
	        		<input type="text" class="form-control" name="start_date" id="start_date" value="{!! $data['leave']->start_date !!}">		        	
				</div>
	        </div>
	        <div class="col-xs-12 col-sm-12 col-md-12">
	        	<div class="form-group">
	        		<strong>End Date:</strong>
	        		<input type="text" class="form-control" name="end_date" id="end_date" value="{!! $data['leave']->start_date !!}">		        	
				</div>
	        </div>
	        <div class="col-xs-12 col-sm-12 col-md-12">
	            <div class="form-group">
	                <strong>Reason:</strong>
	                <textarea class="form-control" style="height:100px" name="reason" placeholder="Address">{!! $data['leave']->reason !!}</textarea>
	            </div>
	        </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
   
    </form>
 
@endsection
@push('scripts')
    <script type="text/javascript">
		$('#start_date').datepicker({
		    format: "yyyy-mm-dd"
		});
		$('#end_date').datepicker({
		    format: "yyyy-mm-dd"
		});
	</script>
@endpush