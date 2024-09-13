<title>DASHBOARD PEMANTAUAN KEPATUHAN PELAKSANAAN AKIP</title><style type="text/css">
  
  
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
<td width="10%"><center>Jumlah Indikator Kinerja</center></td>
<td width="15%"><center>Status Pengukuran Kinerja</center></td>
<td width="5%"><center>IKU</center></td>
<td width="5%"><center>DPA</center></td>
<td width="5%"><center>Ren Aksi</center></td>
<td width="5%"><center>TL LHE</center></td>
<td width="5%"><center>Pohon Kinerja</center></td>
<td width="5%"><center>LKjIP</center></td>


</tr>
</thead><tbody>
');
$no=1; $x=0;
$result = mysqli_query($link, "SELECT * FROM $tables where id_hidesatker = '0' AND id_satker != 'menpanrb' ORDER BY CAST(id_kejati AS UNSIGNED) ASC LIMIT $start,$hits");
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
print ('<center><img src="images/centang.png" width="30" height="30"></center>');  
} 
}
print ('</center></td>');
//-------------
//renstra
print ('<td><center>');
$renstra = mysqli_query($link, "SELECT * FROM sinori_sakip_renstra where id_satker = '".$ar['id_satker']."'");
$dataren = array ();
while (($rowren = mysqli_fetch_array($renstra)) != null){
$dataren[] = $rowren;
}
$xnumren = count ($dataren);
if ($xnumren == "0") {
print ('<center>-</center>');  
} 
else {
print ('<center><img src="images/centang.png" width="30" height="30"></center>');  
} 
print ('</center></td>');
//=---------
//renja
print ('<td><center>');
$renja = mysqli_query($link, "SELECT * FROM sinori_sakip_renja where id_satker = '".$ar['id_satker']."'");
$dataja = array ();
while (($rowja = mysqli_fetch_array($renja)) != null){
$dataja[] = $rowja;
}
$xnumja = count ($dataja);
if ($xnumja == "0") {
print ('<center>-</center>');  
} 
else {
print ('<center><img src="images/centang.png" width="30" height="30"></center>');  
} 
print ('</center></td>');
//=---------
//tap kinerja
print ('<td><center>');
$tapker = mysqli_query($link, "SELECT * FROM sinori_sakip_penetapan where id_satker = '".$ar['id_satker']."' and id_hide !='1'");
$datatapker = array ();
while (($rowtapker = mysqli_fetch_array($tapker)) != null){
$datatapker[] = $rowtapker;
}
$xnumtapker = count ($datatapker);
if ($xnumtapker == "0") {
print ('<center>-</center>');  
} 
else {
print ('<center><img src="images/centang.png" width="30" height="30"></center>');  
} 
print ('</center></td>');
//-------------

print ('<td><center><b><a href="view.php?satker='.$ar['id_satker'].'&do=capkin" target="_blank">'.$xnumtapker.'</a></b></center></td>');
//-------------
// Status Pengukuran Kinerja
print ('<td><center>');
$pto = mysqli_query($link, "SELECT id_satker, id_hide, id_approved, id_otentikasi_tw1, id_otentikasi_tw2, id_otentikasi_tw3, id_otentikasi_tw4  FROM sinori_sakip_penetapan WHERE id_satker = '".$ar['id_satker']."' and id_hide !='1' order by id_approved LIMIT 1");
  $datapto = mysqli_fetch_assoc($pto);
  if ($datapto['id_approved'] == "0") {
    print ('<center>Terdapat PK yang belum di Otentikasi</center>');  
  }elseif($datapto['id_approved'] == "1"){
    $ptw1 = mysqli_query($link, "SELECT id_satker, id_hide, id_approved, id_otentikasi_tw1, id_otentikasi_tw2, id_otentikasi_tw3, id_otentikasi_tw4  FROM sinori_sakip_penetapan WHERE id_satker = '".$ar['id_satker']."' and id_hide !='1' order by id_otentikasi_tw1 LIMIT 1");
    $dataptw1 = mysqli_fetch_assoc($ptw1);
    if ($dataptw1['id_otentikasi_tw1'] == "0") {
    print ('<center>PK sudah di Otentikasi</center>');  
    }else{
      $ptw2 = mysqli_query($link, "SELECT id_satker, id_hide, id_approved, id_otentikasi_tw1, id_otentikasi_tw2, id_otentikasi_tw3, id_otentikasi_tw4  FROM sinori_sakip_penetapan WHERE id_satker = '".$ar['id_satker']."' and id_hide !='1' order by id_otentikasi_tw2 LIMIT 1");
      $dataptw2 = mysqli_fetch_assoc($ptw2);
      if ($dataptw2['id_otentikasi_tw2'] == "0") {
      print ('<center>Sudah Melakukan Otentikasi sampai TW I</center>'); 
      }else {
        $ptw3 = mysqli_query($link, "SELECT id_satker, id_hide, id_approved, id_otentikasi_tw1, id_otentikasi_tw2, id_otentikasi_tw3, id_otentikasi_tw4  FROM sinori_sakip_penetapan WHERE id_satker = '".$ar['id_satker']."' and id_hide !='1' order by id_otentikasi_tw3 LIMIT 1");
        $dataptw3= mysqli_fetch_assoc($ptw3);
        if ($dataptw3['id_otentikasi_tw3'] == "0") {
        print ('<center>Sudah Melakukan Otentikasi sampai TW II</center>'); 
        }else {
          $ptw4 = mysqli_query($link, "SELECT id_satker, id_hide, id_approved, id_otentikasi_tw1, id_otentikasi_tw2, id_otentikasi_tw3, id_otentikasi_tw4  FROM sinori_sakip_penetapan WHERE id_satker = '".$ar['id_satker']."' and id_hide !='1' order by id_otentikasi_tw4 LIMIT 1");
          $dataptw4= mysqli_fetch_assoc($ptw4);
          if ($dataptw4['id_otentikasi_tw4'] == "0") {
          print ('<center>Sudah Melakukan Otentikasi sampai TW III</center>'); 
          }else{
            print ('<center>Sudah Melakukan Otentikasi sampai TW IV</center>'); 
          }
        }
      }
    }
  }else{
    print ('<center>Belum mengisi PK</center>'); 
  }

