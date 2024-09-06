<?PHP
$idsatker = $_GET['idsatker']; 
$session = $_GET['session']; 
$con = $_GET['con']; 
$idnya = $_GET['id']; 
include("mr.db.1.php");
$link = mysqli_connect("$server","$username","$password","$database") or die(mysqli_error());
$result = mysqli_query($link, "SELECT * FROM mr_d where satkerid = '$idsatker' and con = '$con'");
while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
{
$D1 = $row['D1']; //Indikator Kinerja
$D52 = $row['D52']; //Indikator Kinerja
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
      <td><div align="center"><strong>PENANGANAN RISIKO 
        
      </strong></div></td>
    </tr>
    <tr>
      <td><div align="center">Satker ID : <?PHP echo $id = $_GET['idsatker']; ?>
          <input name="idsatker" type="hidden" id="idsatker" value="<?PHP echo $id = $_GET['idsatker']; ?>">
          <input name="session" type="hidden" id="session" value="<?PHP echo $session = $_GET['session']; ?>">
          <input name="do" type="hidden" id="do" value="mr5">
          <input name="tab" type="hidden" id="tab" value="e">
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
          <td colspan="3"><div align="left"><strong>Indikator Risiko:</strong></div></td>
          </tr>
        <tr>
          <td width="18%">Risiko (E.1.1)*</td>
          <td width="3%">:</td>
          <td><?php echo "$D1"; ?>
            <input name="e11" type="hidden" id="e11" value="<?php echo "$D1"; ?>">
&nbsp;</td>
          </tr>
        <tr>
          <td>Batas Aman (E.1.2)* </td>
          <td width="3%">:</td>
          <td><?php echo "$D52"; ?>
            <input name="e12" type="hidden" id="e122" value="<?php echo "$D52"; ?>">
&nbsp;</td>
          </tr>
        <tr>
          <td>Opsi Penanganan (E.2)</td>
          <td>:</td>
          <td><select name="e2" id="e2">
            <option value="Mengurangi Risiko">Mengurangi Risiko</option>
            <option value="Mengalihkan Risiko">Mengalihkan Risiko</option>
            <option value="Menghindari Risiko">Menghindari Risiko</option>
            <option value="Menerima Risiko">Menerima Risiko</option>
            <option selected>--Pilih Opsi---</option>
          </select></td>
        </tr>
        <tr>
          <td rowspan="2">Kegiatan Pengendalian (E.3)</td>
          <td rowspan="2">:</td>
          <td><textarea name="e3" wrap="VIRTUAL" id="e3"></textarea></td>
        </tr>
        <tr>
          <td>Isikan dengan upaya yang akan dilakukan atas opsi penanganan yang sudah dipilih. </td>
        </tr>
        <tr>
          <td colspan="3"><strong>Indikator Pengendalian : </strong></td>
          </tr>
        <tr>
          <td>Output (E.4.1)</td>
          <td>:</td>
          <td><textarea name="e41" wrap="VIRTUAL" id="e41"></textarea>            <div align="center"></div></td>
          </tr>
        <tr>
          <td>Target (E.4.2) </td>
          <td>:</td>
          <td><input name="e42" type="text" id="e422" value="" size="5" onkeypress="return isNumber(event)">
            Isikan dengan jumlah hasil ingin dicapai (Pegawai, Kuantitas) </td>
          </tr>
        <tr>
          <td rowspan="2">Jadwal (E.5)</td>
          <td rowspan="2">:</td>
          <td><textarea name="e5" wrap="VIRTUAL" id="e5"></textarea></td>
        </tr>
        <tr>
          <td>Masukkan Jadwal Pelaksanaan Target Penyelesaian </td>
        </tr>
        <tr>
          <td rowspan="2">Penanggung Jawab (E.6)</td>
          <td rowspan="2">:</td>
          <td><textarea name="e6" wrap="VIRTUAL" id="e6"></textarea></td>
        </tr>
        <tr>
          <td>Bidang terkait yang bertanggungjawab melakukan penyelesaian, ataupun Pejabat Terkait Struktural maupun Fungsional</td>
        </tr>
        <tr>
          <td rowspan="2">Cadangan Risiko (Rp) (E.7)</td>
          <td rowspan="2">:</td>
          <td><textarea name="e7" wrap="VIRTUAL" id="e7"></textarea></td>
        </tr>
        <tr>
          <td>Isikan dengan sisa penyelesaian atas risiko terhadap kegiatan yang didukung dengan anggaran. </td>
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
