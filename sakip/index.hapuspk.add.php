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
$idbidang1 = $_POST['idbidang'];
$idsatker1 = $_POST['idsatker'];

include("mr.db.php");
$link = mysqli_connect("$server","$username","$password","$database") or die("Error connecting to database: ".mysqli_error());
$result = mysqli_query($link, "SELECT * FROM sinori_login WHERE satkerkey = '$session1' and id_satker='$idsatker1'");
if ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
if($row['satkerkey'] == "$session1"){

$result2 = mysqli_query($link, "UPDATE sinori_sakip_penetapan Set id_hide = '1' where id = '$id1' and id_satker ='$idsatker1' and id_bidang ='$idbidang1'");

print ('<table width="50%"  border="0" align="center" cellpadding="6" cellspacing="6">
  <tr>
    <td>BERHASIL UNTUK DIHAPUS. SILAHKAN TUTUP HALAMAN INI</td>
  </tr>
</table>');
exit;

}
else 
echo '<h1>UBAH PASSWORD GAGAL</h1>';
}
?>
