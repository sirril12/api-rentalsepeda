<?php

if ($_SERVER['REQUEST_METHOD'] =='POST'){

    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $noktp = $_POST['noktp'];
    $notlp = $_POST['notlp'];
    $alamat = $_POST['alamat'];

    // $password = password_hash($password, PASSWORD_DEFAULT);

    require_once 'connect.php';

    $sql = "INSERT INTO tbuser (username, password, email, noktp, nohp, alamat, roleuser) VALUES ('$username','$password','$email','$noktp','$notlp','$alamat','customer')";


    if( mysqli_query($conn, $sql) ) {
        $result["success"] = "1";
        $result["message"] = "success";

        echo json_encode($result);
        mysqli_close($conn);

    } else {

        $result["success"] = "0";
        $result["message"] = "error";

        echo json_encode($result);
        mysqli_close($conn);
    }
}

?>
