<?php
session_start();

// Inicializar array de productos en la sesión si no existe
if (!isset($_SESSION['productos'])) {
    $_SESSION['productos'] = [];
}

// Función para agregar producto
function agregarProducto(&$productos, $productName, $unitPrice, $quantity) {
    $productos[] = [
        'nombre' => $productName,
        'precio' => $unitPrice,
        'cantidad' => $quantity,
        'estado' => $quantity > 0 ? 'En stock' : 'Agotado'
    ];
}

// Validar y agregar producto si se recibe una solicitud POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productName = $_POST['product_name'];
    $unitPrice = $_POST['unit_price'];
    $quantity = $_POST['quantity'];

    // Validación del lado del servidor
    $errors = [];

    if (empty($productName)) {
        $errors['product_name'] = "Por favor, ingrese el nombre del producto.";
    }

    if (!is_numeric($unitPrice) || $unitPrice <= 0) {
        $errors['unit_price'] = "El precio por unidad debe ser un número positivo.";
    }

    if (!is_numeric($quantity) || $quantity <= 0) {
        $errors['quantity'] = "La cantidad en inventario debe ser un número positivo.";
    }

    if (empty($errors)) {
        agregarProducto($_SESSION['productos'], $productName, $unitPrice, $quantity);
    } else {
        echo "<p>Hubo un error con los datos ingresados. Por favor, vuelva a intentarlo.</p>";
        foreach ($errors as $field => $error) {
            echo "<p>" . htmlspecialchars($error) . "</p>";
        }
    }
}

// Mostrar productos en una tabla
$productos = $_SESSION['productos'];
if (!empty($productos)) {
    echo "<table class='min-w-full bg-white'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th class='py-2'>Nombre del Producto</th>";
    echo "<th class='py-2'>Precio por Unidad</th>";
    echo "<th class='py-2'>Cantidad en Inventario</th>";
    echo "<th class='py-2'>Estado</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    foreach ($productos as $producto) {
        echo "<tr>";
        echo "<td class='border px-4 py-2'>" . htmlspecialchars($producto['nombre']) . "</td>";
        echo "<td class='border px-4 py-2'>$" . htmlspecialchars($producto['precio']) . "</td>";
        echo "<td class='border px-4 py-2'>" . htmlspecialchars($producto['cantidad']) . "</td>";
        echo "<td class='border px-4 py-2'>" . htmlspecialchars($producto['estado']) . "</td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
}
?>