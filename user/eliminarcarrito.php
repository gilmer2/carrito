<?php
$id = $_POST['id'];
include('./conexion.php');

if (isset($_POST['eliminar'])) {
    $sql = "DELETE * FROM carrito WHERE id = '$id'";
    $result = mysqli_query($conexion, $sql);
    if ($result) {
        echo "
    <script>
    alert('Se ha añadido un producto al carrito');
    window.location.href = 'index.php';
    </script>

    ";
    } else {
    }
} else if (isset($_POST['guardar'])) {
    echo "guardar";
}
