<table width="100%"  border="0" cellspacing="4" cellpadding="4">
  <tr>
    <td>PEMANTAUAN DAN REVIU SEMESTER 2 TAHUN 2022 </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><?PHP 
include("../index.sinori.db.php");
$link = mysqli_connect("$server","$username","$password","$database") or die(mysqli_error());
if(empty($action))
{
if (empty($order)) $order =  2;
if (empty($page))  $page  =  1;
if (empty($hits))  $hits  = 1000;
$start = $hits*($page-1);
  //penghitung jumlah isi
$kueri = mysqli_query($link, "SELECT * FROM sinori_login where id_simerydhide='0'");
 
 	$data = array ();
 	while (($row = mysqli_fetch_array($kueri)) != null){
 		$data[] = $row;
 	}
 		$xnum = count ($data);
 		//-------------------------
$stw2 = (int)($xnum/$hits);
if ($xnum%$hits > 0) {$stw2++;}
$np = $page+1;
$pp = $page-1;
if ($page == 1) { $pp=1; }
if ($np > $stw2) { $np = $stw2;} 
print ('<table id="myTable" width="100%"  border="0" cellspacing="1" cellpadding="6" bgcolor="#B05800">
        <thead><tr>
<td width="5%"><strong><center>No</center></strong></td>
<td width="5%"><strong><center>ID</center></strong></td>
<td width="55%"><strong><center>Unit Kerja</center></strong></td>
<td width="5%"><strong><center>Jumlah Penetapan Risiko</center></strong></td>
<td width="30%"><strong><center>Lihat</center></strong></td>
</tr></thead><tbody>');
$no=1; $x=0;
$result = mysqli_query($link, "SELECT * FROM sinori_login where id_simerydhide='0' LIMIT $start,$hits");
while ($ar=mysqli_fetch_array($result,MYSQLI_ASSOC))
{
$x++;
if($x==2) {$barva = "FFFFB7";$x=0;} else {$barva = "FFD8B0";$x=1;}
echo "<tr bgcolor=#$barva>";
//$namasatker = $ar['id_satker'];
//$satker = substr($namasatker, 0, -3);
print ('<td><center>'.$no++.'</center></td>');
print ('<td><center>'.$ar['id_satker'] .'</center></td>');
print ('<td>'.$ar['satkernama'] .'</td>');
print ('<td><center>');
$satker1 = $ar['id_satker'];

$link2 = mysqli_connect("localhost","rbkejagu_reform","+N*SoN=ekP*q","rbkejagu_sinori2") or die(mysqli_error());
$kueri2 = mysqli_query($link2, "SELECT * FROM mr_a where satkerid='$satker1' and hide='2'");
 
 	$data = array ();
 	while (($row = mysqli_fetch_array($kueri2)) != null){
 		$data[] = $row;
 	}
 		echo $xnum = count ($data);

//$result2 = mysqli_query($link, "UPDATE sinori_login set id_corevaluestotal = '$xnum' where id_satker ='$satker1'");
print ('</center></td>');
print ('<td>');
echo "<a href=\"pantau.php?satker=".$ar['satkernama']."&sid=".$ar['id_satker']."\" onclick=\"NewWindow(this.href,'mywin','800','400','yes','center');return false\" onfocus=\"this.blur()\" class=\"menuall\">PANTAU</a>";
print ('</td>');
}
echo" </tr>";
}
echo "</tbody></table>";
  ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
