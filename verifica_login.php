<?php
    include("./include/inicia_conexion.php");

    session_start();

    $usuario_valido = 0;

    /* SQL injection: si en la clave se mandan ' para cortar el sql
     y agregar algo más en la consulta como or 1=1, que lo haría 
     siempre verdadero*/

     //solución:

    
    /*$clave = str_replace("'", "\'", $_POST["password"]);
    $email = str_replace("'", "\'", $_POST["correo"]);
    $sql = "select count(*) as contador from usuarios_sistema";
    $sql = $sql ." where email = '" .$_POST["correo"] . "'";
    $sql = $sql ." and clave = '" .$_POST["password"] . "'";

    echo $sql;
    $resultado = mysqli_query($conexion, $sql);


    while ($fila = mysqli_fetch_array($resultado)){
        $usuario_valido = $fila["contador"];
    }
    mysqli_free_result($resultados);*/

     //otra forma:
        
    
    $sql = "select count(*) as contador from usuarios where email = ? and password = md5(?)" ;
    $stmt = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $_POST["email"], $_POST["password"]);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $contador);
    while(mysqli_stmt_fetch($stmt)){
        $usuario_valido = $contador;
    }
    mysqli_stmt_close($stmt);
    if ($usuario_valido != 0){
        $_SESSION['usuario_valido'] = "1";
        $_SESSION['email_usuario'] = $_POST['email'];
        header('Location: menu.php');
        echo "usuario valido";
    }else{
        session_destroy();
        header('Location: index.php?error=1');
        echo "usuario no valido";
    }


    /*
    if ($_POST['correo']=='juan@gmail.com' && $_POST['password']=='54321'){
        //echo "login exitoso";
        
        $_SESSION['usuario_valido'] = "1";
        $_SESSION['email_usuario'] = $_POST['correo'];
        header('Location: menu.php');
    }else{
        session_destroy();
        header('Location: index.php?error=1');
    } 
    */

?>