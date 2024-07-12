<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
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
                    <a class="btn btn-danger" href="{{ route('users.deleteUser',$value->id)}}"   
                    onclick="return confirm('Are you sure you want to delete?');" >
                    XOA</a>
                    <a href="{{route('users.editUser',$value->id)}}" class="btn btn-warning">SUA</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>