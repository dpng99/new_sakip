
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style type="text/css">
<!--
body {
	background-image: url(images/bgmr.jpg);
}


</style>
<style>
/* Tooltip container */
.tooltip {
  position: relative;
  display: inline-block;
  border-bottom: 1px dotted black; /* If you want dots under the hoverable text */
}

/* Tooltip text */
.tooltip .tooltiptext {
  visibility: hidden;
  width: 120px;
  background-color: black;
  color: #fff;
  text-align: center;
  padding: 5px 0;
  border-radius: 6px;
 
  /* Position the tooltip text - see examples below! */
  position: absolute;
  z-index: 1;
}

/* Show the tooltip text when you mouse over the tooltip container */
.tooltip:hover .tooltiptext {
  visibility: visible;
}
</style><body>

<div class="w3-sidebar w3-bar-block w3-light-grey w3-card" style="width:160px">
  <h5 class="w3-bar-item"><b>PERALATAN</b></h5>
  <button class="w3-bar-item w3-button tablink" onclick="openCity(event, 'T1')">Sasaran Program/Kegiatan</button>
  <button class="w3-bar-item w3-button tablink" onclick="openCity(event, 'T2')">Indikator Kinerja</button>
  <button class="w3-bar-item w3-button tablink" onclick="openCity(event, 'T3')">Cascading Bidang</button>
   <button class="w3-bar-item w3-button tablink" onclick="openCity(event, 'T4')">Kamus Akip</button>
   <button class="w3-bar-item w3-button tablink" onclick="openCity(event, 'T5')">Indeks & RAN</button>
</div>

<div style="margin-left:170px">
  <div class="w3-padding">INFORMASI DATA MASTER APLIKASI</div>

  <div id="T1" class="w3-container city" style="dispay:none">
    <h2>Sasaran Program dan Kegiatan di Lingkungan Kejaksaan RI</h2>
    <p><?PHP 
