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
  <h5 class="w3-bar-item"><b>EVALUASI</b></h5>
  <button class="w3-bar-item w3-button tablink" onclick="openCity(event, 'Event1')">Evaluasi Internal</button>
  <button class="w3-bar-item w3-button tablink" onclick="openCity(event, 'renaksieval')">Evaluasi Ren Aksi</button>
    <button class="w3-bar-item w3-button tablink" onclick="openCity(event, 'LHE')">LHE AKIP & TL</button>
<button class="w3-bar-item w3-button tablink" onclick="openCity(event, 'Event2')">Radar Capaian</button>
<button class="w3-bar-item w3-button tablink" onclick="openCity(event, 'LKJIP')">Laporan Kinerja (LKJiP)</button>

</div>

<div style="margin-left:170px">
  <div class="w3-padding">Hasil Pemantauan, Penilaian dan Evaluasi</div>

  <div id="Event1" class="w3-container city" style="display:none">
    <h2>Capaian Kinerja Penilaian Mandiri Internal <?PHP echo $idsatker1; ?></h2>
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
$kueri = mysqli_query($link, "SELECT * FROM $tables where id_satker = '$idsatker1' and id_otentikasi_tw1 ='1' and id_otentikasi_tw2 ='1' and id_otentikasi_tw3 ='1' and id_otentikasi_tw4 ='1' and id_hide !='1'");
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
<td width="10%">Bidang</td>
<td width="29%">Saspro</td>
<td width="24%">Indikator</td>
<td width="6%"><center>Target</center></td>
<td width="6%"><center>TW 1</center></td>
<td width="6%"><center>TW 2</center></td>
<td width="6%"><center>TW 3</center></td>
<td width="6%"><center>TW 4</center></td>
<td width="6%"><center>Tipe</center></td>

