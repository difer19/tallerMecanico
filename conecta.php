<?php
function conectar(){
    $bd = mysqli_connect("localhost","root","","taller");
    if (!$bd){
        echo "<h3>Conexión no realizada<h3>";
        return NULL;
    }
    return $bd;
}
?>