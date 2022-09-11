@extends('layout')
 
@section('content')
 	<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Employee</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('employee.create') }}"> Create New Employee</a>
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
            <th>Name</th>
            <th>Department</th>
            <th>Position</th>
            <th>Email</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($data['employees'] as $index => $employee)
        <tr>
            <td>{{ ++$index }}</td>
            <td>{{ $employee->name }}</td>
            <td>{{ $data['departments'][$employee->department_id] }}</td>
            <td>{{ $data['positions'][$employee->position_id] }}</td>
            <td>{{ $employee->email }}</td>
            <td>
                <form action="{{ route('employee.destroy',$employee->id) }}" method="POST">
       
                    <a class="btn btn-primary" href="{{ route('employee.edit',$employee->id) }}">Edit</a>
   
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