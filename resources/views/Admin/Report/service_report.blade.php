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
<h1>Service Report</h1>
<h3>Printed by {{ $user->username }}</h3>
<table style="width:100%">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Amount</th>
        <th scope="col">Status</th>
        <th scope="col">User</th>
        <th scope="col">Sub Category</th>
    </tr>
    @foreach ($list_service as $service)
        <tr>
            <th>{{ $service->id }}</th>
            <td>{{ $service->name }}</td>
            <td>{{ $service->amount }}</td>
            <td>{{ $service->status}}</td>
            <td>{{ $service->username }}</td>
            <td>{{ $service->sub_category }}</td>
        </tr>
    @endforeach
</table>
</body>
</html>
