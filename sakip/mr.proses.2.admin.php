<?PHP
$idsatker1 = $_GET['idsatker'];
?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style type="text/css">
<!--
body {
	background-image: url(themes/background.jpg);
}
-->
</style><body>

<div class="w3-sidebar w3-bar-block w3-light-grey w3-card" style="width:160px">
  <h5 class="w3-bar-item"><b>PENGUKURAN</b></h5>
  <button class="w3-bar-item w3-button tablink" onclick="openCity(event, 'TW1')">Triwulan 1 </button>
  <button class="w3-bar-item w3-button tablink" onclick="openCity(event, 'TW2')">Triwulan 2 </button>
  <button class="w3-bar-item w3-button tablink" onclick="openCity(event, 'TW3')">Triwulan 3 </button>
   <button class="w3-bar-item w3-button tablink" onclick="openCity(event, 'TW4')">Triwulan 4 </button>
   <button class="w3-bar-item w3-button tablink" onclick="openCity(event, 'APIP')">Validasi APIP</button>
</div>


<div style="margin-left:170px">
  <div class="w3-padding">PENGUKURAN KINERJA ATAS RENCANA KERJA TAHUNAN SECARA TRIWULAN (WATERFALLS SYSTEM)<br><center><img src="images/sigma.png"></center></div>
  <div id="TW1" class="w3-container city" style="display:none">
    <h2>Periode Januari - Maret (TW1)</h2>
    <p><?PHP 
