<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce Landing Page</title>
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <!-- Header -->
    <header class="bg-white shadow">
        <div class="container mx-auto px-4 py-4">
            <h1 class="text-2xl font-bold">Ecommerce Landing Page</h1>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8">
        <h2 class="text-xl font-semibold mb-6">Products</h2>
        <div id="product-list" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <!-- Products will be dynamically added here -->
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white shadow mt-8">
        <div class="container mx-auto px-4 py-4">
            <p class="text-center text-gray-600">&copy; 2024 Ecommerce Site. All rights reserved.</p>
        </div>
    </footer>

    <script>
        const products = [
    {
        name: "Product 1",
        category: "Category 1",
        subcategory: "Subcategory A",
        photo: "pp1.png",
    },
    {
        name: "Product 2",
        category: "Category 1",
        subcategory: "Subcategory B",
        photo: "pp2.png",
    },
    {
        name: "Product 3",
        category: "Category 2",
        subcategory: "Subcategory A",
        photo: "pp3.jpg",
    },
    {
        name: "Product 4",
        category: "Category 2",
        subcategory: "Subcategory B",
        photo: "pp4.png",
    },
    // Add more products as needed
];

function loadProducts() {
    const productList = document.getElementById('product-list');
    productList.innerHTML = '';

    products.forEach(product => {
        const productCard = document.createElement('div');
        productCard.className = 'bg-white rounded-lg shadow p-4';

        const productImage = document.createElement('img');
        productImage.src = product.photo;
        productImage.alt = product.name;
        productImage.className = 'w-full h-32 object-cover rounded-lg mb-4';

        const productName = document.createElement('h3');
        productName.className = 'text-lg font-semibold mb-2';
        productName.textContent = product.name;

        const productCategory = document.createElement('p');
        productCategory.className = 'text-gray-600';
        productCategory.textContent = ${product.category} - ${product.subcategory};

        const buyButton = document.createElement('button');
        buyButton.className = 'mt-4 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600';
        buyButton.textContent = 'Buy Now';
        buyButton.addEventListener('click', () => {
            alert(Initiating purchase for ${product.name});
        });

        productCard.appendChild(productImage);
        productCard.appendChild(productName);
        productCard.appendChild(productCategory);
        productCard.appendChild(buyButton);

        productList.appendChild(productCard);
    });
}

document.addEventListener('DOMContentLoaded', loadProducts);

    </script>
</body>
</html>
