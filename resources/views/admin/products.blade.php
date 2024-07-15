<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Table</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .add-product-button {
            margin: 20px;
        }
        .add-product-button button {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 1rem;
            cursor: pointer;
            border-radius: 5px;
            text-decoration: none;
        }
        .add-product-button button a {
            color: white;
            text-decoration: none;
        }
        .add-product-button button:hover {
            background-color: #218838;
        }
        .table-container {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        img {
            max-width: 100px;
            height: auto;
        }
        .btn {
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            color: white;
            text-decoration: none;
            display: inline-block;
            cursor: pointer;
        }
        .btn-warning {
            background-color: #ffc107;
        }
        .btn-warning:hover {
            background-color: #e0a800;
        }
        .btn-danger {
            background-color: #dc3545;
        }
        .btn-danger:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>

<div class="add-product-button">
    <button><a href="{{ route('products.create') }}">Add Product</a></button>
    <button><a href="{{ url('/') }}">Home Page</a></button>
</div>

<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Categories</th>
                <th>Sub Categories</th>
                <th>Price</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $product->title }}</td>
                <td>{{ $product->category }}</td>
                <td>{{ $product->sub_category }}</td>
                <td>{{ $product->price }}</td>
                <td><img src="{{ asset('storage/images/' . $product->image) }}" alt="{{ $product->title }}"></td>
                <td>
                    <a class="btn btn-warning" href="{{ route('products.edit', ['id'=> $product->id]) }}">Edit</a>

                    <form action="{{ route('products.destroy', ['id'=> $product->id]) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>

                </td>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
