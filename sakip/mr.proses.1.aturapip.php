<?PHP
$idsatker1 = $_GET['idsatker'];
$session1 = $_GET['session'];
?>

<style type="text/css">
<!--
body {
	background-image: url(themes/background.jpg);
}
-->
</style><body>
<table width="100%"  border="0" cellspacing="4" cellpadding="4">
  <tr>
    <td><div align="center"><strong>MENU ATUR APIP PELAKSANA PENJAMIN KUALITAS DAN PENILAIAN MANDIRI TINGKAT ESELON 1 DAN 2 </strong></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="right"><a href="mr.proses.1.aturapip.add.php?session=<?PHP echo $session1; ?>&idsatker=<?PHP echo $sid1; ?>" onclick="NewWindow(this.href,'mywin','1000','600','yes','center');return false" onfocus="this.blur()"><img src="themes/profile_pengaturan.png" width="256" height="50" border="0"></a><br>
</div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><?PHP 
include('mr.db.php');
$tables = "sinori_sakip_apip";
$link = mysqli_connect("$server","$username","$password","$database") or die(mysqli_error());
if(empty($action))
{
if (empty($order)) $order =  2;
if (empty($page))  $page  =  1;
if (empty($hits))  $hits  = 1000;
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
<table id="myTable" cellspacing="2" width="100%" align="center" cellpadding="3" bgcolor="#FFFF42" ><thead>
<tr bgcolor="#FFFF42">
<td width="3%"><center>No</center></td>
<td width="5%">ID Satker</td>
<td width="23%">Satker</td>
<td width="20%">Nama Lengkap</td>
<td width="12%">NIP</td>
<td width="5%">Pangkat</td>
<td width="27%">Jabatan</td>
<td width="5%"><center>Opsi</center></td>
</tr>
</thead><tbody>
');
$no=1; $x=0;
$result = mysqli_query($link, "SELECT * FROM $tables");
while ($ar=mysqli_fetch_array($result,MYSQLI_ASSOC))
{
$x++;
if($x==2) {$barva = "FFFFB7";$x=0;} else {$barva = "FFFFFF";$x=1;}
echo "<tr bgcolor=#$barva>";
print ('<td><center>'.$no++.'.<center></td>');
print ('<td>'.$ar['id_satker'].'</td>');


$result3 = mysqli_query($link, "SELECT * FROM sinori_login where id_satker = '".$ar['id_satker']."'");
while ($row2=mysqli_fetch_array($result3,MYSQLI_ASSOC)){
print ('<td>'.$row2['satkernama'].'</td>');
}


///$hasil1 = str_replace("_"," ","$satkernama1");
//print ('<td>'.$satkernama1.'</td>');

print ('<td>'.$ar['id_nama'].'</td>');
print ('<td>'.$ar['id_nip'].'</td>');
print ('<td>'.$ar['id_pangkat'].'</td>');
print ('<td>'.$ar['id_jabatan'].'</td>');
print ('<td><center>PILIH</center></td>');
//=---------




}
echo" </tr>";
}
echo "</tbody></table>";
?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="center">Aplikasi Serenata AKIP dibuat oleh Chendia Studio Jogjakarta</div></td>
  </tr>
</table>

 
</body>

