<?php 
	include "config.php";
	    $Dorsal_Entregado =$_POST["Dorsal_Entregado"];
		$Kit_Entregado =$_POST["Kit_Entregado"];
		$Num_Documento=$_POST["Num_Documento"];

$sql= "UPDATE base_de_datos_clientes set Kit_Entregado='$Kit_Entregado',Dorsal_Entregado='$Dorsal_Entregado' where Num_Documento='$Num_Documento'";
	

if (mysqli_multi_query($conn, $sql)) {
	echo '<script>alert("Cambio de datos exitoso "); window.location="busquedaCorredor.php"</script>';
  //echo "SE AÑADIERON NUEVOS DATOS A LA TABLA";

} 
else {
  echo "Error ALGO PASO: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
 ?>
