<?php
include "connect.php";  //menyambungkan ke database

if($_SERVER['REQUEST_METHOD']=='GET') {

//inisialiasi query READ
  $query = "SELECT * FROM tbsepeda ORDER BY kodesepeda";
 $sql = mysqli_query($conn, $query);//pemanggilan fungsi mysqli_query untuk mengirimkan perintah sesuai parameter yang diisi
  $result = array(); //inisialisasi array dengan variabel $result

  while($row = mysqli_fetch_array($sql)){
    array_push($result, array(
    	'id'=>$row[0],
    	'namasepeda'=>$row[1],
      'kodesepeda'=>$row[2],
    	'merksepeda'=>$row[3],
    	'jenissepeda'=>$row[4],
    	'warnasepeda'=>$row[5],
    	'hargasewa'=>$row[6],
    	'gambarsepeda'=>$row[7],
    ));
  }//melakukan pengulangan dengan while untuk membaca seluruh data pada tabel mahasiswa, dan disimpan didalam row/baris. urutan row harus sesuai urutan pada database
  echo json_encode($result); //mengeluarkan data dalam bentuk json
  mysqli_close($conn);
//tutup koneksi
}
?>
