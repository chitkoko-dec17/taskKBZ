@extends('layout')
 
@section('content')
 	<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Leave</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('leave.create') }}"> Create New Leave</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

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
            <th width="280px">Action</th>
        </tr>
        @foreach ($data['leaves'] as $index => $leave)
        <tr>
            <td>{{ ++$index }}</td>
            <td>{{ $leave->employee['name'] }}</td>
            <td>{{ $leave->leavetype['name'] }}</td>
            <td>{{ $leave->start_date ." To ". $leave->end_date }}</td>
            <td>{{ $leave->reason }}</td>
            <td>
                <form action="{{ route('leave.destroy',$leave->id) }}" method="POST">
       
                    <a class="btn btn-primary" href="{{ route('leave.edit',$leave->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
 
@endsection

@push('scripts')
    <script type="text/javascript">

    	//hide alert message after 5 sec 
        setTimeout(function() {
           $('.alert').fadeOut('fast');
        }, 5000);

	</script>
@endpush