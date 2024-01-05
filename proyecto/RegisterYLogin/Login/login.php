<?php

session_start();

include 'con_db.php';

$correo = trim($_POST['email']);
$contrasena = trim($_POST['password']);
$contrasena = hash('sha512', $contrasena);

$verifica = mysqli_query($conex, "SELECT * FROM registro WHERE email='$correo' and contrasena='$contrasena'");

if(mysqli_num_rows($verifica) > 0){
    $_SESSION['usuario'] = $correo;
    
    header("location: ../../DashBoard/index.php");

    exit();

}else{
    echo '
    <script>
        alert("Usuario no existe, por favor verifique los datos");
        window.location="../index.html";
    </script>
    ';
    exit();
}

?>