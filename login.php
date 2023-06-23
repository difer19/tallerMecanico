<?php 
    session_start();
    include("conecta.php");
    $bd = conectar();
    
    $usuario = $_REQUEST["username"];
    $password = $_REQUEST["password"];
    
    $sql = "select * from usuarios where nomusu='$usuario'";
    $res = mysqli_query($bd,$sql);

    
    if (!$res){
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>Error</strong><br>La cedula registrada ya existe!!.
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
        </button></div>";
    }
    else{
        $c=0;
        while($arr = mysqli_fetch_array($res)){
            if ($password==$arr[2]) {
                $_SESSION["username"] = $usuario;
                $_SESSION["role"] = $arr["rol"];
                echo $arr[3];
                if ($arr[3] == "M") {
                    header("Location: mecanico.php");
                  } elseif ($arr[3] == "A") {
                    header("Location: almacenista.php");
                  } elseif ($arr[3] == "F") {
                    header("Location: facturador.php");
                  }
                  echo "si entra";
            }else{
                echo $usuario;
                echo $password;
                echo "Contraseña incorrecta.";
            }
            echo "</tr>";
            $c++;
        }
        mysqli_close($bd);
    }
?>