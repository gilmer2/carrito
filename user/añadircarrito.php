<?php
include('conexion.php');
$id = $_POST['id'];
$cantidad = $_POST['cantidad'];
$query = "SELECT * FROM carrito WHERE id_zapato = '$id'";
$result = mysqli_query($conexion, $query);
if (mysqli_num_rows($result) > 0) {

    $query = "UPDATE carrito SET cantidad = cantidad + 1 WHERE id_zapato = '$id'";
    $result = mysqli_query($conexion, $query);
    echo "
    <script>
    alert('Se ha añadido un producto al carrito');
    window.location.href = 'index.php';
    </script>

    ";
} else {
    $query = "SELECT * FROM zapatos WHERE id = '$id'";
    $result = mysqli_query($conexion, $query);
    $row = mysqli_fetch_array($result);
    $precio = $row['precio'];
    $query = "INSERT INTO carrito (id_user,id_zapato, cantidad, total) VALUES (1,'$id', 1, '$precio')";
    $result = mysqli_query($conexion, $query);
    echo "
    <script>
    alert('Se ha añadido un producto al carrito');
    window.location.href = 'index.php';
    </script>
    ";
}
?>