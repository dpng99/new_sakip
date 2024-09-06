<table width="100%"  border="0" cellspacing="4" cellpadding="4">
  <tr>
    <td>Pengisian memperhatikan tusi masing-masing unit kerja (perhatikan Tusi anda) </td>
  </tr>
  <tr>
    <td>Pemantauan dan reviu dilaksanakan oleh Tim Manajemen Risiko dan usulan perbaikan telah dilaksanakan sesuai rencana</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="center"><strong>TAHAP 6 AKHIR - PEMANTAUAN DAN REVIU </strong></div></td>
  </tr>
  <tr>
    <td><div align="center">Manajemen Risiko Satker : <?php echo $satkernama1;  ?> </div></td>
  </tr>
</table>
<?PHP 
include('mr.db.1.php');
$sid1 = $_GET['idsatker']; 
$session1 = $_GET['session'];
$tables = "mr_f";

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
    <td width="152" class="xl67"><div align="center"><span class="xl66">Kegiatan Pengendalian </span></div></td>
    <td colspan="4" class="xl67"><div align="center"></div>      <div align="center"><span class="xl66">Indikator Pengendalian </span></div>      <div align="center"></div></td>
    <td colspan="4" class="xl67"><div align="center">Indikator Capaian Penanganan Risiko </div></td>
    <td width="116" class="xl67"><div align="center"><span class="xl66">Risiko Residu </span></div></td>
    <td width="103" class="xl67"><div align="center">Keterangan</div></td>
  </tr>
  <tr bgcolor="#CAE4FF">
    <td rowspan="2" class="xl66"><div align="center">1 </div></td>
    <td rowspan="2" class="xl66"><div align="center">2 </div></td>
    <td width="101" bgcolor="#33CCCC" class="xl66"><div align="center">Output </div></td>
    <td bgcolor="#33CCCC" class="xl66"><div align="center">Target </div></td>
    <td bgcolor="#33CCCC" class="xl66"><div align="center">Realisasi </div></td>
    <td width="93" bgcolor="#33CCCC" class="xl66"><div align="center">%</div></td>
    <td bgcolor="#CCCC00" class="xl66"><div align="center">Indikasi </div></td>
    <td bgcolor="#CCCC00" class="xl66"><div align="center">Batas Aman </div></td>
    <td bgcolor="#CCCC00" class="xl66"><div align="center">Realisasi </div></td>
    <td bgcolor="#CCCC00" class="xl66"><div align="center">% </div></td>
    <td rowspan="2" class="xl66"><div align="center">11 </div></td>
    <td rowspan="2" class="xl66"><div align="center">12 </div></td>
  </tr>
  <tr bgcolor="#CAE4FF">
    <td bgcolor="#CAE4FF" class="xl66"><div align="center">3</div></td>
    <td width="112" class="xl66"><div align="center">4</div></td>
    <td width="97" class="xl66"><div align="center">5</div></td>
    <td width="93" class="xl66"><div align="center">6</div></td>
    <td width="78" class="xl66"><div align="center">7</div></td>
    <td width="114" class="xl66"><div align="center">8</div></td>
    <td width="136" class="xl66"><div align="center">9</div></td>
    <td width="120" class="xl66"><div align="center">10</div></td>
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
    print ('<td class="xl66">'.$ar['F1'].'</td>');
   print (' <td class="xl66">'.$ar['F21'].'</td>');
   print (' <td class="xl66"><div align="center">'.$ar['F22'].'</div></td>');
   print (' <td class="xl66"><div align="center">'.$ar['F23'].'</div></td>');
$f24 = $ar['F24'];
$hasilf24 =round($f24,2);
   print (' <td class="xl66"><div align="center">'.$hasilf24.'%</div></td>');
  print (' <td class="xl66">'.$ar['F31'].'</td>');
  print (' <td class="xl66"><div align="center">'.$ar['F32'].'</div></td>');
  print (' <td class="xl66"><div align="center">'.$ar['F33'].'</div></td>');
$f34 = $ar['F34'];
$hasilf34 =round($f34,2);
  print (' <td class="xl66"><div align="center">'.$hasilf34.'%</div></td>');
  print (' <td class="xl66"><div align="center">'.$ar['F4'].'</div></td>');
$con = $ar['con'];
$id = $ar['id'];
print ('<td class="xl66"><a href="?g=proses7&i=mr&session='.$session1.'&nama='.$nama1.'&idsatker='.$sid1.'&id='.$id.'&con='.$con.'" ');

print ('>'.$ar['F5'].'</a></td>');




}
echo" </tr>";
}
echo "</tbody></table>";
  ?>
