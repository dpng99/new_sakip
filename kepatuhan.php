<style type="text/css">
<!--
body {
	background-image: url(themes/background.jpg);
}
-->
</style>
<LINK href="index.css" rel="stylesheet" type="text/css">
<table width="100%"  border="0" cellspacing="4" cellpadding="4">
  <tr>
    <td width="11%"><div align="left"><img src="images/terkirim.png" width="196" height="47"></div></td>
    <td width="89%"><strong>DASHBOARD PEMANTAUAN KEPATUHAN PELAKSANAAN AKIP </strong></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><?PHP 
include('mr.db.php');
$tables = "sinori_login";
$link = mysqli_connect("$server","$username","$password","$database") or die(mysqli_error());
if(empty($action))
{
if (empty($order)) $order =  2;
if (empty($page))  $page  =  1;
if (empty($hits))  $hits  = 1000;
$start = $hits*($page-1);
$kueri = mysqli_query($link, "SELECT * FROM $tables where id_hidesatker = '0'");
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
<table id="myTable" cellspacing="2" width="100%" align="center" cellpadding="3" bgcolor="#FFFF42" ><thead>
<tr bgcolor="#FFFF42">
<td width="3%"><center>No</center></td>
<td width="5%">ID Satker</td>
<td width="25%">Nama Satker</td>
<td width="7%"><center>Keputusan</center></td>
<td width="5%"><center>Renstra</center></td>
<td width="5%"><center>Renja</center></td>
<td width="5%"><center>PK</center></td>
<td width="5%"><center>IKU</center></td>
<td width="5%"><center>DPA</center></td>
<td width="5%"><center>Ren Aksi</center></td>
<td width="5%"><center>TL LHE</center></td>
<td width="5%"><center>Pohon Kinerja</center></td>
<td width="5%"><center>LKjIP</center></td>
<td width="15%"><center>Jumlah Capaian Kinerja</center></td>

</tr>
</thead><tbody>
');
$no=1; $x=0;
$result = mysqli_query($link, "SELECT * FROM $tables where id_hidesatker = '0' LIMIT $start,$hits");
while ($ar=mysqli_fetch_array($result,MYSQLI_ASSOC))
{
$x++;
if($x==2) {$barva = "FFFFB7";$x=0;} else {$barva = "FFFFFF";$x=1;}
echo "<tr bgcolor=#$barva>";
print ('<td ><center>'.$no++.'.<center></td>');
print (' <td >'.$ar['id_satker'].'</td>');
$satkernama1 = $ar['satkernama'];
$hasil1 = str_replace("_"," ","$satkernama1");
print (' <td >'.$hasil1.'</td>');
//KEP SAKIP
//tap kinerja
print ('<td><center>');
$keps = mysqli_query($link, "SELECT * FROM sinori_sakip_keputusan where id_satker = '".$ar['id_satker']."'");
while ($keps2=mysqli_fetch_array($keps,MYSQLI_ASSOC)){
if ($keps2['id_filesurat'] == "") {
print ('<center>-</center>');  
} 
else {
print ('<center><b>OK</b></center>');  
} 
}
print ('</center></td>');
//-------------
//renstra
print ('<td><center>');
$renstra = mysqli_query($link, "SELECT * FROM sinori_sakip_renstra where id_satker = '".$ar['id_satker']."' order by id desc LIMIT 1");
$dataren = array ();
while (($rowren = mysqli_fetch_array($renstra)) != null){
$dataren[] = $rowren;
}
$xnumren = count ($dataren);
if ($xnumren == "0") {
print ('<center>-</center>');  
} 
else {
print ('<center><b>OK</b></center>');  
} 
print ('</center></td>');
//=---------
//renja
print ('<td><center>');
$renja = mysqli_query($link, "SELECT * FROM sinori_sakip_renja where id_satker = '".$ar['id_satker']."' order by id desc LIMIT 1");
$dataja = array ();
while (($rowja = mysqli_fetch_array($renja)) != null){
$dataja[] = $rowja;
}
$xnumja = count ($dataja);
if ($xnumja == "0") {
print ('<center>-</center>');  
} 
else {
print ('<center><b>OK</b></center>');  
} 
print ('</center></td>');
//=---------
//tap kinerja
print ('<td><center>');
$tapker = mysqli_query($link, "SELECT * FROM sinori_sakip_penetapan where id_satker = '".$ar['id_satker']."' order by id desc LIMIT 1");
$datatapker = array ();
while (($rowtapker = mysqli_fetch_array($tapker)) != null){
$datatapker[] = $rowtapker;
}
$xnumtapker = count ($datatapker);
if ($xnumtapker == "0") {
print ('<center>-</center>');  
} 
else {
print ('<center><b>OK</b></center>');  
} 
print ('</center></td>');
//-------------
print ('<td><center><b>-</b></center></td>');
print ('<td><center><b>-</b></center></td>');  
print ('<td><center><b>-</b></center></td>');  
print ('<td><center><b>-</b></center></td>');  
print ('<td><center><b>-</b></center></td>'); 

//LKJIP
print ('<td><center>');
$lkjip = mysqli_query($link, "SELECT * FROM sinori_login where id_satker = '".$ar['id_satker']."'");

while ($lkjip2=mysqli_fetch_array($lkjip,MYSQLI_ASSOC)){
if ($lkjip2['id_sakip_lkjip'] == "") {
print ('<center>-</center>');  
} 
else {
print ('<center><b>OK</b></center>');  
} 
}


print ('</center></td>');
//=---------
print ('<td><center>');

$kinerja = mysqli_query($link, "SELECT * FROM sinori_sakip_penetapan where id_satker = '".$ar['id_satker']."'");
$datakinerja = array ();
while (($rowkinerja = mysqli_fetch_array($kinerja)) != null){
$datakinerja[] = $rowkinerja;
}
echo $xnumkinerja = count ($datakinerja);

print ('</center></td>');

}
echo" </tr>";
}
echo "</tbody></table>";
?></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">Powered by Chendia Studio Jogjakarta </div></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>