<?php
/*conexion a base de datos*/
$mysql_host    = "127.0.0.1"; //el servidor que utilizaremos, en este caso será el localhost
$mysql_usuario = "root"; //El usuario que acabamos de crear en la base de datos
$mysql_clave   = ""; //La contraseña del usuario que utilizaremos
$mysql_BD      = "mylibrary"; //El nombre de la base de datos
/*Normalmente se envian 3 parametros (los datos del servidor, usuario y contraseña) a la función mysql_connect, si no hay ningún error la conexión será un éxito.*/
$conexion      = mysqli_connect($mysql_host, $mysql_usuario, $mysql_clave, $mysql_BD);
$acentos       = $conexion->query("SET NAMES 'utf8'");
/*Aparescan acentos*/

if (mysqli_connect_errno()) {
	 echo "Error en la conexion: " . mysqli_connect_error();
} else {
	 /*echo "Conectado";*/
}

?>
