<?php
$cons_usuario="root";
$cons_contra="";
$cons_base_datos="controlasistencia";
$cons_equipo="localhost";

$obj_conexion = 
mysqli_connect($cons_equipo,$cons_usuario,$cons_contra,$cons_base_datos);
if(!$obj_conexion)
{
    echo "<h3>No se ha podido conectar PHP - MySQL, verifique sus datos.</h3><hr><br>";
}
else
{
    echo "<h3>Conexion Exitosa PHP - MySQL</h3><hr><br>";
}


?>


<?php
/*$enlace =  mysql_conect('localhost', 'root', '0989725757');
if (!$enlace) {
    die('No pudo conectarse: ' . mysql_error());
}
echo 'Conectado satisfactoriamente';
mysql_close($enlace)();*/
?>
