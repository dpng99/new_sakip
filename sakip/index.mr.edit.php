<LINK href="images/index.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
    function refreshAndClose() {
        window.opener.location.reload(true);
        window.close();
    }
</script>
<body onbeforeunload="refreshAndClose();">
<?php
include("lapbul.db.php");
$link = mysqli_connect("$server","$username","$password","$database") or die(mysqli_error());
$do1 = $_POST['do'];
$nama1 = $_POST['nama'];
$sid1 = $_POST['sid'];
if ($do1 == "reset_pass"){
$result = mysqli_query($link, "UPDATE $tables Set satkerpass = '3890baf3e390426eb7b09ef364923f46' where id_satker = '$sid1'");
echo "<b>BERHASIL MERESET PASSWORD SILAHKAN TUTUP JENDELA INI</b>";
}
//----------STEP
if ($do1 == "del_satker"){
$conn = new mysqli($server, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// sql to delete a record
$sql = "DELETE FROM lapbulbin_login WHERE where id = '$sid1' and satkernama = '$nama1'";
if ($conn->query($sql) === TRUE) {
    echo "BERHASIL MENGHAPUS AKUN TERSEBUT";
} else {
    echo "Error deleting record: " . $conn->error;
}
$conn->close();
}
?>



