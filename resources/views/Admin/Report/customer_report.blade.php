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
<h1>Customer Report</h1>
<h3>Printed by {{ $user->username }}</h3>
<table style="width:100%">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Username</th>
        <th scope="col">Email</th>
        <th scope="col">Created</th>
    </tr>
    @foreach ($list_customer as $customer)
        <tr>
            <th>{{ $customer->id }}</th>
            <td>{{ $customer->username }}</td>
            <td>{{ $customer->email }}</td>
            <td>{{ $customer->created }}</td>
        </tr>
    @endforeach
</table>
</body>
</html>
