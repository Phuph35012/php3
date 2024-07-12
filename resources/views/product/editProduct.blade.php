<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
<div class="d-flex justify-content-center mt-5">
    
<form action="{{ route('product.updateProduct',$product->id)}}" method="post">
    <h1>sua san pham</h1>
        @csrf
        <div class="mb-3">
        <label for="">nhap ten</label>
        <input type="text" id="ten" name="nameProduct" value="{{$product->name}}"><br></div>
        <div class="mb-3">
        <label for="">nhap price</label>
        <input type="text" name="price" value="{{$product->price}}"><br></div>
        <div class="mb-3">
        <label for="">nhap danh muc</label>
        <select name="category" id="">
            @foreach ($category as $value )
                <option value="{{$value->id}}">{{$value->name_dm}}</option>
            @endforeach   
        </select><br></div>
        <button class="btn btn-success ">Sua</button>
    </form>
</div>
</body>
</html>