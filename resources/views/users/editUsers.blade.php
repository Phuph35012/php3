<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('users.updateUser',$user->id)}}" method="post">
        @csrf
        <label for="">nhap ten</label>
        <input type="text" id="ten" name="nameUser" value="{{$user->name}}"><br>
        <label for="">nhap email</label>
        <input type="text" name="emailUser" value="{{$user->email}}"><br>
        <label for="">nhap phong ban</label>
        <select name="phongbanUser" id="">
            @foreach ($phongBan as $value )
                <option value="{{$value->id}}">{{$value->ten_donvi}}</option>
            @endforeach   
        </select><br>
        <label for="">nhap tuoi</label>
        <input type="text" name="tuoiUser" value="{{$user->tuoi}}"><br>
        <button>them moi</button>
    </form>
</body>
</html>