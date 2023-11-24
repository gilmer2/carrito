<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <title>Document</title>
  <style>
    .d-flex {
      justify-content: space-between;
    }

    .btn-circle {
      border-radius: 50%;

    }

    .img {
      width: 100%;
      height: 208px;
      background-size: cover;
      background-position: center;
    }

    .tam {
      width: 278px;
      color: black;
    }
  </style>
</head>

<body>
  <div class="container">
    <br>
    <a href="./carrito.php" class="btn btn-dark">Carrito</a>
    <br>
    <br>
    <div class="d-flex">
      <?php
      include 'conexion.php';
      $query = "SELECT * FROM zapatos";
      $result = mysqli_query($conexion, $query);
      while ($row = mysqli_fetch_array($result)) {
      ?>
        <a href="#" class="text-decoration-none">
          <div class="tam text-start card bg-white ">
            <?php
            echo '<div class="img" style="background-image: url(' . $row['foto'] . ');">';
            ?>

          </div>
          <div class="m-4">
            <h4><?php echo $row['nombre'] ?></h4>
            <p>Calzado para <?php
                            $sql = "SELECT * FROM tipo WHERE id = " . $row['tipoCalzado'];
                            $res = mysqli_query($conexion, $sql);
                            $row2 = mysqli_fetch_array($res);

                            echo $row2['nombre']
                            ?></p>
            <p><?php echo $row['colores'] ?> colores</p>
            <div class="d-flex ">
              <p class="mr-3">$<?php echo $row['precio'] ?></p>
              <form action="./añadircarrito.php" method="post">
                <input type="hidden" class="d-none" name="id" value="<?php echo $row['id'] ?>">
                <input type="hidden" class="d-none" name="cantidad" value="1">
                <button type="submit" class="btn btn-dark btn-circle">+</button>
              </form>
            </div>
          </div>
    </div>
    </a>
  <?php
      }
  ?>
  </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>