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
  <h5 class="w3-bar-item"><b>PERENCANAAN</b></h5>
  <button class="w3-bar-item w3-button tablink" onclick="openCity(event, 'T1')">Renstra</button>
  <button class="w3-bar-item w3-button tablink" onclick="openCity(event, 'T2')">Renja</button>
  <button class="w3-bar-item w3-button tablink" onclick="openCity(event, 'T3')">RKAKL</button>
   <button class="w3-bar-item w3-button tablink" onclick="openCity(event, 'T4')">DIPA</button>
    <button class="w3-bar-item w3-button tablink" onclick="openCity(event, 'T5')">Penetapan Kinerja</button>
	<button class="w3-bar-item w3-button tablink" onclick="openCity(event, 'APIP')">Validasi PK</button>
	 <button class="w3-bar-item w3-button tablink" onclick="openCity(event, 'T6')">Cetak PK</button>
	  
	  
</div>

<div style="margin-left:170px">
  <div class="w3-padding">PERENCANAAN KINERJA - PENETAPAN TARGET KINERJA - PERJANJIAN KINERJA</div>

  <div id="T1" class="w3-container city" style="display:none">
    <h2>Rencana Strategis Satuan Kerja (Tiap 5 Tahun)</h2>
    <p>Dapat dilakukan update apabila terdapat perubahan sasaran strategis Kejaksaan RI</p>
    <p>Silahkan lakukan Kirim, Update Rencana Strategis Satuan kerja Anda</p>
	<div align="right"><a href="mr.renstra.php?session=<?PHP echo $session1; ?>&nama=<?PHP echo $nama1; ?>&idsatker=<?PHP echo $sid1; ?>" onclick="NewWindow(this.href,'mywin','1000','600','yes','center');return false" onfocus="this.blur()"><img src="images/input.png" width="181" height="45" border="0"></a></div><br>
	<p><?PHP 
include('mr.db.php');
$tables = "sinori_sakip_renstra";
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
<td width="45%">Periode Renstra - File</td>
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
print (' <td ><a href="http://jaksa.id/RB/SAKIP/repository/'.$idsatker1.'/'.$ar['id_filename'].'" target="_blank">');




  
  if ($ar['id_periode'] == "P1") {
print ('Periode 2020 - 2024');  
} 
elseif ($ar['id_periode'] == "P2") {
print ('Periode 2025 - 2029');   
} 
elseif ($ar['id_periode'] == "") {
print ('ERROR');  
} 


print ('</a></td>');
print (' <td ><center>'.$ar['id_perubahan'].'</center></td>');
print (' <td >'.$ar['id_tglupload'].'</td>');

}
echo" </tr>";
}
echo "</tbody></table>";
?><table width="100%"  border="0" cellspacing="4" cellpadding="4">
  <tr>
    <td>Dalam periode masa 5 (lima) tahun satuan kerja wajib memiliki rencana strategis. apabila pembuatan renstra dalam peride 5 (lima) tahun dianggap oleh kepala satuan kerja kurang mendorong kinerja dalam tahun berjalan dan dimasa yang akan datang WAJIB untuk dilakukan pembaharuan rekonstruksi kinerja baru.</td>
  </tr>
</table>
</p>
  </div>

  <div id="T2" class="w3-container city" style="display:none">
    <h2><b>Rencana Kerja Tahunan</b></h2>
    <p>Dapat dilakukan update apabila terdapat perubahan rencana kerja Kejaksaan RI yang berimplikasi kepada Satuan Kerja</p> 
      <p>Silahkan lakukan Kirim, Update Rencana Strategis Satuan kerja Anda</p>
	<div align="right"><a href="mr.renja.php?session=<?PHP echo $session1; ?>&nama=<?PHP echo $nama1; ?>&idsatker=<?PHP echo $sid1; ?>" onclick="NewWindow(this.href,'mywin','1000','600','yes','center');return false" onfocus="this.blur()"><img src="images/input.png" width="181" height="45" border="0"></a></div><br>
	<p><?PHP 
include('mr.db.php');
$tables = "sinori_sakip_renja";
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
<td width="45%">Tahun Renja - File</td>
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
print (' <td ><a href="http://jaksa.id/RB/SAKIP/repository/'.$idsatker1.'/'.$ar['id_filename'].'" target="_blank">'.$ar['id_periode'].'</a></td>');
print (' <td ><center>'.$ar['id_perubahan'].'</center></td>');
print (' <td >'.$ar['id_tglupload'].'</td>');

}
echo" </tr>";
}
echo "</tbody></table>";
?><table width="100%"  border="0" cellspacing="4" cellpadding="4">
  <tr>
    <td>Rencana Kinerja Tahunan (RKT) merupakan penjabaran dari sasaran dan program yang telah ditetapkan dalam Renstra, dan akan dilaksanakan oleh satuan organisasi/kerja melalui berbagai kegiatan tahunan.<br><br>Rencana Kinerja Tahunan (RKT) adalah dokumen perencanaan untuk periode 1 (satu) tahun sebagai penjabaran dari sasaran dan program yang telah ditetapkan dalam Rencana Startegis (Renstra) mencangkup periode tahunan yang sifatnya sangat strategis karena menjembatani perencanaan strategis jangka menengah dengan perencanaan tahunan. Dengan demikian, RKT berperan memelihara konsistensi antara capaian tujuan perencanaan strategis jangka menengah yang tercantum dalam Renstra dengan tujuan perencanaan tahunan pembangunan. Penyusunan rencana kinerja dilakukan seiring dengan agenda penyusunan dan kebijakan anggaran, serta merupakan komitmen bagi instansi untuk mencapainya dalam tahun tertentu.</td>
  </tr>
