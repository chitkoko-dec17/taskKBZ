@extends('layout')
 
@section('content')
 
	<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Holiday</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('holiday.index') }}"> Back</a>
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
  
    <form action="{{ route('holiday.update',$data['holiday']->id) }}" method="POST">
        @csrf
        @method('PATCH')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="title" value="{{ $data['holiday']->title }}" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
	        	<div class="form-group">
	        		<strong>Start Date:</strong>
	        		<input type="text" class="form-control" name="start_date" id="start_date" value="{{ $data['holiday']->start_date }}">		        	
				</div>
	        </div>
	        <div class="col-xs-12 col-sm-12 col-md-12">
	        	<div class="form-group">
	        		<strong>End Date:</strong>
	        		<input type="text" class="form-control" name="end_date" id="end_date" value="{{ $data['holiday']->end_date }}">		        	
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