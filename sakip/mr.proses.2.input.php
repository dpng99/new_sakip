<?PHP
$idsatker = $_GET['idsatker']; 
$session = $_GET['session']; 
$idnya = $_GET['id']; 
$step = $_GET['step']; 
include('mr.db.php');
$link = mysqli_connect("$server","$username","$password","$database") or die(mysqli_error());
$result = mysqli_query($link, "SELECT * FROM sinori_sakip_penetapan where id_satker = '$idsatker' and id = '$idnya'");
while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
{


$result = mysqli_query($link, "Select * from sinori_login where id_satker = '$idsatker'");
while ($row2=mysqli_fetch_array($result,MYSQLI_ASSOC)){
$satkernama1 = $row2['satkernama'];
}
?>

<link rel="stylesheet" href="index.css">
<style>
textarea {	
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;	
    width: 100%;
    }
body {
	background-image: url();
	background-color: #F0F0F0;
}
.style1 {color: #FF0000}
</style>
<form name="form1" method="post" action="mr.produk.add.php">
  <table width="95%"  border="0" align="center" cellpadding="1" cellspacing="1">
    <tr>
      <td height="20"><div align="center"><strong>CAPAIAN KINERJA </strong></div></td>
    </tr>
    <tr>
      <td height="20"><div align="center">Satker ID : <?PHP echo $id = $_GET['idsatker']; ?> - 
	  <?php echo $hasil1 = str_replace("_"," ","$satkernama1");


  ?>
          <input name="idsatker" type="hidden" id="idsatker" value="<?PHP echo $id = $_GET['idsatker']; ?>">
          <input name="session" type="hidden" id="session" value="<?PHP echo $session = $_GET['session']; ?>">
          <input name="do" type="hidden" id="do" value="<?php echo $step; ?>">
          <input name="tab" type="hidden" id="tab" value="b">
          <input name="id" type="hidden" id="id" value="<?PHP echo $id2 = $_GET['id']; ?>>">
      </div></td>
    </tr>
    <tr>
      <td height="20">&nbsp;</td>
    </tr>
    <tr>
      <td><table width="100%"  border="0" cellspacing="4" cellpadding="4">
        <tr>
          <td width="23%"><div align="left">Capaian Triwulan </div></td>
          <td width="3%">:</td>
          <td><b><?php echo $step; ?></b>
            pada Tahun <?php echo $tahun = $row['id_tahun']; ?></td>
        </tr>
        <tr>
          <td>Tugas Fungsi milik </td>
          <td width="3%">:</td>
          <td><?php 
		  
		  $bidang1 = $row['id_bidang'];
$result1 = mysqli_query($link, "Select * from sinori_sakip_bidang where id= '$bidang1'");
while ($row2=mysqli_fetch_array($result1,MYSQLI_ASSOC)){
print (''.$row2['bidang_nama'].'');
}
		   ?>
            <input name="bidang" type="hidden" id="b12" value="<?php echo $bidang = $row['id_bidang']; ?>"></td>
        </tr>
        <tr>
          <td>Sasaran Program yang dilaksanakan
            <div align="center"></div></td>
          <td>:</td>
          <td><?php 
		  
		  $saspro1 = $row['id_saspro'];
$result2 = mysqli_query($link, "Select * from sinori_sakip_saspro where id= '$saspro1'");
while ($row2=mysqli_fetch_array($result2,MYSQLI_ASSOC)){
print (''.$row2['saspro_nama'].'');
}
		   ?>
            <input name="b2" type="hidden" id="b2" value="<?php echo $saspro = $row['id_saspro']; ?>">
            </td>
    </tr>
        <tr>
          <td>Indikator Kinerja </td>
          <td>:</td>
          <td><?php 
		  
		  $indikator1 = $row['id_indikator'];
$tipe1 = $row['id_tipe'];
//---------

 if ($tipe1  == "lag") {
$isi1 = "sinori_sakip_indikator";
print ('<img src="images/tipe_lagging.png" width="60" height="20"> - ');
} 
elseif ($tipe1 == "led") {
$isi1 = "sinori_sakip_ranpnidx";
print ('<img src="images/tipe_leading.png" width="60" height="20"> - ');
} 

//---------------------
$result3 = mysqli_query($link, "Select * from ".$isi1." where id = '$indikator1'");
while ($row2=mysqli_fetch_array($result3,MYSQLI_ASSOC)){
print (''.$row2['indikator_nama'].'');
}
		  
		  
		  ?>
            <input name="b22" type="hidden" id="b22" value="<?php echo $indikator = $row['id_indikator']; ?>"></td>
        </tr>
        <tr>
          <td>Target yang hendak dicapai</td>
          <td>:</td>
          <td><b><?php echo $target = $row['id_target']; ?></b>
            <input name="b23" type="hidden" id="b23" value="<?php echo $target = $row['id_target']; ?>"> 
            % </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>Target diatas telah ditetapkan dalam Rencana Kerja Tahunan (RKT) pada tanggal <b><?php echo $tglpenetapan = $row['id_tglpenetapan']; ?> </b>dan sudah di otentikasi oleh Tim Sakip Satker </td>
        </tr>
        <tr>
          <td colspan="3"><strong>Input Hasil Capaian Kinerja </strong></td>
          </tr>
        <tr>
          <td>Hasil Capaian
            <div align="center"></div></td>
          <td>:</td>
          <td><input name="capaian" type="text" id="capaian" value="" size="10" required>
            %<span class="style1"> </span></td>
          </tr>
          <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>Silahkan masukkan capaian kinerja indikator tersebut hingga saat ini (Triwulan), <span class="style1">* sesuai dengan hasil perhitungan yang telah ditetapkan pada kolom formulasi di Perjanjian Kinerja.</span></td>
          </tr>
          <tr>
              <td>Masukkan Uraian Capaian anda hingga saat ini (Triwulan)</td>
              <td>:</td>
              <td>
                  <textarea name="narasi" rows="6" wrap="VIRTUAL" id="narasi" minlength="20" required></textarea>
              </td>
          </tr>
          <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <tr>
              <td>Masukkan Uraian Kendala/Hambatan anda hingga saat ini (Triwulan)</td>
              <td>:</td>
              <td>
                  <textarea name="narasi2" rows="6" wrap="VIRTUAL" id="narasi2" minlength="20" required></textarea>
              </td>
          </tr>
          <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <tr>
              <td>Masukkan langkah strategi/optimalisasi kinerja anda untuk menangani Kendala/Hambatan saat ini (Triwulan)</td>
              <td>:</td>
              <td>
                  <textarea name="narasi3" rows="6" wrap="VIRTUAL" id="narasi3" minlength="20" required></textarea>
              </td>
          </tr>
          <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td><input type="submit" name="Submit" value="Simpan"></td>
          </tr>
      </table></td>
    </tr>
    <tr>
      <th>&nbsp;</th>
    </tr>
    <tr>
      <th><img src="themes/serenata.png" width="230" height="80"></th>
    </tr>
    <tr>
      <th>&nbsp;</th>
    </tr>
    <tr>
      <th>Serenata SAKIP Kejaksaan Republik Indonesia V.1.0 Tahun Edisi 2024 </th>
    </tr>
    <tr>
      <th>Didukung oleh Chendia Studio Jogjakarta </th>
    </tr>
  </table>
</form>

<!-- Minimal 20 char -->
<script type="text/javascript">
    document.getElementById('formID').onsubmit = function() {
        var narasi = document.getElementById('narasi').value;
        if (narasi.length < 20) {
            alert("Minimal 20 karakter diperlukan untuk isian.");
            return false;
        }
        return true;
    }
</script>

<script type="text/javascript">
    document.getElementById('formID').onsubmit = function() {
        var narasi2 = document.getElementById('narasi2').value;
        if (narasi2.length < 20) {
            alert("Minimal 20 karakter diperlukan untuk isian.");
            return false;
        }
        return true;
    }
</script>

<script type="text/javascript">
    document.getElementById('formID').onsubmit = function() {
        var narasi3 = document.getElementById('narasi3').value;
        if (narasi3.length < 20) {
            alert("Minimal 20 karakter diperlukan untuk isian.");
            return false;
        }
        return true;
    }
</script>

          <?PHP
}
?>
    
