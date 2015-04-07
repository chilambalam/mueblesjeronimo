<?php require_once('http://paginadeprueba.com.mx/admin_carlos/Connections/con_admin.php');
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=8"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic,700' rel='stylesheet' type='text/css'>
<link type="image/x-icon" href="../img/favicon/favicon.ico" rel="icon" /> 

<title>Administrador de Contenidos</title>

<script type="text/javascript">
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}
function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
</script>

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
                    <span class="titulo-head2"><span class="titulo-head">Bienvenido</span> | Administrador de Contenidos</span>
                </p>
				<a href="logout.php"><img src="imagenes/cerrar.jpg" width="112" height="27" border="0" /></a>
			</div>
		</div>
	</div>
<div id="botonera">
    	<div id="menus">
    		<div id="menu">
                <ul>
                    <li><a href="#">Inicio</a></li> 
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
	<div id="content">
    	<div id="content2">
    		<!-- InstanceBeginEditable name="Contenido" -->
<div id="caja">
	<p class="textoboldnaranja" id="titulo_secciones">Editor de Imágenes</p>
        <p id="titulos_actualizar">
    		<img src="imagenes/triangulo.jpg" width="6" height="13" class="triangulo"/><span class="botones"><a href="editor_nuevo.php?menu=inicio.php" class="botones"> Nueva Imágen +</a></span>
    	</p>
</div>

<div id="caja_separador"><img src="imagenes/plecahorizontal.jpg" alt="" width="800" height="9"/ class="pleca_separador"></div>

<div id="caja">
	<p class="textoboldnaranja" id="titulo_secciones">Banner</p>
  	<p id="titulos_actualizar">
    	<img src="imagenes/triangulo.jpg" width="6" height="13" class="triangulo"/><span class="botones"><a href="banner_nuevo.php?menu=inicio.php&seccion=Inicio" class="botones"> Nuevo Banner +</a></span>
      <br/><br/>
    	<img src="imagenes/triangulo.jpg" width="6" height="13" class="triangulo"/><span class="botones"><a href="banner.php?menu=inicio.php&seccion=Inicio" class="botones"> Actualizar Banner +</a></span>
    </p>
</div>

<div id="caja_separador"><img src="imagenes/plecahorizontal.jpg" alt="" width="800" height="9"/ class="pleca_separador"></div>

<?php              
mysql_select_db($database_con_admin, $con_admin);
$qry_s1 = "SELECT * FROM op where seccion='inicio'";
$r_s1 = mysql_query($qry_s1, $con_admin) or die(mysql_error());
if ( $r_s1 !== false && mysql_num_rows($r_s1) > 0 ) 
{
		$a_s1 = mysql_fetch_assoc($r_s1);
		$ids_sec1 = mysql_real_escape_string($a_s1['id_op']);  
		$tit_1 = mysql_real_escape_string($a_s1['titulo']);
		$secc_1 = mysql_real_escape_string($a_s1['seccion']);
}
?>	
<div id="caja">
	<p class="textoboldnaranja" id="titulo_secciones"><?php echo $tit_1;?></p>
        <p id="titulos_actualizar">
    		<img src="imagenes/triangulo.jpg" width="6" height="13" class="triangulo"/><span class="botones"><a href="op_di_editar.php?seccion=<?php echo $secc_1;?>&menu=inicio.php" class="botones"> Actualizar +</a></span>
    	</p>
</div>
<div id="caja_separador"><img src="imagenes/plecahorizontal.jpg" alt="" width="800" height="9"/ class="pleca_separador"></div>

<?php              
mysql_select_db($database_con_admin, $con_admin);
$qry_s2 = "SELECT * FROM op where seccion='creamos'";
$r_s2 = mysql_query($qry_s2, $con_admin) or die(mysql_error());
if ( $r_s2 !== false && mysql_num_rows($r_s2) > 0 ) 
{
		$a_s2 = mysql_fetch_assoc($r_s2);
		$ids_sec2 = mysql_real_escape_string($a_s2['id_op']);  
		$tit_2 = mysql_real_escape_string($a_s2['titulo']);
		$secc_2 = mysql_real_escape_string($a_s2['seccion']);
}
?>	
<div id="caja">
	<p class="textoboldnaranja" id="titulo_secciones"><?php echo $tit_2;?></p>
        <p id="titulos_actualizar">
    		<img src="imagenes/triangulo.jpg" width="6" height="13" class="triangulo"/><span class="botones"><a href="op_tsiu_editar.php?seccion=<?php echo $secc_2;?>&menu=inicio.php" class="botones"> Actualizar +</a></span>
    	</p>
