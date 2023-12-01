<?php
require 'koneksi.php';
$input = file_get_contents('php://input');
$data = json_decode($input,true);
//terima data dari mobile
$nama=trim($data['nama']);
$stok=trim($data['stok']);
$supplier=trim($data['supplier']);
http_response_code(201);
if($nama!='' and $stok!='' and $supplier!=''){
 $query = mysqli_query($koneksi,"insert into barang(nama, stok, supplier) values('$nama','$stok','$supplier')");
 $pesan = true;
}else{
 $pesan = false;
}
echo json_encode($pesan);
echo mysqli_error($koneksi);