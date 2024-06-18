javascript
Copiar código
document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("productForm");

    form.addEventListener("submit", function(event) {
        // Prevent form submission
        event.preventDefault();

        // Clear previous errors
        clearErrors();

        // Validate form fields
        let hasError = false;

        const productName = document.getElementById("product_name").value;
        const unitPrice = document.getElementById("unit_price").value;
        const quantity = document.getElementById("quantity").value;

        if (productName.trim() === "") {
            showError("product_name", "Por favor, ingrese el nombre del producto.");
            hasError = true;
        }

        if (unitPrice <= 0 || isNaN(unitPrice)) {
            showError("unit_price", "El precio por unidad debe ser un número positivo.");
            hasError = true;
        }

        if (quantity <= 0 || isNaN(quantity)) {
            showError("quantity", "La cantidad en inventario debe ser un número positivo.");
            hasError = true;
        }

        // If no error, submit the form
        if (!hasError) {
            form.submit();
        }
    });

    function clearErrors() {
        const errorElements = document.querySelectorAll(".text-red-500");
        errorElements.forEach(function(element) {
            element.classList.add("hidden");
        });
    }

    function showError(fieldId, message) {
        const errorElement = document.getElementById(fieldId + "_error");
        errorElement.textContent = message;
        errorElement.classList.remove("hidden");
    }
});