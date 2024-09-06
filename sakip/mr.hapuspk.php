<?PHP
$session1 = $_GET['session'];
$idsatker1 = $_GET['idsatker'];
include("mr.db.php");
$link = mysqli_connect("$server","$username","$password","$database") or die(mysqli_error());
$result = mysqli_query($link, "SELECT * FROM sinori_login where satkerkey ='$session1' and id_satker='$idsatker1'");
if ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
if($row['satkerkey'] == "$session1"){
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
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><form name="form1" method="post" action="index.hapuspk.add.php">
      <table width="90%"  border="0" align="center" cellpadding="2" cellspacing="2">
        <tr>
          <td width="81%"><div align="center">PENGHAPUSAN PENETAPAN KINERJA </div></td>
        </tr>
        <tr>
          <td><?PHP
		//  $result3 = mysqli_query($link, "Select * from ".$isi1." where id = '$indikator1'");
//while ($row2=mysqli_fetch_array($result3,MYSQLI_ASSOC)){
//print ('<td>'.$row2['indikator_nama'].'</td>');
//}
?>
            <div align="center"><strong><?php echo $row['satkernama']; ?></strong>
              <input name="id" type="hidden" id="id" value="<?php echo $_GET['id']; ?>">
			  <input name="session" type="hidden" id="session" value="<?php echo $_GET['session']; ?>">
              <input name="idbidang" type="hidden" id="idbidang" value="<?php echo $_GET['idbidang']; ?>">
			  <input name="idsatker" type="hidden" id="idsatker" value="<?php echo $idsatker1; ?>">
</div></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><div align="center"></div></td>
        </tr>
        <tr>
          <td><div align="center">
          </div></td>
        </tr>
        <tr>
          <td><div align="center">
            <input type="submit" name="Submit" value="SAYA SETUJU UNTUK DIHAPUS">
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
