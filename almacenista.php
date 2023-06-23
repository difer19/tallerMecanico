<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Almacenista</title>
</head>

<body>
    <h1>Almacenista</h1>
    <label> Factura </label>
    <form action="almacenista2.php" method="post" id="form_alm">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Seleccione</th>
                    <th>Factura</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include("conecta.php");
                    $bd = conectar();
                    session_start();
                    $bd = conectar();
                    $user = $_SESSION["username"];
                    $sql = "select numfac, placa_vehiculo from factura where cod_almacenista = (select
                    codusu from usuarios where nomusu = '$user') and estado = 'P'";
                    $res = mysqli_query($bd, $sql);
                    while ($arr = mysqli_fetch_array($res)) {
                        echo "<tr>";
                        echo "<td><input type='radio' value='$arr[0]' name='factura' required></td>";
                        echo "<td>$arr[0]</td>";
                        echo "</tr>";
                    }
                    mysqli_close($bd);
                ?>
            </tbody>
        </table>
        <div>
            <h1>Repuesto : </h1>
            <input type="text" name="repuesto">
            <h1>Cantidad : </h1>
            <input type="number" name="cantidad">
            <h1>Precio Unitario : </h1>
            <input type="number" name="precio">
            <br>
            <input type="submit" value="Insertar">
            
        </div>
    </form>
    
    
</body>
</html>