<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="{{route('users.addUsers')}}">Them moi</a>
        
    
    <h3>Danh sach users</h3>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phong ban</th>
                <th>Hanh dong</th>
            </tr>
        </thead>
        <tbody>
            @foreach($listUsers as $value)
            <tr>
                <td>{{$value->id}}</td>
                <td>{{$value->name}}</td>
                <td>{{$value->email}}</td>
                <td>{{$value->ten_donvi}}</td>
                <td>
                    <a href="{{ route('users.deleteUser',$value->id)}}"   
                    onclick="return confirm('Are you sure you want to delete?');" >
                    XOA</a>
                    <a href="{{route('users.editUser',$value->id)}}">SUA</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>