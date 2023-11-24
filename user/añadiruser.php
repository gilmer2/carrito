<?php
    include("./conexion.php");
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    $confirmarpass = $_POST['confirmarcontrasena'];

    $dias = $_POST['dias'];
    $meses = $_POST['meses'];
    $años = $_POST['años'];

    $fechanacimiento = $años."-".$meses."-".$dias;
    
    if($contrasena == $confirmarpass){
        //en sql agrega haci debe de ser en la base de datos de todas formas va a estar en el archivo de la base de datos
        $sql = "INSERT INTO usuarios (nombre, apellido, correo, contrasena, fechaNacimiento) VALUES ('$nombre', '$apellido', '$correo', '$contrasena', '$fechanacimiento')";
        $result = mysqli_query($conexion, $sql);
        if($result){
            //donde dice window.location.href = 'index.php'; es para que te redireccione a la pagina que quieras
            echo "
            <script>
            alert('Se ha añadido un usuario');
            window.location.href = 'index.php';
            </script>
            ";
        }else{
            //donde dice window.location.href = 'index.php'; es para que te redireccione a la pagina que quieras cuando no se añade un usuario
            echo "
            <script>
            alert('No se ha añadido un usuario');
            window.location.href = 'index.php';
            </script>
            ";
        }
    }else{
        //donde dice window.location.href = 'index.php'; es para que te redireccione a la pagina que quieras cuando las contraseñas no coinciden
        echo "
        <script>
        alert('Las contraseñas no coinciden');
        window.location.href = 'index.php';
        </script>
        ";
    }
?>