<?PHP
$idsatker = $_GET['idsatker']; 
$session = $_GET['session']; 
$con = $_GET['con']; 
$idnya = $_GET['id']; 
include("mr.db.1.php");
$link = mysqli_connect("$server","$username","$password","$database") or die(mysqli_error());
$result = mysqli_query($link, "SELECT * FROM mr_c where satkerid = '$idsatker' and con = '$con'");
while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
{
$C1 = $row['C1']; //Indikator Kinerja
$C4 = $row['C4']; //Indikator Kinerja
}
?><link rel="stylesheet" href="index.css">
<style>
textarea {	
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;	
    width: 100%;
    }
</style>
<script>
function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}</script>
<form name="form1" method="post" action="index.mr.add.php">
  <table width="100%"  border="0" cellspacing="1" cellpadding="1">
    <tr>
      <td height="20"><div align="center"><strong>EVALUASI RISIKO 
        
      </strong></div></td>
    </tr>
    <tr>
      <td height="20"><div align="center">Satker ID : <?PHP echo $id = $_GET['idsatker']; ?>
          <input name="idsatker" type="hidden" id="idsatker" value="<?PHP echo $id = $_GET['idsatker']; ?>">
          <input name="session" type="hidden" id="session" value="<?PHP echo $session = $_GET['session']; ?>">
          <input name="do" type="hidden" id="do" value="mr4">
          <input name="tab" type="hidden" id="tab" value="d">
          <input name="con" type="hidden" id="con" value="<?PHP echo "$con"; ?>">
          <input name="id" type="hidden" id="id" value="<?PHP echo "$idnya"; ?>">
      </div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><table width="100%"  border="0" cellspacing="4" cellpadding="4">
        <tr>
          <td width="18%">Sisa Risiko (D.1) *</td>
          <td width="3%"><div align="center">:</div></td>
          <td><?php echo "$C1"; ?>
            <input name="d1" type="hidden" id="d1" value="<?php echo "$C1"; ?>">
&nbsp;</td>
        </tr>
        <tr>
          <td>Tingkat Risiko (D.2) * </td>
          <td><div align="center">:</div></td>
          <td><?php echo "$C4"; ?>
            <input name="d2" type="hidden" id="d2" value="<?php echo "$C4"; ?>">
&nbsp;</td>
          </tr>
        <tr>
          <td rowspan="2">Prioritas Risiko (D.3)</td>
          <td rowspan="2"><div align="center">:</div></td>
          <td><input name="d3" type="text" id="d3" value="" size="5" onkeypress="return isNumber(event)"> 
            Isi dengan angka 1 sd 10 </td>
          </tr>
        <tr>
          <td>Dari skala risiko 1 sd 10 point dari rendah hingga terberat berapa ukuran risiko atas risiko diatas? </td>
        </tr>
        <tr>
          <td rowspan="2">Toleransi Risiko  (D.4)</td>
          <td rowspan="2"><div align="center">:</div></td>
          <td><input name="d4" type="text" id="d4" value="" size="5" onkeypress="return isNumber(event)"></td>
          </tr>
        <tr>
          <td>Dari Toleransi RIsiko berapa harapan agar sisa risiko tersebut dapat diturunkan skala risikonya. (Ukuran lebih kecil atau sama dengan prioritas risiko) x &lt; Prioritas </td>
        </tr>
        <tr>
          <td colspan="3"><strong>Indikator Risiko (D.5) </strong></td>
          </tr>
        <tr>
          <td>Indikasi (D.5.1) </td>
          <td><div align="center">:</div></td>
          <td><textarea name="d51" wrap="VIRTUAL" id="d51"></textarea>            <div align="center"></div></td>
          </tr>
        <tr>
          <td>Batas Aman : (D.5.2) </td>
          <td><div align="center">:</div></td>
          <td><input name="d52" type="text" id="d52" value="" size="5" onkeypress="return isNumber(event)"></td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>Berikan batas aman bagi sisa risiko yang ada sesuai skala ukuran, tidak melebihi nilai tingkat risiko diatas. </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><input type="submit" name="Submit" value="Submit"></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
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
