<?PHP
$idsatker = $_GET['idsatker']; 
$session = $_GET['session']; 
$idnya = $_GET['id']; 
include("mr.db.1.php");
$link = mysqli_connect("$server","$username","$password","$database") or die(mysqli_error());
$result = mysqli_query($link, "SELECT * FROM mr_a where satkerid = '$idsatker' and id = '$idnya'");
while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
{


?><link rel="stylesheet" href="index.css">
<style>
textarea {	
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;	
    width: 100%;
    }
</style><form name="form1" method="post" action="index.mr.add.php">
  <table width="100%"  border="0" cellspacing="1" cellpadding="1">
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><table width="100%"  border="0" cellspacing="4" cellpadding="4">
        <tr>
          <td><div align="center"><strong>Fungsi Penghapusan Inputan Manajemen Risiko </strong></div></td>
        </tr>
        <tr>
          <td><div align="center">Satker ID : <?PHP echo $id = $_GET['idsatker']; ?>
                <input name="idsatker" type="hidden" id="idsatker" value="<?PHP echo $id = $_GET['idsatker']; ?>">
                <input name="session" type="hidden" id="session" value="<?PHP echo $session = $_GET['session']; ?>">
                <input name="do" type="hidden" id="do" value="delete">
                <input name="con" type="hidden" id="con" value="<?PHP echo $id = $row['id']; ?>">
          </div></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td><table width="100%"  border="0" cellspacing="4" cellpadding="4">
        <tr>
          <td width="20%">Tetapkan Strategi / Program / Kegiatan</td>
          <td width="5%">(A.1) </td>
          <td width="3%">:</td>
          <td width="72%"><?PHP echo $A1 = $row['A1']; ?></td>
        </tr>
        <tr>
          <td>Tujuan Sasaran </td>
          <td>(A.2)</td>
          <td>:</td>
          <td><?PHP echo $A2 = $row['A2']; ?></td>
        </tr>
        <tr>
          <td>Indikator Kinerja </td>
          <td>(A.3) </td>
          <td>:</td>
          <td><?PHP echo $A3 = $row['A3']; ?></td>
        </tr>
        <tr>
          <td>Permasalahan </td>
          <td>(A.4) </td>
          <td>:</td>
          <td><?PHP echo $A4 = $row['A4']; ?></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          <td>&nbsp;</td>
          <td><input type="submit" name="Submit" value="HAPUS RECORD INI"></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          <td>&nbsp;</td>
          <td>Untuk membatalkan menghapus cukup tutup jendela ini </td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <th>&nbsp;</th>
    </tr>
    <tr>
      <th>Aplikasi Si Mr YD | Sinergi Informasi Manajemen Risiko Yang Dinamis</th>
    </tr>
    <tr>
      <th>Didukung oleh Chendia Studio </th>
    </tr>
  </table>
</form>
<?PHP
}
?>