<?php require_once('../Connections/con_admin.php'); ?>
<?php
extract($_REQUEST);
session_start();
if (isset($_SESSION["id"]))
{
	$id=$_SESSION["id"];
}
else
{
	echo"<script language='javascript'>window.location='index.php'</script>";
} 
?>
<?php
mysql_select_db($database_con_admin, $con_admin);
$qry = "SELECT * FROM op WHERE seccion='$seccion'";
$r = mysql_query($qry, $con_admin) or die(mysql_error());
if ( $r !== false && mysql_num_rows($r) > 0 ) 
{
	$a2 = mysql_fetch_assoc($r);
	$ids= stripslashes($a2['id_op']);
	$title = stripslashes($a2['titulo']);
	$desc = stripslashes($a2['descripcion']);
	$ima = stripslashes($a2['imagen']);
}
?>
<?php
mysql_select_db($database_con_admin, $con_admin);
$qryt = "SELECT * FROM op WHERE seccion='Pestana'";
$rt = mysql_query($qryt, $con_admin) or die(mysql_error());
if ( $rt !== false && mysql_num_rows($rt) > 0 ) 
{
	$at = mysql_fetch_assoc($rt);
	$id_pagina= stripslashes($at['id_op']);
	$title_pagina = stripslashes($at['titulo']);
	$sec_pagina = stripslashes($at['seccion']);		
}

