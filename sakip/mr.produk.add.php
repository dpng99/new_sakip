<LINK href="images/index.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
    function refreshAndClose() {
        window.opener.location.reload(true);
        window.close();
    }
</script>
<body onbeforeunload="refreshAndClose();">
<?php
include("mr.db.1.php");
$do1 = $_POST['do'];

//----------------------------MR1--------------------------->>>
if ($do1 == "tapkinerja"){
$idsatker1 = $_POST['idsatker'];
$session1 = $_POST['session'];
$tables = "sinori_sakip_penetapan";
$a1 = $_POST['tahun'];
$a2 = $_POST['bidang'];
$a3 = $_POST['saspro'];
$a4 = $_POST['sasaran'];
$a5 = $_POST['target'];
$indikator1 = $_POST['indikator'];
 if ($indikator1  == "sinori_sakip_indikator") {
$isi1 = "lag";
} 
elseif ($indikator1 == "sinori_sakip_ranpnidx") {
$isi1 = "led";
} 
$a6 = date("j/m/Y g:i A");
$error = "";
if ($a1 == ""){$error = "TAHUN HARUS DIPILIH<BR>";}
if ($a2 == ""){$error = "BIDANG HARUS DIPILIH<BR>";}
if ($a3 == ""){$error = "SASARAN PROGRAM DAN KEGIATAN HARUS DIPILIH<BR>";}
if ($a4 == ""){$error = "INDIKATOR SASARAN WAJI DIPILIH<BR>";}
if ($a5 == ""){$error = "PENETAPAN TARGET WAJIB DI ISI<BR>";}
if ($idsatker1 == ""){$error = "DITEMUKAN ERROR HARAP HUBUNGI ADMIN / PENGELOLA APLIKASI DI PUSAT<BR>";}
$conn = new mysqli($server, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($error == ""){
$sql = "INSERT INTO $tables (id_satker, id_tahun, id_bidang, id_saspro,  id_indikator, id_tipe, id_target, id_tglpenetapan) VALUES  ('$idsatker1','$a1','$a2','$a3','$a4','$isi1','$a5','$a6')";
if ($conn->query($sql) === TRUE) {
    echo "<br><br><p><center>PENETAPAN KINERJA TELAH BERHASIL DISIMPAN, CEK HASIL PADA HALAMAN INPUT</p><br><br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
}
else
{
echo "$error.";
}}
///--END
if ($do1 == "aturapip"){
$idsatker1 = $_POST['idsatker'];
$session1 = $_POST['session'];

$a1 = $_POST['nama'];
$a2 = $_POST['nip'];
$a3 = $_POST['pangkat'];
$a4 = $_POST['satker'];
$a5 = $_POST['jabatan'];
//$a6 = date("j/m/Y g:i A");
$error = "";
if ($a1 == ""){$error = "ISIKAN NAMA<BR>";}
if ($a2 == ""){$error = "ISIKAN NIP<BR>";}
if ($a3 == ""){$error = "PILIH PANGKAT<BR>";}
if ($a4 == ""){$error = "PILIH SATKER<BR>";}
if ($idsatker1 == ""){$error = "DITEMUKAN ERROR HARAP HUBUNGI ADMIN / PENGELOLA APLIKASI DI PUSAT<BR>";}
include("mr.db.php");
$conn = new mysqli($server, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($error == ""){
$sql = "INSERT INTO sinori_sakip_apip (id_satker, id_nama, id_nip, id_pangkat, id_jabatan) VALUES  ('$a4','$a1','$a2','$a3','$a5')";
if ($conn->query($sql) === TRUE) {
    echo "<br><br><p><center>PROSES PENAMBAHAN PERSONIL APIP BERHASIL. SILAHKAN TUTUP JENDELA INI</p><br><br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
}
else
{
echo "$error.";
}}
///--END
//--------------------MR2---------------------------------------->>>>>>>>>>>>>>>
if ($do1 == "mr2"){
$idsatker1 = $_POST['idsatker'];
$session1 = $_POST['session'];
$table1 = $_POST['tab'];
$tables = "mr_".$table1;
$b1 = $_POST['b1'];
$b2 = $_POST['b2'];
$b31 = $_POST['b31'];
$b32 = $_POST['b32'];
$b41 = $_POST['b41'];
$b42 = $_POST['b42'];
$b43 = $_POST['b43'];
$b51 = $_POST['b51'];
$b52 = $_POST['b52'];
$b6 = $_POST['b6'];
$b7 = $_POST['b7'];
$con1 = $_POST['con'];
$error = "";
if ($b1 == ""){$error = "Kolom B1 harus terisi<BR>";}
if ($b2 == ""){$error = "Kolom B2 harus terisi<BR>";}
if ($b31 == ""){$error = "Kolom B31 harus terisi<BR>";}
if ($b32 == ""){$error = "Kolom B32 harus terisi<BR>";}
if ($b41 == ""){$error = "Kolom B41 harus terisi<BR>";}
if ($b42 == ""){$error = "Kolom B42 harus terisi<BR>";}
if ($b43 == ""){$error = "Kolom B43 harus terisi<BR>";}
if ($b51 == ""){$error = "Kolom B51 harus terisi<BR>";}
if ($b52 == ""){$error = "Kolom B52 harus terisi<BR>";}
if ($b6 == ""){$error = "Kolom B6 harus terisi<BR>";}
if ($b7 == ""){$error = "Kolom B7 harus terisi<BR>";}
if ($idsatker1 == ""){$error = "DITEMUKAN ERROR HARAP HUBUNGI ADMIN / PENGELOLA APLIKASI DI PUSAT<BR>";}
if ($con1 == ""){$error = "DITEMUKAN ERROR HARAP HUBUNGI ADMIN / PENGELOLA APLIKASI DI PUSAT<BR>";}
$conn = new mysqli($server, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($error == ""){
$sql = "INSERT INTO $tables (satkerid, con, B1, B2, B31, B32, B41, B42, B43, B51, B52, B6, B7) VALUES  ('$idsatker1','$con1','$b1','$b2','$b31','$b32','$b41','$b42','$b43','$b51','$b52','$b6','$b7')";
if ($conn->query($sql) === TRUE) {
    echo "<br><br><p><center>SUDAH TERSIMPAN SILAHKAN TUTUP JENDELA INI</p><br><br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
}
else
{
echo "$error.";
}}
///--END
//--------------------MR3---------------------------------------->>>>>>>>>>>>>>>
if ($do1 == "mr3"){
$idsatker1 = $_POST['idsatker'];
$session1 = $_POST['session'];
$table1 = $_POST['tab'];
$tables = "mr_".$table1;
$c1 = $_POST['c1'];
$c21 = $_POST['c21'];
//$c22 = $_POST['c22'];
$c31 = $_POST['c31'];
//$c32 = $_POST['c32'];
//$c5 = $_POST['c5'];
$con1 = $_POST['con'];
$error = "";
if ($c1 == ""){$error = "Kolom C1 harus terisi<BR>";}
if ($c21 == ""){$error = "Kolom C21 harus terisi<BR>";}
//if ($c22 == ""){$error = "Kolom C22 harus terisi<BR>";}
if ($c31 == ""){$error = "Kolom C31 harus terisi<BR>";}
//if ($c32 == ""){$error = "Kolom C32 harus terisi<BR>";}
//if ($c5 == ""){$error = "Kolom C5 harus terisi<BR>";}
if ($idsatker1 == ""){$error = "DITEMUKAN ERROR HARAP HUBUNGI ADMIN / PENGELOLA APLIKASI DI PUSAT<BR>";}
if ($con1 == ""){$error = "DITEMUKAN ERROR HARAP HUBUNGI ADMIN / PENGELOLA APLIKASI DI PUSAT<BR>";}
$conn = new mysqli($server, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($error == ""){
$c4 = $c21*$c31 ;
$sql = "INSERT INTO $tables (satkerid, con, C1, C21, C22, C31, C32, C4, C5) VALUES  ('$idsatker1','$con1','$c1','$c21','$c21','$c31','$c31','$c4','$c4')";
if ($conn->query($sql) === TRUE) {
    echo "<br><br><p><center>SUDAH TERSIMPAN SILAHKAN TUTUP JENDELA INI</p><br><br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
}
else
{
echo "$error.";
}}
///--END
//--------------------MR4---------------------------------------->>>>>>>>>>>>>>>
if ($do1 == "mr4"){
$idsatker1 = $_POST['idsatker'];
$session1 = $_POST['session'];
$table1 = $_POST['tab'];
$tables = "mr_".$table1;
$d1 = $_POST['d1'];
$d2 = $_POST['d2'];
$d3 = $_POST['d3'];
$d4 = $_POST['d4'];
$d51 = $_POST['d51'];
$d52 = $_POST['d52'];
$con1 = $_POST['con'];
$error = "";
if ($d1 == ""){$error = "Kolom D1 harus terisi<BR>";}
if ($d2 == ""){$error = "Kolom D2 harus terisi<BR>";}
if ($d3 == ""){$error = "Kolom D3 harus terisi<BR>";}
if ($d4 == ""){$error = "Kolom D4 harus terisi<BR>";}
if ($d51 == ""){$error = "Kolom D.5.1 harus terisi<BR>";}
if ($d52 == ""){$error = "Kolom D.5.2 harus terisi<BR>";}
if ($idsatker1 == ""){$error = "DITEMUKAN ERROR HARAP HUBUNGI ADMIN / PENGELOLA APLIKASI DI PUSAT<BR>";}
if ($con1 == ""){$error = "DITEMUKAN ERROR HARAP HUBUNGI ADMIN / PENGELOLA APLIKASI DI PUSAT<BR>";}
$conn = new mysqli($server, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($error == ""){

$sql = "INSERT INTO $tables (satkerid, con, D1, D2, D3, D4, D51, D52) VALUES  ('$idsatker1','$con1','$d1','$d2','$d3','$d4','$d51','$d52')";
if ($conn->query($sql) === TRUE) {
    echo "<br><br><p><center>SUDAH TERSIMPAN SILAHKAN TUTUP JENDELA INI</p><br><br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
}
else
{
echo "$error.";
}}
///--END
//--------------------MR5---------------------------------------->>>>>>>>>>>>>>>
if ($do1 == "mr5"){
$idsatker1 = $_POST['idsatker'];
$session1 = $_POST['session'];
$table1 = $_POST['tab'];
$tables = "mr_".$table1;
$e11 = $_POST['e11'];
$e12 = $_POST['e12'];
$e2 = $_POST['e2'];
$e3 = $_POST['e3'];
$e41 = $_POST['e41'];
$e42 = $_POST['e42'];
$e5 = $_POST['e5'];
$e6 = $_POST['e6'];
$e7 = $_POST['e7'];

$con1 = $_POST['con'];
$error = "";
if ($e11 == ""){$error = "Kolom E11 harus terisi<BR>";}
if ($e12 == ""){$error = "Kolom E12 harus terisi<BR>";}
if ($e2 == ""){$error = "Kolom E2 harus terisi<BR>";}
if ($e3 == ""){$error = "Kolom E3 harus terisi<BR>";}
if ($e41 == ""){$error = "Kolom E41 harus terisi<BR>";}
if ($e42 == ""){$error = "Kolom E42 harus terisi<BR>";}
if ($e5 == ""){$error = "Kolom E5 harus terisi<BR>";}
if ($e6 == ""){$error = "Kolom E6 harus terisi<BR>";}
if ($e7 == ""){$error = "Kolom E7 harus terisi<BR>";}

if ($idsatker1 == ""){$error = "DITEMUKAN ERROR HARAP HUBUNGI ADMIN / PENGELOLA APLIKASI DI PUSAT<BR>";}
if ($con1 == ""){$error = "DITEMUKAN ERROR HARAP HUBUNGI ADMIN / PENGELOLA APLIKASI DI PUSAT<BR>";}
$conn = new mysqli($server, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($error == ""){

$sql = "INSERT INTO $tables (satkerid, con, E11, E12, E2, E3, E41, E42, E5, E6, E7) VALUES  ('$idsatker1','$con1','$e11','$e12','$e2','$e3','$e41','$e42','$e5','$e6','$e7')";
if ($conn->query($sql) === TRUE) {
    echo "<br><br><p><center>SUDAH TERSIMPAN SILAHKAN TUTUP JENDELA INI</p><br><br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
}
else
{
echo "$error.";
}}
///--END
//--------------------MR6---------------------------------------->>>>>>>>>>>>>>>
if ($do1 == "mr6"){
$idsatker1 = $_POST['idsatker'];
$session1 = $_POST['session'];
$table1 = $_POST['tab'];
$tables = "mr_".$table1;
$f1 = $_POST['f1'];
$f21 = $_POST['f21'];
$f22 = $_POST['f22'];
$f23 = $_POST['f23'];
//$f24 = $_POST['f24'];
$f31 = $_POST['f31'];
$f32 = $_POST['f32'];
//$f33 = $_POST['f33'];
//$f34 = $_POST['f34'];
$f4 = $_POST['f4'];
$f5 = $_POST['f5'];
$con1 = $_POST['con'];
$error = "";
if ($f1 == ""){$error = "Kolom F1 harus terisi<BR>";}
if ($f22 == ""){$error = "Kolom F22 harus terisi<BR>";}
if ($f23 == ""){$error = "Kolom F23 harus terisi<BR>";}
//if ($f24 == ""){$error = "Kolom F24 harus terisi<BR>";}
if ($f31 == ""){$error = "Kolom F31 harus terisi<BR>";}
if ($f32 == ""){$error = "Kolom F32 harus terisi<BR>";}
//if ($f33 == ""){$error = "Kolom F33 harus terisi<BR>";}
//if ($f34 == ""){$error = "Kolom F34 harus terisi<BR>";}
if ($f4 == ""){$error = "DITEMUKAN ERROR HARAP HUBUNGI ADMIN / PENGELOLA APLIKASI DI PUSAT (F4)<BR><BR>";}
if ($f5 == ""){$error = "Kolom F5 harus terisi<BR>";}
if ($idsatker1 == ""){$error = "DITEMUKAN ERROR HARAP HUBUNGI ADMIN / PENGELOLA APLIKASI DI PUSAT<BR>";}
if ($con1 == ""){$error = "DITEMUKAN ERROR HARAP HUBUNGI ADMIN / PENGELOLA APLIKASI DI PUSAT<BR>";}
$conn = new mysqli($server, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($error == ""){
$f24 = $f23/$f22*100;

$f33 = $f24*$f32;
$f4 = $f33*$f4;
$f34 = $f24;
//$fangka=round($f33/$f32 * 100,2);
//$f34 = number_format($fangka,0,"",".");
$sql = "INSERT INTO $tables (satkerid, con, F1, F21, F22, F23, F24, F31, F32, F33, F34, F4, F5) VALUES  ('$idsatker1','$con1','$f1','$f21','$f22','$f23','$f24','$f31','$f32','$f33','$f34','$f4','$f5')";
mysqli_query($conn, "UPDATE mr_a Set hide = '2' where satkerid = '$idsatker1' and id = '$con1'");
mysqli_query($conn, "UPDATE mr_b Set hide = '2' where satkerid = '$idsatker1' and con = '$con1'");
mysqli_query($conn, "UPDATE mr_c Set hide = '2' where satkerid = '$idsatker1' and con = '$con1'");
mysqli_query($conn, "UPDATE mr_d Set hide = '2' where satkerid = '$idsatker1' and con = '$con1'");
mysqli_query($conn, "UPDATE mr_e Set hide = '2' where satkerid = '$idsatker1' and con = '$con1'");
mysqli_query($conn, "UPDATE mr_f Set hide = '2' where satkerid = '$idsatker1' and con = '$con1'");
if ($conn->query($sql) === TRUE) {
    echo "<br><br><p><center>SUDAH TERSIMPAN SILAHKAN TUTUP JENDELA INI</p><br><br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
}
else
{
echo "$error.";
}}
///--END
//--------------------DELETE---------------------------------------->>>>>>>>>>>>>>>
if ($do1 == "delete"){
$idsatker1 = $_POST['idsatker'];
$session1 = $_POST['session'];
$con1 = $_POST['con'];
$error = "";
if ($idsatker1 == ""){$error = "DITEMUKAN ERROR HARAP HUBUNGI ADMIN / PENGELOLA APLIKASI DI PUSAT<BR>";}
if ($con1 == ""){$error = "DITEMUKAN ERROR HARAP HUBUNGI ADMIN / PENGELOLA APLIKASI DI PUSAT<BR>";}
$conn = new mysqli($server, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($error == ""){


mysqli_query($conn, "UPDATE mr_a Set hide = '3' where satkerid = '$idsatker1' and id = '$con1'");
mysqli_query($conn, "UPDATE mr_b Set hide = '3' where satkerid = '$idsatker1' and con = '$con1'");
mysqli_query($conn, "UPDATE mr_c Set hide = '3' where satkerid = '$idsatker1' and con = '$con1'");
mysqli_query($conn, "UPDATE mr_d Set hide = '3' where satkerid = '$idsatker1' and con = '$con1'");
mysqli_query($conn, "UPDATE mr_e Set hide = '3' where satkerid = '$idsatker1' and con = '$con1'");
mysqli_query($conn, "UPDATE mr_f Set hide = '3' where satkerid = '$idsatker1' and con = '$con1'");



    echo "<br><br><p><center>SUDAH TERHAPUS SILAHKAN TUTUP JENDELA INI</p><br><br>";

$conn->close();
}
else
{
echo "$error.";
}}
///--END--------------------------------------------------------------
if ($do1 == "renstra"){
date_default_timezone_set('Asia/Jakarta');
$idsatker1 = $_POST['idsatker'];
$session1 = $_POST['session'];
$periode1 = $_POST["periode"];
$perubahan1 = $_POST["perubahan"];
$tglupload1 = date("j/m/Y g:i A");
$error = "";
if ($idsatker1 == ""){$error = "DITEMUKAN ERROR HARAP HUBUNGI ADMIN / PENGELOLA APLIKASI DI PUSAT<BR>";}
if ($periode1 == ""){$error = "Periode Produk wajib dipilih<BR>";}
if ($perubahan1 == ""){$error = "Tipe upload wajib di pilih<BR>";}
if ($error == ""){
include("mr.db.php");
$allowed = array('pdf');
if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0){
	$extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);
	if(!in_array(strtolower($extension), $allowed)){
		echo '{"status":"error"}';
		exit;
	}
$special = array('/','!','&','*',' ','-','_','+','|','.');
$nomornew = str_replace($special,'',$nomor);
$filename1 = "renstra_".$periode1."_".$perubahan1.".pdf";
$path = "repository/".$idsatker1."/".$filename1;
//----------------cek file


if (file_exists($path)) {
  print ('The file Ke- '.$perubahan1.' exists, file tidak bisa diupload pilihi opsi pembetulan');
} else {

if(move_uploaded_file($_FILES['upl']['tmp_name'], $path)){
$link = mysqli_connect("$server","$username","$password","$database") or die(mysqli_error());
//$sql = "UPDATE sinori_sakip_keputusan Set id_filename = '$filename', id_periode = '$periode1', id_perubahan = '$perubahan1' , id_tglupload = '$perubahan1'  where id_satker = '$idsatker1'";  
$sql = "INSERT INTO sinori_sakip_renstra (id_satker, id_periode, id_perubahan, id_filename, id_tglupload) VALUES ('$idsatker1','$periode1','$perubahan1','$filename1','$tglupload1')";  


if (mysqli_query($link, $sql)) {
      echo "File Berhasil di Upload. Silahkan tutup jendela ini dan tunggu refresh halaman";
   } else {
      echo "Error updating record: " . mysqli_error($link);
   }
   mysqli_close($link);
	}
}
exit;
}
else
{
echo "$error.";
}}
///--------
}
//---end cek file
///--END--------------------------------------------------------------
if ($do1 == "renja"){
date_default_timezone_set('Asia/Jakarta');
$idsatker1 = $_POST['idsatker'];
$session1 = $_POST['session'];
$periode1 = $_POST["periode"];
$perubahan1 = $_POST["perubahan"];
$tglupload1 = date("j/m/Y g:i A");
$error = "";
if ($idsatker1 == ""){$error = "DITEMUKAN ERROR HARAP HUBUNGI ADMIN / PENGELOLA APLIKASI DI PUSAT<BR>";}
if ($periode1 == ""){$error = "Tahun Produk wajib dipilih<BR>";}
if ($perubahan1 == ""){$error = "Tipe upload wajib di pilih<BR>";}
if ($error == ""){
include("mr.db.php");
$allowed = array('pdf');
if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0){
	$extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);
	if(!in_array(strtolower($extension), $allowed)){
		echo '{"status":"error"}';
		exit;
	}
$special = array('/','!','&','*',' ','-','_','+','|','.');
$nomornew = str_replace($special,'',$nomor);
$filename1 = "renja_".$periode1."_".$perubahan1.".pdf";
$path = "repository/".$idsatker1."/".$filename1;
//----------------cek file


if (file_exists($path)) {
  print ('The file Ke- '.$perubahan1.' exists, file tidak bisa diupload pilihi opsi pembetulan');
} else {

if(move_uploaded_file($_FILES['upl']['tmp_name'], $path)){
$link = mysqli_connect("$server","$username","$password","$database") or die(mysqli_error());
//$sql = "UPDATE sinori_sakip_keputusan Set id_filename = '$filename', id_periode = '$periode1', id_perubahan = '$perubahan1' , id_tglupload = '$perubahan1'  where id_satker = '$idsatker1'";  
$sql = "INSERT INTO sinori_sakip_renja (id_satker, id_periode, id_perubahan, id_filename, id_tglupload) VALUES ('$idsatker1','$periode1','$perubahan1','$filename1','$tglupload1')";  


if (mysqli_query($link, $sql)) {
      echo "File Berhasil di Upload. Silahkan tutup jendela ini dan tunggu refresh halaman";
   } else {
      echo "Error updating record: " . mysqli_error($link);
   }
   mysqli_close($link);
	}
}
exit;
}
else
{
echo "$error.";
}}
///--------
}
//---end cek file
///--END--------------------------------------------------------------
if ($do1 == "renaksi"){
date_default_timezone_set('Asia/Jakarta');
$idsatker1 = $_POST['idsatker'];
$session1 = $_POST['session'];
$periode1 = $_POST["periode"];
$perubahan1 = $_POST["perubahan"];
$tglupload1 = date("j/m/Y g:i A");
$error = "";
if ($idsatker1 == ""){$error = "DITEMUKAN ERROR HARAP HUBUNGI ADMIN / PENGELOLA APLIKASI DI PUSAT<BR>";}
if ($periode1 == ""){$error = "Tahun Produk wajib dipilih<BR>";}
if ($perubahan1 == ""){$error = "Tipe upload wajib di pilih<BR>";}
if ($error == ""){
include("mr.db.php");
$allowed = array('pdf');
if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0){
	$extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);
	if(!in_array(strtolower($extension), $allowed)){
		echo '{"status":"error"}';
		exit;
	}
$special = array('/','!','&','*',' ','-','_','+','|','.');
$nomornew = str_replace($special,'',$nomor);
$filename1 = "renaksi_".$periode1."_".$perubahan1.".pdf";
$path = "repository/".$idsatker1."/".$filename1;
//----------------cek file


if (file_exists($path)) {
  print ('The file Ke- '.$perubahan1.' exists, file tidak bisa diupload pilihi opsi pembetulan');
} else {

if(move_uploaded_file($_FILES['upl']['tmp_name'], $path)){
$link = mysqli_connect("$server","$username","$password","$database") or die(mysqli_error());
//$sql = "UPDATE sinori_sakip_keputusan Set id_filename = '$filename', id_periode = '$periode1', id_perubahan = '$perubahan1' , id_tglupload = '$perubahan1'  where id_satker = '$idsatker1'";  
$sql = "INSERT INTO sinori_sakip_renaksi (id_satker, id_periode, id_perubahan, id_filename, id_tglupload) VALUES ('$idsatker1','$periode1','$perubahan1','$filename1','$tglupload1')";  


if (mysqli_query($link, $sql)) {
      echo "File Berhasil di Upload. Silahkan tutup jendela ini dan tunggu refresh halaman";
   } else {
      echo "Error updating record: " . mysqli_error($link);
   }
   mysqli_close($link);
	}
}
exit;
}
else
{
echo "$error.";
}}
///--------
}
//---end cek file
///--END--------------------------------------------------------------
if ($do1 == "renaksieval"){
date_default_timezone_set('Asia/Jakarta');
$idsatker1 = $_POST['idsatker'];
$session1 = $_POST['session'];
$periode1 = $_POST["periode"];
$triwulan1 = $_POST["triwulan"];
$perubahan1 = $_POST["perubahan"];
$tglupload1 = date("j/m/Y g:i A");
$error = "";
if ($idsatker1 == ""){$error = "DITEMUKAN ERROR HARAP HUBUNGI ADMIN / PENGELOLA APLIKASI DI PUSAT<BR>";}
if ($periode1 == ""){$error = "Tahun Produk wajib dipilih<BR>";}
if ($triwulan1 == ""){$error = "Triwulan Laporan wajib di pilih<BR>";}
if ($perubahan1 == ""){$error = "Tipe upload wajib di pilih<BR>";}
if ($error == ""){
include("mr.db.php");
$allowed = array('pdf');
if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0){
	$extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);
	if(!in_array(strtolower($extension), $allowed)){
		echo '{"status":"error"}';
		exit;
	}
$special = array('/','!','&','*',' ','-','_','+','|','.');
$nomornew = str_replace($special,'',$nomor);
$filename1 = "renaksieval_".$periode1."_".$perubahan1.".pdf";
$path = "repository/".$idsatker1."/".$filename1;
//----------------cek file


if (file_exists($path)) {
  print ('The file Ke- '.$perubahan1.' exists, file tidak bisa diupload pilihi opsi pembetulan');
} else {

if(move_uploaded_file($_FILES['upl']['tmp_name'], $path)){
$link = mysqli_connect("$server","$username","$password","$database") or die(mysqli_error());
//$sql = "UPDATE sinori_sakip_keputusan Set id_filename = '$filename', id_periode = '$periode1', id_perubahan = '$perubahan1' , id_tglupload = '$perubahan1'  where id_satker = '$idsatker1'";  
$sql = "INSERT INTO sinori_sakip_renaksieval (id_satker, id_triwulan, id_periode, id_perubahan, id_filename, id_tglupload) VALUES ('$idsatker1','$triwulan1','$periode1','$perubahan1','$filename1','$tglupload1')";  


if (mysqli_query($link, $sql)) {
      echo "File Berhasil di Upload. Silahkan tutup jendela ini dan tunggu refresh halaman";
   } else {
      echo "Error updating record: " . mysqli_error($link);
   }
   mysqli_close($link);
	}
}
exit;
}
else
{
echo "$error.";
}}
///--------
}
//---end cek file
///--END--------------------------------------------------------------
if ($do1 == "dipa"){
date_default_timezone_set('Asia/Jakarta');
$idsatker1 = $_POST['idsatker'];
$session1 = $_POST['session'];
$periode1 = $_POST["periode"];
$perubahan1 = $_POST["perubahan"];
$total1 = $_POST["total"];
$yankum1 = $_POST["yankum"];
$dukma1 = $_POST["dukma"];
$tglupload1 = date("j/m/Y g:i A");
$error = "";
if ($idsatker1 == ""){$error = "DITEMUKAN ERROR HARAP HUBUNGI ADMIN / PENGELOLA APLIKASI DI PUSAT<BR>";}
if ($periode1 == ""){$error = "Tahun Produk wajib dipilih<BR>";}
if ($perubahan1 == ""){$error = "Tipe upload wajib di pilih<BR>";}
if ($error == ""){
include("mr.db.php");
$allowed = array('pdf');
if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0){
	$extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);
	if(!in_array(strtolower($extension), $allowed)){
		echo '{"status":"error"}';
		exit;
	}
$special = array('/','!','&','*',' ','-','_','+','|','.');
$nomornew = str_replace($special,'',$nomor);
$filename1 = "dipa_".$periode1."_".$perubahan1.".pdf";
$path = "repository/".$idsatker1."/".$filename1;
//----------------cek file


if (file_exists($path)) {
  print ('File Dipa Tahun '.$periode1.' Ke- '.$perubahan1.' exists, file tidak bisa diupload pilihi opsi pembetulan');
} else {

if(move_uploaded_file($_FILES['upl']['tmp_name'], $path)){
$link = mysqli_connect("$server","$username","$password","$database") or die(mysqli_error());
//$sql = "UPDATE sinori_sakip_keputusan Set id_filename = '$filename', id_periode = '$periode1', id_perubahan = '$perubahan1' , id_tglupload = '$perubahan1'  where id_satker = '$idsatker1'";  
$sql = "INSERT INTO sinori_sakip_dipa (id_satker, id_periode, id_perubahan, id_filename, id_tglupload,id_pagu ,id_gakyankum,id_dukman) VALUES ('$idsatker1','$periode1','$perubahan1','$filename1','$tglupload1','$total1','$yankum1','$dukma1')";  


if (mysqli_query($link, $sql)) {
      echo "File Berhasil di Upload. Silahkan tutup jendela ini dan tunggu refresh halaman";
   } else {
      echo "Error updating record: " . mysqli_error($link);
   }
   mysqli_close($link);
	}
}
exit;
}
else
{
echo "$error.";
}}
///--------
}
//---end cek file
///--END--------------------------------------------------------------
if ($do1 == "rkakl"){
date_default_timezone_set('Asia/Jakarta');
$idsatker1 = $_POST['idsatker'];
$session1 = $_POST['session'];
$periode1 = $_POST["periode"];
$perubahan1 = $_POST["perubahan"];
$tglupload1 = date("j/m/Y g:i A");
$error = "";
if ($idsatker1 == ""){$error = "DITEMUKAN ERROR HARAP HUBUNGI ADMIN / PENGELOLA APLIKASI DI PUSAT<BR>";}
if ($periode1 == ""){$error = "Tahun Produk wajib dipilih<BR>";}
if ($perubahan1 == ""){$error = "Tipe upload wajib di pilih<BR>";}
if ($error == ""){
include("mr.db.php");
$allowed = array('pdf');
if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0){
	$extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);
	if(!in_array(strtolower($extension), $allowed)){
		echo '{"status":"error"}';
		exit;
	}
$special = array('/','!','&','*',' ','-','_','+','|','.');
$nomornew = str_replace($special,'',$nomor);
$filename1 = "rkakl_".$periode1."_".$perubahan1.".pdf";
$path = "repository/".$idsatker1."/".$filename1;
//----------------cek file


if (file_exists($path)) {
  print ('File RKAKL Tahun '.$periode1.' Ke- '.$perubahan1.' exists, file tidak bisa diupload pilihi opsi pembetulan');
} else {

if(move_uploaded_file($_FILES['upl']['tmp_name'], $path)){
$link = mysqli_connect("$server","$username","$password","$database") or die(mysqli_error());
//$sql = "UPDATE sinori_sakip_keputusan Set id_filename = '$filename', id_periode = '$periode1', id_perubahan = '$perubahan1' , id_tglupload = '$perubahan1'  where id_satker = '$idsatker1'";  
$sql = "INSERT INTO sinori_sakip_rkakl (id_satker, id_periode, id_perubahan, id_filename, id_tglupload) VALUES ('$idsatker1','$periode1','$perubahan1','$filename1','$tglupload1')";  


if (mysqli_query($link, $sql)) {
      echo "File Berhasil di Upload. Silahkan tutup jendela ini dan tunggu refresh halaman";
   } else {
      echo "Error updating record: " . mysqli_error($link);
   }
   mysqli_close($link);
	}
}
exit;
}
else
{
echo "$error.";
}}
///--------
}
///--END--------------------------------------------------------------
if ($do1 == "iku"){
date_default_timezone_set('Asia/Jakarta');
$idsatker1 = $_POST['idsatker'];
$session1 = $_POST['session'];
$periode1 = $_POST["periode"];
$perubahan1 = $_POST["perubahan"];
$tglupload1 = date("j/m/Y g:i A");
$error = "";
if ($idsatker1 == ""){$error = "DITEMUKAN ERROR HARAP HUBUNGI ADMIN / PENGELOLA APLIKASI DI PUSAT<BR>";}
if ($periode1 == ""){$error = "Tahun Produk wajib dipilih<BR>";}
if ($perubahan1 == ""){$error = "Tipe upload wajib di pilih<BR>";}
if ($error == ""){
include("mr.db.php");
$allowed = array('pdf');
if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0){
	$extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);
	if(!in_array(strtolower($extension), $allowed)){
		echo '{"status":"error"}';
		exit;
	}
$special = array('/','!','&','*',' ','-','_','+','|','.');
$nomornew = str_replace($special,'',$nomor);
$filename1 = "IKU_".$periode1."_".$perubahan1.".pdf";
$path = "repository/".$idsatker1."/".$filename1;
//----------------cek file


if (file_exists($path)) {
  print ('File iku Tahun '.$periode1.' Ke- '.$perubahan1.' exists, file tidak bisa diupload pilihi opsi pembetulan');
} else {

if(move_uploaded_file($_FILES['upl']['tmp_name'], $path)){
$link = mysqli_connect("$server","$username","$password","$database") or die(mysqli_error());
//$sql = "UPDATE sinori_sakip_keputusan Set id_filename = '$filename', id_periode = '$periode1', id_perubahan = '$perubahan1' , id_tglupload = '$perubahan1'  where id_satker = '$idsatker1'";  
$sql = "INSERT INTO sinori_sakip_iku (id_satker, id_periode, id_perubahan, id_filename, id_tglupload) VALUES ('$idsatker1','$periode1','$perubahan1','$filename1','$tglupload1')";  


if (mysqli_query($link, $sql)) {
      echo "File Berhasil di Upload. Silahkan tutup jendela ini dan tunggu refresh halaman";
   } else {
      echo "Error updating record: " . mysqli_error($link);
   }
   mysqli_close($link);
	}
}
exit;
}
else
{
echo "$error.";
}}
///--------
}
///--END--------------------------------------------------------------
if ($do1 == "lkjip"){
date_default_timezone_set('Asia/Jakarta');
$idsatker1 = $_POST['idsatker'];
$session1 = $_POST['session'];
$periode1 = $_POST["periode"];
$perubahan1 = $_POST["perubahan"];
$tglupload1 = date("j/m/Y g:i A");
$error = "";
if ($idsatker1 == ""){$error = "DITEMUKAN ERROR HARAP HUBUNGI ADMIN / PENGELOLA APLIKASI DI PUSAT<BR>";}
if ($periode1 == ""){$error = "Tahun Produk wajib dipilih<BR>";}
if ($perubahan1 == ""){$error = "Tipe upload wajib di pilih<BR>";}
if ($error == ""){
include("mr.db.php");
$allowed = array('pdf');
if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0){
	$extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);
	if(!in_array(strtolower($extension), $allowed)){
		echo '{"status":"error"}';
		exit;
	}
$special = array('/','!','&','*',' ','-','_','+','|','.');
$nomornew = str_replace($special,'',$nomor);
$filename1 = "lkjip_".$periode1."_".$perubahan1.".pdf";
$path = "repository/".$idsatker1."/".$filename1;
//----------------cek file


if (file_exists($path)) {
  print ('File LKjIP Tahun '.$periode1.' Ke- '.$perubahan1.' exists, file tidak bisa diupload pilihi opsi pembetulan');
} else {

if(move_uploaded_file($_FILES['upl']['tmp_name'], $path)){
$link = mysqli_connect("$server","$username","$password","$database") or die(mysqli_error());
//$sql = "UPDATE sinori_sakip_keputusan Set id_filename = '$filename', id_periode = '$periode1', id_perubahan = '$perubahan1' , id_tglupload = '$perubahan1'  where id_satker = '$idsatker1'";  
$sql = "INSERT INTO sinori_sakip_lakip (id_satker, id_periode, id_perubahan, id_filename, id_tglupload) VALUES ('$idsatker1','$periode1','$perubahan1','$filename1','$tglupload1')";  


if (mysqli_query($link, $sql)) {
      echo "File Berhasil di Upload. Silahkan tutup jendela ini dan tunggu refresh halaman";
   } else {
      echo "Error updating record: " . mysqli_error($link);
   }
   mysqli_close($link);
	}
}
exit;
}
else
{
echo "$error.";
}}
///--------
}
//---end cek file
///--END--------------------------------------------------------------
if ($do1 == "kep"){
$idsatker1 = $_POST['idsatker'];
$session1 = $_POST['session'];
$tanggal = $_POST["tanggal"];
$nomor = $_POST["nomor"];
$error = "";
if ($idsatker1 == ""){$error = "DITEMUKAN ERROR HARAP HUBUNGI ADMIN / PENGELOLA APLIKASI DI PUSAT<BR>";}
if ($tanggal == ""){$error = "TANGGAL SURAT BELUM DI INPUT<BR>";}
if ($nomor == ""){$error = "NOMOR SURAT KOSONG, WAJIB DI ISI<BR>";}
if ($error == ""){
include("mr.db.php");
$allowed = array('pdf');
if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0){
	$extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);
	if(!in_array(strtolower($extension), $allowed)){
		echo '{"status":"error"}';
		exit;
	}
$special = array('/','!','&','*',' ','-','_','+','|','.');
$nomornew = str_replace($special,'',$nomor);
$filename = $idsatker1.".pdf";
$path= "KEP/".$filename;
if(move_uploaded_file($_FILES['upl']['tmp_name'], $path)){
$link = mysqli_connect("$server","$username","$password","$database") or die(mysqli_error());
$sql = "UPDATE sinori_sakip_keputusan Set id_filesurat = '$filename', id_nomorsurat = '$nomor', id_tglsurat = '$tanggal' where id_satker = '$idsatker1'";  
if (mysqli_query($link, $sql)) {
      echo "File Berhasil di Upload. Silahkan tutup jendela ini dan tunggu refresh halaman";
   } else {
      echo "Error updating record: " . mysqli_error($link);
   }
   mysqli_close($link);
	}
}
exit;
}
else
{
echo "$error.";
}}
//--------------------------------------
///PROSES OTENTIKASI PK - RKT
if ($do1 == "rkt"){
$idsatker1 = $_POST['idsatker'];
$session1 = $_POST['session'];
$idtahun1 = "2024";
//$tanggal = $_POST["tanggal"];

$error = "";
if ($idsatker1 == ""){$error = "DITEMUKAN ERROR HARAP HUBUNGI ADMIN / PENGELOLA APLIKASI DI PUSAT<BR>";}
if ($session1 == ""){$error = "DITEMUKAN ERROR HARAP HUBUNGI ADMIN / PENGELOLA APLIKASI DI PUSAT<BR>>";}
if ($error == ""){
include("mr.db.php");


$link = mysqli_connect("$server","$username","$password","$database") or die(mysqli_error());


$sql = "UPDATE sinori_sakip_penetapan Set id_approved = '1' where id_satker = '$idsatker1' and id_tahun = '$idtahun1'";  
if (mysqli_query($link, $sql)) {
      echo "Otentikasi berhasil";
   } else {
      echo "Otentikasi Gagal: " . mysqli_error($link);
   }
   mysqli_close($link);
	}
}