include('mr.db.php');
$tables = "sinori_sakip_penetapan";
$link = mysqli_connect("$server","$username","$password","$database") or die(mysqli_error());
if(empty($action))
{
if (empty($order)) $order =  2;
if (empty($page))  $page  =  1;
if (empty($hits))  $hits  = 100;
$start = $hits*($page-1);
$kueri = mysqli_query($link, "SELECT * FROM $tables where id_satker = '$idsatker1' and id_tahun ='2024' and id_target !=''");
$data = array ();
while (($row = mysqli_fetch_array($kueri)) != null){
$data[] = $row;
}
$xnum = count ($data);
$stw2 = (int)($xnum/$hits);
if ($xnum%$hits > 0) {$stw2++;}
$np = $page+1;
$pp = $page-1;
if ($page == 1) { $pp=1; }
if ($np > $stw2) { $np = $stw2;} 

print ('
<table id="myTable" cellspacing="1" width="100%" align="center" cellpadding="3" bgcolor="#FFCC00" ><thead>
<tr bgcolor="#FFCC00">
<td width="2%"><center>No</center></td>
<td width="15%">Bidang</td>
<td width="25%">Saspro</td>
<td width="25%">Indikator</td>
<td width="6%"><center>Target</center></td>
<td width="6%"><center>Realisasi TW1</center></td>
<td width="13%"><center>Narasi TW1, HRO</center></td>
<td width="6%"><center>Tipe</center></td>



</tr>
</thead><tbody>
');
$no=1; $x=0;
$result = mysqli_query($link, "SELECT * FROM $tables where id_satker = '$idsatker1' and id_tahun = '2024' and id_target !='' ORDER by id_bidang LIMIT $start,$hits");
while ($ar=mysqli_fetch_array($result,MYSQLI_ASSOC))
{
$x++;
if($x==2) {$barva = "FFFFF2";$x=0;} else {$barva = "FFFFDF";$x=1;}
echo "<tr bgcolor=#$barva>";
print ('<td><center>'.$no++.'.<center></td>');

//cari bidang
$bidang1 = $ar['id_bidang'];
$result1 = mysqli_query($link, "Select * from sinori_sakip_bidang where id= '$bidang1'");
while ($row2=mysqli_fetch_array($result1,MYSQLI_ASSOC)){
print ('<td>'.$row2['bidang_nama'].'</td>');
}
//end cari
//cari saspro
$saspro1 = $ar['id_saspro'];
$result2 = mysqli_query($link, "Select * from sinori_sakip_saspro where id= '$saspro1'");
while ($row2=mysqli_fetch_array($result2,MYSQLI_ASSOC)){
print ('<td>'.$row2['saspro_nama'].'</td>');
}
//end cari
//cari indikator
$indikator1 = $ar['id_indikator'];
$tipe1 = $ar['id_tipe'];
//---------

 if ($tipe1  == "lag") {
$isi1 = "sinori_sakip_indikator";
} 
elseif ($tipe1 == "led") {
$isi1 = "sinori_sakip_ranpnidx";
} 
//---------------------
$result3 = mysqli_query($link, "Select * from ".$isi1." where id = '$indikator1'");
while ($row2=mysqli_fetch_array($result3,MYSQLI_ASSOC)){
print ('<td>'.$row2['indikator_nama'].'</td>');
}
//end cari

print ('<td><center><b>'.$ar['id_target'].'</b></center></td>');

print ('<td>');
  if ($ar['id_realisasi_tw1'] == "" && $ar['id_otentikasi_tw1'] == "0") {
print ('<center>');
echo"
<a href=\"mr.proses.2.input.php?session=$session1&step=TW1&idsatker=$sid1&id=".$ar['id']."\" onclick=\"NewWindow(this.href,'mywin','1200','650','yes','center');return false\" onfocus=\"this.blur()\">";

print ('<img src="images/isi_capaian.png" width="60" height="20"></a></center>');  
} 

elseif ($ar['id_realisasi_tw1'] !== "" && $ar['id_otentikasi_tw1'] == "0") {
print ('<center>');
echo"
<a href=\"mr.proses.2.input.php?session=$session1&step=TW1&idsatker=$sid1&id=".$ar['id']."\" onclick=\"NewWindow(this.href,'mywin','1200','650','yes','center');return false\" onfocus=\"this.blur()\">";

print ('<p style="color:red"> [ '.$ar['id_realisasi_tw1'].' ]</p></a></center>');  

}
elseif ($ar['id_realisasi_tw1'] !== "" && $ar['id_otentikasi_tw1'] == "1") {

print ('<center><p style="color:green"><b>'.$ar['id_realisasi_tw1'].'</b></p></center>');   
} 
print ('</td>');

//-------narasi
print ('<td>'.$ar['id_narasi_tw1'].'</td>');
//----------------------------
print ('<td>');
 if ($tipe1  == "lag") {
print ('<center><img src="images/tipe_lagging.png" width="60" height="20"></center>');
} 
elseif ($tipe1 == "led") {
print ('<center><img src="images/tipe_leading.png" width="60" height="20"></center>');
} 
print ('</td>');
}
echo" </tr>";
}
echo "</tbody></table>";
print ('<table width="100%"  border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td><strong>Catatan:</strong></td>
  </tr>
  <tr>
    <td>Apabila tombol isi catatan masih muncul maka isian belum dilakukan. untuk mengubah capaian target klik kembali isian. hal ini masih bisa dilakukan sebelum dilakukan validasi konfirmasi. tanpa validasi konfirmasi satker dianggap belum menyelesaikan pengisian (tidak patuh)</td>
  </tr>
</table>');
?>
<br>
Tetapkan validasi bahwa isian diatas telah benar dengan langkah otentikasi klik link berikut  Tidak ada upaya revisi setelah di Otentikasi. Terhadap Capaian Kinerja yang tidak diotentikasi maka tidak akan dilakukan reviu dan tidak menjadi bagian penilaian kinerja. Pastikan anda telah menyelesaikan seluruh Perjanjian kinerja yang ada dan menyatakan capaian masing-masing untuk di verifikasi/audit. Hanya capaian kinerja yang telah divalidasi dan di audit dapat mengikuti tahapan capaian kinerja selanjutnya.<br><br>
<div align="right"><a href="mr.validasi.kinerja.php?step=tw1&session=<?PHP echo $session1; ?>&nama=<?PHP echo $nama1; ?>&idsatker=<?PHP echo $sid1; ?>" onclick="NewWindow(this.href,'mywin','1000','600','yes','center');return false" onfocus="this.blur()"><img src="images/otentikasi.png" width="168" height="44"></a></div><br>
</p>
    
  </div>

  <div id="TW2" class="w3-container city" style="display:none">
    <h2>Periode April - Juni (TW 2)</h2>
    <p><?PHP 
include('mr.db.php');
$tables = "sinori_sakip_penetapan";
$link = mysqli_connect("$server","$username","$password","$database") or die(mysqli_error());
if(empty($action))
{
if (empty($order)) $order =  2;
if (empty($page))  $page  =  1;
if (empty($hits))  $hits  = 100;
$start = $hits*($page-1);
$kueri = mysqli_query($link, "SELECT * FROM $tables where id_satker = '$idsatker1' and id_tahun ='2024' and id_otentikasi_tw1 ='1'");
$data = array ();
while (($row = mysqli_fetch_array($kueri)) != null){
$data[] = $row;
}
$xnum = count ($data);
$stw2 = (int)($xnum/$hits);
if ($xnum%$hits > 0) {$stw2++;}
$np = $page+1;
$pp = $page-1;
if ($page == 1) { $pp=1; }
if ($np > $stw2) { $np = $stw2;} 

print ('
<table id="myTable" cellspacing="1" width="100%" align="center" cellpadding="3" bgcolor="#FFCC00" ><thead>
<tr bgcolor="#FFCC00">
<td width="2%"><center>No</center></td>
<td width="15%">Bidang</td>
<td width="23%">Saspro</td>
<td width="20%">Indikator</td>
<td width="6%"><center>Target</center></td>
<td width="6%"><center>Realisasi TW1</center></td>
<td width="7%"><center>Narasi TW1, HRO</center></td>
<td width="6%"><center>Realisasi TW2</center></td>
<td width="7%"><center>Narasi TW2, HRO</center></td>
<td width="6%"><center>Tipe</center></td>
</tr>
</thead><tbody>
');
$no=1; $x=0;
$result = mysqli_query($link, "SELECT * FROM $tables where id_satker = '$idsatker1' and id_tahun = '2024' and id_otentikasi_tw1 ='1' ORDER by id_bidang LIMIT $start,$hits");
while ($ar=mysqli_fetch_array($result,MYSQLI_ASSOC))
{
$x++;
if($x==2) {$barva = "FFFFF2";$x=0;} else {$barva = "FFFFDF";$x=1;}
echo "<tr bgcolor=#$barva>";
print ('<td><center>'.$no++.'.<center></td>');

//cari bidang
$bidang1 = $ar['id_bidang'];
$result1 = mysqli_query($link, "Select * from sinori_sakip_bidang where id= '$bidang1'");
while ($row2=mysqli_fetch_array($result1,MYSQLI_ASSOC)){
print ('<td>'.$row2['bidang_nama'].'</td>');
}
//end cari
//cari saspro
$saspro1 = $ar['id_saspro'];
$result2 = mysqli_query($link, "Select * from sinori_sakip_saspro where id= '$saspro1'");
while ($row2=mysqli_fetch_array($result2,MYSQLI_ASSOC)){
print ('<td>'.$row2['saspro_nama'].'</td>');
}
//end cari
//cari indikator
$indikator1 = $ar['id_indikator'];
$tipe1 = $ar['id_tipe'];
//---------

 if ($tipe1  == "lag") {
$isi1 = "sinori_sakip_indikator";
} 
elseif ($tipe1 == "led") {
$isi1 = "sinori_sakip_ranpnidx";
} 
//---------------------
$result3 = mysqli_query($link, "Select * from ".$isi1." where id = '$indikator1'");
while ($row2=mysqli_fetch_array($result3,MYSQLI_ASSOC)){
print ('<td>'.$row2['indikator_nama'].'</td>');
}
//end cari

print ('<td><center><b>'.$ar['id_target'].'</b></center></td>');
print ('<td><center><b>'.$ar['id_realisasi_tw1'].'</b></center></td>');
print ('<td>'.$ar['id_narasi_tw1'].'</td>');
//-------------------------capaian start
print ('<td>');
if ($ar['id_realisasi_tw2'] == "" && $ar['id_otentikasi_tw2'] == "0") {
print ('<center>');
echo"
<a href=\"mr.proses.2.input.php?session=$session1&step=TW2&idsatker=$sid1&id=".$ar['id']."\" onclick=\"NewWindow(this.href,'mywin','1200','650','yes','center');return false\" onfocus=\"this.blur()\">";

print ('<img src="images/isi_capaian.png" width="60" height="20"></a></center>');  
} 

elseif ($ar['id_realisasi_tw2'] !== "" && $ar['id_otentikasi_tw2'] == "0") {
print ('<center>');
echo"
<a href=\"mr.proses.2.input.php?session=$session1&step=TW2&idsatker=$sid1&id=".$ar['id']."\" onclick=\"NewWindow(this.href,'mywin','1200','650','yes','center');return false\" onfocus=\"this.blur()\">";

print ('<p style="color:red"> [ '.$ar['id_realisasi_tw2'].' ]</p></a></center>');  

}
elseif ($ar['id_realisasi_tw2'] !== "" && $ar['id_otentikasi_tw2'] == "1") {

print ('<center><p style="color:green"><b>'.$ar['id_realisasi_tw2'].'</b></p></center>');   
} 
print ('</td>');

//-------narasi
print ('<td>'.$ar['id_narasi_tw2'].'</td>');
//----------------------------
print ('<td>');
 if ($tipe1  == "lag") {
print ('<center><img src="images/tipe_lagging.png" width="60" height="20"></center>');
} 
elseif ($tipe1 == "led") {
print ('<center><img src="images/tipe_leading.png" width="60" height="20"></center>');
} 
print ('</td>');
}
echo" </tr>";
}
echo "</tbody></table>";
print ('<table width="100%"  border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td><strong>Catatan:</strong></td>
  </tr>
  <tr>
    <td>Apabila tombol isi catatan masih muncul maka isian belum dilakukan. untuk mengubah capaian target klik kembali isian. hal ini masih bisa dilakukan sebelum dilakukan validasi konfirmasi. tanpa validasi konfirmasi satker dianggap belum menyelesaikan pengisian (tidak patuh)</td>
  </tr>
</table>');
?>
<br>
Tetapkan validasi bahwa isian diatas telah benar dengan langkah otentikasi klik link berikut  Tidak ada upaya revisi setelah di Otentikasi. Terhadap Capaian Kinerja yang tidak diotentikasi maka tidak akan dilakukan reviu dan tidak menjadi bagian penilaian kinerja. Pastikan anda telah menyelesaikan seluruh Perjanjian kinerja yang ada dan menyatakan capaian masing-masing untuk di verifikasi/audit. Hanya capaian kinerja yang telah divalidasi dan di audit dapat mengikuti tahapan capaian kinerja selanjutnya.<br><br>
<div align="right"><a href="mr.validasi.kinerja.php?step=tw2&session=<?PHP echo $session1; ?>&nama=<?PHP echo $nama1; ?>&idsatker=<?PHP echo $sid1; ?>" onclick="NewWindow(this.href,'mywin','1000','600','yes','center');return false" onfocus="this.blur()"><img src="images/otentikasi.png" width="168" height="44"></a></div><br></p> 
  </div>

  <div id="TW3" class="w3-container city" style="display:none">
    <h2>Periode Juli - September (TW 3)</h2>
    <p><?PHP 
include('mr.db.php');
$tables = "sinori_sakip_penetapan";
$link = mysqli_connect("$server","$username","$password","$database") or die(mysqli_error());
if(empty($action))
{
if (empty($order)) $order =  2;
if (empty($page))  $page  =  1;
if (empty($hits))  $hits  = 100;
$start = $hits*($page-1);
$kueri = mysqli_query($link, "SELECT * FROM $tables where id_satker = '$idsatker1' and id_tahun ='2024' and id_otentikasi_tw2 ='1'");
$data = array ();
while (($row = mysqli_fetch_array($kueri)) != null){
$data[] = $row;
}
$xnum = count ($data);
$stw2 = (int)($xnum/$hits);
if ($xnum%$hits > 0) {$stw2++;}
$np = $page+1;
$pp = $page-1;
if ($page == 1) { $pp=1; }
if ($np > $stw2) { $np = $stw2;} 

print ('
<table id="myTable" cellspacing="1" width="100%" align="center" cellpadding="3" bgcolor="#FFCC00" ><thead>
<tr bgcolor="#FFCC00">
<td width="2%"><center>No</center></td>
<td width="15%">Bidang</td>
<td width="15%">Saspro</td>
<td width="15%">Indikator</td>
<td width="6%"><center>Target</center></td>
<td width="6%"><center>Realisasi TW1</center></td>
<td width="7%"><center>Narasi TW1, HRO</center></td>
<td width="6%"><center>Realisasi TW2</center></td>
<td width="7%"><center>Narasi TW2, HRO</center></td>
<td width="6%"><center>Realisasi TW3</center></td>
<td width="7%"><center>Narasi TW3, HRO</center></td>
<td width="6%"><center>Tipe</center></td>
</tr>
</thead><tbody>
');
$no=1; $x=0;
$result = mysqli_query($link, "SELECT * FROM $tables where id_satker = '$idsatker1' and id_tahun = '2024' and id_otentikasi_tw2 ='1' ORDER by id_bidang LIMIT $start,$hits");
while ($ar=mysqli_fetch_array($result,MYSQLI_ASSOC))
{
$x++;
if($x==2) {$barva = "FFFFF2";$x=0;} else {$barva = "FFFFDF";$x=1;}
echo "<tr bgcolor=#$barva>";
print ('<td><center>'.$no++.'.<center></td>');

//cari bidang
$bidang1 = $ar['id_bidang'];
$result1 = mysqli_query($link, "Select * from sinori_sakip_bidang where id= '$bidang1'");
while ($row2=mysqli_fetch_array($result1,MYSQLI_ASSOC)){
print ('<td>'.$row2['bidang_nama'].'</td>');
}
//end cari
//cari saspro
$saspro1 = $ar['id_saspro'];
$result2 = mysqli_query($link, "Select * from sinori_sakip_saspro where id= '$saspro1'");
while ($row2=mysqli_fetch_array($result2,MYSQLI_ASSOC)){
print ('<td>'.$row2['saspro_nama'].'</td>');
}
//end cari
//cari indikator
$indikator1 = $ar['id_indikator'];
$tipe1 = $ar['id_tipe'];
//---------

 if ($tipe1  == "lag") {
$isi1 = "sinori_sakip_indikator";
} 
elseif ($tipe1 == "led") {
$isi1 = "sinori_sakip_ranpnidx";
} 
//---------------------
$result3 = mysqli_query($link, "Select * from ".$isi1." where id = '$indikator1'");
while ($row2=mysqli_fetch_array($result3,MYSQLI_ASSOC)){
print ('<td>'.$row2['indikator_nama'].'</td>');
}
//end cari

print ('<td><center><b>'.$ar['id_target'].'</b></center></td>');
print ('<td><center><b>'.$ar['id_realisasi_tw1'].'</b></center></td>');
print ('<td>'.$ar['id_narasi_tw1'].'</td>');
print ('<td><center><b>'.$ar['id_realisasi_tw2'].'</b></center></td>');
print ('<td>'.$ar['id_narasi_tw2'].'</td>');
//-------------------------capaian start
print ('<td>');
if ($ar['id_realisasi_tw3'] == "" && $ar['id_otentikasi_tw3'] == "0") {
print ('<center>');
echo"
<a href=\"mr.proses.2.input.php?session=$session1&step=TW3&idsatker=$sid1&id=".$ar['id']."\" onclick=\"NewWindow(this.href,'mywin','1200','650','yes','center');return false\" onfocus=\"this.blur()\">";

print ('<img src="images/isi_capaian.png" width="60" height="20"></a></center>');  
} 

elseif ($ar['id_realisasi_tw3'] !== "" && $ar['id_otentikasi_tw3'] == "0") {
print ('<center>');
echo"
<a href=\"mr.proses.2.input.php?session=$session1&step=TW2&idsatker=$sid1&id=".$ar['id']."\" onclick=\"NewWindow(this.href,'mywin','1200','650','yes','center');return false\" onfocus=\"this.blur()\">";

print ('<p style="color:red"> [ '.$ar['id_realisasi_tw2'].' ]</p></a></center>');  

}
elseif ($ar['id_realisasi_tw3'] !== "" && $ar['id_otentikasi_tw3'] == "1") {

print ('<center><p style="color:green"><b>'.$ar['id_realisasi_tw3'].'</b></p></center>');   
} 
print ('</td>');

//-------narasi
print ('<td>'.$ar['id_narasi_tw3'].'</td>');
//----------------------------
print ('<td>');
 if ($tipe1  == "lag") {
print ('<center><img src="images/tipe_lagging.png" width="60" height="20"></center>');
} 
elseif ($tipe1 == "led") {
print ('<center><img src="images/tipe_leading.png" width="60" height="20"></center>');
} 
print ('</td>');
}
echo" </tr>";
}
echo "</tbody></table>";
print ('<table width="100%"  border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td><strong>Catatan:</strong></td>
  </tr>
  <tr>
    <td>Apabila tombol isi catatan masih muncul maka isian belum dilakukan. untuk mengubah capaian target klik kembali isian. hal ini masih bisa dilakukan sebelum dilakukan validasi konfirmasi. tanpa validasi konfirmasi satker dianggap belum menyelesaikan pengisian (tidak patuh)</td>
  </tr>
</table>');
?>
<br>
Tetapkan validasi bahwa isian diatas telah benar dengan langkah otentikasi klik link berikut  Tidak ada upaya revisi setelah di Otentikasi. Terhadap Capaian Kinerja yang tidak diotentikasi maka tidak akan dilakukan reviu dan tidak menjadi bagian penilaian kinerja. Pastikan anda telah menyelesaikan seluruh Perjanjian kinerja yang ada dan menyatakan capaian masing-masing untuk di verifikasi/audit. Hanya capaian kinerja yang telah divalidasi dan di audit dapat mengikuti tahapan capaian kinerja selanjutnya.<br><br>
<div align="right"><a href="mr.validasi.kinerja.php?step=tw3&session=<?PHP echo $session1; ?>&nama=<?PHP echo $nama1; ?>&idsatker=<?PHP echo $sid1; ?>" onclick="NewWindow(this.href,'mywin','1000','600','yes','center');return false" onfocus="this.blur()"><img src="images/otentikasi.png" width="168" height="44"></a></div><br></p> </p>
  </div>
      <div id="TW4" class="w3-container city" style="display:none">
    <h2>Periode Oktober - November (TW 4)</h2>
    <p><?PHP 
include('mr.db.php');
$tables = "sinori_sakip_penetapan";
$link = mysqli_connect("$server","$username","$password","$database") or die(mysqli_error());
if(empty($action))
{
if (empty($order)) $order =  2;
if (empty($page))  $page  =  1;
if (empty($hits))  $hits  = 100;
$start = $hits*($page-1);
$kueri = mysqli_query($link, "SELECT * FROM $tables where id_satker = '$idsatker1' and id_tahun ='2024' and id_otentikasi_tw3 ='1'");
$data = array ();
while (($row = mysqli_fetch_array($kueri)) != null){
$data[] = $row;
}
$xnum = count ($data);
$stw2 = (int)($xnum/$hits);
if ($xnum%$hits > 0) {$stw2++;}
$np = $page+1;
$pp = $page-1;
if ($page == 1) { $pp=1; }
if ($np > $stw2) { $np = $stw2;} 

print ('
<table id="myTable" cellspacing="1" width="100%" align="center" cellpadding="3" bgcolor="#FFCC00" ><thead>
<tr bgcolor="#FFCC00">
<td width="2%"><center>No</center></td>
<td width="12%">Bidang</td>
<td width="10%">Saspro</td>
<td width="10%">Indikator</td>
<td width="6%"><center>Target</center></td>
<td width="6%"><center>Realisasi TW1</center></td>
<td width="7%"><center>Narasi TW1, HRO</center></td>
<td width="6%"><center>Realisasi TW2</center></td>
<td width="7%"><center>Narasi TW2, HRO</center></td>
<td width="6%"><center>Realisasi TW3</center></td>
<td width="7%"><center>Narasi TW3, HRO</center></td>
<td width="6%"><center>Realisasi TW4</center></td>
<td width="7%"><center>Narasi TW4, HRO</center></td>
<td width="6%"><center>Tipe</center></td>
</tr>
</thead><tbody>
');
$no=1; $x=0;
$result = mysqli_query($link, "SELECT * FROM $tables where id_satker = '$idsatker1' and id_tahun = '2024' and id_otentikasi_tw3 ='1' ORDER by id_bidang LIMIT $start,$hits");
while ($ar=mysqli_fetch_array($result,MYSQLI_ASSOC))
{
$x++;
if($x==2) {$barva = "FFFFF2";$x=0;} else {$barva = "FFFFDF";$x=1;}
echo "<tr bgcolor=#$barva>";
print ('<td><center>'.$no++.'.<center></td>');

//cari bidang
$bidang1 = $ar['id_bidang'];
$result1 = mysqli_query($link, "Select * from sinori_sakip_bidang where id= '$bidang1'");
while ($row2=mysqli_fetch_array($result1,MYSQLI_ASSOC)){
print ('<td>'.$row2['bidang_nama'].'</td>');
}
//end cari
//cari saspro
$saspro1 = $ar['id_saspro'];
$result2 = mysqli_query($link, "Select * from sinori_sakip_saspro where id= '$saspro1'");
while ($row2=mysqli_fetch_array($result2,MYSQLI_ASSOC)){
print ('<td>'.$row2['saspro_nama'].'</td>');
}
//end cari
//cari indikator
$indikator1 = $ar['id_indikator'];
$tipe1 = $ar['id_tipe'];
//---------

 if ($tipe1  == "lag") {
$isi1 = "sinori_sakip_indikator";
} 
elseif ($tipe1 == "led") {
$isi1 = "sinori_sakip_ranpnidx";
} 
//---------------------
$result3 = mysqli_query($link, "Select * from ".$isi1." where id = '$indikator1'");
while ($row2=mysqli_fetch_array($result3,MYSQLI_ASSOC)){
print ('<td>'.$row2['indikator_nama'].'</td>');
}
//end cari

print ('<td><center><b>'.$ar['id_target'].'</b></center></td>');
print ('<td><center><b>'.$ar['id_realisasi_tw1'].'</b></center></td>');
print ('<td>'.$ar['id_narasi_tw1'].'</td>');
print ('<td><center><b>'.$ar['id_realisasi_tw2'].'</b></center></td>');
print ('<td>'.$ar['id_narasi_tw2'].'</td>');
print ('<td><center><b>'.$ar['id_realisasi_tw3'].'</b></center></td>');
print ('<td>'.$ar['id_narasi_tw3'].'</td>');
//-------------------------capaian start
print ('<td>');
if ($ar['id_realisasi_tw4'] == "" && $ar['id_otentikasi_tw4'] == "0") {
print ('<center>');
echo"
<a href=\"mr.proses.2.input.php?session=$session1&step=TW4&idsatker=$sid1&id=".$ar['id']."\" onclick=\"NewWindow(this.href,'mywin','1200','650','yes','center');return false\" onfocus=\"this.blur()\">";

print ('<img src="images/isi_capaian.png" width="60" height="20"></a></center>');  
} 

elseif ($ar['id_realisasi_tw4'] !== "" && $ar['id_otentikasi_tw4'] == "0") {
print ('<center>');
echo"
<a href=\"mr.proses.2.input.php?session=$session1&step=TW2&idsatker=$sid1&id=".$ar['id']."\" onclick=\"NewWindow(this.href,'mywin','1200','650','yes','center');return false\" onfocus=\"this.blur()\">";

print ('<p style="color:red"> [ '.$ar['id_realisasi_tw4'].' ]</p></a></center>');  

}
elseif ($ar['id_realisasi_tw4'] !== "" && $ar['id_otentikasi_tw4'] == "1") {

print ('<center><p style="color:green"><b>'.$ar['id_realisasi_tw4'].'</b></p></center>');   
} 
print ('</td>');

//-------narasi
print ('<td>'.$ar['id_narasi_tw4'].'</td>');
//----------------------------
print ('<td>');
 if ($tipe1  == "lag") {
print ('<center><img src="images/tipe_lagging.png" width="60" height="20"></center>');
} 
elseif ($tipe1 == "led") {
print ('<center><img src="images/tipe_leading.png" width="60" height="20"></center>');
} 
print ('</td>');
}
echo" </tr>";
}
echo "</tbody></table>";
print ('<table width="100%"  border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td><strong>Catatan:</strong></td>
  </tr>
  <tr>
    <td>Apabila tombol isi catatan masih muncul maka isian belum dilakukan. untuk mengubah capaian target klik kembali isian. hal ini masih bisa dilakukan sebelum dilakukan validasi konfirmasi. tanpa validasi konfirmasi satker dianggap belum menyelesaikan pengisian (tidak patuh)</td>
  </tr>
</table>');
?>
<br>
Tetapkan validasi bahwa isian diatas telah benar dengan langkah otentikasi klik link berikut  Tidak ada upaya revisi setelah di Otentikasi. Terhadap Capaian Kinerja yang tidak diotentikasi maka tidak akan dilakukan reviu dan tidak menjadi bagian penilaian kinerja. Pastikan anda telah menyelesaikan seluruh Perjanjian kinerja yang ada dan menyatakan capaian masing-masing untuk di verifikasi/audit. Hanya capaian kinerja yang telah divalidasi dan di audit dapat mengikuti tahapan capaian kinerja selanjutnya.<br><br>
<div align="right"><a href="mr.validasi.kinerja.php?step=tw4&session=<?PHP echo $session1; ?>&nama=<?PHP echo $nama1; ?>&idsatker=<?PHP echo $sid1; ?>" onclick="NewWindow(this.href,'mywin','1000','600','yes','center');return false" onfocus="this.blur()"><img src="images/otentikasi.png" width="168" height="44"></a></div><br></p>
  </div>
       <div id="APIP" class="w3-container city" style="display:none">
    <h2>VERIFIKASI APIP CAPAIAN KINERJA SATKER ANDA</h2>
    <p>Hasil Verifikasi APIP akan ditampilkan disini. (Hanya Capaian Kinerja yang telah di otentikasi Satker dan telah di verifikasi APIP akan ditampilkan disini.)<br><br>
	<?PHP 
include('mr.db.php');
$tables = "sinori_sakip_penetapan";
$link = mysqli_connect("$server","$username","$password","$database") or die(mysqli_error());
if(empty($action))
{
if (empty($order)) $order =  2;
if (empty($page))  $page  =  1;
if (empty($hits))  $hits  = 100;
$start = $hits*($page-1);
$kueri = mysqli_query($link, "SELECT * FROM $tables where id_satker = '$idsatker1' and id_tahun ='2024' and id_otentikasi_tw4 ='1'");
$data = array ();
while (($row = mysqli_fetch_array($kueri)) != null){
$data[] = $row;
}
$xnum = count ($data);
$stw2 = (int)($xnum/$hits);
if ($xnum%$hits > 0) {$stw2++;}
$np = $page+1;
$pp = $page-1;
if ($page == 1) { $pp=1; }
if ($np > $stw2) { $np = $stw2;} 

print ('
<table id="myTable" cellspacing="1" width="100%" align="center" cellpadding="3" bgcolor="#FFCC00" ><thead>
<tr bgcolor="#FFCC00">
<td width="2%"><center>No</center></td>
<td width="8%">Bidang</td>
<td width="8%">Saspro</td>
<td width="8%">Indikator</td>
<td width="6%"><center>Target</center></td>
<td width="6%"><center>Realisasi TW1</center></td>
<td width="7%"><center>Narasi TW1</center></td>
<td width="6%"><center>Realisasi TW2</center></td>
<td width="7%"><center>Narasi TW2</center></td>
<td width="6%"><center>Realisasi TW3</center></td>
<td width="7%"><center>Narasi TW3</center></td>
<td width="6%"><center>Realisasi TW4</center></td>
<td width="7%"><center>Narasi TW4</center></td>
<td width="6%"><center>Tipe</center></td>
<td width="8%"><center>Hasil APIP</center></td>
</tr>
</thead><tbody>
');
$no=1; $x=0;
$result = mysqli_query($link, "SELECT * FROM $tables where id_satker = '$idsatker1' and id_tahun = '2024' and id_otentikasi_tw4 ='1' ORDER by id_bidang LIMIT $start,$hits");
while ($ar=mysqli_fetch_array($result,MYSQLI_ASSOC))
{
$x++;
if($x==2) {$barva = "FFFFF2";$x=0;} else {$barva = "FFFFDF";$x=1;}
echo "<tr bgcolor=#$barva>";
print ('<td><center>'.$no++.'.<center></td>');

//cari bidang
$bidang1 = $ar['id_bidang'];
$result1 = mysqli_query($link, "Select * from sinori_sakip_bidang where id= '$bidang1'");
while ($row2=mysqli_fetch_array($result1,MYSQLI_ASSOC)){
print ('<td>'.$row2['bidang_nama'].'</td>');
}
//end cari
//cari saspro
$saspro1 = $ar['id_saspro'];
$result2 = mysqli_query($link, "Select * from sinori_sakip_saspro where id= '$saspro1'");
while ($row2=mysqli_fetch_array($result2,MYSQLI_ASSOC)){
print ('<td>'.$row2['saspro_nama'].'</td>');
}
//end cari
//cari indikator
$indikator1 = $ar['id_indikator'];
$tipe1 = $ar['id_tipe'];
//---------

 if ($tipe1  == "lag") {
$isi1 = "sinori_sakip_indikator";
} 
elseif ($tipe1 == "led") {
$isi1 = "sinori_sakip_ranpnidx";
} 
//---------------------
$result3 = mysqli_query($link, "Select * from ".$isi1." where id = '$indikator1'");
while ($row2=mysqli_fetch_array($result3,MYSQLI_ASSOC)){
print ('<td>'.$row2['indikator_nama'].'</td>');
}
//end cari

print ('<td><center><b>'.$ar['id_target'].'</b></center></td>');
print ('<td><center><b>'.$ar['id_realisasi_tw1'].'</b></center></td>');
print ('<td>'.$ar['id_narasi_tw1'].'</td>');
print ('<td><center><b>'.$ar['id_realisasi_tw2'].'</b></center></td>');
print ('<td>'.$ar['id_narasi_tw2'].'</td>');
print ('<td><center><b>'.$ar['id_realisasi_tw3'].'</b></center></td>');
print ('<td>'.$ar['id_narasi_tw3'].'</td>');
print ('<td><center><b>'.$ar['id_realisasi_tw4'].'</b></center></td>');
print ('<td>'.$ar['id_narasi_tw4'].'</td>');
//----------------------------
print ('<td>');
 if ($tipe1  == "lag") {
print ('<center><img src="images/tipe_lagging.png" width="60" height="20"></center>');
} 
elseif ($tipe1 == "led") {
print ('<center><img src="images/tipe_leading.png" width="60" height="20"></center>');
} 
print ('</td>');
print ('<td>'.$ar['id_komentar'].'</td>');
}
echo" </tr>";
}
echo "</tbody></table>";
print ('<table width="100%"  border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td><strong>Catatan:</strong></td>
  </tr>
  <tr>
    <td>VERIFIKASI APIP</td>
  </tr>
</table>');
?></p>
  </div>

</div>

<script>
function openCity(evt, cityName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" w3-red", ""); 
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " w3-red";
}
</script>

</body>

