<table width="100%"  border="0" cellspacing="4" cellpadding="4">
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<table width="100%"  border="0" cellspacing="4" cellpadding="4">
  <tr>
    <td><table width="100%"  border="0" cellspacing="4" cellpadding="4">
      <tr>
        <td width="6%"><img src="images/risk_0.png" width="64" height="63"></td>
        <td width="94%"><strong>PENETAPAN TUJUAN </strong></td>
      </tr>
      <tr>
        <td colspan="2"><?PHP 
include('mr.db.php');
$sid1 = $_GET['idsatker']; 

$tables = "mr_a";
$session1 = $_GET['session'];
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
 		//-------------------------
  $stw2 = (int)($xnum/$hits);
  if ($xnum%$hits > 0) {$stw2++;}
  $np = $page+1;
  $pp = $page-1;
  if ($page == 1) { $pp=1; }
  if ($np > $stw2) { $np = $stw2;} 
  echo '<table id="myTable" cellspacing="1" width="100%" align="center" cellpadding="3" bgcolor="#FFCC00" >';
  echo '<thead><tr>';
  echo '<td width="4%">No</td>';
  echo '<td width="24%">Program</td>';
  echo '<td width="24%">Tujuan Sasaran </td>';
  echo '<td width="24%">Indikator Kinerja </td>';
 echo '<td width="24%">Permasalahan</td>';

  echo '</tr></thead><tbody>';

$no=1; // fungsi nomor

 $x=0;

$result = mysqli_query($link, "SELECT * FROM $tables where satkerid = '$sid1' and hide !='3' LIMIT $start,$hits");
while ($ar=mysqli_fetch_array($result,MYSQLI_ASSOC))
  {

   $x++;


   if($x==2) {$barva = "FFFFB7";$x=0;} else {$barva = "FFD8B0";$x=1;}
//-----------
echo "<tr bgcolor=#$barva>";
print ('<td><center>'.$no++.'</center></td>');
print ('<td>'.$ar['A1'].'</td>');
print ('<td>'.$ar['A2'].'</td>');
print ('<td>'.$ar['A3'].'</td>');
print ('<td>'.$ar['A4'].'</td>');

}
  echo" </tr>";
}
  echo "</tbody></table>";

  ?></td>
      </tr>
    </table>      </td>
  </tr>
  <tr>
    <td>      <table width="100%"  border="0" cellspacing="4" cellpadding="4">
        <tr>
          <td width="6%"><img src="images/risk_0.png" width="64" height="63"></td>
          <td width="94%"><strong>IDENTIFIKASI RISIKO </strong></td>
        </tr>
        <tr>
          <td colspan="2"><?PHP 
