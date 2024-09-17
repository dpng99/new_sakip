<!-----------PENANGKAP DATA--->
<?PHP
$idsatker1 = $_GET['satker'];
$do1 = $_GET['do'];
$level1 = $_GET['level']; //level admin , user
?>

<title>DASHBOARD PEMANTAUAN KEPATUHAN PELAKSANAAN AKIP</title><style type="text/css">
<!--
body {
	background-image: url(themes/background.jpg);
}
-->
</style>

<LINK href="index.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style1 {
	font-size: 18px;
	font-weight: bold;
}
-->
</style>
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr bgcolor="#BDBDBD">
    <td width="7%" height="100"><div align="center"><img src="themes/kejaksaan.png" width="93" height="92"></div></td>
    <td width="70%" height="100"><div align="center"><span class="style1">HALAMAN PENAMPIL DATA SAKIP SATUAN KERJA </span></div></td>
    <td width="15%"><div align="left" class="style1">
      <div align="center"><strong><img src="themes/serenata.png" width="230" height="80"></strong></div>
    </div></td>
    <td width="8%"><div align="center"><img src="themes/audit_auditor.png" width="78" height="79"></div></td>
  </tr>
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4">      <table width="100%"  border="0" cellspacing="8" cellpadding="8">
        <tr>
          <td>Pemeriksaan data pada Satker : <?PHP echo "$idsatker1"; ?> Berkaitan hal : <?PHP echo "$do1"; ?></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><?php
include("mr.db.1.php");
if ($do1 == "renstra"){
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
print (' <td ><a href="http://panev.kejaksaan.go.id/sakip/repository/'.$idsatker1.'/'.$ar['id_filename'].'" target="_blank">');




  
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
//-------------------

}
if ($do1 == "iku"){
$tables = "sinori_sakip_iku";
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
<td width="45%">File IKU Tahun</td>
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
print (' <td ><a href="http://panev.kejaksaan.go.id/sakip/repository/'.$idsatker1.'/'.$ar['id_filename'].'" target="_blank">'.$ar['id_periode'].'</a></td>');
print (' <td ><center>'.$ar['id_perubahan'].'</center></td>');
print (' <td >'.$ar['id_tglupload'].'</td>');

}
echo" </tr>";
}
echo "</tbody></table>";


}
if ($do1 == "renja"){

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
print (' <td ><a href="http://panev.kejaksaan.go.id/sakip/repository/'.$idsatker1.'/'.$ar['id_filename'].'" target="_blank">'.$ar['id_periode'].'</a></td>');
print (' <td ><center>'.$ar['id_perubahan'].'</center></td>');
print (' <td >'.$ar['id_tglupload'].'</td>');

}
echo" </tr>";
}
echo "</tbody></table>";

}

if ($do1 == "pk"){



}




if ($do1 == "dipa"){
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
  <td width="45%">Tahun DIPA - File</td>
  <td width="10%"><center>Versi</center></td>
  <td width="10%"><center>Pagu</center></td>
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
  print (' <td ><a href="http://panev.kejaksaan.go.id/sakip/repository/'.$idsatker1.'/'.$ar['id_filename'].'" target="_blank">'.$ar['id_periode'].'</a></td>');
  print (' <td ><center>'.$ar['id_perubahan'].'</center></td>');
  print ('<td><center>'.$ar['id_pagu'].'</center></td>');
  print (' <td >'.$ar['id_tglupload'].'</td>');
  
  }
  echo" </tr>";
  }
  echo "</tbody></table>";
  


}



if ($do1 == "renaksi"){
  $tables = "sinori_sakip_renaksi";
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
  <td width="45%">Tahun Renaksi - File</td>
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
  print (' <td ><a href="http://panev.kejaksaan.go.id/sakip/repository/'.$idsatker1.'/'.$ar['id_filename'].'" target="_blank">'.$ar['id_periode'].'</a></td>');
  print (' <td ><center>'.$ar['id_perubahan'].'</center></td>');
  print (' <td >'.$ar['id_tglupload'].'</td>');
  
  }
  echo" </tr>";
  }
  echo "</tbody></table>";


}


if ($do1 == "lkjip"){
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
  <td width="45%">Tahun lkjip - File</td>
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
  print (' <td ><a href="http://panev.kejaksaan.go.id/sakip/repository/'.$idsatker1.'/'.$ar['id_filename'].'" target="_blank">'.$ar['id_periode'].'</a></td>');
  print (' <td ><center>'.$ar['id_perubahan'].'</center></td>');
  print (' <td >'.$ar['id_tglupload'].'</td>');
  
  }
  echo" </tr>";
  }
  echo "</tbody></table>";


}


//if ($do1 == "renaksi"){



//}
?></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td height="30" colspan="4"><div align="center"></div></td>
  </tr>
  <tr>
    <td height="30" colspan="4"><div align="center"><strong>SERENATA AKIP KEJAKSAAN REPUBLIK INDONESIA </strong></div></td>
  </tr>
  <tr>
    <td height="30" colspan="4">&nbsp;</td>
  </tr>
</table>
