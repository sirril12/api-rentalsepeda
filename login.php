<?php

if ($_SERVER['REQUEST_METHOD']=='POST') {

    $email = $_POST['email'];
    $password = $_POST['password'];

    require_once 'connect.php';

    $sql = "SELECT * FROM tbuser WHERE email='$email'";

    $response = mysqli_query($conn, $sql);

    $result = array();
    $result['login'] = array();

    if ( mysqli_num_rows($response) === 1 ) {

        $row = mysqli_fetch_assoc($response);

        if ($password === $row['password']) {

            $index['id'] = $row['id'];
            $index['username'] = $row['username'];
            $index['email'] = $row['email'];
            $index['roleuser'] = $row['roleuser'];
            $index['noktp'] = $row['noktp'];
            $index['notlp'] = $row['nohp'];
            $index['alamat'] = $row['alamat'];

            array_push($result['login'], $index);

            $result['success'] = "1";
            $result['message'] = "success";
            echo json_encode($result);

            mysqli_close($conn);

        } else {

            $result['success'] = "0";
            $result['message'] = "error";
            echo json_encode($result);

            mysqli_close($conn);

        }

    }

}

?>
