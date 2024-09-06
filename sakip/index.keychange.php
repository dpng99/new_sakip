<?PHP
$session1 = $_GET['session'];
$idsatker1 = $_GET['idsatker'];
include("mr.db.php");
$link = mysqli_connect("$server","$username","$password","$database") or die(mysqli_error());
$result = mysqli_query($link, "SELECT * FROM sinori_login where satkerkey ='$session1' and id_satker='$idsatker1'");
if ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
if($row['token'] !== ""){
?>
<LINK href="images/index.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-image: url(themes/background.jpg);
}
-->
</style><table width="100%"  border="0" cellspacing="8" cellpadding="8">
  <tr>
    <td><strong>UBAH PASSWORD </strong></td>
  </tr>
  <tr>
    <td><form name="form1" method="post" action="index.keychange.add.php">
      <table width="90%"  border="0" align="center" cellpadding="2" cellspacing="2">
        <tr>
          <td width="81%"><div align="center">Nama Username </div></td>
        </tr>
        <tr>
          <td>
            <div align="center"><strong><?php echo $nama1 = $_GET['nama']; ?>
              <input name="nama" type="hidden" id="nama" value="<?php echo $_GET['nama']; ?>">
			  <input name="session" type="hidden" id="session" value="<?php echo $_GET['session']; ?>"></strong>
              <input name="id" type="hidden" id="id" value="<?php echo $idsatker1; ?>">
</div></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><div align="center">Masukkan Password Lama anda </div></td>
        </tr>
        <tr>
          <td><div align="center">
            <input name="passlama" type="password" id="passlama" size="20">
          </div></td>
        </tr>
        <tr>
          <td><div align="center">Masukkan Password Baru </div></td>
        </tr>
        <tr>
          <td><div align="center">
            <input name="passbaru" type="password" id="passbaru" size="20">
          </div></td>
        </tr>
        <tr>
          <td><div align="center"></div></td>
        </tr>
        <tr>
          <td><div align="center">*Katakunci yang baik adalah mengandung angka </div></td>
        </tr>
        <tr>
          <td><div align="center">dan huruf secara kombinasi minimal 8 digit </div></td>
        </tr>
        <tr>
          <td><div align="center">
          </div></td>
        </tr>
        <tr>
          <td><div align="center">
            <input type="submit" name="Submit" value="SIMPAN">
          </div></td>
        </tr>
      </table>
    </form></td>
  </tr>
</table><?PHP

}

else

{

echo "ANDA HARUS SET TOKEN TERLEBIH DAHULU DI HALAMAN PROFILE SATKER";

}

}

?>
