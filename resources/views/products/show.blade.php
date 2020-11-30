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
    <h2>{{ $product->name }}</h2>
    <p>Price: {{ $product->getFormattedPrice() }}</p>
    <p>Choose delivery option:</p>
    <form method="post" action="{{ route('products.show', $product) }}">
        @foreach($deliveryOptions as $deliveryOption)
            <input type="radio" name="delivery" value="{{ $deliveryOption->name }}">
                <label>
                    {{ $deliveryOption->name }} ({{ $deliveryOption->getPrice($product->size)}})
                </label>
            </input>
        @endforeach
    </form>
</div>
</body>
</html>
