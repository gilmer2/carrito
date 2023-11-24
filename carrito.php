<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <title>Carrito</title>
    <style>
        .bg{
            background-color: #DEDEDE;
            border-radius: 5px;
        }
        .celdas{
            width: 100%;
            height: 50px;
        }
        .btn{
            width: 120px;
            border-radius: 20px ;
        }
        .select{
            width: 120px;
            padding: 5px;
            text-align: center;
            border-radius: 20px;
            font-weight: bold;
        }

    </style>
</head>
<body>
    <div class="container text-center">
        <br>
        <a href="./index.php" class="btn btn-dark">Regresar</a>
        <br>
        <hr>
        <h5>Carrito de compras</h5>
        <?php
            include 'conexion.php';
            session_start();
            $_SESSION['total'] = 0;
            $query = "SELECT * FROM carrito";
            $result = mysqli_query($conexion, $query);

            if(mysqli_num_rows($result) == 0){
                echo '<h5 class="mt-5">No hay productos en el carrito</h5>';
            }else{
            
            while ($row = mysqli_fetch_array($result)) {
                $total = $row['total'] * $row['cantidad'];
                $totalsin = $row['total'] * $row['cantidad'];
                
                if($total < 100){
                    $envio =  "$120 MXN";
                    $total = $total + 120;
                }else{
                    $envio = "Gratis";
                    $total = $total + 0;
                }
                $producto = $row['id_zapato'];
                $query2 = "SELECT * FROM zapatos WHERE id = '$producto'";
                $result2 = mysqli_query($conexion, $query2);
                $row2 = mysqli_fetch_array($result2);
                $_SESSION['total'] = $_SESSION['total'] + $total ;
                
                

        ?>

        <div class="bg text-start" style="border: 1px solid grey;">
            <div class="celdas" style="border-bottom: 1px solid grey;">
                <h3 class="m-5 mt-3">
                    <?php echo $row2['nombre']; ?>
                </h3>
            </div>
            <div class="" style="border-bottom: 1px solid grey;">
                <div class="d-flex m-5 mt-3 mb-3">
                    <div class="col-6">
                        <div class="d-flex">
                            <form action="./eliminarcarrito.php" method="post">
                                <input type="text" class="d-none" name="id" id="id" value=<?php echo $row['id'] ?> >
                                <button type="submit" name="eliminar" class="btn btn-dark" style="margin-right: 20px;" >Eliminar</button>
                                <button type="submit" name="guardar" class="btn btn-dark" >Guardar</button>
                            </form>
                        </div>
                        <select name="cantidad" class="mt-3 select" id="cantidad">
                            <?php
                                for ($i=1; $i <= $row['cantidad']; $i++) { 
                                    if($i == $row['cantidad']){
                                        echo '<option value="'.$i.'" selected>'.$i.'pza</option>';
                                    }
                                    else{
                                        echo '<option value="'.$i.'">'.$i.'pza</option>';
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col">
                        <div class="container d-flex align-items-center justify-content-center" style="height: 100%;">
                            <div style="font-size: 20px;">
                              <p class="text-center">$ <?php echo $totalsin ?> MXN</p>
                            </div>
                          </div>
                    </div>
                </div>
            </div>
            <div class="celdas" style="border-bottom: 1px solid grey;">
                <div class="d-flex">
                    <div class="col-4 m-5 mt-3">
                        <h5>Envio</h5>       
                    </div>
                    <div class="col m-5 mt-3">
                        <div class="container d-flex align-items-center justify-content-center" style="height: 100%;">
                            <div style="font-size: 20px;">
                              <h5 class="text-center"><?php echo $envio; ?></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <?php
            }
        }
        ?>
        <div>
            <h5 class="mt-5">Total</h5>
            <div class="container d-flex align-items-center justify-content-center" style="height: 100%;">
                <div style="font-size: 20px;">
                  <h5 class="text-center">$ <?php echo $_SESSION['total'] ?> MXN</h5>
                </div>
            </div>
        </div>

        <div>
            <button type="submit" class="btn btn-dark mt-5" >Comprar</button>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>