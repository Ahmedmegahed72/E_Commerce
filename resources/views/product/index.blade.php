<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table tr {
            background-color: #eee;
            font-size: 14px;
            font-family: sans-serif;
            border: 1px solid black;
            margin: 10px;
            padding: 10px;
        }
    </style>
</head>

<body>
    <form action="{{ route('product.create') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="product_name" id="product_name" placeholder="Product Name">
        <input type="text" name="product_price" id="product_price" placeholder="Product Price">
        <input type="text" name="product_availability" id="product_availability" placeholder="Product Availability">

        <input type="text" name="category_id" id="category_id" placeholder="category id">
        {{--<input type="text" name="admin_id" id="admin_id" placeholder="admin id">--}}
        <input type="file" name="product_picture" id="product_picture">
        <button type="submit">Add New Record</button>
    </form>
    @foreach ($errors->all() as $error)
        <p style="color: red">{{ $error }}</p>
    @endforeach
    <table>
        <thead>
            <tr>
                <th>Product name</th>
                <th>Product price</th>
                <th>Product availability</th>
                <th>category name</th>
                <th>actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->product_name }}</td>
                    <td>{{ $product->product_price }}</td>
                    <td>{{ $product->product_availability }}</td>
                    <td>{{ $product->category->name}}</td>

                    <td>
                        <form action="{{ route('show_product', $product->id) }}">
                            <button type="submit">show</button>
                        </form>
                        
                        <form method="POST" action="{{ route('destroy_product', $product->id) }}">
                            @method('DELETE')
                            @csrf
                            <button type="submit">delete</button>
                        </form>
                        <form action="{{ route('update_product', $product->id) }}">
                            <button type="submit">update</button>
                        </form>
                        

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
