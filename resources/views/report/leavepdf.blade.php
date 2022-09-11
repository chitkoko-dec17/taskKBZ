<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
        <title>Leave Report</title>
    </head>

    <body>
        <div class="row">
            <div class="col-lg-12 margin-tb">
                    <h2>Leave Report</h2>
            </div>

            <table class="table table-bordered">
                <tr>
                    <th width="50px">No</th>
                    <th>Employee</th>
                    <th>Leave Type</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Reason</th>
                </tr>

                @foreach ($exportdata as $index => $leave)
                <tr>
                    <td>{{ ++$index }}</td>
                    <td>{{ $leave['employee'] }}</td>
                    <td>{{ $leave['leavetype'] }}</td>
                    <td>{{ $leave['start_date'] }}</td>
                    <td>{{ $leave['end_date'] }}</td>
                    <td>{{ $leave['reason'] }}</td>
                </tr>
                @endforeach
            </table>
        </div>
 
    </body>

</html>