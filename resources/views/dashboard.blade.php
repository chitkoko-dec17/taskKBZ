@extends('layout')
 
@section('content')
 	<div id='calendar'></div>
 	<br/><br/>
 
@endsection

@push('scripts')
<script type="text/javascript" src="https://momentjs.com/downloads/moment.js"></script>
<script>

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
      },
      firstDay: 1,
      // initialDate: '2020-09-12',
      navLinks: false, // can click day/week names to navigate views
      businessHours: true, // display business hours
      editable: false,
      selectable: false,
      events: [

      	@foreach($data['leaves'] as $leave)
        {
          title: '{!! $leave->employee["name"] . " (". $leave->leavetype["leave_code"] .")"  !!}',
          start: '{!! $leave->start_date !!}',
          end: '{!! date("Y-m-d", strtotime( $leave->end_date . " +1 days")) !!}',
          backgroundColor: 'yellow',
          textColor: '#000'
        },
        @endforeach

        //current day show with ligh green color
        @if(date('Y-m-d'))        	
        	{
	          	start: '{!! date("Y-m-d"); !!}',
	          	display: 'background',
	          	color: '#54f085',
	        },
        @endif

        //holidays are show with ligh red color
        @foreach($data['holidays'] as $holiday)
	        {
	        	title: '{!! $holiday->title !!}',
	          	start: '{!! $holiday->start_date !!}',
	          	end: '{!! date("Y-m-d", strtotime( $holiday->end_date . " +1 days")) !!}',
	          	overlap: false,
	          	display: 'background',
	          	color: '#de2a1d',
	          	textColor: '#000'
	        },
        @endforeach
      ],
	    
    });

    calendar.render();
  });

</script>
    
@endpush