</table>
</p>
  </div>

  <div id="T3" class="w3-container city" style="display:none">
    <h2>Rencana Kerja Anggaran Kementerian atau Lembaga</h2>
    <p>Data Kebutuhan Riil (Periode Awal tahun dengan rumus -1 TA silahkan masukkan data kebutuhan RIIL satker anda. <br> Rencana Kerja Anggaran (RKA) bertujuan untuk merencanakan penganggaran kebutuhan dana dari berbagai program dan kegiatan di masa yang akan datang. Dengan Penyusunan RKA dapat merencanakan penggunaan dana agar bisa seefisien mungkin. program-program yang direncanakan dan akan dilaksanakan menghasilkan output dan outcome yang bermanfaat bagi kepentingan publik </p>
	 <p><div align="right"><a href="mr.rkakl.php?session=<?PHP echo $session1; ?>&nama=<?PHP echo $nama1; ?>&idsatker=<?PHP echo $sid1; ?>" onclick="NewWindow(this.href,'mywin','1000','600','yes','center');return false" onfocus="this.blur()"><img src="images/input.png" width="181" height="45" border="0"></a></div><br><?PHP 
include('mr.db.php');
$tables = "sinori_sakip_rkakl";
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
<td width="45%">File RKAKL Tahun</td>
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
print (' <td ><a href="http://jaksa.id/RB/SAKIP/repository/'.$idsatker1.'/'.$ar['id_filename'].'" target="_blank">'.$ar['id_periode'].'</a></td>');
print (' <td ><center>'.$ar['id_perubahan'].'</center></td>');
print (' <td >'.$ar['id_tglupload'].'</td>');

}
echo" </tr>";
}
echo "</tbody></table>";
?>
	
  </div>
    <div id="T4" class="w3-container city" style="display:none">
    <h2>Daftar Isian Pelaksanaan Anggaran (DIPA)</h2>
    <p><div align="right"><a href="mr.dipa.php?session=<?PHP echo $session1; ?>&nama=<?PHP echo $nama1; ?>&idsatker=<?PHP echo $sid1; ?>" onclick="NewWindow(this.href,'mywin','1000','600','yes','center');return false" onfocus="this.blur()"><img src="images/input.png" width="181" height="45" border="0"></a></div><br><?PHP 
include('mr.db.php');
$tables = "sinori_sakip_dipa";
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
<td width="45%">Tahun DIPA- File</td>
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
print (' <td ><a href="http://jaksa.id/RB/SAKIP/repository/'.$idsatker1.'/'.$ar['id_filename'].'" target="_blank">'.$ar['id_periode'].'</a></td>');
print (' <td ><center>'.$ar['id_perubahan'].'</center></td>');
print (' <td >'.$ar['id_tglupload'].'</td>');

}
echo" </tr>";
}
echo "</tbody></table>";
?></p>

  </div>
      <div id="T5" class="w3-container city" style="display:none">
    <h2>Penetapan Kinerja</h2>
    <p>Perhatikan Indikator Kinerja Utama (IKU) pada Satuan Kerja sebagaimana IKU Pusat Secara Berjenjang</p>
	<p><table width="100%"  border="0" cellspacing="4" cellpadding="4">
  <tr>
    <td><div align="right"><a href="mr.penetapankinerja.php?session=<?PHP echo $session1; ?>&nama=<?PHP echo $nama1; ?>&idsatker=<?PHP echo $sid1; ?>" onclick="NewWindow(this.href,'mywin','1100','800','yes','center');return false" onfocus="this.blur()"><img src="images/input.png" width="181" height="45" border="0"></a></div></td>
  </tr>
    <tr>
    <td><?PHP 
