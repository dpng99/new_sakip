<LINK href="images/index.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
    function refreshAndClose() {
        window.opener.location.reload(true);
        window.close();
    }
</script>
<body onbeforeunload="refreshAndClose();">
<?PHP
//$session1 = mysql_real_escape_string($_POST['session']);
//$password2 = mysql_real_escape_string($_POST['passbaru']);
$session1 = $_POST['session'];
$id1 = $_POST['id'];
$passlama1 = $_POST['passlama'];
$passlama2 = md5($passlama1);
$password2 = $_POST['passbaru'];
$password3 = md5($password2);

include("mr.db.php");
$link = mysqli_connect("$server","$username","$password","$database") or die("Error connecting to database: ".mysqli_error());
$result = mysqli_query($link, "SELECT * FROM sinori_login WHERE satkerkey = '$session1' and id_satker='$id1'");
if ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
if($row['satkerpass'] == "$passlama2"){

$result2 = mysqli_query($link, "UPDATE $mytable Set satkerpass = '$password3' where satkerkey = '$session1' and id_satker='$id1'");

print ('<table width="50%"  border="0" align="center" cellpadding="6" cellspacing="6">
  <tr>
    <td>BERHASIL DI UBAH. SILAHKAN TUTUP HALAMAN INI</td>
  </tr>
</table>');
exit;

}
else 
echo '<h1>UBAH PASSWORD GAGAL</h1>';
}
?>
