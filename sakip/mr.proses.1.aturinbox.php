<style type="text/css">
<!--
body {
	background-image: url(images/bgmr.jpg);
}
-->
</style>
<table width="100%"  border="0" cellspacing="4" cellpadding="4">
  <tr>
    <td><div align="center"><strong>MENU ATUR FILE </strong></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="right"><a href="mr.proses.1.aturinbox.add.php?session=<?PHP echo $session1; ?>&idsatker=<?PHP echo $sid1; ?>" onclick="NewWindow(this.href,'mywin','1000','600','yes','center');return false" onfocus="this.blur()"><img src="images/input.png" width="181" height="45" border="0"></a><br>
    </div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><?PHP 
include('mr.db.php');
$tables = "sinori_sakip_inbox";
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
<table id="myTable" cellspacing="2" width="100%" align="center" cellpadding="3" bgcolor="#FFFF42" ><thead>
<tr bgcolor="#FFFF42">
<td width="3%"><center>No</center></td>
<td width="25%">Judul Pesan</td>
<td width="45%">Isi Pesan</td>
<td width="10%">Tanggal Pelaksanaan</td>
<td width="10%">Tanggal Posting</td>
<td width="7%">Hapus</td>

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
print (' <td ><b>'.$ar['judul'].'</b></td>');
print (' <td >'.$ar['isi'].'</td>');
print (' <td >'.$ar['tanggal'].'</td>');
print (' <td >'.$ar['tglpost'].'</td>');
print ('<td ><center>HAPUS<center></td>');
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
