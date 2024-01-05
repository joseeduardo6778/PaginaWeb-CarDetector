<?php
   
        include 'con_db.php';

	    $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $user = trim($_POST['user']);
	    $password = trim($_POST['password']);

		$password = hash('sha512' , $password);

	    $consulta = "INSERT INTO registro(nombre,email,usuario,contrasena) VALUES ('$name','$email','$user','$password')";

		$verifiCorreo = mysqli_query($conex, "SELECT * FROM registro WHERE email='$email'");
		$verifiNombre = mysqli_query($conex, "SELECT * FROM registro WHERE nombre='$name'");
		$verifiUsuario = mysqli_query($conex, "SELECT * FROM registro WHERE usuario='$user'");

		if(mysqli_num_rows($verifiCorreo) > 0 ){

			echo '
			<script>
			   alert("El correo ya esta registrado");
			   window.location="../index.html";
			</script>
			';
			exit();
		}

		if(mysqli_num_rows($verifiUsuario) > 0 ){

			echo '
			<script>
			   alert("El usuario ya esta registrado");
			   window.location="../index.html";
			</script>
			';
			exit();
		}


		if(mysqli_num_rows($verifiNombre) > 0 ){

			echo '
			<script>
			   alert("El nombre ya esta registrado");
			   window.location="../index.html";
			</script>
			';
			exit();
		}

	    $resultado = mysqli_query($conex,$consulta);

		if($resultado){
			echo '
			<script>
			   alert("Fue registrado con exito");
			   window.location="../index.html";
			</script>
			';
		}else{
			echo '
			<script>
			   alert("No fue registrado correctamente");
			   window.location="../index.html";
			</script>
			';
		}
		mysqli_close($conex);
?>