include('mr.db.1.php');
$sid1 = $_GET['idsatker']; 
$session1 = $_GET['session'];
$tables = "mr_b";

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
    <td width="48" class="xl67"><div align="center">No </div></td>
    <td width="122" class="xl67"><div align="center">Indikator Kinerja* </div></td>
    <td width="127" class="xl67"><div align="center">Permasalahan*</div></td>
    <td colspan="2" class="xl67"><div align="center">Risiko </div></td>
    <td colspan="3" class="xl67"><div align="center">Penyebab </div></td>
    <td colspan="2" class="xl67"><div align="center">Dampak </div></td>
    <td width="119" class="xl67"><div align="center">Pengendalian </div></td>
    <td width="113" class="xl67"><div align="center">Sisa Risiko </div></td>
  </tr>
  <tr bgcolor="#CAE4FF">
    <td rowspan="2" class="xl66"><div align="center">1 </div></td>
    <td rowspan="2" class="xl66"><div align="center">2 </div></td>
    <td rowspan="2" class="xl66"><div align="center">3 </div></td>
    <td width="87" class="xl66"><div align="center">Pernyataan</div></td>
    <td width="100" class="xl66"><div align="center">Bidang</div></td>
    <td width="95" class="xl66"><div align="center">Uraian</div></td>
    <td width="80" class="xl66"><div align="center">Sumber</div></td>
    <td width="117" class="xl66"><div align="center">T/TT</div></td>
    <td width="126" class="xl66"><div align="center">Uraian</div></td>
    <td width="137" class="xl66"><div align="center">Pihak Terdampak </div></td>
    <td rowspan="2" class="xl66"><div align="center">11 </div></td>
    <td rowspan="2" class="xl66"><div align="center">12 </div></td>
  </tr>
  <tr bgcolor="#CAE4FF">
    <td class="xl66"><div align="center">4</div></td>
    <td class="xl66"><div align="center">5</div></td>
    <td class="xl66"><div align="center">6 </div></td>
    <td class="xl66"><div align="center">7 </div></td>
    <td class="xl66"><div align="center">8 </div></td>
    <td class="xl66"><div align="center">9 </div></td>
    <td class="xl66"><div align="center">10 </div></td>
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
    print ('<td class="xl66">'.$ar['B1'].'</td>');
    print ('<td class="xl66">'.$ar['B2'].'</td>');
    print ('<td class="xl66">'.$ar['B31'].'</td>');
   print (' <td class="xl66">'.$ar['B32'].'</td>');
    print ('<td class="xl66">'.$ar['B41'].'</td>');
   print (' <td class="xl66">'.$ar['B42'].'</td>');
   print (' <td class="xl66">'.$ar['B43'].'</td>');
   print (' <td class="xl66">'.$ar['B51'].'</td>');
   print (' <td class="xl66">'.$ar['B52'].'</td>');
   print (' <td class="xl66">'.$ar['B6'].'</td>');
print (' <td class="xl66">'.$ar['B7'].'</td>');

}
echo" </tr>";
}
echo "</tbody></table>";
  ?></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td>      <table width="100%"  border="0" cellspacing="4" cellpadding="4">
        <tr>
          <td width="1%"><img src="images/risk_0.png" width="64" height="63"></td>
          <td width="99%"><strong>ANALISA RISIKO </strong></td>
        </tr>
        <tr>
          <td colspan="2"><?PHP 
include('mr.db.1.php');
$sid1 = $_GET['idsatker']; 
$session1 = $_GET['session'];
$tables = "mr_c";

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
    <td width="37" class="xl67"><div align="center">No </div></td>
    <td width="211" class="xl67"><div align="center">Sisa Risiko*</div></td>
    <td colspan="2" class="xl67"><div align="center">Kemungkinan </div></td>
    <td colspan="2" class="xl67"><div align="center">Dampak </div></td>
    <td width="219" class="xl67"><div align="center">Tingkat Risiko </div></td>
    <td width="87" class="xl67"><div align="center">Profil Risiko </div></td>
  </tr>
  <tr bgcolor="#CAE4FF">
    <td rowspan="2" class="xl66"><div align="center">1 </div></td>
    <td rowspan="2" class="xl66"><div align="center">2 </div></td>
    <td width="173" bgcolor="#99CC00" class="xl66"><div align="center">Uraian</div></td>
    <td width="174" bgcolor="#99CC00" class="xl66"><div align="center">Nilai</div></td>
    <td width="170" bgcolor="#FF6600" class="xl66"><div align="center">Uraian</div></td>
    <td width="181" bgcolor="#FF6600" class="xl66"><div align="center">Nilai</div></td>
    <td class="xl66"><div align="center">4x6</div></td>
    <td rowspan="2" class="xl66"><div align="center">8 </div></td>
  </tr>
  <tr bgcolor="#CAE4FF">
    <td width="173" class="xl66"><div align="center">3 </div></td>
    <td width="174" class="xl66"><div align="center">4 </div></td>
    <td class="xl66"><div align="center">5 </div></td>
    <td width="181" class="xl66"><div align="center">6 </div></td>
    <td class="xl66"><div align="center">7 </div></td>
  </tr>
