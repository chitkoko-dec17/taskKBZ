@extends('layout')
 
@section('content')
 
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Add New Employee</h2>
	        </div>
	        <div class="pull-right">
	            <a class="btn btn-primary" href="{{ route('employee.index') }}"> Back</a>
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
	   
	<form action="{{ route('employee.store') }}" method="POST">
	    @csrf
	  
	     <div class="row">
	        <div class="col-xs-12 col-sm-12 col-md-12">
	            <div class="form-group">
	                <strong>Name:</strong>
	                <input type="text" name="name" class="form-control" placeholder="Name">
	            </div>
	        </div>
	        <div class="col-xs-12 col-sm-12 col-md-12">
	            <div class="form-group">
	                <strong>Department:</strong>
	                <select name="department_id" class="form-control">
	                	@foreach($data['departments'] as $ind => $department)
	                		<option value="{!! $ind !!}">{!! $department !!}</option>
	                	@endforeach
	                </select>
	            </div>
	        </div>
	        <div class="col-xs-12 col-sm-12 col-md-12">
	            <div class="form-group">
	                <strong>Position:</strong>
	                <select name="position_id" class="form-control">
	                	@foreach($data['positions'] as $ind => $position)
	                		<option value="{!! $ind !!}">{!! $position !!}</option>
	                	@endforeach
	                </select>
	            </div>
	        </div>
	        <div class="col-xs-12 col-sm-12 col-md-12">
	            <div class="form-group">
	                <strong>Email:</strong>
	                <input type="email" name="email" class="form-control" placeholder="Email">
	            </div>
	        </div>
	        <div class="col-xs-12 col-sm-12 col-md-12">
	            <div class="form-group">
	                <strong>Address:</strong>
	                <textarea class="form-control" style="height:150px" name="address" placeholder="Address"></textarea>
	            </div>
	        </div>
	        <div class="col-xs-12 col-sm-12 col-md-12">
	            <button type="submit" class="btn btn-primary">Save</button>
	        </div>
	    </div>
	   
	</form>
 
@endsection