<?php
// Incluir la conexión a la base de datos
include 'config.php';

// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST['Dorsal_Entregado'];
    $descripcion = $_POST['Kit_Entregado'];
    

    // Preparar la consulta SQL de inserción
    $stmt = $conn->prepare("INSERT INTO base_de_datos_clientes (Dorsal_Entregado, Kit_Entregado) VALUES (?, ?)");
    $stmt->bind_param("ss", $nombre, $descripcion,); // "ssdi" indica tipos: s = string, d = double, i = int

    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo "Producto agregado exitosamente.";
    } else {
        echo "Error al agregar el producto: " . $conn->error;
    }

    // Cerrar la conexión
    $stmt->close();
    $conn->close();
}
?>
