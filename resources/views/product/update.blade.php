<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .edit-product-form {
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


img {
  width: 100px;
  height: 100px;
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

    <form class="edit-product-form" action="{{ route('edit_product', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="product_name">Product Name</label>
        <input type="text" name="product_name" value="{{ $product->product_name }}" id="product_name">
        <label for="product_price">Product Price</label>
        <input type="text" name="product_price" value="{{ $product->product_price }}" id="product_price">
        {{-- 
        <label for="admin_id">Admin ID</label>
        <input type="text" name="admin_id" value="{{ $product->admin_id }}" id="admin_id">
        --}}
        <label for="category_id">Category ID</label>
        <input type="text" name="category_id" value="{{ $product->category_id }}" id="category_id">
        <label for="product_availability">Product Availability</label>
        <input type="text" name="product_availability" value="{{ $product->product_availability }}"
            id="product_availability">
        <img src="{{ $product->product_picture }}"><br>
        <label for="product_picture">Product Picture</label>
        <input type="file" name="product_picture" id="product_picture">
        <button type="submit">submit</button>
    </form>
    @foreach ($errors->all() as $error)
        <p style="color: white; background-color: red;">{{ $error }}</p>
    @endforeach
</body>


</html>
