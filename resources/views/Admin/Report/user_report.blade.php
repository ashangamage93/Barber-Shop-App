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
<h1>User Report</h1>
<h3>Printed by {{ $user->username }}</h3>
<table style="width:100%">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Username</th>
        <th scope="col">Email</th>
    </tr>
    @foreach ($list_user as $user)
        <tr>
            <th>{{ $user->id }}</th>
            <td>{{ $user->username }}</td>
            <td>{{ $user->email }}</td>
        </tr>
    @endforeach
</table>
</body>
</html>
