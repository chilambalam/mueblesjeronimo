<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_con_admin = "localhost";
$database_con_admin = "paginade_mueblesjeronimo";
$username_con_admin = "root";
$password_con_admin = "";
$con_admin = mysql_pconnect($hostname_con_admin, $username_con_admin, $password_con_admin) or trigger_error(mysql_error(),E_USER_ERROR); 
?>