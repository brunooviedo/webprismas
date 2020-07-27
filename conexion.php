<?php
$serverName = "localhost"; //serverName\instanceName
$connectionInfo = array( "Database"=>"GT_PrismasDB", "UID"=>"usuario1", "PWD"=>"12345");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if(!$conn ) {
     echo "Conexión no se pudo establecer.<br />";
     die( print_r( sqlsrv_errors(), true));
}

?>