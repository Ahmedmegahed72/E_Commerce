<!DOCTYPE html>
<!-- Coding by CodingNepal | www.codingnepalweb.com -->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Admin Dashboard </title>
    <!-- Boxicons CDN Link -->
    <style>
        /* Googlefont Poppins CDN Link */
        .btns {
            display: flex;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        .sidebar {
            position: fixed;
            height: 100%;
            width: 240px;
            background: #0A2558;
            transition: all 0.5s ease;
        }

        .sidebar.active {
            width: 600px;
        }

        .home-section {
            position: relative;
            width: calc(100% - 240px);
            right: -300px;
        }


        .sidebar .logo-details {
            height: 80px;
            display: flex;
            align-items: center;
        }

        .sidebar .logo-details i {
            font-size: 28px;
            font-weight: 500;
            color: #fff;
            min-width: 60px;
            text-align: center
        }

        .sidebar .logo-details .logo_name {
            color: #fff;
            font-size: 24px;
            font-weight: 500;
        }

        .sidebar .nav-links {
            margin-top: 10px;
        }

        .sidebar .nav-links li {
            position: relative;
            list-style: none;
            height: 50px;
        }

        .sidebar .nav-links li a {
            height: 100%;
            width: 100%;
            display: flex;
            align-items: center;
            text-decoration: none;
            transition: all 0.4s ease;
        }

        .sidebar .nav-links li a.active {
            background: #081D45;
        }

        .sidebar .nav-links li a:hover {
            background: #081D45;
        }

        .sidebar .nav-links li i {
            min-width: 60px;
            text-align: center;
            font-size: 18px;
            color: #fff;
        }

        .sidebar .nav-links li a .links_name {
            color: #fff;
            font-size: 15px;
            font-weight: 400;
            white-space: nowrap;
        }

        .sidebar .nav-links .log_out {
            position: absolute;
            bottom: 0;
            width: 100%;
        }

        img {
            position: absolute;
            width: 500px;
            height: 500px;
            background-color: #FFFFFF;
            border-radius: 3%;
            right: 350px;
        }

        .btn1 {

            padding: 8px 16px;
            margin: 5px;
            background-color: green;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;

        }

        .btn2 {

            padding: 8px 16px;
            margin: 5px;

            background-color: red;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;

        }

        .btn3 {
            padding: 8px 16px;
            margin: 5px;

            background-color: blue;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;


        }


        .btn1:hover,
        .btn2:hover,
        .btn3:hover {
            background-color: #DAC0A3;
        }

        input {
            width: 200px;
            height: 30px;
            border: 1px solid gray;
            padding: 5px;
        }

        .add_btn {
            padding: 8px 16px;
            margin: 5px;

            background-color: #4682A9;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        table th,
        table td {
            padding: 10px;
            margin: 5px;
            font-family: Arial, sans-serif;
            text-align: center;
        }

        table th {
            background-color: #4682A9;
            color: white;
            font-weight: bold;
        }

        .bx-log-out {
            background-color: green;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.4s ease;
            left: 30px;
        }

        .bx-log-out:hover {
            background-color: #e1332d;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <div class="logo-details">
            <i class='bx bxl-c-plus-plus'></i>
            <span class="logo_name">Dashboard</span>
        </div>
        <ul class="nav-links">
            <li>
                <a class="active">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Admin</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.user.index') }}">
                    <i class='bx bx-box'></i>
                    <span class="links_name">Users</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.order.index') }}">
                    <i class='bx bx-list-ul'></i>
                    <span class="links_name">Orders</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.category.index') }}">
                    <i class='bx bx-pie-chart-alt-2'></i>
                    <span class="links_name">Categories

                    </span>
                </a>
            </li>
            <form action="">
                <li>
                    <a href="{{ route('admin.product.index') }}">
                        <i class='bx bx-coin-stack'></i>
                        <span class="links_name">products</span>
                    </a>
                </li>
            </form>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <li class="log_out" style="text-align: center;">
                    <button class='bx bx-log-out'>
                        <span class="links_name">Log out</span>
                    </button>
                    </i>
            </form>
        </ul>
    </div>
    <div>
        <section class="home-section">
            <nav>
                <form style="padding-top: 10px;" action="{{ route('admin.product.create') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="product_name" id="product_name" placeholder="Product Name">
                    <input type="text" name="product_price" id="product_price" placeholder="Product Price">
                    <input type="text" name="product_availability" id="product_availability"
                        placeholder="Product Availability">

                    <input type="text" name="category_id" id="category_id" placeholder="category id">
                    <input type="file" name="product_picture" id="product_picture">
                    <button type="submit" class="add_btn">Add New Record</button>
                </form>
                @foreach ($errors->all() as $error)
                    <p
                        style="color: red;
                    font-weight: bold;
                    background-color: #f4f4f4;
                    padding: 10px; ">
                        {{ $error }}</p>
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
                                <td>{{ $product->category->category_name }}</td>
                                <td class="btns">
                                    <form action="{{ route('admin.show_product', $product->id) }}">
                                        <button class="btn1" style="color: #FFFFFF" type="submit">show</button>
                                    </form>

                                    <form method="POST" action="{{ route('destroy_product', $product->id) }}">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn2" style="color: #FFFFFF" type="submit">delete</button>
                                    </form>
                                    <form action="{{ route('update_product', $product->id) }}">
                                        <button class="btn3"style="color: #FFFFFF" type="submit">update</button>
                                    </form>


                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
    </div>
    </nav>
    </section>
</body>

</html>
