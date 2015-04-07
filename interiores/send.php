<?php require_once('../Connections/con_admin.php');
extract($_REQUEST); 
/*mysql_select_db($database_con_admin, $con_admin);
$qry2 =("select * from op4 where seccion='correos'");
$r2=mysql_query($qry2, $con_admin) or die(mysql_error());
if ( $r2 !== false && mysql_num_rows($r2) > 0 ) 
{
	$a = mysql_fetch_assoc($r2);
	$mailito= stripslashes($a['url']);
}*/
$para      = 'jreyes@centralinteractiva.com.mx'; 
$titulo    = 'Muebles Jerónimo';
$cabeceras = 'From:Muebles Jerónimo | Contacto <paginade@server.carambola-hosting.com>' . "\r\n" .
    'Reply-To: paginade@server.carambola-hosting.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

//////////////////////////////////////////////////////////////////////////////
utf8_decode( $_POST['name']);
utf8_decode( $_POST['telefono']); 
utf8_decode( $_POST['email']);
utf8_decode( $_POST['empresa']);
utf8_decode( $_POST['mensaje']);	
//////////////////////////////////////////////////////////////////////////////


//////////////////////////////////////////////////////////////////////////////

 $thank="gracias.html"; 		//Este direcciona al gracias
 
//////////////////////////////////////////////////////////////////////////////
 
 
 
/////////////////Estos son como va a aparecer en el correo(Letras rojas) y el nombre de los campos (Letras azules)   ///////////////////////
$message = " 
Datos de Contacto / Nuevo Prospecto

Nombre: ".$name."\n

Telefono: ".$telefono."\n				

Dirección: ".$email."\n

E-mail: ".$empresa."\n

Comentarios: ".$mensaje."\n"; 

/////////////////Estos son como va a aparecer en el correo(Letras rojas) y el nombre de los campos (Letras azules)   ///////////////////////



/////////////////Aquí hay que poner el nombre de la empresa y el correo el mismo al que se va a direccionar ///////////////////////

if (mail(utf8_decode($para),utf8_decode($titulo),utf8_decode($message),utf8_decode($cabeceras)))

/////////////////Aquí hay que poner el nombre de la empresa y el correo el mismo al que se va a direccionar ///////////////////////

Header ("Location: $thank"); 

?>