?>
<?php 
include ("ckeditor/ckeditor.php");
?>
<?php
$menu=$_GET['menu'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/Generaladmin.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="X-UA-Compatible" content="IE=8"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic,700' rel='stylesheet' type='text/css'>
<link type="image/x-icon" href="../img/favicon/favicon.ico" rel="icon" /> 
<!-- InstanceBeginEditable name="doctitle" -->
<!-- InstanceEndEditable -->
<title>Administrador de Contenidos</title>
<!-- InstanceBeginEditable name="head" --><script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<!-- InstanceEndEditable -->

<link href="estilos_admin.css" rel="stylesheet" type="text/css" />
<link href="estilos_admin_int.css" rel="stylesheet" type="text/css" />

</head>
<body>

<div id="wrapper"> 
	<div id="wrapper">
	<div id="head">
		<div id="head_men">
            <img src="imagenes/logo.jpg" alt="" width="214" height="73" border="0" align="absmiddle" />
            <div id="datos">
                <p>
                    <span class="titulo-head2"><span class="titulo-head">Bienvenido</span> | Administrador  de Contenidos</span>
                </p>
				<a href="logout.php"><img src="imagenes/cerrar.jpg" width="112" height="27" border="0" /></a>
			</div>
		</div>
	</div>
<?php 
$name_but1='inicio.php';
$name_but2='nosotros.php';
$name_but3='quehacemos.php';
$name_but4='diferenciadores.php';
$name_but5='divisiones.php';
$name_but5='contacto.php';


extract($_REQUEST);
if($menu==$name_but1){
	$op1='b1-o';
}
else {
	$op1='b1';
}
if($menu==$name_but2){
	$op2='b2-o';
} 
else {
    $op2='b2';
}
if($menu==$name_but3){
	$op3='b3-o';
}
else {
    $op3='b3';
}
if($menu==$name_but4){
    $op4='b4-o';
}
else {
	$op4='b4';
}
if($menu==$name_but5){
    $op5='b5-o'; 
}
else {
	$op5='b5';
}
?>
<div id="botonera">
    	<div id="menus">
    		<div id="menu">
                <ul>
                   <li><a href="inicio.php?menu=inicio.php">Inicio</a></li> 
                   <li><a href="nosotros.php">Quienes Somos</a></li> 
                   <li><a href="quehacemos.php">Que Hacemos</a></li>             
      			 <li><a href="diferenciadores.php">Diferenciadores</a></li> 
                   <li><a href="divisiones.php">Divisiones</a></li>
                   <li><a href="contacto.php">Contacto</a></li>   
                </ul>
            </div>
		</div>
    </div>
    	<div id="content2">
    		<!-- InstanceBeginEditable name="Contenido" -->
<div id="caja">
	<p class="textoboldnaranja" id="titulo_seccion" name="titulo_seccion">Inicio</p>
        <p id="titulos_actualizar">
    		<img src="imagenes/triangulo.jpg" width="6" height="13" class="triangulo"/><span class="textogris">Nuevo Banner</span>
    	</p>
</div>

<!--
***************************
    Inicio del Formulario
***************************
 -->	


<form id="form1" name="form1" enctype="multipart/form-data" method="post" action="">    
       <input name="id_op" type="hidden" value="<?php echo $ids; ?>" />  
       <input name="seccion" type="hidden" value="<?php echo $sec; ?>" />
       <input name="imagen" type="hidden" value="<?php echo $ima; ?>" />
<!--**************************************************************************************************************************************************
******************************************************************************************************************************************************
******************************************************************************************************************************************************
-->


<!--**************************************************************************************************************************************************
******************************************************************************************************************************************************
******************************************************************************************************************************************************
 Campo con un input type text para que funcione no se debe omitir nada
 -->
<div id="caja_archivos">
	<p id="seccion" class="texto">Título:</p>
	<br />
<p><span class="texto">
                  <input name="titulo" type="text" class="demos" id="titulo" style="width:500px;" value="<?php echo $title; ?>" />
                </span>
    </p>
</div>
<!--**************************************************************************************************************************************************
******************************************************************************************************************************************************
******************************************************************************************************************************************************
-->

<!--**************************************************************************************************************************************************
******************************************************************************************************************************************************
******************************************************************************************************************************************************
 Campo con un input type text para que funcione no se debe omitir nada
 -->
<div id="caja_archivos">
	<p id="seccion" class="texto">Título:</p>
	<br />
<p><span class="texto">
                  <input name="titulsubo" type="text" class="demos" id="subtitulo" style="width:500px;" value="<?php echo $subtitle; ?>" />
                </span>
    </p>
</div>
<!--**************************************************************************************************************************************************
******************************************************************************************************************************************************
******************************************************************************************************************************************************
-->

<!--**************************************************************************************************************************************************
******************************************************************************************************************************************************
******************************************************************************************************************************************************
Campo de Texto con el CKeditor para que funcione no se debe omitir nada
-->
<div id="caja_archivos">
	<p id="seccion" class="texto">Descripción:</p>
	<br />
	<br />
<?php
  $CKEditor = new CKEditor();
  $CKEditor->returnOutput = true;
  $code = $CKEditor->editor("descripcion", "$desc");
  echo $code;
?>
    </p>
</div>
<!--**************************************************************************************************************************************************
******************************************************************************************************************************************************
******************************************************************************************************************************************************
-->



<!--**************************************************************************************************************************************************
******************************************************************************************************************************************************
******************************************************************************************************************************************************
Campo de Imagen para que funcione no se debe omitir nada
-->
<div id="caja_archivos">
	<p id="seccion" class="texto">Imagen</p>
	<br />
<span class="texto">
                  <input name="imagen" type="file" class="boton2" id="imagen" style="width:250px;"/>
                </span>
    </p>
</div>
<!--**************************************************************************************************************************************************
******************************************************************************************************************************************************
******************************************************************************************************************************************************
-->



<!--
***************************
     Boton Guardar
***************************
 -->	
<div id="caja_archivos">
	 <p>
	 	<input name="Guardar" type="submit" class="boton-formulario2" id="Guardar" value="Guardar" />
	 </p>
</div>

</form>
<!--
***************************
     Fin del Formulario
***************************
 -->	
 
 <!--
************************************
   Inicio del Formulario Regresar
************************************
 -->	
<form id="form2" name="form2" method="post" action="<?php echo $menu; ?>?menu=<?php echo $menu; ?>">

<div id="caja_archivos">
	 <p>             
			  <input name="button" type="submit" class="boton-formulario2" id="button" value="Regresar" />
	 </p>		  
            </form>
 </div>			
<!--
************************************
     Fin del Formulario Regresar
************************************
 -->			
			
      
    </div>
    <div id="footer">
        <p>Central Interactiva® | División Publicidad Digital</p>
    </div>
</body>
</html>
<?php
if (isset($_POST['Guardar']))
{
	extract($_REQUEST);

	$nombre_archivo4 = $_FILES['imagen']['name'];
	$tipo_archivo4   = $_FILES['imagen']['type'];
	$tamano_imagen  = $_FILES['imagen']['size'];
	$archivo = $_FILES['imagen']['tmp_name'];
	$carpeta = '../img/op/';
		
	if ($nombre_archivo4!="")
	{ 
		if ( (strpos($tipo_archivo4 , "jpeg") || strpos($tipo_archivo4 , "png") || strpos($tipo_archivo4 , "gif")) && ($tamano_imagen < 2097152) ) 
		{
			if (file_exists("../img/op/" . $imagen))
			{
				unlink($carpeta.$imagen);
			}
			copy($_FILES['imagen']['tmp_name'], $carpeta.$nombre_archivo4);
			mysql_select_db($database_con_admin, $con_admin);
			$qry44 = "UPDATE op SET titulo='$titulo',descripcion='$descripcion', imagen='$nombre_archivo4' WHERE id_op='$id_op'";	
			mysql_query($qry44, $con_admin) or die(mysql_error());
			echo "<SCRIPT LANGUAJE='javascript'>window.location='".$menu."?menu=".$menu."'</SCRIPT>";
		}
		else
		{  
			echo "<script languaje='javascript'>alert('ERROR EN LA IMAGEN')</script>";
			echo"<script language='javascript'>window.location='op1_tdui_editar.php?menu=".$menu."&seccion=".$seccion."'</script>";					
		}
	}
	else
	{
		mysql_select_db($database_con_admin, $con_admin);
		$qryss = "UPDATE op SET titulo='$titulo',subtitulo='$subtitulo', url='$url' WHERE id_op='$id_op'";
		mysql_query($qryss, $con_admin) or die(mysql_error());
		echo "<SCRIPT LANGUAJE='javascript'>window.location='".$menu."?menu=".$menu."'</SCRIPT>";		
	}	
}
?>