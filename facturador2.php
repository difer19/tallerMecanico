<?php 
    include("conecta.php");
    $bd = conectar();
    
    $cli = $_REQUEST["cliente"];
    $mec = $_REQUEST["mecanico"];
    $alm = $_REQUEST["almacenista"];
    $pla = $_REQUEST["placa"];
    $date = $_REQUEST["fecha"];
    $num = $_REQUEST["num"];

    $sql = "insert into factura values ('$num', '$cli', '$date', '$pla', '$mec', '$alm', 'P' )";

    $res = mysqli_query($bd,$sql);
    
    mysqli_close($bd);

    echo "<h1> Guardado </h1>";
    echo "<h1> Desea insertar otro dato</h1>";
    echo "<button><a href='facturador.php'>Insertar</a></button>"
    
?>