<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-color: #e0e1e4;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .category-table,
        .product-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        .category-table th,
        .category-table td,
        .product-table th,
        .product-table td {
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

        .product-table th {
            background-color: #1f2937;
            color: #ffffff;
        }

        .product-table td {
            background-color: #f9fafb;
        }

        .search-bar {
            width: 95%;
            padding: 8px;
            border: 1px solid #d1d5db;
            border-radius: 4px;
            margin-bottom: 10px;
        }

        .search-btn {
            padding: 8px 16px;
            background-color: #4682A9;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .search-btn:hover {
            background-color: #DAC0A3;
        }

        .btn {
            padding: 8px 16px;
            background-color: #4682A9;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #DAC0A3;
        }

        .product-image {
            max-width: 100%;
            max-height: 100px;
            object-fit: cover;
        }

        .message {
            color: red;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .ah:hover {
            color: #4682A9;
            transform: translate(0, 1px);

            transition: all 0.3s ease;
        }
    </style>
</head>

<body>
    <div class="container">
        <fieldset>
            <legend>Category</legend>
            <table class="category-table">
                <thead>
                    <tr>
                        <th>Category Id</th>
                        <th>Category Name</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->category_name }}</td>
                    </tr>
                </tbody>
            </table>
        </fieldset>

        <fieldset>
            <legend>Products</legend>
            <form action="{{ route('products.search', ['id' => $category->id]) }}" method="GET">
                <input type="text" name="query" id="search-bar" class="search-bar" placeholder="Search products..."
                    value="{{ request('product_name') }}">
                <button class="search-btn">Search</button>
            </form>

            @if ($products->count() > 0)
                <div>
                    <strong>Total Products:</strong> {{ $products->count() }}
                </div><br>
                <table class="product-table">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Product Availability</th>
                            <th>Product Picture</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr class="ah">
                                <td>{{ $product->product_name }}</td>
                                <td>{{ $product->product_price }}</td>
                                <td>{{ $product->product_availability }}</td>
                                <td>
                                    <img src="{{ $product->product_picture }}" alt="Product Image"
                                        class="product-image">
                                </td>
                                <td>
                                    <form action="{{ route('show_product', $product->id) }}">
                                        <button class="btn">Order</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="message">No products found.</p>
            @endif
        </fieldset>
    </div>
</body>

</html>
