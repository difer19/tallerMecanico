<?php
function conectar(){
    $bd = mysqli_connect("3.218.220.245","taller","123","taller");
    if (!$bd){
        echo "<h3>Conexión no realizada<h3>";
        return NULL;
    }
    return $bd;
}
?>