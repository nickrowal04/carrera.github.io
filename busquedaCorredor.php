<?php
include 'config.php';
?>

<!DOCTYPE html>
<html style="font-size: 16px;" lang="es"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="​Buscador de Corredores">
    <meta name="description" content="">
    <title>busquedaCorredor</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
<link rel="stylesheet" href="index.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 6.18.5, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    
    
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "",
		"logo": "images/logo.jpg"
}</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Casa">
    <meta property="og:type" content="website">
  <meta data-intl-tel-input-cdn-path="intlTelInput/"></head>
  <body data-home-page="Casa.html" data-home-page-title="Casa" data-path-to-root="./" data-include-products="false" class="u-body u-xl-mode" data-lang="es"><header class="u-clearfix u-header u-header" id="sec-5187"><div class="u-clearfix u-sheet u-sheet-1">
        <a href="#" class="u-image u-logo u-image-1" data-image-width="2250" data-image-height="1113">
          <img src="images/logo.jpg" class="u-logo-image u-logo-image-1">
        </a>
        <nav class="u-menu u-menu-one-level u-offcanvas u-menu-1">
          <div class="menu-collapse" style="font-size: 1rem; letter-spacing: 0px;">
            <a class="u-button-style u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="#">
              <svg class="u-svg-link" viewBox="0 0 24 24"><use xlink:href="#menu-hamburger"></use></svg>
              <svg class="u-svg-content" version="1.1" id="menu-hamburger" viewBox="0 0 16 16" x="0px" y="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg"><g><rect y="1" width="16" height="2"></rect><rect y="7" width="16" height="2"></rect><rect y="13" width="16" height="2"></rect>
</g></svg>
            </a>
          </div>
          <div class="u-custom-menu u-nav-container">
            <ul class="u-nav u-unstyled u-nav-1"><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="index.php" style="padding: 10px 20px;">Regresar</a>
</li></ul>
          </div>
          <div class="u-custom-menu u-nav-container-collapse">
            <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
              <div class="u-inner-container-layout u-sidenav-overflow">
                <div class="u-menu-close"></div>
                <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2"><li class="u-nav-item"><a class="u-button-style u-nav-link" href="Contacto.html">Contacto</a>
</li></ul>
              </div>
            </div>
            <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
          </div>
        </nav>
      </div></header>
      <center>
        <div class="container-form">
            <form   action="" method="get" autocomplete="off">
                Ingresa la cedula o el ID de la persona:<br>
                <br><input type="text"placeholder="&#128269; Cedula" name="busqueda" class="campo"required>  
                <input type="submit" name="enviar" value="Buscar" class="btn-enviar">
            </form>

</div></center>

<!--
    -primera prueba exitosa
    <form action="" method="get">
        <input type="text" name="busqueda"required> <br>
        <input type="submit" name="enviar" value="Buscar">
    </form>
-->
    <table border="1%" style="margin:auto; width: 1200px; border-collapse:separate;border-spacing:150px 15xp;" >
		<thead>
			
			<th><center>Numero_Pedido</center></th>
			<th><center>Nombre Completo</center></th>
			<th><center>Documento_Identidad</center></th>
			<th><center>Num_Documento</center></th>
			<th><center>Distancia</center></th>
			<th><center>Talla_Camiseta</center></th>
            <th><center>Dorsal_Entregado</center></th>
            <th><center>Kit_Entregado</center></th>
			<th><center> Modificar </center></th>
			</thead>
        <br>

<?php
include "config.php";

if(isset($_GET['enviar'])){
   $busqueda=$_GET['busqueda'];
   $consulta=$conn->query("SELECT*FROM base_de_datos_clientes WHERE Num_Documento LIKE '%$busqueda'");

   while ($row=$consulta->fetch_array()){
       echo "<tr>";
					echo "<td><center>"; echo $row['Numero_Pedido']; echo "</center></td>";
					echo "<td> <center>"; echo $row['Nombres']; echo "</center>";
					echo "<center>"; echo $row['Apellidos']; echo "</td></center>";
					echo "<td><center>"; echo $row['Documento_Identidad']; echo "</td></center>";
					echo "<td><center>"; echo $row['Num_Documento']; echo "</td></center>";
					echo "<td><center>"; echo $row['Distancia']; echo "</td></center>";
					echo "<td width=10%><center>"; echo $row['Talla_Camiseta']; echo "</td></center>";
                    echo "<td><center>"; echo $row['Dorsal_Entregado']; echo "</td></center>";
					echo "<td><center>"; echo $row['Kit_Entregado']; echo "</td></center>";
					//modificar
echo "<td ><center> <a href='modificar_1.php?Num_Documento=".$row['Num_Documento']."'> <button type='button' class='btn btn-success'>Modificar</button></a></td></center> ";
			
				echo "</tr>";
       
      
   }
}
?> 
</body>     
</html>