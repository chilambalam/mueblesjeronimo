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
<div id="botonera">
    	<div id="menus">
    		<div id="menu">
                <ul>
                   <li><a href="inicio.php">Inicio</a></li> 
                   <?php              
                        mysql_select_db($database_con_admin, $con_admin);
                        $qry2 = "SELECT * FROM categoria ORDER BY orden ASC $pages2->limit";
                        $r2 = mysql_query($qry2, $con_admin) or die(mysql_error());
                        if ( $r2 !== false && mysql_num_rows($r2) > 0 ) 
                        {
                          while ($a2 = mysql_fetch_assoc($r2))
                          {
                            $ima = stripslashes($a2['titulo']); 
                            $ids = stripslashes($a2['id_categoria']);  
                      ?>	
                      <li><a href="productos.php?seccion=<?php echo $ids;?>"><?php echo $ima; ?></a></li> 
                      <?php
                          }
                        }
                      ?>
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
	<p id="seccion" class="texto">Orden:</p>
	<br />
<p><span class="texto">
                  <input name="orden" type="text" class="demos" id="orden" style="width:80px;" placeholder="Orden:"/>
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
                  <input name="titulo" type="text" class="demos" id="titulo" style="width:500px;" placeholder="Título:"/>
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
        $code = $CKEditor->editor("descripcion");
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
if (isset($_POST['guardar']))
{
	extract($_REQUEST);
		
	$nombre_archivo1 = $_FILES['imagen']['name'];
	$tipo_archivo1   = $_FILES['imagen']['type'];
	$archivo=$_FILES['imagen']['tmp_name'];
	$carpeta='../img/productos/';
	
$mime_permitidos=array("image/jpeg","image/jpg", "image/png", "image/gif");
	
if (($nombre_archivo1==""))
{
	echo "<script languaje='javascript'>alert('FALTA ARCHIVO')</script>";
	echo "<script language='javascript'>window.location='carrera_nuevo.php?seccion=".$seccion."&ipp1'</script>";	
   }
	if(!in_array( ($_FILES['imagen']['type']),$mime_permitidos) )
	{
		echo '<script> alert("ERROR EN EL ARCHIVO");</script>';
		echo "<script language='javascript'>window.location='carrera_nuevo.php?seccion=".$seccion."&menu=".$menu."'</script>";
	}
     else 
      {
		
		copy($_FILES['imagen']['tmp_name'], $carpeta.$nombre_archivo1);
		extract($_REQUEST);
		mysql_select_db($database_con_admin, $con_admin);
		$sql = "INSERT INTO productos (imagen,orden, descripcion, titulo) VALUES ('$nombre_archivo1', '$orden', '$descripcion', '$titulo')";
		mysql_query($sql, $con_admin) or die(mysql_error());
		echo '<SCRIPT LANGUAJE="javascript">
	location.href="carrera2.php?menu='.$menu.'&page=1";
	</SCRIPT>';  
	}
}
?>