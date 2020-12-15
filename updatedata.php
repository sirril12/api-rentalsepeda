<?php

if ($_SERVER['REQUEST_METHOD'] =='POST'){
    $id = $_POST['id'];
    $namasepeda = $_POST['namasepeda'];
    $kodesepeda = $_POST['kodesepeda'];
    $merksepeda = $_POST['merksepeda'];
    $jenissepeda = $_POST['jenissepeda'];
    $warnasepeda = $_POST['warnasepeda'];
		$hargasewa = $_POST['hargasewa'];
    // $filename = $_FILES['gambarsepeda']['name'];
    //
    // $filetmpname = $_FILES['gambarsepeda']['tmp_name'];

			// FOLDER DIMANA GAMBAR AKAN DI SIMPAN
			// $folder = 'img/';
			// GAMBAR DI SIMPAN KE DALAM FOLDER
			// move_uploaded_file($filetmpname, $folder . $filename);

    require_once 'connect.php';

    $sql = "UPDATE tbsepeda SET namasepeda='$namasepeda',kodesepeda='$kodesepeda',jenissepeda='$jenissepeda',merksepeda='$merksepeda', warnasepeda='$warnasepeda',hargasewa='$hargasewa' WHERE id = '$id'";


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
