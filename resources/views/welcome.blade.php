<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic E-commerce Site</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        header {
            background-color: #333;
            color: white;
            width: 100%;
            padding: 1rem 0;
            text-align: center;
            position: relative;
        }

        h1 {
            margin: 0;
        }

        .nav-links {
            position: absolute;
            top: 50%;
            right: 1rem;
            transform: translateY(-50%);
            display: flex;
            gap: 1rem;
        }

        .product-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 2rem;
        }

        .product {
            border: 1px solid #ddd;
            border-radius: 5px;
            margin: 1rem;
            padding: 1rem;
            width: 200px;
            text-align: center;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .product img {
            max-width: 100%;
            height: auto;
            border-bottom: 1px solid #ddd;
            padding-bottom: 1rem;
            margin-bottom: 1rem;
        }

        .product h2 {
            font-size: 1.5rem;
            margin: 0.5rem 0;
        }

        .product p {
            margin: 0.5rem 0;
            color: #555;
        }

        button {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            font-size: 1rem;
            cursor: pointer;
            border-radius: 5px;
            text-decoration: none;
        }

        button:hover {
            background-color: #218838;
        }

        .add-product-button {
            margin: 2rem;
        }

        .nav-links a, .nav-links form button {
            color: white;
            text-decoration: none;
            padding: 0.5rem 1rem;
            border: 1px solid transparent;
            border-radius: 5px;
        }

        .nav-links a:hover, .nav-links form button:hover {
            background-color: #555;
        }

        .nav-links form button {
            background: none;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <header>
        <h1>Welcome to Our Store</h1>
        <div class="nav-links">
            @if (Route::has('login'))
                @auth
                    @can('view-dashboard')
                        <a href="{{ route('allProducts') }}">Dashboard</a>
                    @endcan
                    @can('view-myorder')

                    <a href="{{ url('/my-orders') }}">My Orders</a>
                    @endcan
                    <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                        @csrf
                        <button type="submit">Log out</button>
                    </form>
                @else
                    <a href="{{ route('login') }}">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            @endif
        </div>
    </header>

    <div class="add-product-button">
        <button><a href="{{ route('products.create') }}" style="color: white; text-decoration: none;">Add Product</a></button>

    </div>

    <section class="product-list">
        @foreach ($products as $product)
        <div class="product">
            <img src="{{ asset('storage/images/' . $product->image) }}" alt="{{ $product->title }}">
            <h2>{{ $product->title }}</h2>
            <p>Category: {{ $product->category }}</p>
            <p>Subcategory: {{ $product->sub_category }}</p>
            <p>Price: ${{ $product->price }}</p>
            <button>Buy Now</button>
        </div>
        @endforeach
    </section>
</body>
</html>