//--------------------------------------
///PROSES isian Capaian triwulan 1
if ($do1 == "TW1"){
$idsatker1 = $_POST['idsatker'];
$session1 = $_POST['session'];
$capaian1 = $_POST['capaian'];
$bidang1 = $_POST['bidang'];
$narasi1 = $_POST['narasi'];
$narasi2 = $_POST['narasi2'];
$narasi3 = $_POST['narasi3'];
$id1 = $_POST['id'];
//$tanggal = $_POST["tanggal"];
$error = "";
if ($idsatker1 == ""){$error = "DITEMUKAN ERROR HARAP HUBUNGI ADMIN / PENGELOLA APLIKASI DI PUSAT<BR>";}
if ($capaian1 == ""){$error = "BOX ISIAN CAPAIAN TIDAK BOLEH KOSONG<BR>>";}
if ($error == ""){
include("mr.db.php");
$link = mysqli_connect("$server","$username","$password","$database") or die(mysqli_error());
$sql = "UPDATE sinori_sakip_penetapan Set id_realisasi_tw1 = '$capaian1', id_narasi_tw1 = '$narasi1', id_narasi_tw1_2 = '$narasi2', id_narasi_tw1_3 = '$narasi3' where id_satker = '$idsatker1' and id_bidang = '$bidang1' and id='$id1'";  
if (mysqli_query($link, $sql)) {
      echo "INPUT CAPAIAN TRIWULAN 1 TELAH BERHASIL DISIMPAN SILAHKAN TUTUP JENDELA INI";
   } else {
      echo "INPUT CAPAIAN TRIWULAN 1 TIDAK BERHASIL UNTUK DISIMPAN SILAHKAN TUTUP JENDELA INI DAN COBA KEMBALI" . mysqli_error($link);
   }
   mysqli_close($link);
	}
}
//-------------AKHIR
///PROSES isian Capaian triwulan 2
if ($do1 == "TW2"){
$idsatker1 = $_POST['idsatker'];
$session1 = $_POST['session'];
$capaian1 = $_POST['capaian'];
$bidang1 = $_POST['bidang'];
$narasi1 = $_POST['narasi'];
$narasi2 = $_POST['narasi2'];
$narasi3 = $_POST['narasi3'];
$id1 = $_POST['id'];
//$tanggal = $_POST["tanggal"];
$error = "";
if ($idsatker1 == ""){$error = "DITEMUKAN ERROR HARAP HUBUNGI ADMIN / PENGELOLA APLIKASI DI PUSAT<BR>";}
if ($capaian1 == ""){$error = "BOX ISIAN CAPAIAN TIDAK BOLEH KOSONG<BR>>";}
if ($error == ""){
include("mr.db.php");
$link = mysqli_connect("$server","$username","$password","$database") or die(mysqli_error());
$sql = "UPDATE sinori_sakip_penetapan Set id_realisasi_tw2 = '$capaian1', id_narasi_tw2 = '$narasi1', id_narasi_tw2_2 = '$narasi2', id_narasi_tw2_3 = '$narasi3' where id_satker = '$idsatker1' and id_bidang = '$bidang1' and id='$id1'";  
if (mysqli_query($link, $sql)) {
      echo "INPUT CAPAIAN TRIWULAN 2 TELAH BERHASIL DISIMPAN SILAHKAN TUTUP JENDELA INI";
   } else {
      echo "INPUT CAPAIAN TRIWULAN 2 TIDAK BERHASIL UNTUK DISIMPAN SILAHKAN TUTUP JENDELA INI DAN COBA KEMBALI" . mysqli_error($link);
   }
   mysqli_close($link);
	}
}
//-------------AKHIR
///PROSES isian Capaian triwulan 3
if ($do1 == "TW3"){
$idsatker1 = $_POST['idsatker'];
$session1 = $_POST['session'];
$capaian1 = $_POST['capaian'];
$bidang1 = $_POST['bidang'];
$narasi1 = $_POST['narasi'];
$narasi2 = $_POST['narasi2'];
$narasi3 = $_POST['narasi3'];
$id1 = $_POST['id'];
//$tanggal = $_POST["tanggal"];
$error = "";
if ($idsatker1 == ""){$error = "DITEMUKAN ERROR HARAP HUBUNGI ADMIN / PENGELOLA APLIKASI DI PUSAT<BR>";}
if ($capaian1 == ""){$error = "BOX ISIAN CAPAIAN TIDAK BOLEH KOSONG<BR>>";}
if ($error == ""){
include("mr.db.php");
$link = mysqli_connect("$server","$username","$password","$database") or die(mysqli_error());
$sql = "UPDATE sinori_sakip_penetapan Set id_realisasi_tw3 = '$capaian1', id_narasi_tw3 = '$narasi1', id_narasi_tw3_2 = '$narasi2', id_narasi_tw3_3 = '$narasi3' where id_satker = '$idsatker1' and id_bidang = '$bidang1' and id='$id1'";  
if (mysqli_query($link, $sql)) {
      echo "INPUT CAPAIAN TRIWULAN 3 TELAH BERHASIL DISIMPAN SILAHKAN TUTUP JENDELA INI";
   } else {
      echo "INPUT CAPAIAN TRIWULAN 3 TIDAK BERHASIL UNTUK DISIMPAN SILAHKAN TUTUP JENDELA INI DAN COBA KEMBALI" . mysqli_error($link);
   }
   mysqli_close($link);
	}
}
//-------------AKHIR
///PROSES isian Capaian triwulan 4
if ($do1 == "TW4"){
$idsatker1 = $_POST['idsatker'];
$session1 = $_POST['session'];
$capaian1 = $_POST['capaian'];
$bidang1 = $_POST['bidang'];
$narasi1 = $_POST['narasi'];
$narasi2 = $_POST['narasi2'];
$narasi3 = $_POST['narasi3'];
$id1 = $_POST['id'];
//$tanggal = $_POST["tanggal"];
$error = "";
if ($idsatker1 == ""){$error = "DITEMUKAN ERROR HARAP HUBUNGI ADMIN / PENGELOLA APLIKASI DI PUSAT<BR>";}
if ($capaian1 == ""){$error = "BOX ISIAN CAPAIAN TIDAK BOLEH KOSONG<BR>>";}
if ($error == ""){
include("mr.db.php");
$link = mysqli_connect("$server","$username","$password","$database") or die(mysqli_error());
$sql = "UPDATE sinori_sakip_penetapan Set id_realisasi_tw4 = '$capaian1', id_narasi_tw4 = '$narasi1', id_narasi_tw4_2 = '$narasi2', id_narasi_tw4_3 = '$narasi3' where id_satker = '$idsatker1' and id_bidang = '$bidang1' and id='$id1'";  
if (mysqli_query($link, $sql)) {
      echo "INPUT CAPAIAN TRIWULAN 4 TELAH BERHASIL DISIMPAN SILAHKAN TUTUP JENDELA INI";
   } else {
      echo "INPUT CAPAIAN TRIWULAN 4 TIDAK BERHASIL UNTUK DISIMPAN SILAHKAN TUTUP JENDELA INI DAN COBA KEMBALI" . mysqli_error($link);
   }
   mysqli_close($link);
	}
}
//-------------AKHIR
///PROSES otentikasi Capaian triwulan
if ($do1 == "capaiantw"){
$idsatker1 = $_POST['idsatker'];
$session1 = $_POST['session'];
$step1 = $_POST['step'];
$error = "";
if ($idsatker1 == ""){$error = "DITEMUKAN ERROR HARAP HUBUNGI ADMIN / PENGELOLA APLIKASI DI PUSAT<BR>";}
if ($step1 == ""){$error = "OTENTIKASI TAHAPAN TIDAK BOLEH KOSONG<BR>>";}
if ($error == ""){
include("mr.db.php");
$link = mysqli_connect("$server","$username","$password","$database") or die(mysqli_error());
$sql = "UPDATE sinori_sakip_penetapan Set id_otentikasi_".$step1." = '1' where id_satker = '$idsatker1' and id_realisasi_".$step1." != ''";  

if (mysqli_query($link, $sql)) {
      echo "OTENTIKASI CAPAIAN TRIWULAN TELAH BERHASIL DISIMPAN SILAHKAN TUTUP JENDELA INI";
   } else {
      echo "OTENTIKASI CAPAIAN TRIWULAN TIDAK BERHASIL UNTUK DISIMPAN SILAHKAN TUTUP JENDELA INI DAN COBA KEMBALI" . mysqli_error($link);
   }
   mysqli_close($link);
	}
}
//--------------------------------------


if ($do1 == "absen"){
$idsatker1 = $_POST['idsatker'];
$session1 = $_POST['session'];

$error = "";
if ($idsatker1 == ""){$error = "DITEMUKAN ERROR HARAP HUBUNGI ADMIN / PENGELOLA APLIKASI DI PUSAT<BR>";}

if ($error == ""){
include("mr.db.php");
$allowed = array('pdf');
if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0){
	$extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);
	if(!in_array(strtolower($extension), $allowed)){
		echo '{"status":"error"}';
		exit;
	}

$filename = $idsatker1.".pdf";
$path= "ABSEN/".$filename;
if(move_uploaded_file($_FILES['upl']['tmp_name'], $path)){
$link = mysqli_connect("$server","$username","$password","$database") or die(mysqli_error());
$sql = "UPDATE mr_absen Set id_filesurat = '$filename' where id_satker = '$idsatker1'";  
if (mysqli_query($link, $sql)) {
      echo "Record updated successfully, close this window";
   } else {
      echo "Error updating record: " . mysqli_error($link);
   }
   mysqli_close($link);
	}
}
exit;
}
else
{
echo "$error.";
}}

?>
