<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div>
    <form method="post" action="{{ route('products.update', $product) }}">
        @csrf
        @method('put')
        Product name: <input type="text" name="name" value="{{ $product->name }}"/><br>
        Choose size: <select name="size">
            <option value="S">S</option>
            <option value="M">M</option>
            <option value="L">L</option>
            <option value="XL">XL</option>
        </select><br>
        Price: <input value="{{ $product->price }}" type="number" name="price"/><br>
        Amount: <input value="{{ $product->count }}" type="number" name="count"/><br>
        <button type="submit">Update</button>
    </form>
</div>


</body>
</html>
