<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 1rem;
        }

        .table th,
        .table td {
            border: 1px solid #ddd;
            padding: 0.75rem;
        }

        .table tr:nth-child(even) {
            background-color: #4682A9;
        }

        .table th {
            background-color: #111827;
            color: white;
        }

        .btn {
            display: block;
            margin: 0 auto;

            padding: 8px 16px;
            background-color: #4682A9;
            color: #fff;
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
    </style>
</head>

<body>
    <fieldset>
        <legend>
            My Orders
        </legend>
        <table class="table">
            <thead>
                <tr>
                    <th>Order_Id</th>
                    <th>Order_Price</th>
                    <th>User_Name</th>
                    <th>product_Name</th>
                    <th>product_Picture</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($orders as $order)
                    <tr>
                        <td>
                            {{ $order->id }}
                        </td>
                        <td>
                            {{ $order->price }}
                        </td>
                        <td>
                            {{ $order->User->name }}
                        </td>
                        <td>
                            {{$order->product->product_name }}
                        </td>
                        <td>
                            <img src="{{ $order->product->product_picture }}" alt="Product Image"
                            class="product-image">                      </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        <div class="p-6 text-gray-900 dark:text-gray-100">
            <form action="{{ route('category.index') }}" method="GET">
                <button class="btn">
                    New Order ?
                </button>
            </form>
        </div>
    </fieldset>


</body>

</html>
