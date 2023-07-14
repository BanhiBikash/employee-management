<?php
    define('server','localhost');
    define('username','root');
    define('password','');
    define('database','COMPANYDB');

    $conn=mysqli_connect(server,username,password,database);

    if($conn === false)
    {
        echo"Couldn't connect to server!Check config.php".mysqli_connect_error();
        die;
    }
?>