</thead><tbody>
');
$no=1; $x=0;
$result = mysqli_query($link, "SELECT * FROM $tables where satkerid = '$sid1' and hide !='3' LIMIT $start,$hits");
while ($ar=mysqli_fetch_array($result,MYSQLI_ASSOC))
{
$x++;
if($x==2) {$barva = "FFFFB7";$x=0;} else {$barva = "FFD8B0";$x=1;}

$con = $ar['con'];
$id = $ar['id'];




echo "<tr bgcolor=#$barva>";

    print ('<td class="xl66"><center>'.$no++.'<center></td>');

print (' <td class="xl66">'.$ar['C1'].'</td>');

   print (' <td class="xl66"><center>');

if ($ar['C21'] == "5") { print ('PASTI');} 
elseif ($ar['C21'] == "4") { print ('HAMPIR PASTI');} 
elseif ($ar['C21'] == "3") { print ('RATA-RATA');} 
elseif ($ar['C21'] == "2") { print ('SEDIKIT');} 
elseif ($ar['C21'] == "1") { print ('SANGAT SEDIKIT');} 
   print ('</center> </td>');


   print (' <td class="xl66"><center>'.$ar['C22'].'</center></td>');


   print (' <td class="xl66"><center>');

if ($ar['C31'] == "5") { print ('KEJAKSAAN AGUNG');} 
elseif ($ar['C31'] == "4") { print ('KEJAKSAAN TINGGI');} 
elseif ($ar['C31'] == "3") { print ('KEJAKSAAN NEGERI');} 
elseif ($ar['C31'] == "2") { print ('CABANG KEJARI');} 
elseif ($ar['C31'] == "1") { print ('PERSONAL PEGAWAI');} 
   print ('</center> </td>');


   print (' <td class="xl66"><center>'.$ar['C32'].'</center></td>');
   print (' <td class="xl66"><center>'.$ar['C4'].'</center></td>');



$angka = $ar['C5'];
$a1 = "1"; $a2 = "6"; $a3 = "11"; $a4 = "16"; $a5 = "21"; //start
$b1 = "5"; $b2 = "10"; $b3 = "15"; $b4 = "20"; $b5 = "25"; //end
print ('<td class="xl66">');
if ($angka >= $a5 && $angka <= $b5) 
{ 
     print ('<img src="images/risk_5.png" width="147" height="35">');
   } 
elseif ($angka >= $a4 && $angka <= $b4)
{ 
     print ('<img src="images/risk_4.png" width="147" height="35">');
   } 
elseif ($angka >= $a3 && $angka <= $b3)
{ 
     print ('<img src="images/risk_3.png" width="147" height="35">');
   } 
elseif ($angka >= $a2 && $angka <= $b2)
{ 
     print ('<img src="images/risk_2.png" width="147" height="35">');
   } 
elseif ($angka >= $a1 && $angka <= $b1)
{ 
     print ('<img src="images/risk_1.png" width="147" height="35">');
   } 

print ('</td>');

}
echo" </tr>";
}
echo "</tbody></table>";
  ?></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td>      <table width="100%"  border="0" cellspacing="4" cellpadding="4">
        <tr>
          <td width="3%"><img src="images/risk_0.png" width="64" height="63"></td>
          <td width="97%"><strong>EVALUASI RISIKO </strong></td>
        </tr>
        <tr>
          <td colspan="2"><?PHP 
include('mr.db.1.php');
$sid1 = $_GET['idsatker']; 
$session1 = $_GET['session'];
$tables = "mr_d";

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
    <td width="37" class="xl67"><div align="center">No </div></td>
    <td width="213" class="xl67"><div align="center">Sisa Risiko*</div></td>
    <td width="175" class="xl67"><div align="center">Tingkat Risiko*</div></td>
    <td width="267" class="xl67"><div align="center">Prioritas Risiko </div></td>
    <td width="246" class="xl67"><div align="center">Toleransi Risiko </div></td>
    <td colspan="2" class="xl67"><div align="center">Indikator Risiko </div></td>
  </tr>
  <tr bgcolor="#CAE4FF">
    <td rowspan="2" class="xl66"><div align="center">1 </div></td>
    <td rowspan="2" class="xl66"><div align="center">2 </div></td>
    <td rowspan="2" class="xl66"><div align="center">3 </div></td>
    <td rowspan="2" class="xl66"><div align="center">4 </div></td>
    <td rowspan="2" class="xl66"><div align="center">5</div></td>
    <td width="172"  class="xl66"><div align="center">Indikasi</div></td>
    <td  class="xl66"><div align="center">Batas Aman </div></td>
  </tr>
  <tr bgcolor="#CAE4FF">
    <td class="xl66"><div align="center">6 </div></td>
    <td width="186" class="xl66"><div align="center">7 </div></td>
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


   print (' <td class="xl66">'.$ar['D1'].'</td>');



