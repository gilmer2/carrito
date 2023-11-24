<?php
    include("./conexion.php");
    //lo que esta dentro del $_POST[''] es el name del input
    $correo = $_POST['correo'];
    $confirmacorreo = $_POST['confirmacorreo'];
    $contrasena = $_POST['contrasena'];

    if($correo == $confirmacorreo){
        //en sql agrega haci debe de ser en la base de datos de todas formas va a estar en el archivo de la base de datos
        $sql = "SELECT * FROM usuarios WHERE correo = '$correo' AND contrasena = '$contrasena'";
        $result = mysqli_query($conexion, $sql);
        $row = mysqli_fetch_array($result);
        if($row){
            //donde dice window.location.href = 'index.php'; es para que te redireccione a la pagina que quieras
            echo "
            <script>
            alert('Se ha iniciado sesion');
            window.location.href = 'index.php';
            </script>
            ";
        }else{
            //donde dice window.location.href = 'index.php'; es para que te redireccione a la pagina que quieras cuando no se añade un usuario
            echo "
            <script>
            alert('No se ha iniciado sesion');
            window.location.href = 'index.php';
            </script>
            ";
        }
    }else{
        //donde dice window.location.href = 'index.php'; es para que te redireccione a la pagina que quieras cuando las contraseñas no coinciden
        echo "
        <script>
        alert('Los correos no coinciden');
        window.location.href = 'index.php';
        </script>
        ";
    }
?>