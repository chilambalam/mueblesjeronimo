<?php 
  require_once('../Connections/con_admin.php');
  extract ($_REQUEST); 
  $ids = $_REQUEST["id_categoria"];
  mysql_select_db($database_con_admin, $con_admin);
  $sql=("SELECT * FROM categoria WHERE id_categoria='$ids'");
  $r=mysql_query($sql, $con_admin) or die(mysql_error());   
  mysql_select_db($database_con_admin, $con_admin);
  mysql_query("DELETE FROM categoria WHERE id_categoria='$ids'");			 
  echo  "<script language='javascript'>window.location='categoria2.php?menu=".$menu."&ids=".$seccion."&page=".$page."'</script>";
?>