</div>

<div id="caja_separador"><img src="imagenes/plecahorizontal.jpg" alt="" width="800" height="9"/ class="pleca_separador"></div>

<?php              
mysql_select_db($database_con_admin, $con_admin);
$qry_s3 = "SELECT * FROM op where seccion='somos'";
$r_s3 = mysql_query($qry_s3, $con_admin) or die(mysql_error());
if ( $r_s3 !== false && mysql_num_rows($r_s3) > 0 ) 
{
		$a_s3 = mysql_fetch_assoc($r_s3);
		$ids_sec3 = mysql_real_escape_string($a_s3['id_op']);  
		$tit_3 = mysql_real_escape_string($a_s3['titulo']);
		$secc_3 = mysql_real_escape_string($a_s3['seccion']);
}
?>	
<a name="sec3" id="sec3"></a>
<div id="caja">
  <p class="textoboldnaranja" id="titulo_secciones"><?php echo $tit_3;?></p>
  <p id="titulos_actualizar">
    <img src="imagenes/triangulo.jpg" width="6" height="13" class="triangulo"/><span class="botones"><a href="op_tsdi_editar.php?seccion=<?php echo $secc_3;?>&menu=inicio.php&ancla=sec3" class="botones"> Actualizar +</a></span>
    </p>
</div>

<div id="caja_separador"><img src="imagenes/plecahorizontal.jpg" alt="" width="800" height="9"/ class="pleca_separador"></div>

<?php              
mysql_select_db($database_con_admin, $con_admin);
$qry_s4 = "SELECT * FROM op where seccion='categorias'";
$r_s4 = mysql_query($qry_s4, $con_admin) or die(mysql_error());
if ( $r_s4 !== false && mysql_num_rows($r_s4) > 0 ) 
{
		$a_s4 = mysql_fetch_assoc($r_s4);
		$ids_sec4 = mysql_real_escape_string($a_s4['id_op']);  
		$tit_4 = mysql_real_escape_string($a_s4['titulo']);
		$secc_4 = mysql_real_escape_string($a_s4['seccion']);
}
?>	
<a name="sec4" id="sec4"></a>
<div id="caja">
  <p class="textoboldnaranja" id="titulo_secciones"><?php echo $tit_4;?></p>
  <p id="titulos_actualizar">
    <img src="imagenes/triangulo.jpg" width="6" height="13" class="triangulo"/><span class="botones"><a href="categoria_nuevo.php?page=1&menu=inicio.php&ancla=sec4" class="botones"> Nuevo +</a></span>
 <br />
 <br />
     <img src="imagenes/triangulo.jpg" width="6" height="13" class="triangulo"/><span class="botones"><a href="categoria2.php?page=1&menu=inicio.php&ancla=sec4" class="botones"> Actualizar +</a></span>

    </p>
</div>

<div id="caja_separador"><img src="imagenes/plecahorizontal.jpg" alt="" width="800" height="9"/ class="pleca_separador"></div>

<a name="img_corporativa" id="img_corporativa"></a>
<div id="caja">
  <p class="textoboldnaranja" id="titulo_secciones">Imágen Corporativa</p>
  <p id="titulos_actualizar">
    <img src="imagenes/triangulo.jpg" width="6" height="13" class="triangulo"/><span class="botones"><a href="logo_editar.php?menu=<?php echo $menu; ?>" class="botones"> Actualizar Imágen Logo +</a></span>
    <br/><br/>
    <img src="imagenes/triangulo.jpg" width="6" height="13" class="triangulo"/><span class="botones"><a href="favicon_editar.php?menu=<?php echo $menu; ?>" class="botones"> Actualizar Favicon +</a></span>
    <br/><br/>
  <?php              
