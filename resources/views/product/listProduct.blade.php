<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="d-flex justify-content-center">
        
        <form action="{{route('product.searchProduct')}}">
        <input type="text" name="search" id="">
        <button class="btn btn-success">tim</button>
        <a class="btn btn-primary" href="{{route('product.addProduct')}}">them moi</a>
    </div>
    </form>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Category</th>
                <th scope="col">Price</th>
                <th scope="col">View</th>
                <th scope="col">Hanh dong</th>
            </tr>
        </thead>
        <tbody>
        @foreach($listProduct as $value)
            <tr>
                <td >{{$value->id}}</td>
                <td>{{$value->name}}</td>
                <td>{{$value->name_dm}}</td>
                <td>{{$value->price}}</td>
                <td>{{$value->view}}</td>
                <td>
                    <a class="btn btn-danger" href="{{ route('product.deleteProduct',$value->id)}}"   
                        onclick="return confirm('Are you sure you want to delete?');" >
                        XOA</a>
                    <a href="{{route('product.editProduct',$value->id)}}" class="btn btn-warning">SUA</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>