include('mr.db.php');
$tables = "sinori_sakip_saspro";
$link = mysqli_connect("$server","$username","$password","$database") or die(mysqli_error());
if(empty($action))
{
if (empty($order)) $order =  2;
if (empty($page))  $page  =  1;
if (empty($hits))  $hits  = 100;
$start = $hits*($page-1);
$kueri = mysqli_query($link, "SELECT * FROM $tables");
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
print ('<table id="myTable" cellspacing="1" width="100%" align="center" cellpadding="3" bgcolor="#FFCC00" ><thead>
   <tr bgcolor="#FFCC00">
    <td width="2%" ><div align="center">No</div></td>
<td width="8%"><center>Bidang</center></td>
<td width="55%">Sasaran Program/Kegiatan</td>
<td width="25%">Penjelasan</td>
<td width="10%"><center>Lingkup</center></td>
  </tr>

</thead><tbody>
');
$no=1; $x=0;
$result = mysqli_query($link, "SELECT * FROM $tables LIMIT $start,$hits");
while ($ar=mysqli_fetch_array($result,MYSQLI_ASSOC))
{
$x++;
if($x==2) {$barva = "FFFFB7";$x=0;} else {$barva = "FFD8B0";$x=1;}
echo "<tr bgcolor=#$barva>";



    print ('<td ><center>'.$no++.'<center></td>');


   
     print (' <td ><center>');
  
  if ($ar['link'] == "0") {
print ('<img src="images/bidang_0.png" width="80" height="18">');  
} 
elseif ($ar['link'] == "1") {
print ('<img src="images/bidang_pembinaan.png" width="80" height="18">');  
} 
elseif ($ar['link'] == "2") {
print ('<img src="images/bidang_intelijen.png" width="80" height="18">');  
} 
elseif ($ar['link'] == "3") {
print ('<img src="images/bidang_pidum.png" width="80" height="18">');  
} 
elseif ($ar['link'] == "4") {
print ('<img src="images/bidang_pidsus.png" width="80" height="18">');  
} 
elseif ($ar['link'] == "5") {
print ('<img src="images/bidang_datun.png" width="80" height="18">');  
} 
elseif ($ar['link'] == "6") {
print ('<img src="images/bidang_pidmil.png" width="80" height="18">');  
} 
elseif ($ar['link'] == "7") {
print ('<img src="images/bidang_pengawasan.png" width="80" height="18">');  
} 
elseif ($ar['link'] == "8") {
print ('<img src="images/bidang_badiklat.png" width="80" height="18">');  
} 
elseif ($ar['link'] == "9") {
print ('<img src="images/bidang_bpa.png" width="80" height="18">');  
} 
print ('</center></td>');
   
     
   print (' <td >'.$ar['saspro_nama'].'</td>'); 
   print (' <td >'.$ar['saspro_penjelasan'].'</td>');
  print (' <td ><center>');
  
  if ($ar['lingkup'] == "0") {
print ('<img src="images/lingkup_0.jpg" width="100" height="25">');  
} 
elseif ($ar['lingkup'] == "1") {
print ('<img src="images/lingkup_1.jpg" width="100" height="25">');  
} 
elseif ($ar['lingkup'] == "12") {
print ('<img src="images/lingkup_12.jpg" width="100" height="25">');  
} 
print ('</center></td>');
}
echo" </tr>";
}
echo "</tbody></table>";
  ?></p>

  </div>
    <div id="T2" class="w3-container city" style="display:none">
    <h2>Indikator Kinerja Tahunan</h2>
    <p><?PHP 
include('mr.db.php');
$tables = "sinori_sakip_indikator";
$link = mysqli_connect("$server","$username","$password","$database") or die(mysqli_error());
if(empty($action))
{
if (empty($order)) $order =  2;
if (empty($page))  $page  =  1;
if (empty($hits))  $hits  = 100;
$start = $hits*($page-1);
$kueri = mysqli_query($link, "SELECT * FROM $tables");
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
print ('<table id="myTable" cellspacing="1" width="100%" align="center" cellpadding="3" bgcolor="#FFCC00" ><thead>
   <tr bgcolor="#FFCC00">
    <td width="2%" ><div align="center">No</div></td>
<td width="3%"><div align="center">Tipe</div></td>
<td width="7%"><div align="center">Kode</div></td>
<td width="27%"><div align="center">Indikator</div></td>
<td width="16%"><div align="center">Pembilang</div></td>
<td width="16%"><div align="center">Penyebut</div></td>
<td width="15%"><div align="center">Penjelasan</div></td>
<td width="14%"><div align="center">Linkup</div></td>
  </tr>

</thead><tbody>
');
$no=1; $x=0;
$result = mysqli_query($link, "SELECT * FROM $tables LIMIT $start,$hits");
while ($ar=mysqli_fetch_array($result,MYSQLI_ASSOC))
{
$x++;
if($x==2) {$barva = "FFFFB7";$x=0;} else {$barva = "FFD8B0";$x=1;}
echo "<tr bgcolor=#$barva>";
print ('<td ><center>'.$no++.'<center></td>');
print (' <td ><center>'.$ar['tipe'].'</center></td>');
print (' <td ><center>'.$ar['link'].'.'.$ar['id'].'</center></td>');
print (' <td >'.$ar['indikator_nama'].'</td>'); 
print (' <td >'.$ar['indikator_pembilang'].'</td>');
print (' <td >'.$ar['indikator_penyebut'].'</td>');
print (' <td >'.$ar['indikator_penjelasan'].'</td>');

  print (' <td ><center>');
  
  if ($ar['lingkup'] == "0") {
print ('<img src="images/lingkup_0.jpg" width="100" height="25">');  
} 
elseif ($ar['lingkup'] == "1") {
print ('<img src="images/lingkup_1.jpg" width="100" height="25">');  
} 
elseif ($ar['lingkup'] == "12") {
print ('<img src="images/lingkup_12.jpg" width="100" height="25">');  
} 
print ('</center></td>');


}
echo" </tr>";
}
echo "</tbody></table>";
  ?></p>

  </div>

  <div id="T3" class="w3-container city" style="display:none">
    <h2>Cascading Bidang & Jabatan</h2>
    <p><?PHP 
include('mr.db.php');
$tables = "sinori_sakip_bidang";
$link = mysqli_connect("$server","$username","$password","$database") or die(mysqli_error());
if(empty($action))
{
if (empty($order)) $order =  2;
if (empty($page))  $page  =  1;
if (empty($hits))  $hits  = 100;
$start = $hits*($page-1);
$kueri = mysqli_query($link, "SELECT * FROM $tables");
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
print ('<table id="myTable" cellspacing="1" width="100%" align="center" cellpadding="3" bgcolor="#FFCC00" ><thead>
   <tr bgcolor="#FFCC00">
    <td width="2%" ><div align="center">No</div></td>
<td width="7%"><div align="center">Kode</div></td>
<td width="70%"><div align="center">Bidang</div></td>
<td width="8%"><div align="center">Rumpun</div></td>
<td width="5%"><div align="center">Level</div></td>
<td width="5%"><div align="center">Lokasi</div></td>
<td width="3%"><div align="center">Status</div></td>
  </tr>

</thead><tbody>
');
$no=1; $x=0;
$result = mysqli_query($link, "SELECT * FROM $tables LIMIT $start,$hits");
while ($ar=mysqli_fetch_array($result,MYSQLI_ASSOC))
{
$x++;
if($x==2) {$barva = "FFFFB7";$x=0;} else {$barva = "FFD8B0";$x=1;}
echo "<tr bgcolor=#$barva>";





    print ('<td ><center>'.$no++.'<center></td>');
    print ('<td ><center>'.$ar['bidang_level'].'.'.$ar['bidang_lokasi'].'.'.$ar['id'].'</center></td>');
   print (' <td >'.$ar['bidang_nama'].'</td>');
     
     print (' <td ><center>');
  
  if ($ar['rumpun'] == "0") {
print ('<img src="images/bidang_0.png" width="80" height="18">');  
} 
elseif ($ar['rumpun'] == "1") {
print ('<img src="images/bidang_pembinaan.png" width="80" height="18">');  
} 
elseif ($ar['rumpun'] == "2") {
print ('<img src="images/bidang_intelijen.png" width="80" height="18">');  
} 
elseif ($ar['rumpun'] == "3") {
print ('<img src="images/bidang_pidum.png" width="80" height="18">');  
} 
elseif ($ar['rumpun'] == "4") {
print ('<img src="images/bidang_pidsus.png" width="80" height="18">');  
} 
elseif ($ar['rumpun'] == "5") {
print ('<img src="images/bidang_datun.png" width="80" height="18">');  
} 
elseif ($ar['rumpun'] == "6") {
print ('<img src="images/bidang_pidmil.png" width="80" height="18">');  
} 
elseif ($ar['rumpun'] == "7") {
print ('<img src="images/bidang_pengawasan.png" width="80" height="18">');  
} 
elseif ($ar['rumpun'] == "8") {
print ('<img src="images/bidang_badiklat.png" width="80" height="18">');  
} 
elseif ($ar['rumpun'] == "9") {
print ('<img src="images/bidang_bpa.png" width="80" height="18">');  
} 
print ('</center></td>');
   
   print (' <td ><center>'.$ar['bidang_level'].'</center></td>');
print (' <td ><center>'.$ar['bidang_lokasi'].'</center></td>');

if ($ar['hide'] == "0") { 
  print (' <td><center>ON</center></td>');
} 
elseif ($ar['hide'] !== "0") { 
print ('<td ><a href="mr.proses.6.input.php?session='.$session1.'');
echo "onclick=\"NewWindow(this.href,'mywin','1100','500','yes','center');return false\" onfocus=\"this.blur()\">";
print ('OFF</a></td>');
} 





}
echo" </tr>";
}
echo "</tbody></table>";
  ?></p> 

  </div>
 <div id="T4" class="w3-container city" style="display:none">
    <h2>Kamus AKIP</h2>
    <p><?PHP 
include('mr.db.php');
$tables = "sinori_sakip_kamus";
$link = mysqli_connect("$server","$username","$password","$database") or die(mysqli_error());
if(empty($action))
{
if (empty($order)) $order =  2;
if (empty($page))  $page  =  1;
if (empty($hits))  $hits  = 100;
$start = $hits*($page-1);
$kueri = mysqli_query($link, "SELECT * FROM $tables");
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
print ('<table id="myTable" cellspacing="1" width="100%" align="center" cellpadding="3" bgcolor="#FFCC00" ><thead>
   <tr bgcolor="#FFCC00">
    <td width="2%" ><div align="center">No</div></td>
<td width="18%"><div align="center">Judul</div></td>
<td width="80%"><div align="center">Penjelasan</div></td>


  </tr>

</thead><tbody>
');
$no=1; $x=0;
$result = mysqli_query($link, "SELECT * FROM $tables LIMIT $start,$hits");
while ($ar=mysqli_fetch_array($result,MYSQLI_ASSOC))
{
$x++;
if($x==2) {$barva = "FFFFB7";$x=0;} else {$barva = "FFD8B0";$x=1;}
echo "<tr bgcolor=#$barva>";





    print ('<td ><center>'.$no++.'<center></td>');

   print (' <td >'.$ar['kamus_judul'].'</td>');
     
   print (' <td >'.$ar['kamus_penjelasan'].'</td>'); 








}
echo" </tr>";
}
echo "</tbody></table>";
  ?></p> 

  </div>
    <div id="T5" class="w3-container city" style="display:none">
       <h2>Pelaksanaan Indeksasi, Rencana Aksi Nasional & Prioritas Nasional</h2>
    <p><?PHP 
include('mr.db.php');
$tables = "sinori_sakip_ranpnidx";
$link = mysqli_connect("$server","$username","$password","$database") or die(mysqli_error());
if(empty($action))
{
if (empty($order)) $order =  2;
if (empty($page))  $page  =  1;
if (empty($hits))  $hits  = 100;
$start = $hits*($page-1);
$kueri = mysqli_query($link, "SELECT * FROM $tables");
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
<td width="5%"><center>Kode</center></td>
<td width="43%">Nama Program</td>
<td width="40%">Penjelasan</td>
<td width="10%"><center>Lingkup</center></td>
</tr>
</thead><tbody>
');
$no=1; $x=0;
$result = mysqli_query($link, "SELECT * FROM $tables LIMIT $start,$hits");
while ($ar=mysqli_fetch_array($result,MYSQLI_ASSOC))
{
$x++;
if($x==2) {$barva = "FFFFB7";$x=0;} else {$barva = "FFFFFF";$x=1;}
echo "<tr bgcolor=#$barva>";
print ('<td ><center>'.$no++.'<center></td>');
print (' <td ><center>'.$ar['tipe'].'.'.$ar['urutan'].'</center></td>');
print (' <td >'.$ar['indikator_nama'].'</td>');
print (' <td >'.$ar['id_keterangan'].'</td>');
  print (' <td ><center>');
  
  if ($ar['lingkup'] == "0") {
print ('<img src="images/lingkup_0.jpg" width="100" height="25">');  
} 
elseif ($ar['lingkup'] == "1") {
print ('<img src="images/lingkup_1.jpg" width="100" height="25">');  
} 
elseif ($ar['lingkup'] == "12") {
print ('<img src="images/lingkup_12.jpg" width="100" height="25">');  
} 
print ('</center></td>');

}
echo" </tr>";
}
echo "</tbody></table>";
?>
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

