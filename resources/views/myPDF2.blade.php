<!DOCTYPE html>
<html>
<head>
	<title>UsersData</title>
</head>
    <body>
        <div>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>FirstName</th>
                    <th>LastName</th>
                    <th>Email</th>
                    <th>Number</th>
                    <th>Address</th>
                    <th>Birthday</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <th>{{ $user->id}}</th>
                        <td>{{ $user->firstname}}</td>
                        <td>{{ $user->lastname}}</td>
                        <td>{{ $user->email}}</td>
                        <td>{{ $user->number}}</td>
                        <td>{{ $user->address}}</td>
                        <td>{{ $user->birthday}}</td>
                    </tr>    
                @endforeach
            </tbody>
        </table> 

        </div>
    </body>
</html>