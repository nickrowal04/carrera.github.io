<?php
// Incluir la conexión a la base de datos
include 'config.php';

// Variables para paginación
$resultados_por_pagina = 5;  // Número de resultados por página
$pagina_actual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;  // Página actual, por defecto es 1
$offset = ($pagina_actual - 1) * $resultados_por_pagina;  // Calcular el offset

// Variable para almacenar el término de búsqueda
$busqueda = '';

if (isset($_POST['buscar'])) {
    $busqueda = $_POST['termino'];
    header("Location: buscador.php?termino=" . urlencode($busqueda) . "&pagina=1");  // Redirige para mantener el término en la URL
}

if (isset($_GET['termino'])) {
    $busqueda = $_GET['termino'];

    // Obtener el total de resultados sin paginar
    $stmt_total = $conn->prepare("SELECT COUNT(*) as total FROM base_de_datos_clientes WHERE Numero_Pedido LIKE ? OR Num_Documento LIKE ?");
    $likeBusqueda = "%" . $busqueda . "%";
    $stmt_total->bind_param("ss", $likeBusqueda, $likeBusqueda);
    $stmt_total->execute();
    $resultado_total = $stmt_total->get_result()->fetch_assoc();
    $total_resultados = $resultado_total['total'];

    // Preparar la consulta con LIMIT para paginar resultados
    $stmt = $conn->prepare("SELECT Numero_Pedido, Nombres, Apellidos, Num_Documento, Talla_Camiseta, Distancia FROM base_de_datos_clientes WHERE Numero_Pedido  LIKE ? OR Num_Documento LIKE ? LIMIT ?, ?");
    $stmt->bind_param("ssii", $likeBusqueda, $likeBusqueda, $offset, $resultados_por_pagina);

    // Ejecutar consulta
    $stmt->execute();
    $resultado = $stmt->get_result();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>Buscador de Corredores</title>
</head>
<body>

        <div style="text-align: left; margin-bottom: 20px;">
        <a href="https://i.ibb.co/ZdnMtXB/logo.jpg" target="_blank"> <!-- Reemplaza con tu URL -->
            <img src="https://i.ibb.co/ZdnMtXB/logo.jpg" style="max-width: 30%; height: auto;">
        </a>
    </div>

    <h1>Buscador de Corredores</h1>

    <form action="buscador.php" method="post">
        <input type="text" name="termino" placeholder="Buscar..." value="<?php echo htmlspecialchars($busqueda); ?>">
        <button type="submit" name="buscar">Buscar</button>
    </form>

    <form action="ingresarPersonas.html" method="post">
        <button type="submit" name="ingress">ingress</button>
    </form>

    <h2>Resultados de la búsqueda:</h2>
    <ul>
        <?php
        if (isset($resultado) && $resultado->num_rows > 0) {
            // Mostrar los resultados
            while ($fila = $resultado->fetch_assoc()) {
                echo "<strong>Numero de Corredor:</strong> " . htmlspecialchars($fila['Numero_Pedido']) . "<br>";
                echo "<strong>Nombre:</strong> " . htmlspecialchars($fila['Nombres']) . "<br>";
                echo "<strong>Apellido:</strong> " . htmlspecialchars($fila['Apellidos']) . "<br>";
                echo "<strong>Numero de Documento:</strong> " . htmlspecialchars($fila['Num_Documento']) . "<br>";
                echo "<strong>Talla de Camiseta:</strong> " . htmlspecialchars($fila['Talla_Camiseta']) . "<br>";
                echo "<strong>Distancia:</strong> " . htmlspecialchars($fila['Distancia']) . "<br>";
            }

            
        } else {
            echo "<li>No se encontraron resultados</li>";
        }
        ?>


    <?php if (isset($total_resultados) && $total_resultados > 0): ?>
        <div>
            <p>Total de resultados: <?php echo $total_resultados; ?></p>

            <?php
            // Cálculo de páginas totales
            $total_paginas = ceil($total_resultados / $resultados_por_pagina);

            // Mostrar enlaces de paginación
            for ($i = 1; $i <= $total_paginas; $i++) {
                echo "<a href='buscador.php?termino=" . urlencode($busqueda) . "&pagina=" . $i . "'>" . $i . "</a> ";
            }
            ?>
        </div>
    <?php endif; ?>
</body>
</html>

<?php
// Cerrar la conexión
$conn->close();
?>
