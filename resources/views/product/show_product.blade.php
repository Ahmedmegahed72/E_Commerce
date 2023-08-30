<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            background-color: #e6e7e9;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .category-table {
            width: 85%;
            border-collapse: collapse;
            margin-bottom: 30px;
            margin-left: 100px;
        }

        .category-table th,
        .category-table td {
            padding: 12px 16px;
            text-align: left;
            border-bottom: 1px solid #d1d5db;
        }

        .category-table th {
            background-color: #1f2937;
            color: #ffffff;
        }

        .category-table td {
            background-color: #ffffff;
        }

        img {
            width: 100px;
            height: 100px;
        }

        .product_image {
            width: 100px;
            height: 100px;
        }

        .table-container {
            margin-top: 20px;
            border: 1px solid white;
            padding: 10px;
        }

        .order_quantity {
            padding: 8px;
            border-radius: 4px;
            border: 1px solid #4682A9;
            margin-right: 10px;
            width: 400px;
        }

        .order_btn {
            padding: 8px 16px;
            background-color: #4682A9;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;

            transition: background-color 0.3s ease;
        }

        .order_btn:hover {
            background-color: #DAC0A3;
        }

        form {
            display: inline;
        }
    </style>
</head>

<body>

    <div class="table-container">
        <table class="category-table">
            <thead>
                <tr>
                    <th>Product name</th>
                    <th>Product price</th>
                    <th>Product availability</th>
                    <th>Category Name</th>
                    <th class="product_image">Product image</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $products->product_name }}</td>
                    <td>{{ $products->product_price }}</td>
                    <td>{{ $products->product_availability }}</td>
                    <td>{{ $products->category->category_name }}</td>
                    <td>
                        <img src="{{ $products->product_picture }}" style="width: 100%; height: auto;">
                    </td>
                </tr>
                <tr>
                    <td colspan="5">
                        <form action="{{ route('order.create', $products->id) }}" method="POST">
                            <input type="text" name="quantity" class="order_quantity" placeholder="Enter Quantity">
                            <input type="hidden" name="product_price" value="{{ $products->product_price }}">
                            <input type="hidden" name="product_id" value="{{ $products->id }}">
                            @csrf
                            <button type="submit" class="order_btn">Order</button>
                        </form>
                        <form action="{{ route('order.index') }}" method="GET">
                            <button type="submit" class="order_btn">View Cart</button>
                        </form>


                    </td>
                </tr>
            </tbody>
        </table>

        @foreach ($errors->all() as $error)
            <p style="color: red">{{ $error }}</p>
        @endforeach

    </div>

</body>

</html>
