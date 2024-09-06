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
$idsatker1 = $_POST['idsatker'];
$session1 = $_POST['session'];
$table1 = $_POST['tab'];
$tables = "mr_".$table1;
//----------------------------MR1--------------------------->>>

if ($do1 == "mr2"){
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
}


}



?>
