<?php require_once('../Connections/con_admin.php');
require_once('paginacion/paginator.class.php');
extract($_REQUEST);
session_start();
if (isset($_SESSION["id"]))
{ $id=$_SESSION["id"]; }
else
{ echo"<script language='javascript'>window.location='index.php'</script>"; } 
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
$menu=$_GET['menu'];
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
<link href="estilos_admin.css" rel="stylesheet" type="text/css" />
<link href="estilos_admin_int.css" rel="stylesheet" type="text/css" />
<link href="paginacion/paginacion.css" rel="stylesheet" type="text/css" />
<style>
#boton_1 
{
  display: inline-block;
  position: relative;
  top: -41px;
  left: 500px;
  width: 80px;
  height: 40px;
}
#boton_2 
{
  display: inline-block;
  position: relative;
  top: -41px;
  left: 514px;
  width: 70px;
  height: 40px;
}
#nvo
{
 margin-left:82%;
 text-decoration:none;
 width:92px;
 border-bottom:solid;
}
</style>
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
               <!--***************************
               ****************************-->	
               <div id="caja">
               	<p class="textoboldnaranja" id="titulo_seccion" name="titulo_seccion">Categoria</p>
                       <p id="titulos_actualizar">
                   		<img src="imagenes/triangulo.jpg" width="6" height="13" class="triangulo"/><span class="textogris">Actualizar categorias</span>
                   	</p>
					<p id="nvo"><a href="categoria_nuevo.php?page=<?php echo $page; ?>&menu=<?php echo $menu; ?>" class="botones">Agrear Nuevo</a></p>
               </div>
               <!--***************************
                       Paginador
               ****************************-->	
               <div id="caja">
               <?php
               mysql_select_db($database_con_admin, $con_admin);
               $query = "SELECT COUNT(id_categoria) FROM categoria";
               $result = mysql_query($query, $con_admin) or die(mysql_error());
               $count = mysql_fetch_row($result);
               $pages2= new Paginator; 
               $pages2->items_total = $count[0]; //consulta del count
               $pages2->mid_range = 3; //cantidad de links a mostrar numero impar 
               $pages2->items_per_page = 5; //cantidad de registros por pagina
               $pages2->paginate(); 
               echo $pages2->display_pages(); //imprimir paginas 
               ?>  
               </div>
               <!--***************************
                     End Paginador
               ****************************-->	
               <div id="caja">
               	<p id="titulo_orden">
                   	<span class="textogris">Orden</span>
                   </p>
                   <p id="titulo_imagen">
                   	<span class="textogris">Imágen</span>
                   </p>
               </div>
               <?php              
               mysql_select_db($database_con_admin, $con_admin);
               $qry2 = "SELECT * FROM categoria ORDER BY orden ASC $pages2->limit";
               $r2 = mysql_query($qry2, $con_admin) or die(mysql_error());
               if ( $r2 !== false && mysql_num_rows($r2) > 0 ) 
               {
               	while ($a2 = mysql_fetch_assoc($r2))
               	{
               		$ord = stripslashes($a2['orden']); 
                    $tit = stripslashes($a2['titulo']); 
               		$ids = stripslashes($a2['id_categoria']);  
               ?>		
               <div id="caja">
                   <div id="caja_separador"><img src="imagenes/plecahorizontal.jpg" alt="" width="800" height="9"/ class="pleca_separador"></div>
                   <br/>
               	<p id="titulo_1" class="textoboldgris">
				<?php echo $tit; ?>
                   
                   <?php echo $ord; ?></p>
               </div>
               <div id="boton_1">
               	<button class="boton-formulario" onclick="location.href='categoria_editar.php?id_categoria=<?php echo $ids; ?>&menu=<?php echo $menu; ?>'">Actualizar</button>
               </div>
               <div id="boton_2">
               	<button class="boton-formulario2" onclick="if (confirm('¿Desea eliminar la CATEGORIA: <?php echo $ima; ?>?')==true){window.location.href='categoria_eliminar.php?id_categoria=<?php echo $ids; ?>&page=<?php echo $page; ?>&menu=inicio.php'}">Eliminar</button>
               </div>
              
                 <?php
               	}
               }
               ?>
               <br/>
               <!--***************************
                End Form
               ****************************-->	
               <!--************************************
                  Inicio del Formulario Regresar
               *************************************-->	
               <form id="form2" name="form2" method="post" action="<?php echo $menu; ?>?menu=<?php echo $menu; ?>">
               
               <div id="caja_archivos">
               	 <p>             
               			  <input name="button" type="submit" class="boton-formulario2" id="button" value="Regresar" />
               	 </p>		  
                           </form>
                </div>			
               <!--************************************
                    Fin del Formulario Regresar
               ************************************-->			   
    </div>
    <div id="footer">
        <p>Central Interactiva® | División Publicidad Digital</p>
    </div>
</body>
</html>