<table width="100%"  border="0" cellspacing="4" cellpadding="4">
  <tr>
    <td>Cascading Kinerja - Nama Jabatan, Level dan Lokasi Jabatan </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><?PHP 
include('mr.db.1.php');
$tables = "sinori_sakip_bidang";
$link = mysqli_connect("$server","$username","$password","$database") or die(mysqli_error());
if(empty($action))
{
if (empty($order)) $order =  2;
if (empty($page))  $page  =  1;
if (empty($hits))  $hits  = 100;
$start = $hits*($page-1);
$kueri = mysqli_query($link, "SELECT * FROM $tables where hide ='0'");
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
    <td width="2%" class="xl67"><div align="center">No</div></td>
<td width="7%"><div align="center">Kode</div></td>
<td width="80%"><div align="center">Bidang</div></td>
<td width="4%"><div align="center">Level</div></td>
<td width="4%"><div align="center">Lokasi</div></td>
<td width="3%"><div align="center">Status</div></td>
  </tr>

</thead><tbody>
');
$no=1; $x=0;
$result = mysqli_query($link, "SELECT * FROM $tables where hide ='0' LIMIT $start,$hits");
while ($ar=mysqli_fetch_array($result,MYSQLI_ASSOC))
{
$x++;
if($x==2) {$barva = "FFFFB7";$x=0;} else {$barva = "FFD8B0";$x=1;}
echo "<tr bgcolor=#$barva>";





    print ('<td ><center>'.$no++.'<center></td>');
    print ('<td ><center>'.$ar['bidang_level'].'.'.$ar['bidang_lokasi'].'.'.$ar['id'].'</center></td>');
   print (' <td >'.$ar['bidang_nama'].'</td>');
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
  ?></td>
  </tr>
</table>
