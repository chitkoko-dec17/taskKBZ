<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- fullcalendar CSS -->
        <link href="{{asset('asset/fullcalendar/main.css')}}" rel="stylesheet">
        <!-- fullcalendar JS -->
        <script src="{{asset('asset/moment/moment.min.js')}}"></script>
        <script src="{{asset('asset/fullcalendar/main.js')}}"></script>

        <title>Task Project for KBZ</title>

        <style type="text/css">
            #calendar {
                max-width: 1100px;
                margin: 40px auto;
            }
            .holiday {
                background: red;
            }
        </style>
    </head>
    <body>

        <nav class="navbar navbar-light bg-faded">
            <ul class="nav navbar-nav">
                <li class="nav-item {{ ($data['nav'] == 'calendar') ? 'active' : '' }}">
                    <a class="nav-link" href="calendar">Dashboard</a>
                </li>
                <li class="nav-item {{ ($data['nav'] == 'employee') ? 'active' : '' }}">
                    <a class="nav-link" href="employee">Employees</a>
                </li>
                <li class="nav-item {{ ($data['nav'] == 'holiday') ? 'active' : '' }}">
                    <a class="nav-link" href="holiday">Holidays</a>
                </li>
                <li class="nav-item {{ ($data['nav'] == 'leave') ? 'active' : '' }}">
                    <a class="nav-link" href="leave">Leaves</a>
                </li>
                <li class="nav-item {{ ($data['nav'] == 'report') ? 'active' : '' }}">
                    <a class="nav-link" href="leavereport">Reports</a>
                </li>
            </ul>
        </nav>
        <br>
        <div class="container">
	       @yield('content')
        </div>
 	
        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="  crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

 	    @stack('scripts')
    </body>
</html>