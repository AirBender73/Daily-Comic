<?php
    session_start();

    include 'conexion.php';

    $username=$_POST['username'];
    $password=$_POST['password'];

    $consulta="select * from usuarios where username='$username'";
    $usuarios=mysqli_query($conexion,$consulta);
    $nfilas=mysqli_num_rows($usuarios);
    
    if($nfilas>0)
    {
        while($rusuarios=mysqli_fetch_array($usuarios))
        {
            $bduser=$rusuarios['username'];
            $bdpass=$rusuarios['password'];
            $id_usuario=$rusuarios['id'];
        }
        mysqli_close($conexion);
        
        //$_SESSION['username']=$username;
        //$_SESSION['password']=$password;
        
        
            if($password == $bdpass){
                
                $_SESSION['username'] = $username;
                $_SESSION['id_usuario'] = $id_usuario;
                //$_SESSION['password'] = $password;
                
                echo "<script>window.location='menu_admin.php?.session_id()'</script>";
            }else{
                echo "Contraseña erronea";
            }
            
        
    }
    
    else
    {
        mysqli_close($conexion);
        echo "<script>window.location='mensaje.php'</script>";
        session_destroy();
    }
?>