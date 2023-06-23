<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facturador</title>
</head>
<body>
    <h1>Facturador</h1>
    
    <form action="facturador2.php" method="post" id="form_alm">
    <h1>Seleccione un cliente : </h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Seleccione</th>
                    <th>Cedula</th>
                    <th>Nombre</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include("conecta.php");
                    $bd = conectar();
                    $sql = "select * from clientes";
                    $res = mysqli_query($bd, $sql);
                    while ($arr = mysqli_fetch_array($res)) {
                        echo "<tr>";
                        echo "<td><input type='radio' value='$arr[0]' name='cliente' required></td>";
                        echo "<td>$arr[0]</td>";
                        echo "<td>$arr[1]</td>";
                        echo "</tr>";
                    }

                ?>
            </tbody>
        </table>
        
        <h1>Seleccione un Mecanico : </h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Seleccione</th>
                    <th>id</th>
                    <th>Nombre</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    //include("conecta.php");
                    //$bd = conectar();
                    $sql = "select * from usuarios where rol = 'M' ";
                    $res = mysqli_query($bd, $sql);
                    while ($arr = mysqli_fetch_array($res)) {
                        echo "<tr>";
                        echo "<td><input type='radio' value='$arr[0]' name='mecanico' required></td>";
                        echo "<td>$arr[0]</td>";
                        echo "<td>$arr[1]</td>";
                        echo "</tr>";
                    }
                    //mysqli_close($bd);
                ?>
            </tbody>
        </table>

        <h1>Seleccione un Almacenista : </h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Seleccione</th>
                    <th>id</th>
                    <th>Nombre</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    //include("conecta.php");
                    //$bd = conectar();
                    $sql = "select * from usuarios where rol = 'A' ";
                    $res = mysqli_query($bd, $sql);
                    while ($arr = mysqli_fetch_array($res)) {
                        echo "<tr>";
                        echo "<td><input type='radio' value='$arr[0]' name='almacenista' required></td>";
                        echo "<td>$arr[0]</td>";
                        echo "<td>$arr[1]</td>";
                        echo "</tr>";
                    }
                    mysqli_close($bd);
                ?>
            </tbody>
        </table>


        <div>
            <h1>Numero de Factura : </h1>
            <input type="number" name="num">
            <h1>Placa del Vehiculo : </h1>
            <input type="number" name="placa">
            <h1>Fecha : </h1>
            <input type="date" name="fecha">
            <br>
            <input type="submit" value="Insertar">
            
        </div>
    </form>
    
    
</body>
</html>