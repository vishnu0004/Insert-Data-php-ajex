<?php 
    include('../config/config.php');

    $name = $_POST['name'];
    $email = $_POST['email'];

    $insert = "insert into user (name,email) values('$name','$email')";

    $result = $conn->query($insert);

    if($result){
        echo 1;
    }else{
        echo 0;
    }
    
    ?>      