<?php
    $con = mysqli_connect("localhost", 'root', "", "","3307");

    if(mysqli_connect_errno()){
        printf("Erro conexão: %s \n", mysqli_connect_error());
        exit();
    }
?>
