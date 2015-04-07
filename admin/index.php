<?php require_once('../Connections/con_admin.php'); 
require_once('pass.php');
if (isset($_POST['entrar']))
{
	extract($_REQUEST);
	session_start();
	
	if (($usuario=="") || ($password==""))
	{
		echo "<script languaje='javascript'>alert('Faltan Datos')</script>";
		echo"<script language='javascript'>window.location='index.php'</script>";
	}
	else
	{
		$contra = hash_hmac('sha256', $password , $cve);
		//echo $contra;
		mysql_select_db($database_con_admin, $con_admin);
		$qry = "SELECT id_usuario FROM usuario WHERE usuario='$usuario' and pass='$contra'";
		$r = mysql_query($qry, $con_admin) or die(mysql_error());
		if ( $r !== false && mysql_num_rows($r) > 0 ) 
		{
			$a = mysql_fetch_assoc($r);
			$id = stripslashes($a['id_usuario']);
			$_SESSION["id"] = $id;
			echo"<script language='javascript'>window.location='home.php'</script>";	
		}
		else
		{
			echo "<script languaje='javascript'>alert('Datos Incorrectos')</script>";
			echo"<script language='javascript'>window.location='index.php'</script>";
		}
	}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/indexadmin.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="X-UA-Compatible" content="IE=8"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic,700' rel='stylesheet' type='text/css'>
<link type="image/x-icon" href="../img/favicon/favicon.ico" rel="icon" /> 
<!-- InstanceBeginEditable name="doctitle" -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.js"></script>
<script src="../placeholder/jquery.html5-placeholder-shim.js"></script>

<script>
$(function(){
	$.placeholder.shim();
});
</script>
<style>
#cont_index{
	background-image: url(imagenes/registro-2.jpg);
	background-repeat: repeat-x;
	background-position:bottom;
	border:1px solid #ddd;
	margin:0 auto 130px auto;
	width:425px;
	height: 250px;
}
#cont_head{
	background-image: url(imagenes/registro-1.jpg);
	background-repeat: repeat-y;
	background-position:left;
	text-align:center;
	padding:7px 0;
	margin:0 auto;
	width:425px;
}
#cont_head p{
	color:#fff;
	font-family: 'Open Sans', sans-serif;
	font-size:15px;
	margin:0;
	padding:0;
}
#usuario{
	background-image:url(imagenes/0usuario.png);
	background-position:left center;
	background-repeat:no-repeat;
	border:1px solid #ddd;
	display:inline-block;
	margin-top:30px;
	margin-bottom:30px;
	margin-left:25px;
	vertical-align:middle;
	height:28px;
	width:82%;
	padding-left:25px;
}
#password{
	background-image: url(imagenes/candado.png);
	background-position:left center;
	background-repeat:no-repeat;
	border:1px solid #ddd;
	display:inline-block;
	margin-bottom:30px;
	margin-left:25px;
	vertical-align:middle;
	height:28px;
	width:82%;
	padding-left:25px;
}	
#entrar{
 padding: 10px 20px; /* Tamaño del Boton */
 background: #c00; /* Aqui se cambia el color del fondo */
 color: #FFF;
 border:none;
 float:right;
 text-decoration: none;
 display: inline-block;
 text-align: center;
 cursor: pointer;
 line-height: 1;
	margin-right:25px;
 font-family: 'Open Sans', sans-serif;

}
</style>
<!-- InstanceEndEditable -->
<title>Administrador de Contenidos</title>
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->

<link href="estilos_admin.css" rel="stylesheet" type="text/css" />
<link href="estilos_admin_int.css" rel="stylesheet" type="text/css" />

</head>
<body>

<div id="wrapper">
	<div id="head">
		<div id="head_men">
            <img src="imagenes/logo.jpg" alt="" width="214" height="73" border="0" align="absmiddle" />
            <div id="datos">
                <p>
                    <span class="titulo-head3"><span class="titulo-head4">Administrador</span><br />
                    <strong>de Contenidos</strong></span></p>
			</div>
		</div>
	</div>
    <div id="content">
    	<div id="content2">
    		<!-- InstanceBeginEditable name="Contenido" -->
            <br /><br /><br /><br /><br /><br />
<div id="cont_index">
    <div id="cont_head">
    	<p><strong>Bienvenido | Ingresa tus Claves</strong></p>
    </div>
	<form id="form4" name="form4" method="POST" action="index.php">
	<input name="usuario" type="text" id="usuario" placeholder="Introduzca su nombre de usuario"/>
	<input name="password" type="password" id="password" placeholder="Introduzca su contraseña"/>
	<input name="entrar" type="submit"  id="entrar" value="Acceder" />
	</form>
</div>
<!-- InstanceEndEditable -->
        </div>
    </div>
    <div id="footer">
        <p>Central Interactiva® | División Publicidad Digital</p>
    </div>
</div>
</body>
<!-- InstanceEnd --></html>
