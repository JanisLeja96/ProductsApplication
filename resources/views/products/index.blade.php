<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>
</head>
<body>

<div style="margin-left: auto; margin-right: auto; width: 50%;">
    <table>
        <tr>
            <th>Product name</th>
            <th>Price</th>
            <th>Amount in stock</th>
        </tr>
        @foreach($products as $product)
            <tr>
                <td><a href="/products/{{ $product->id }}">{{ $product->name }}</a></td>
                <td>{{ $product->getFormattedPrice() }}</td>
                <td>{{ $product->count }}</td>
            </tr>
        @endforeach
    </table>
    <br>

    <a href="{{ route('products.create') }}">Add new product</a>
</div>

</body>
</html>
