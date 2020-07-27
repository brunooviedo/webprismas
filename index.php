<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>Document</title>
</head>
<body>
<h1>Centro de Monitoreo Geotecnico Chuquicamata</h1>
<Section>
<?php
$self = $_SERVER['PHP_SELF']; //Obtenemos la página en la que nos encontramos
header("refresh:30; url=$self"); //Refrescamos cada 300 segundos

include_once "conexion.php";

$sql = "SELECT TOP 10 CPRISMA, CBANCO, CESTADO, CTEODOLITO, CZONA, FI_FECHA FROM [dbo].[GT_OPRISMAS] order by FI_FECHA desc";

$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}
echo "<h2>Ultimos Prismas Ingresados</h2>";
echo "<table class='tabla1' border='1'>

<tr>

<th>Prisma</th>

<th>Banco</th>

<th>Zona</th>

<th>Estado</th>

<th>Teodolito</th>

<th>Fecha</th>

</tr>";

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {

  echo "<tr>";

  echo "<td>" . $row['CPRISMA'] . "</td>";

  echo "<td>" . $row['CBANCO'] . "</td>";

  echo "<td>" . $row['CZONA'] . "</td>";

  echo "<td>" . $row['CESTADO'] . "</td>";

  echo "<td>" . $row['CTEODOLITO'] . "</td>";

  echo "<td>" . $row['FI_FECHA']->format('d-m-Y H:i:s') . "</td>";

  echo "</tr>";
  
}


?>
<?php

echo "<table class='tabla2' border='1'>

<tr>

<th>Teodolito</th>

<th>Fecha</th>

</tr>";
$sql2 = "SELECT TOP 5 CPRISMA, CBANCO, CESTADO, CTEODOLITO, FI_FECHA FROM [dbo].[GT_OPRISMAS] order by FI_FECHA desc";
$resultado2 = sqlsrv_query($conn, $sql2);

    while( $row = sqlsrv_fetch_array( $resultado2, SQLSRV_FETCH_ASSOC) ){
        echo "<tr>";

        
        echo "<td>" . $row['CTEODOLITO'] . "</td>";
      
        echo "<td>" . $row['FI_FECHA']->format('d-m-Y H:i:s') . "</td>";
        echo "</tr>";
    }
  
    echo "<h2>Ultimos Datos ingresados a la base de datos</h2>";
?>
</Section>
<footer>
    Codelco Chuquicamata 2020
</footer>
</body>
</html>