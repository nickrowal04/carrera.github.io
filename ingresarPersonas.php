<?php 
include "config.php";
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>nombre</title>
 </head>
 <body>
	hola su nombre es: <?php echo $_POST["Nombres"]; ?><br>
<?php 
		$Numero_Pedido=$_POST["Numero_Pedido"];
		$Nombres =$_POST["Nombres"];
		$Apellidos =$_POST["Apellidos"];
		$Documento_Identidad= $_POST["Documento_Identidad"];
		$Num_Documento =$_POST["Num_Documento"];
		$Distancia=$_POST["Distancia"];
		$Talla_Camiseta=$_POST["Talla_Camiseta"];
		$Dorsal_Entregado=$_POST["Dorsal_Entregado"];
		$Kit_Entregado=$_POST["Kit_Entregado"];




			//nombres de los campos en las tabass;    echo '<script>alert("los datos ingresaron :)"); window.location=".php"</script>';

$sql = "INSERT INTO base_de_datos_clientes (Numero_Pedido, Nombres,Apellidos,Documento_Identidad,Num_Documento,Distancia,Talla_Camiseta,Dorsal_Entregado,Kit_Entregado) VALUES ('$Numero_Pedido','$Nombres','$Apellidos','$Documento_Identidad','$Num_Documento','$Distancia','$Talla_Camiseta','$Dorsal_Entregado','$Kit_Entregado');";


if (mysqli_multi_query($conn, $sql)) {
  echo "SE AÑADIERON NUEVOS DATOS A LA TABLA";
  echo '<script>alert("los datos ingresaron :)"); window.location="busquedaCorredor.php"</script>';
} 
else {
  echo "Error ALGO PASO: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
 ?>

 </body>
 </html>