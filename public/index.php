html
Copiar código
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minimarket</title>
    <link href="./css/tailwind.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <!-- Header -->
    <header class="bg-blue-600 text-white p-4 text-center">
        <h1 class="text-2xl font-bold">Minimarket</h1>
    </header>

    <!-- Product Form -->
    <div class="max-w-md mx-auto mt-10 bg-white p-8 rounded shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Agregar Producto</h2>
        <form id="productForm" action="process.php" method="post">
            <div class="mb-4">
                <label for="product_name" class="block text-gray-700 text-sm font-bold mb-2">Nombre del Producto</label>
                <input type="text" id="product_name" name="product_name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                <p id="product_name_error" class="text-red-500 text-xs mt-1 hidden">Por favor, ingrese el nombre del producto.</p>
            </div>
            <div class="mb-4">
                <label for="unit_price" class="block text-gray-700 text-sm font-bold mb-2">Precio por Unidad</label>
                <input type="number" id="unit_price" name="unit_price" step="0.01" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                <p id="unit_price_error" class="text-red-500 text-xs mt-1 hidden">El precio por unidad debe ser un número positivo.</p>
            </div>
            <div class="mb-4">
                <label for="quantity" class="block text-gray-700 text-sm font-bold mb-2">Cantidad en Inventario</label>
                <input type="number" id="quantity" name="quantity" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                <p id="quantity_error" class="text-red-500 text-xs mt-1 hidden">La cantidad en inventario debe ser un número positivo.</p>
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Agregar Producto
                </button>
            </div>
        </form>
    </div>

    <!-- Product Table -->
    <div class="max-w-4xl mx-auto mt-10 bg-white p-8 rounded shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Lista de Productos</h2>
        <?php include 'process.php'; ?>
    </div>

    <!-- Footer -->
    <footer class="bg-blue-600 text-white p-4 text-center mt-10">
        <p>&copy; 2024 Todos los derechos reservados.</p>
    </footer>
    
    <script src="./js/main.js"></script>
</body>
</html>