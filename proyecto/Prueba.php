<?php

$Received_data = $_REQUEST["txtReceived_data"];
$info = "Valor del sensor es: $Received_data ";
echo $info;

$server = "localhost";
$base = "id19804100_sensor";
$usuario = "id19804100_app_inventor";
$contraseña = "1oOLIEn{q8lW?f9)";
$conn = mysqli_connect($server, $usuario, $contraseña, $base);
if(!$conn){
    die("Conexion fallida: " . mysqli_connect_error());
}
echo "<br>";
echo "conexion con la base de datos.";
echo "<br>";
date_default_timezone_set("America/Bogota");
$date = date("d-m-Y h:i a");

$sql = "INSERT INTO datos (valor, fecha) VALUES('$Received_data', '$date') ";
if(mysqli_query($conn, $sql)){
    echo "New record created successfully";
echo "<br>";
    
}else{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);

    echo "<br>";
}
mysqli_close($conn);
?>