mysql_select_db($database_con_admin, $con_admin);
$qry2 = "SELECT * FROM op where seccion='Titulo de la Pagina'";
$r2 = mysql_query($qry2, $con_admin) or die(mysql_error());
if ( $r2 !== false && mysql_num_rows($r2) > 0 ) 
{
	$a2 = mysql_fetch_assoc($r2);
	$ids_tit_pagina = mysql_real_escape_string($a2['id_op']);
	$secc_tit_pagina = mysql_real_escape_string($a2['seccion']);
}
?>        
    <img src="imagenes/triangulo.jpg" width="6" height="13" class="triangulo"/> <span class="botones"><a href="op_t_editar.php?menu=inicio.php&seccion=<?php echo $secc_tit_pagina; ?>&ancla=img_corporativa" class="botones">Actualizar Título de la Página +</a></span>
    </p>
</div>

<a name="pie" id="pie"></a>
<div id="caja_separador"><img src="imagenes/plecahorizontal.jpg" alt="" width="800" height="9"/ class="pleca_separador"></div>

<?php              
mysql_select_db($database_con_admin, $con_admin);
$qry_pie = "SELECT * FROM op where seccion='Pie'";
$r_pie = mysql_query($qry_pie, $con_admin) or die(mysql_error());
if ( $r_pie !== false && mysql_num_rows($r_pie) > 0 ) 
{
	$a_pie = mysql_fetch_assoc($r_pie);
	$secc_pie = mysql_real_escape_string($a_pie['seccion']);
	$tit_pie = mysql_real_escape_string($a_pie['titulo']);
}
?> 
<div id="caja">
	<p class="textoboldnaranja" id="titulo_secciones"><?php echo $tit_pie; ?></p>
  	<p id="titulos_actualizar">       
    	<img src="imagenes/triangulo.jpg" width="6" height="13" class="triangulo"/><span class="botones"><a href="pie_editar.php?seccion=<?php echo $secc_pie;?>&amp;menu=inicio.php&ancla=pie" class="botones"> Actualizar +</a></span>
    </p>
</div>
<a name="aviso" id="aviso"></a>
<div id="caja_separador"><img src="imagenes/plecahorizontal.jpg" alt="" width="800" height="9"/ class="pleca_separador"></div>

<?php              
mysql_select_db($database_con_admin, $con_admin);
$qry_aviso = "SELECT * FROM op where seccion='Aviso de Privacidad'";
$r_aviso = mysql_query($qry_aviso, $con_admin) or die(mysql_error());
if ( $r_aviso !== false && mysql_num_rows($r_aviso) > 0 ) 
{
	$a_aviso = mysql_fetch_assoc($r_aviso);
	$secc_aviso = mysql_real_escape_string($a_aviso['seccion']);
	$tit_aviso = mysql_real_escape_string($a_aviso['titulo']);
}
?> 
<div id="caja">
	<p class="textoboldnaranja" id="titulo_secciones"><?php echo $tit_aviso; ?></p>
  	<p id="titulos_actualizar">       
    	<img src="imagenes/triangulo.jpg" width="6" height="13" class="triangulo"/><span class="botones"><a href="op_td_editar.php?seccion=<?php echo $secc_aviso;?>&amp;menu=inicio.php&ancla=aviso" class="botones"> Actualizar +</a></span>
    </p>
</div>

<div id="caja_separador"><img src="imagenes/plecahorizontal.jpg" alt="" width="800" height="9"/ class="pleca_separador"></div>
<a name="usu" id="usu"></a>
<div id="caja">
  <p class="textoboldnaranja" id="titulo_secciones">Usuario & Contraseña</p>
  <p id="titulos_actualizar">
    <img src="imagenes/triangulo.jpg" width="6" height="13" class="triangulo"/><span class="botones"><a href="usuario_editar.php?menu=inicio.php#usu" class="botones"> Actualizar +</a></span>
    </p>
</div>
<!--FIN DEL ADMIN-->
<div id="caja_end">
	<div id="caja_separador"></div>
 	<br/>
    <img src="imagenes/sombra.jpg" width="999" height="26"/>
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