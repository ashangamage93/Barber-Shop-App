<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
<h1>Appointment Report</h1>
<h3>Printed by {{ $user->username }}</h3>
<table style="width:100%">
    <tr>
    <th scope="col">#</th>
    <th scope="col">Service</th>
    <th scope="col">User</th>
    <th scope="col">Customer</th>
    <th scope="col">Time Start</th>
    <th scope="col">Time End</th>
    </tr>
    @foreach ($list_appointment as $appointment)
        <tr>
            <th>{{ $appointment->id }}</th>
            <td>{{ $appointment->name }}</td>
            <td>{{ $appointment->user }}</td>
            <td>{{ $appointment->customer }}</td>
            <td class="inner-table">{{ $appointment->time_start }}</td>
            <td class="inner-table">{{ $appointment->time_end }}</td>
        </tr>
    @endforeach
</table>
</body>
</html>
