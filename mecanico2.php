<?php 
    include("conecta.php");
    $bd = conectar();
    
    $fac = $_REQUEST["factura"];
    $ser = $_REQUEST["servicio"];
    $pre = $_REQUEST["costo"];

    $sql = "insert into servicios values ('$fac', '$ser', '$pre')";

    $res = mysqli_query($bd,$sql);
    
    mysqli_close($bd);

    echo "<h1> Guardado </h1>";
    echo "<h1> Desea insertar otro dato</h1>";
    echo "<button><a href='mecanico.php'>Insertar</a></button>"
    
?>