<?php
session_start();
if(isset($_SESSION['ID']) and isset($_SESSION['Pass'])) {
include("mr.db.php");
$mytable = "sinori_login";
$sid1 = $_GET["sid"];
$session1 = $_GET["session"];
$link = mysqli_connect("$server","$username","$password","$database");
$result = mysqli_query($link, "SELECT * FROM $mytable WHERE id_satker ='$sid1'");
if ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){ 
if ($row["satkerkey"] == $session1){
$id_satker1 = $row["id_satker"];
$nama1 = $row["satkernama"];
?>
<?php
if
($row['id_simeryd'] == '2'){ header("Location: index.pembinaan.php?nama=$nama1&session=$session1&idsatker=$id_satker1");}
elseif ($row['id_simeryd'] == '0'){ header("Location: mr.php?nama=$nama1&session=$session1&idsatker=$id_satker1");}
elseif ($row['id_simeryd'] == '1'){ header("Location: index.pengawasan.php?nama=$nama1&session=$session1&idsatker=$id_satker1");}
elseif ($row['id_simeryd'] == '5'){ header("Location: backend/list_satker.php?nama=$nama1&session=$session1&idsatker=$id_satker1");}
else{ include("index.landing.php"); }
?>
<?php }else{header("Location: index.php"); }} ?>
<?php
}
else {
echo "ANDA BELUM LOGIN";
echo "<meta http-equiv=\"refresh\" content=\"3; url=index.php\">";
}
?>