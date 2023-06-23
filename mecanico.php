<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mecanico</title>
</head>
<body>
    <h1>Mecanico</h1>
    <label> Factura </label>
    <form action="mecanico2.php" method="post" id="form_alm">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Seleccione</th>
                    <th>Factura</th>
                    <th>Placa</th>

                </tr>
            </thead>
            <tbody>
                <?php
                    include("conecta.php");
                    session_start();
                    $bd = conectar();
                    $user = $_SESSION["username"];
                    $sql = "select numfac, placa_vehiculo from factura where cod_mecanico = (select
                    codusu from usuarios where nomusu = '$user') and estado = 'P'";
                    $res = mysqli_query($bd, $sql);
                    while ($arr = mysqli_fetch_array($res)) {
                        echo "<tr>";
                        echo "<td><input type='radio' value='$arr[0]' name='factura' required></td>";
                        echo "<td>$arr[0]</td>";
                        echo "<td>$arr[1]</td>";
                    }
                    mysqli_close($bd);
                ?>
            </tbody>
        </table>
        <div>
            <h1>Servicio : </h1>
            <input type="text" name="servicio">
            <h1>Costo : </h1>
            <input type="number" name="costo">
            <br>
            <input type="submit" value="Insertar">
            
        </div>
    </form>
    
    
</body>
</html>