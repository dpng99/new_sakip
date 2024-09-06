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
$sid1 = $_GET['idsatker']; 
$session1 = $_GET['session'];
$tables = "mr_e";

$link = mysqli_connect("$server","$username","$password","$database") or die(mysqli_error());
if(empty($action))
{
if (empty($order)) $order =  2;
if (empty($page))  $page  =  1;
if (empty($hits))  $hits  = 100;
$start = $hits*($page-1);
$kueri = mysqli_query($link, "SELECT * FROM $tables where satkerid = '$sid1' and hide !='3'");
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
    <td width="47" class="xl67"><div align="center">No </div></td>
    <td colspan="2" class="xl67"><div align="center">Indikator Risiko </div>      <div align="center"></div></td>
    <td width="161" class="xl67"><div align="center"><span class="xl66">Opsi Penanganan</span></div></td>
    <td width="216" class="xl67"><div align="center"><span class="xl66">Kegiatan Pengendalian </span></div></td>
    <td colspan="2" class="xl67"><div align="center"><span class="xl66">Indikator Pengendalian </span></div></td>
    <td width="66" class="xl67"><div align="center">Jadwal</div></td>
    <td width="182" class="xl67"><div align="center">Penanggung Jawab </div></td>
    <td width="215" class="xl67"><div align="center">Cadangan Risiko (Rp) </div></td>
  </tr>
  <tr bgcolor="#CAE4FF">
    <td rowspan="2" class="xl66"><div align="center">1 </div></td>
    <td width="86" bgcolor="#FF6600"  class="xl66"><div align="center">Risiko</div></td>
    <td  bgcolor="#FF6600" class="xl66"><div align="center">Batas Aman </div></td>
    <td  rowspan="2" class="xl66"><div align="center">4 </div></td>
    <td  rowspan="2" class="xl66"><div align="center">5 </div></td>
    <td bgcolor="#0099FF"  class="xl66"><div align="center">Output</div></td>
    <td bgcolor="#0099FF"  class="xl66"><div align="center">Target</div></td>
    <td  rowspan="2" class="xl66"><div align="center">8 </div></td>
    <td  rowspan="2" class="xl66"><div align="center">9 </div></td>
    <td  rowspan="2" class="xl66"><div align="center">10 </div></td>
  </tr>
  <tr bgcolor="#CAE4FF">
    <td class="xl66"><div align="center">2 </div></td>
    <td width="98" bgcolor="#CAE4FF" class="xl66"><div align="center">3 </div></td>
    <td width="93" class="xl66"><div align="center">6</div></td>
    <td width="78" class="xl66"><div align="center">7</div></td>
  </tr>
</thead><tbody>
');
$no=1; $x=0;
$result = mysqli_query($link, "SELECT * FROM $tables where satkerid = '$sid1' and hide !='3' LIMIT $start,$hits");
while ($ar=mysqli_fetch_array($result,MYSQLI_ASSOC))
{
$x++;
if($x==2) {$barva = "FFFFB7";$x=0;} else {$barva = "FFD8B0";$x=1;}






echo "<tr bgcolor=#$barva>";





    print ('<td class="xl66"><center>'.$no++.'<center></td>');
    print ('<td class="xl66">'.$ar['E11'].'</td>');
   print (' <td class="xl66">'.$ar['E12'].'</td>');
   print (' <td class="xl66">'.$ar['E2'].'</td>');
   print (' <td class="xl66">'.$ar['E3'].'</td>');
   print (' <td class="xl66">'.$ar['E41'].'</td>');
  print (' <td class="xl66">'.$ar['E42'].'</td>');
  print (' <td class="xl66">'.$ar['E5'].'</td>');
  print (' <td class="xl66">'.$ar['E6'].'</td>');
$con = $ar['con'];
$id = $ar['id'];
if ($ar['hide'] == "2") { 

  print (' <td class="xl66">'.$ar['E7'].'</td>');


} 
elseif ($ar['hide'] == "1") { 




print ('<td class="xl66"><a href="mr.proses.6.input.php?session='.$session1.'&nama='.$nama1.'&idsatker='.$sid1.'&id='.$id.'&con='.$con.'" ');
echo "onclick=\"NewWindow(this.href,'mywin','1100','500','yes','center');return false\" onfocus=\"this.blur()\">";
print (''.$ar['E7'].'</a></td>');
} 





}
echo" </tr>";
}
echo "</tbody></table>";
  ?></td>
  </tr>
</table>
