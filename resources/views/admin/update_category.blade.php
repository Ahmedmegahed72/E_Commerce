<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .edit-category-form {
            width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            display: flex;
            flex-direction: column;
        }

        label {
            font-size: 16px;
            font-weight: bold;
            color: #4682A9;
        }

        input {
            width: 95%;
            padding: 10px;
            border: 1px solid #ccc;
        }




        button {
            width: 100px;
            height: 30px;
            border: none;
            border-radius: 5px;
            background-color: #4682A9;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }

        .edit-product-form p {
            color: #4682A9;
        }
    </style>
</head>

<body>

    <form class="edit-category-form" action="{{ route('edit_category', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="category_name">Category Name</label>
        <input type="text" name="category_name" value="{{ $category->category_name }}" id="product_name">
        <button type="submit">submit</button>
    </form>
    @foreach ($errors->all() as $error)
        <p style="color: white; background-color: red;">{{ $error }}</p>
    @endforeach
</body>


</html>
