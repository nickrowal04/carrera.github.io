<?php
include 'config.php';
?>

<!DOCTYPE html>
<html style="font-size: 16px;" lang="es"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="​Buscador de Corredores">
    <meta name="description" content="">
    <title>Modificar</title>
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
</li></ul>
          </div>
          <div class="u-custom-menu u-nav-container-collapse">
            <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
              <div class="u-inner-container-layout u-sidenav-overflow">
                <div class="u-menu-close"></div>
</li></ul>
              </div>
            </div>
            <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
          </div>
        </nav>
      </div></header>
<?php 
 include "config.php";
 	$consulta=consultaPersona($_GET['Num_Documento']);

 	function consultaPersona($cedula_persona)
 	{
 		include "config.php";
 		$s ="SELECT * FROM base_de_datos_clientes WHERE Num_Documento='".$cedula_persona."' ";
		$result= mysqli_query($conn,$s) ; 
 		$filas=mysqli_fetch_assoc($result);
 		return[
 			$filas['Numero_Pedido'],
 			$filas['Nombres'],
 			$filas['Apellidos'],
 			$filas['Documento_Identidad'],
 			$filas['Num_Documento'],
 			$filas['Distancia'],
 			$filas['Talla_Camiseta'],
 			$filas['Dorsal_Entregado'],
			 $filas['Kit_Entregado']
 		];
 	}
 ?>

	<div class="todo">
		<!--<img src="imagenes/swirl.png" width="1188" id="img1">-->
	</div>
	<article class="panel is-info">
        <p class="panel-heading">
      </p>
        
    </article>
	<div id="contenido">
		<div style="margin: auto; width: 800px; border-collapse: separate;border-spacing: 20px 5px;">
		<center><span><h3>	Modificar usuarios  </h3></span></center>
			<br>
		
	<form action="modificarvalidacion.php" method="POST" style="border-collapse: separate; border-spacing: 10px 5px;">
		<input type="hidden" name="Num_Documento" value="<?php echo $_GET['Num_Documento']  ?>">
<!-- HIDDEN hidden -->
		<!--mostar por pantalla los datos por el web -->
		<table border="0" style="margin:auto; width: 450px; border-collapse:separate;border-spacing:100px 150xp;">
			<thead>
<tr>
	<td>		
	<center><label>Numero_Pedido: </label></center> 
			<th><label ><?php echo $consulta[0] ?></label></th>
	</td>
</tr>
<!------------------------------------------------------------------------------------------->
<tr>
	<td>
	<center><label>Nombre completo: </label></center> 
  			<th>
			  <label ><?php echo $consulta[1];echo" "; echo$consulta[2] ?></label>
  				<br>
  			</th>
	</td>
</tr>
<!------------------------------------------------------------------------------------------->
<tr>
	<td>
	<center><label>Documento_Identidad: </label></center> 
  			<th>
			  <label ><?php echo $consulta[3] ?></label>  				<br>
  			</th>

	</td>
</tr>
<!------------------------------------------------------------------------------------------->
<tr>
	<td>
	<center><label>Num_Documento:</label></center> 
  			<th>
			  <label ><?php echo $consulta[4] ?></label>  	  				<br>
  			</th>	
	</td>
</tr>
<!------------------------------------------------------------------------------------------->
<tr>
	<td>
	<center><label>Distancia:</label></center> 
  			<th>
			  <label ><?php echo $consulta[5]; ?></label>  
  				<br>
  			</th>	
  	</td>	
</tr>
<!------------------------------------------------------------------------------------------->
 <tr>	
  	<td>			
	  <center><label>Talla_Camiseta:</label></center> 
			<th>
			<label ><?php echo $consulta[6] ?></label>  
			<br>
  			</th>
	</td>
</tr> 
<!------------------------------------------------------------------------------------------->
<tr>
	<td>
	<center><label>Dorsal_Entregado:</label></center> 
  			<th>
			  <input type="number" name="Dorsal_Entregado" value="<?php echo $consulta[7] ?>"pattern="[A-Za-z0-9_-]{1,15}"required>				<br>
  			</th>	
	</td>
</tr>	
<!------------------------------------------------------------------------------------------->
<tr>	
	<td>
	<center><label>Kit_Entregado:</label></center> 
  			<th>
			<select id="Kit_Entregado" name="Kit_Entregado">
			    <option value="<?php echo $consulta[8] ?>"><?php echo $consulta[8] ?> </option>
    			<option value="Kit recibido titular">kit recibido titular  </option>
    			<option value="Kit recibido tercero">kit recibido tercero</option>
				</select>	
			<br>
  			</th>
	</td>
</tr>
<!------------------------------------------------------------------------------------------->
<br>
<tr>
	<td>
		<th>
  		</th>
	</td>
</tr>

<tr>
	<td>
	<center><button type="submit" class="btn btn-success">Guardar</button><center>
		<th>
		<a href="busquedaCorredor.php"><button type="button" class="btn btn-info">Regresar</button></a>
  		</th>
	</td>
</tr>

	
</form>
  		</thead>		
		</table>
 				
		</div>
	</div>	

</body>