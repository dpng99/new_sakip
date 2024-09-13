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
  <h5 class="w3-bar-item"><b>PELAPORAN</b></h5>
  <button class="w3-bar-item w3-button tablink" onclick="openCity(event, 'TW1')">Capaian TW 1 </button>
  <button class="w3-bar-item w3-button tablink" onclick="openCity(event, 'TW2')">Capaian TW 2 </button>
  <button class="w3-bar-item w3-button tablink" onclick="openCity(event, 'TW3')">Capaian TW 3 </button>
   <button class="w3-bar-item w3-button tablink" onclick="openCity(event, 'TW4')">Capaian TW 4 </button>
   
</div>

<div style="margin-left:170px">
  <div class="w3-padding">CAPAIAN PENETAPAN KINERJA TAHUNAN (PANTAUAN TRIWULAN)</div>

  <div id="TW1" class="w3-container city" style="display:none">
    <h2>Capaian Triwulan 1 Periode Januari - Pebruari - Maret</h2>
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
$kueri = mysqli_query($link, "SELECT * FROM $tables where id_satker = '$idsatker1' and id_tahun ='2024' and id_otentikasi_tw1 ='1' and id_hide !='1' and id_hide !='1'");
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
<td width="26%">Saspro</td>
<td width="23%">Indikator</td>
<td width="6%"><center>Target</center></td>
<td width="6%"><center>Realisasi TW1</center></td>
<td width="10%"><center>Capaian Kinerja TW1</center></td>
<td width="10%"><center>Kendala dan Hambatan TW1</center></td>
<td width="10%"><center>Langkah Strategi/Optimalisasi TW1</center></td>
<td width="6%"><center>Tipe</center></td>
</tr>
</thead><tbody>
');
$no=1; $x=0;
$result = mysqli_query($link, "SELECT * FROM $tables where id_satker = '$idsatker1' and id_tahun = '2024' and id_otentikasi_tw1 ='1' and id_hide !='1' ORDER by id_bidang LIMIT $start,$hits");
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
print ('<td>'.$ar['id_narasi_tw1_2'].'</td>');
print ('<td>'.$ar['id_narasi_tw1_3'].'</td>');

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
    <td>CAPAIAN TRIWULAN 1</td>
  </tr>
</table>');
?></p>
  </div>
  
      <div id="TW2" class="w3-container city" style="display:none">
    <h2>Capaian Triwulan 2 April - Mei - Juni</h2>
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
$kueri = mysqli_query($link, "SELECT * FROM $tables where id_satker = '$idsatker1' and id_tahun ='2024' and id_otentikasi_tw2 ='1' and id_hide !='1'");
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
<td width="26%">Saspro</td>
<td width="23%">Indikator</td>
<td width="6%"><center>Target</center></td>
<td width="6%"><center>Realisasi TW2</center></td>
<td width="10%"><center>Capaian Kinerja TW2</center></td>
<td width="10%"><center>Kendala dan Hambatan TW2</center></td>
<td width="10%"><center>Langkah Strategi/Optimalisasi TW2</center></td>
<td width="6%"><center>Tipe</center></td>
</tr>
</thead><tbody>
');
$no=1; $x=0;
$result = mysqli_query($link, "SELECT * FROM $tables where id_satker = '$idsatker1' and id_tahun = '2024' and id_otentikasi_tw2 ='1' and id_hide !='1' ORDER by id_bidang LIMIT $start,$hits");
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
print ('<td><center><b>'.$ar['id_realisasi_tw2'].'</b></center></td>');
print ('<td>'.$ar['id_narasi_tw2'].'</td>');
print ('<td>'.$ar['id_narasi_tw2_2'].'</td>');
print ('<td>'.$ar['id_narasi_tw2_3'].'</td>');

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
    <td>CAPAIAN TRIWULAN 2</td>
  </tr>
</table>');
?></p>
  </div>
  
      <div id="TW3" class="w3-container city" style="display:none">
    <h2>Capaian Triwulan 3 Juli - Agustus - September</h2>
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
$kueri = mysqli_query($link, "SELECT * FROM $tables where id_satker = '$idsatker1' and id_tahun ='2024' and id_otentikasi_tw3 ='1' and id_hide !='1'");
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
<td width="26%">Saspro</td>
<td width="23%">Indikator</td>
<td width="6%"><center>Target</center></td>
<td width="6%"><center>Realisasi TW3</center></td>
<td width="10%"><center>Capaian Kinerja TW3</center></td>
<td width="10%"><center>Kendala dan Hambatan TW3</center></td>
<td width="10%"><center>Langkah Strategi/Optimalisasi TW3</center></td>
<td width="6%"><center>Tipe</center></td>
</tr>
</thead><tbody>
');
$no=1; $x=0;
$result = mysqli_query($link, "SELECT * FROM $tables where id_satker = '$idsatker1' and id_tahun = '2024' and id_otentikasi_tw3 ='1' and id_hide !='1' ORDER by id_bidang LIMIT $start,$hits");
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
print ('<td><center><b>'.$ar['id_realisasi_tw3'].'</b></center></td>');
print ('<td>'.$ar['id_narasi_tw3'].'</td>');
print ('<td>'.$ar['id_narasi_tw3_2'].'</td>');
print ('<td>'.$ar['id_narasi_tw3_3'].'</td>');

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
    <td>CAPAIAN TRIWULAN 3</td>
  </tr>
</table>');
?></p>
  </div>
  
    <div id="TW4" class="w3-container city" style="display:none">
    <h2>Capaian Triwulan 4 Oktober - Nopember - Desember</h2>
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
$kueri = mysqli_query($link, "SELECT * FROM $tables where id_satker = '$idsatker1' and id_tahun ='2024' and id_otentikasi_tw4 ='1' and id_hide !='1'");
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
<td width="26%">Saspro</td>
<td width="23%">Indikator</td>
<td width="6%"><center>Target</center></td>
<td width="6%"><center>Realisasi TW4</center></td>
<td width="10%"><center>Capaian Kinerja TW4</center></td>
<td width="10%"><center>Kendala dan Hambatan TW4</center></td>
<td width="10%"><center>Langkah Strategi/Optimalisasi TW4</center></td>
<td width="6%"><center>Tipe</center></td>
</tr>
</thead><tbody>
');
$no=1; $x=0;
$result = mysqli_query($link, "SELECT * FROM $tables where id_satker = '$idsatker1' and id_tahun = '2024' and id_otentikasi_tw4 ='1' and id_hide !='1' ORDER by id_bidang LIMIT $start,$hits");
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
print ('<td><center><b>'.$ar['id_realisasi_tw4'].'</b></center></td>');
print ('<td>'.$ar['id_narasi_tw4'].'</td>');
print ('<td>'.$ar['id_narasi_tw4_2'].'</td>');
print ('<td>'.$ar['id_narasi_tw4_3'].'</td>');

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
    <td>CAPAIAN TRIWULAN 4</td>
  </tr>
</table>');
?></p>
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