include('mr.db.php');
$tables = "sinori_sakip_penetapan";
$link = mysqli_connect("$server","$username","$password","$database") or die(mysqli_error());
if(empty($action))
{
if (empty($order)) $order =  2;
if (empty($page))  $page  =  1;
if (empty($hits))  $hits  = 100;
$start = $hits*($page-1);
$kueri = mysqli_query($link, "SELECT * FROM $tables where id_satker = '$idsatker1' and id_tahun ='2024'");
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

<td width="16%">Bidang</td>
<td width="37%">Saspro</td>
<td width="37%">Indikator</td>
<td width="8%"><center>Target</center></td>
</tr>
</thead><tbody>
');
$no=1; $x=0;
$result = mysqli_query($link, "SELECT * FROM $tables where id_satker = '$idsatker1' and id_tahun = '2024' LIMIT $start,$hits");
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
$result3 = mysqli_query($link, "Select * from sinori_sakip_indikator where id= '$indikator1'");
while ($row2=mysqli_fetch_array($result3,MYSQLI_ASSOC)){
print ('<td>'.$row2['indikator_nama'].'</td>');
}
//end cari

print ('<td><center>'.$ar['id_target'].'</center></td>');
}
echo" </tr>";
}
echo "</tbody></table>";
?></td>
  </tr>
  
</table>
</p>

  </div>
  <div id="T6" class="w3-container city" style="display:none">
    <h2>Perjanjian Kinerja</h2>
    <p>pernyataan yang merupakan komitmen bersama untuk mencapai kinerja yang jelas dan terukur dalam rentang waktu satu tahun tertentu dengan mempertimbangkan sumber daya yang dikelolanya</p>
    <p>Perjanjian Kinerja adalah pernyataan yang merupakan komitmen bersama untuk mencapai kinerja yang jelas dan terukur dalam rentang waktu satu tahun tertentu dengan mempertimbangkan sumber daya yang dikelolanya. Perjanjian kinerja ini merupakan tolak ukur evaluasi akuntabilitas kinerja pada akhir Tahun</p>
  <p><?PHP 
include('mr.db.php');
$tables = "sinori_sakip_bidang";

$link = mysqli_connect("$server","$username","$password","$database") or die(mysqli_error());

//--pencarian tipe satker
$result = mysqli_query($link, "Select * from sinori_login where id_satker = '$idsatker1'");
while ($row2=mysqli_fetch_array($result,MYSQLI_ASSOC)){
$level1 = $row2['id_sakip_level'];
}
if(empty($action))
{
if (empty($order)) $order =  2;
if (empty($page))  $page  =  1;
if (empty($hits))  $hits  = 100;
$start = $hits*($page-1);
$kueri = mysqli_query($link, "SELECT * FROM $tables where bidang_lokasi = '$level1'");
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
<td width="85%">Bidang</td>
<td width="10%"><center>Cetak</center></td>

</tr>
</thead><tbody>
');
$no=1; $x=0;
$result = mysqli_query($link, "SELECT * FROM $tables where bidang_lokasi = '$level1' LIMIT $start,$hits");
while ($ar=mysqli_fetch_array($result,MYSQLI_ASSOC))
{
$x++;
if($x==2) {$barva = "FFFFB7";$x=0;} else {$barva = "FFD8B0";$x=1;}
echo "<tr bgcolor=#$barva>";
print ('<td ><center>'.$no++.'<center></td>');

print (' <td >'.$ar['bidang_nama'].'</td>');
print (' <td ><center><a href="mr.cetak.pk.php?id='.$idsatker1.'&idbidang='.$ar['id_filename'].'" target="_blank"><img src="images/printer.png" width="40" height="50"></a></center></td>');

}
echo" </tr>";
}
echo "</tbody></table>";
?></p>
  </div>


    <div id="APIP" class="w3-container city" style="display:none">
    <h2>Validasi</h2>
    
    <p>Validasi Data Perencanaan dilakukan oleh kasatker bersama dengan pejabat, pelaksana indikator dengan memasukkan proses persetujuan. Sistem akan mencatat bahwa data dianggap benar apabila telah diberikan otentikasi pengiriman.</p>
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
$kueri = mysqli_query($link, "SELECT * FROM $tables where id_satker = '$idsatker1' and id_tahun ='2024'");
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

<td width="16%">Bidang</td>
<td width="37%">Saspro</td>
<td width="37%">Indikator</td>
<td width="8%"><center>Target</center></td>
</tr>
</thead><tbody>
');
$no=1; $x=0;
$result = mysqli_query($link, "SELECT * FROM $tables where id_satker = '$idsatker1' and id_tahun = '2024' LIMIT $start,$hits");
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

print ('<td><center>'.$ar['id_target'].'</center></td>');
}
echo" </tr>";
}
echo "</tbody></table>";
?><br>
Tetapkan validasi bahwa isian diatas telah benar dengan langkah otentikasi klik link berikut  Tidak ada upaya revisi setelah divalidasi. Setelah validasi lakukan langkah cetak Perjanjian Kinerja masing-masing <br><br>
<div align="right"><a href="mr.validasi.php?session=<?PHP echo $session1; ?>&nama=<?PHP echo $nama1; ?>&idsatker=<?PHP echo $sid1; ?>" onclick="NewWindow(this.href,'mywin','1000','600','yes','center');return false" onfocus="this.blur()"><img src="images/validasi.png" width="168" height="44"></a></div><br>

</p>
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