$angka = $ar['D2'];
$a1 = "1"; $a2 = "6"; $a3 = "11"; $a4 = "16"; $a5 = "21"; //start
$b1 = "5"; $b2 = "10"; $b3 = "15"; $b4 = "20"; $b5 = "25"; //end
print ('<td class="xl66"><center>');
if ($angka >= $a5 && $angka <= $b5) 
{ 
     print ('<img src="images/risk_5.png" width="147" height="35">');
   } 
elseif ($angka >= $a4 && $angka <= $b4)
{ 
     print ('<img src="images/risk_4.png" width="147" height="35">');
   } 
elseif ($angka >= $a3 && $angka <= $b3)
{ 
     print ('<img src="images/risk_3.png" width="147" height="35">');
   } 
elseif ($angka >= $a2 && $angka <= $b2)
{ 
     print ('<img src="images/risk_2.png" width="147" height="35">');
   } 
elseif ($angka >= $a1 && $angka <= $b1)
{ 
     print ('<img src="images/risk_1.png" width="147" height="35">');
   } 

print ('</center></td>');

   print (' <td class="xl66"><div align="center">'.$ar['D3'].'</div></td>');


   print (' <td class="xl66"><div align="center">'.$ar['D4'].'</div></td>');
   print (' <td class="xl66">'.$ar['D51'].'</td>');
 print (' <td class="xl66"><div align="center">'.$ar['D52'].'</div></td>');





}
echo" </tr>";
}
echo "</tbody></table>";
  ?></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td>      <table width="100%"  border="0" cellspacing="4" cellpadding="4">
        <tr>
          <td width="6%"><img src="images/risk_0.png" width="64" height="63"></td>
          <td width="94%"><strong>PENANANGANAN RISIKO </strong></td>
        </tr>
        <tr>
          <td colspan="2"><?PHP 
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
print (' <td class="xl66">'.$ar['E7'].'</td>');




}
echo" </tr>";
}
echo "</tbody></table>";
  ?></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td>      <table width="100%"  border="0" cellspacing="4" cellpadding="4">
        <tr>
          <td width="1%"><img src="images/risk_0.png" width="64" height="63"></td>
          <td width="99%"><strong>PEMANTAUAN DAN REVIU </strong></td>
        </tr>
        <tr>
          <td colspan="2"><?PHP 
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
print (' <td class="xl66"><div align="center">'.$ar['F5'].'</div></td>');





}
echo" </tr>";
}
echo "</tbody></table>";
  ?></td>
        </tr>
      </table></td>
  </tr>
</table>
<table width="100%"  border="0" cellspacing="4" cellpadding="4">
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td width="32%"><div align="center">TIM MANAJEMEN RISIKO<br>  
      <?php 
echo $ganti = str_replace("_", " ", $satkernama1);
   ?>
    , </div></td>
    <td width="35%">&nbsp;</td>
    <td width="33%"><div align="center">KEPALA 
<?php  echo $ganti = str_replace("_", " ", $satkernama1);
   ?> ,<br>
    </div></td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
</table>
<table width="100%"  border="0" cellspacing="4" cellpadding="4">
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="center">Sistem Informasi Manajemen Risiko yang dinamis</div></td>
  </tr>
  <tr>
    <td><div align="center">Versi 1.0 September 2021 </div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