</tr>
</thead><tbody>
');
$no=1; $x=0;
$result = mysqli_query($link, "SELECT * FROM $tables where id_satker = '$idsatker1' and id_otentikasi_tw1 ='1' and id_otentikasi_tw2 ='1' and id_otentikasi_tw3 ='1' and id_otentikasi_tw4 ='1' and id_hide !='1' ORDER by id_bidang LIMIT $start,$hits");
while ($ar=mysqli_fetch_array($result,MYSQLI_ASSOC))
{
$x++;
if($x==2) {$barva = "FFFFB7";$x=0;} else {$barva = "FFD8B0";$x=1;}
echo "<tr bgcolor=#$barva>";
print ('<td><center>'.$no++.'.<center></td>');

//cari bidang
$bidang1 = $ar['id_bidang'];
$result1 = mysqli_query($link, "Select * from sinori_sakip_bidang where id= '$bidang1'");
while ($row2=mysqli_fetch_array($result1,MYSQLI_ASSOC)){
print ('<td>'.$bidang1.' - '.$row2['bidang_nama'].'</td>');
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

print ('<td><center>'.$ar['id_target'].'</center></td>');

print ('<td>');
  if ($ar['id_realisasi_tw1'] == "") {
print ('<center>-</center>');  
} 
else {
print ('<b><center>'.$ar['id_realisasi_tw1'].'</center></b>');   
} 
print ('</td>');

print ('<td>');
  if ($ar['id_realisasi_tw2'] == "") {
print ('<center>-</center>');  
} 
else {
print ('<b><center>'.$ar['id_realisasi_tw2'].'</center></b>');   
} 
print ('</td>');


print ('<td>');
  if ($ar['id_realisasi_tw3'] == "") {
print ('<center>-</center>');  
} 
else {
print ('<b><center>'.$ar['id_realisasi_tw3'].'</center></b>');   
} 
print ('</td>');

print ('<td>');
  if ($ar['id_realisasi_tw4'] == "") {
print ('<center>-</center>');  
} 
else {
print ('<b><center>'.$ar['id_realisasi_tw4'].'</center></b>');   
} 
print ('</td>');
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
?></p>

  </div>
  <!------LAPORAN RENAKSI----->
    <div id="renaksieval" class="w3-container city" style="display:none">
    <h2>Laporan Ren Aksi</h2>
    <p>Upload File Evaluasi Rencana Aksi yang telah dibuat. Sesuaikan dengan triwulan yang ada.</p> 

	 <p><div align="right"><a href="mr.renaksieval.php?session=<?PHP echo $session1; ?>&nama=<?PHP echo $nama1; ?>&idsatker=<?PHP echo $sid1; ?>" onclick="NewWindow(this.href,'mywin','1000','600','yes','center');return false" onfocus="this.blur()"><img src="images/input.png" width="181" height="45" border="0"></a></div><br><?PHP 
include('mr.db.php');
$tables = "sinori_sakip_renaksieval";
$link = mysqli_connect("$server","$username","$password","$database") or die(mysqli_error());
if(empty($action))
{
if (empty($order)) $order =  2;
if (empty($page))  $page  =  1;
if (empty($hits))  $hits  = 100;
$start = $hits*($page-1);
$kueri = mysqli_query($link, "SELECT * FROM $tables where id_satker = '$idsatker1'");
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
<td width="5%"><center>No</center></td>
<td width="8%">Periode</td>
<td width="7%">Triwulan Ke</td>
<td width="5%"><center>Versi</center></td>
<td width="10%"><center>Tgl Upload</center></td>
<td width="20%"><center>Diaudit Oleh</center></td>
<td width="35%"><center>Temuan/Rekomendasi</center></td>
<td width="10%"><center>Tgl Audit</center></td>
</tr>
</thead><tbody>
');
$no=1; $x=0;
$result = mysqli_query($link, "SELECT * FROM $tables where id_satker = '$idsatker1' LIMIT $start,$hits");
while ($ar=mysqli_fetch_array($result,MYSQLI_ASSOC))
{
$x++;
if($x==2) {$barva = "FFFFB7";$x=0;} else {$barva = "FFD8B0";$x=1;}
echo "<tr bgcolor=#$barva>";
print ('<td ><center>'.$no++.'<center></td>');
print (' <td ><a href="http://panev.kejaksaan.go.id/sakip/repository/'.$idsatker1.'/'.$ar['id_filename'].'" target="_blank">'.$ar['id_periode'].'</a></td>');
print (' <td ><center>'.$ar['id_triwulan'].'</center></td>');
print (' <td ><center>'.$ar['id_perubahan'].'</center></td>');
print (' <td ><center>'.$ar['id_tglupload'].'</center></td>');
print (' <td >');
 if ($ar['id_audit']  == "") {
print ('<center><img src="themes/audit_auditor.png" width="35" height="35"></center>');
} 
elseif ($ar['id_audit'] !== "") {
print ('<center>'.$ar['id_audit'].'</center>');
} 
print (' </td >');



print (' <td >');
 if ($ar['id_hasil']  == "") {
print ('<center><img src="themes/audit_hasil.png" width="35" height="35"></center>');
} 
elseif ($ar['id_hasil'] !== "") {
print ('<center>'.$ar['id_hasi;'].'</center>');
} 
print (' </td >');
print (' <td >');
 if ($ar['id_tglaudit']  == "") {
print ('<center>Null</center>');
} 
elseif ($ar['id_tglaudit'] !== "") {
print ('<center>'.$ar['id_tglaudit'].'</center>');
} 
print (' </td >');

}
echo" </tr>";
}
echo "</tbody></table>";
?><table width="100%"  border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td colspan="2">Legend:</td>
  </tr>
  <tr>
    <td width="4%"><img src="themes/audit_auditor.png" width="35" height="35"></td>
    <td width="96%">Apabila yang masih muncul  icon ini maka belum dilakukan proses audit </td>
  </tr>
  <tr>
    <td><img src="themes/audit_hasil.png" width="35" height="35">&nbsp;</td>
    <td>Apabila yang masih muncul icon ini maka belum dilakukan proses pengisian hasil audit </td>
  </tr>
</table>
	
  </div>

</div>
    <!------RENAKSI END----->
  
   <div id="LHE" class="w3-container city" style="display:none">
    <h2>LAPORAN HASIL EVALUASI DAN TINDAK LANJUT</h2>
    <p><?PHP 
include('mr.db.php');
$tables = "sinori_sakip_lhe";
$link = mysqli_connect("$server","$username","$password","$database") or die(mysqli_error());
if(empty($action))
{
if (empty($order)) $order =  2;
if (empty($page))  $page  =  1;
if (empty($hits))  $hits  = 100;
$start = $hits*($page-1);
$kueri = mysqli_query($link, "SELECT * FROM $tables where id_satker = '$idsatker1'");
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
<td width="5%"><center>No</center></td>
<td width="20%">Hasil Evaluasi</td>
<td width="20%">Rekomendasi</td>
<td width="10%"><center>Tanggal Evaluasi</center></td>
<td width="15%"><center>Evaluator</center></td>
<td width="20%">Jawaban</td>/
<td width="10%"><center>Tanggal Jawaban</center></td>
</tr>
</thead><tbody>
');
$no=1; $x=0;
$result = mysqli_query($link, "SELECT * FROM $tables where id_satker = '$idsatker1' LIMIT $start,$hits");
while ($ar=mysqli_fetch_array($result,MYSQLI_ASSOC))
{
$x++;
if($x==2) {$barva = "FFFFB7";$x=0;} else {$barva = "FFD8B0";$x=1;}
echo "<tr bgcolor=#$barva>";
print ('<td ><center>'.$no++.'<center></td>');
//print (' <td ><a href="http://panev.kejaksaan.go.id/sakip/repository/'.$idsatker1.'/'.$ar['id_filename'].'" target="_blank">LKjIP Tahun '.$ar['id_periode'].'</a></td> ');
print (' <td >'.$ar['id_evaluasi'].'</td>');
print (' <td >'.$ar['id_rekomendasi'].'</td>');
print (' <td ><center>'.$ar['id_tgleval'].'</center></td>');
print (' <td ><center>'.$ar['id_evaluator'].'</center></td>');
print (' <td >'.$ar['id_jawaban'].'</td>');
print (' <td ><center>'.$ar['id_tgljawab'].'</center></td>');

}
echo" </tr>";
}
echo "</tbody></table>";
?></p><table width="100%"  border="0" cellspacing="4" cellpadding="4">
  <tr>
    <td>Tindak Lanjut Hasil Pemeriksaan - LHE AKIP - wajib dselesaikan maksimal 30 hari sejak di evaluasi oleh evaluator</td>
  </tr>
</table></p>
</div>

  <div id="Event2" class="w3-container city" style="display:none">
    <h2>Radar Capaian Kinerja</h2>
    <p>


<canvas id="marksChart" width="600" height="400"></canvas>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js'></script>
      <script>
var marksCanvas = document.getElementById("marksChart");

var marksData = {
  labels: ["Capaian TW1", "Capaian TW2", "Capaian TW3", "Capaian TW4"],
  datasets: [{
    label: "Capaian Kinerja 2023",
    backgroundColor: "rgba(200,0,0,0.2)",
    data: [65, 75, 70, 80]
  }, {
    label: "Capaian Kinerja 2024",
    backgroundColor: "rgba(0,0,200,0.2)",
    data: [54, 65, 60, 70]
  }]
};

var radarChart = new Chart(marksCanvas, {
  type: 'radar',
  data: marksData
});
    </script>

  
</p> 

  </div>

  <div id="LKJIP" class="w3-container city" style="display:none">
    <h2><p>UPLOAD LKjIP SATKER ANDA</p></h2>
	
	<div align="right"><a href="mr.lkjip.php?session=<?PHP echo $session1; ?>&nama=<?PHP echo $nama1; ?>&idsatker=<?PHP echo $sid1; ?>" onclick="NewWindow(this.href,'mywin','1000','600','yes','center');return false" onfocus="this.blur()"><img src="images/input.png" width="181" height="45" border="0"></a></div><br>
	<p><?PHP 
include('mr.db.php');
$tables = "sinori_sakip_lakip";
$link = mysqli_connect("$server","$username","$password","$database") or die(mysqli_error());
if(empty($action))
{
if (empty($order)) $order =  2;
if (empty($page))  $page  =  1;
if (empty($hits))  $hits  = 100;
$start = $hits*($page-1);
$kueri = mysqli_query($link, "SELECT * FROM $tables where id_satker = '$idsatker1'");
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
<td width="5%"><center>No</center></td>
<td width="45%">Tahun LKjIP</td>
<td width="10%"><center>Versi</center></td>
<td width="40%">Tgl Upload</td>
</tr>
</thead><tbody>
');
$no=1; $x=0;
$result = mysqli_query($link, "SELECT * FROM $tables where id_satker = '$idsatker1' LIMIT $start,$hits");
while ($ar=mysqli_fetch_array($result,MYSQLI_ASSOC))
{
$x++;
if($x==2) {$barva = "FFFFB7";$x=0;} else {$barva = "FFD8B0";$x=1;}
echo "<tr bgcolor=#$barva>";
print ('<td ><center>'.$no++.'<center></td>');
print (' <td ><a href="http://panev.kejaksaan.go.id/sakip/repository/'.$idsatker1.'/'.$ar['id_filename'].'" target="_blank">LKjIP Tahun '.$ar['id_periode'].'</a></td> ');
print (' <td ><center>'.$ar['id_perubahan'].'</center></td>');
print (' <td >'.$ar['id_tglupload'].'</td>');

}
echo" </tr>";
}
echo "</tbody></table>";
?></p><table width="100%"  border="0" cellspacing="4" cellpadding="4">
  <tr>
    <td>Laporan Kinerja wajib dilakukan setiap tahun dan dilaporkan sebelum Februari tahun berjalan.</td>
  </tr>
</table>

  </div>
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

