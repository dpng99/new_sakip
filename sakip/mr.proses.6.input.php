<?PHP
$idsatker = $_GET['idsatker']; 
$session = $_GET['session']; 
$con = $_GET['con']; 
$idnya = $_GET['id']; 
include("mr.db.1.php");
$link = mysqli_connect("$server","$username","$password","$database") or die(mysqli_error());
$result = mysqli_query($link, "SELECT * FROM mr_e where satkerid = '$idsatker' and con = '$con'");
while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
{
$E2 = $row['E2']; //Indikator Kinerja
$E3 = $row['E3']; //Indikator Kinerja
$E12 = $row['E12']; //Indikator Kinerja
$E41 = $row['E41']; //Indikator Kinerja
$E42 = $row['E42']; //Indikator Kinerja
}
$result2 = mysqli_query($link, "SELECT * FROM mr_d where satkerid = '$idsatker' and con = '$con'");
while ($row2=mysqli_fetch_array($result2,MYSQLI_ASSOC))
{
$D4 = $row2['D4']; //Indikator Kinerja

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
      <td><div align="center"><strong>PEMANTAUAN DAN REVIU</strong></div></td>
    </tr>
    <tr>
      <td><div align="center">Satker ID : <?PHP echo $id = $_GET['idsatker']; ?>
          <input name="idsatker" type="hidden" id="idsatker" value="<?PHP echo $id = $_GET['idsatker']; ?>">
          <input name="session" type="hidden" id="session" value="<?PHP echo $session = $_GET['session']; ?>">
          <input name="do" type="hidden" id="do" value="mr6">
          <input name="tab" type="hidden" id="tab" value="f">
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
          <td width="18%">Kegiatan Pengendalian (F.1)*</td>
          <td width="3%">:</td>
          <td><?php echo "$E3"; ?>
            <input name="f1" type="hidden" id="f1" value="<?php echo "$E3"; ?>">
&nbsp;</td>
          </tr>
        <tr>
          <td colspan="3"><strong>Indikator Pengendalian (F.2) </strong></td>
          </tr>
        <tr>
          <td>Output (F.2.1)</td>
          <td>:</td>
          <td><?php echo "$E41"; ?>
            <input name="f21" type="hidden" id="f21" value="<?php echo "$E41"; ?>">
&nbsp;<div align="center"></div></td>
          </tr>
        <tr>
          <td>Target (F.2.2)</td>
          <td>:</td>
          <td><?php echo "$E42"; ?>
            <input name="f22" type="hidden" id="f22" value="<?php echo "$E42"; ?>">
&nbsp;</td>
          </tr>
        <tr>
          <td>Realisasi (F.2.3)</td>
          <td>:</td>
          <td><input name="f23" type="text" id="f23" value="" size="5" onkeypress="return isNumber(event)"> 
            Isikan kondisi yang sudah tercapai dari target yang sudah ditetapkan diatas 
              <div align="center"></div></td>
          </tr>
        <tr>
          <td>% (F.2.4)</td>
          <td>:</td>
          <td>Automatic </td>
          </tr>
        <tr>
          <td colspan="3"><strong>Dampak (F.4)</strong></td>
          </tr>
        <tr>
          <td>Indikasi (F.3.1)</td>
          <td>:</td>
          <td>            <?php echo "$E2"; ?>
           
  <input name="f31" type="hidden" id="f31" value="<?php echo "$E2"; ?>">
</td>
          </tr>
        <tr>
          <td>Batas Aman (F.3.2)</td>
          <td>:</td>
          <td><?php echo "$E12"; ?>
            <input name="f32" type="hidden" id="f322" value="<?php echo "$E12"; ?>">
&nbsp;</td>
          </tr>
        <tr>
          <td>Realisasi (F.3.3)</td>
          <td>:</td>
          <td>            <div align="left">Automatic (isian Presentase indikator pengendalian (kolom 6) x Batas Aman indikator risiko (kolom 8) </div></td>
          </tr>
        <tr>
          <td>% (F.3.4)</td>
          <td>:</td>
          <td>Automatic</td>
          </tr>
        <tr>
          <td>Risiko Risidu (F.4)</td>
          <td>:</td>
          <td>Capaian Indikator risiko diatas x Toleransi Risiko (Form Evaluasi Risiko Kolom 5) Yaitu  Sejumlah : 
            <input name="f4" type="hidden" id="f4" value="<?php echo "$D4"; ?>"><?php echo "$D4"; ?></td>
        </tr>
        <tr>
          <td>Keterangan (F.5)</td>
          <td>:</td>
          <td><textarea name="f5" wrap="VIRTUAL" id="f5"></textarea></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><input type="submit" name="Submit" value="SUBMIT FINAL"></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>Dengan klik submit Final anda menyatakan sudah melakukan pengisian Tahap 1 s 5 dengan benar dan proses bisnis akan dihentikan. tidak ada fasilitas edit. hanya dapat dihapus melalui form 1 penetapan risiko.</td>
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
