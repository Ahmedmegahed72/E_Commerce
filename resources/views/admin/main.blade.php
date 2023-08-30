<!DOCTYPE html>
<!-- Coding by CodingNepal | www.codingnepalweb.com -->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Admin Dashboard </title>
    <!-- Boxicons CDN Link -->
    <style>
        /* Googlefont Poppins CDN Link */

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
            width: 60px;
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

        .bx-log-out {
            font-size: 15px;
            font-weight: 400;
            background: #0a2558;
            color: #fff;
            border: none;


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
    <div style="margin-bottom: 20px ">
        <br>
        <img class="img" src="\assets\img\4207.jpg">
    </div>

</body>

</html>
