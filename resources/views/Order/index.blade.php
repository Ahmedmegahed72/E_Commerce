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
            background-color: #f8f8f8;
        }

        .table th {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>

<body>
    <fieldset>
        <legend>
            Orders
        </legend>
        <table class="table">
            <thead>
                <tr>
                    <th> Order_Id</th>
                    <th>Order_Price</th>
                    <th>User_Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $category)
                    <tr>
                        <td>
                            {{ $category->id }}
                        </td>
                        <td>
                            {{ $category->price }}
                        </td>
                        <td>
                            {{ $category->User->name }}
                        </td>
                        <td>
                            {{ $category->Product->product_name }}
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </fieldset>


</body>

</html>
