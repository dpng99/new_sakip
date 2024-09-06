<?PHP
$idsatker = $_GET['idsatker']; 
$session = $_GET['session']; 
$con = $_GET['con']; 
$idnya = $_GET['id']; 
include("mr.db.1.php");
$link = mysqli_connect("$server","$username","$password","$database") or die(mysqli_error());
$result = mysqli_query($link, "SELECT * FROM mr_b where satkerid = '$idsatker' and con = '$con'");
while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
{
$B7 = $row['B7']; //Indikator Kinerja
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
<form name="form1" method="post" action="index.mr.add.php">
  <table width="100%"  border="0" cellspacing="1" cellpadding="1">
    <tr>
      <td><div align="center"><strong>ANALISA RISIKO 
        
      </strong></div></td>
    </tr>
    <tr>
      <td><div align="center">Satker ID : <?PHP echo $id = $_GET['idsatker']; ?>
          <input name="idsatker" type="hidden" id="idsatker" value="<?PHP echo $id = $_GET['idsatker']; ?>">
          <input name="session" type="hidden" id="session" value="<?PHP echo $session = $_GET['session']; ?>">
          <input name="do" type="hidden" id="do" value="mr3">
          <input name="tab" type="hidden" id="tab" value="c">
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
          <td width="18%">Sisa Risiko * (C.1)</td>
          <td width="3%">:</td>
          <td><?php echo "$B7"; ?>
            <input name="c1" type="hidden" id="c1" value="<?php echo "$B7"; ?>">   
            &nbsp;</td>
        </tr>
        <tr>
          <td colspan="3"><strong>Kemungkinan</strong></td>
          </tr>
        <tr>
          <td>Uraian (C.2.1)</td>
          <td>:</td>
          <td><select name="c21" id="c21">
            <option selected>--Pilih--</option>
            <option value="5">Pasti</option>
            <option value="4">Hampir Pasti</option>
            <option value="3">Rata-rata</option>
            <option value="2">Sedikit</option>
            <option value="1">Sangat Sedikit</option>
          </select>
            Pilih Kemungkinan Terjadi 
            <div align="center"></div></td>
          </tr>
        <tr>
          <td>Nilai : (C.2.2)</td>
          <td>:</td>
          <td>Automatic</td>
          </tr>
        <tr>
          <td colspan="3"><strong>Dampak</strong></td>
          </tr>
        <tr>
          <td>Uraian (C.3.1)</td>
          <td>:</td>
          <td><select name="c31" id="c31">
            <option selected>--Pilih--</option>
            <option value="1">Personal Pegawai</option>
            <option value="2">Cabang kejari</option>
            <option value="3">Kejaksaan Negeri</option>
            <option value="4">Kejaksaan Tinggi</option>
            <option value="5">Kejaksaan Agung</option>
                    </select>
            Pilih pihak yang akan terdampak 
            <div align="center"></div></td>
          </tr>
        <tr>
          <td>Nilai : (C.3.2)</td>
          <td>:</td>
          <td>Automatic</td>
          </tr>
        <tr>
          <td>Tingkat Risiko (C.4)</td>
          <td>:</td>
          <td>Automatic (Counting-  Kolom 4 x 6 / <em>C.2.2 x C.3.2</em>) </td>
        </tr>
        <tr>
          <td>Profile Risiko (C.5) </td>
          <td>:</td>
          <td>Automatic</td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><input type="submit" name="Submit" value="Submit"></td>
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
