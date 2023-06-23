<?php 
    include("conecta.php");
    $bd = conectar();
    
    $fac = $_REQUEST["factura"];
    $rep = $_REQUEST["repuesto"];
    $can = $_REQUEST["cantidad"];
    $pre = $_REQUEST["precio"];

    $sql = "insert into repuestos values ('$fac', '$rep', '$can', '$pre')";

    $res = mysqli_query($bd,$sql);
    
    mysqli_close($bd);

    echo "<h1> Guardado </h1>";
    echo "<h1> Desea insertar otro dato</h1>";
    echo "<button><a href='almacenista.php'>Insertar</a></button>"
    
?>