print ('</center></td>');
//--------------------
//IKU
print ('<td><center>');
$iku = mysqli_query($link, "SELECT * FROM sinori_sakip_iku where id_satker = '".$ar['id_satker']."'");
$dataiku = array ();
while (($rowiku = mysqli_fetch_array($iku)) != null){
$dataiku[] = $rowiku;
}
$xnumiku = count ($dataiku);
if ($xnumiku == "0") {
print ('<center>-</center>');  
} 
else {
print ('<center><img src="images/centang.png" width="30" height="30"></center>');  
} 
print ('</center></td>');
//-------------
//DIPA
print ('<td><center>');
$dipa = mysqli_query($link, "SELECT * FROM sinori_sakip_dipa where id_satker = '".$ar['id_satker']."'");
$datadipa = array ();
while (($rowdipa = mysqli_fetch_array($dipa)) != null){
$datadipa[] = $rowdipa;
}
$xnumdipa = count ($datadipa);
if ($xnumdipa == "0") {
print ('<center>-</center>');  
} 
else {
print ('<center><img src="images/centang.png" width="30" height="30"></center>');  
} 
print ('</center></td>');
//-------------
//REN AKSI
print ('<td><center>');
$renaksi = mysqli_query($link, "SELECT * FROM sinori_sakip_renaksi where id_satker = '".$ar['id_satker']."'");
$datarenaksi = array ();
while (($rowrenaksi = mysqli_fetch_array($renaksi)) != null){
$datarenaksi[] = $rowrenaksi;
}
$xnumrenaksi = count ($datarenaksi);
if ($xnumrenaksi == "0") {
print ('<center>-</center>');  
} 
else {
print ('<center><img src="images/centang.png" width="30" height="30"></center>');  
} 
print ('</center></td>');
//-------------
//LHE
print ('<td><center>');
$lhe = mysqli_query($link, "SELECT * FROM sinori_sakip_lhe where id_satker = '".$ar['id_satker']."'");
$datalhe = array ();
while (($rowlhe = mysqli_fetch_array($lhe)) != null){
$datalhe[] = $rowlhe;
}
$xnumlhe = count ($datalhe);
if ($xnumlhe == "0") {
print ('<center>-</center>');  
} 
else {
print ('<center><img src="images/centang.png" width="30" height="30"></center>');  
} 
print ('</center></td>');
//-------------
print ('<td><center><b>LIHAT</b></center></td>'); 

//LKJIP
print ('<td><center>');
$lakip = mysqli_query($link, "SELECT * FROM sinori_sakip_lakip where id_satker = '".$ar['id_satker']."'");
$datalakip = array ();
while (($rowlakip = mysqli_fetch_array($lakip)) != null){
$datalakip[] = $rowlakip;
}
$xnumlakip = count ($datalakip);
if ($xnumlakip == "0") {
print ('<center>-</center>');  
} 
else {
print ('<center><img src="images/centang.png" width="30" height="30"></center>');  
} 
print ('</center></td>');
//=---------




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
    <td colspan="2"><div align="center">Powered by Chendia Studio Jogjakarta 2024</div></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>

