<LINK href="index.css" rel="stylesheet" type="text/css">
<?PHP
include('mr.db.php');
$id1 = $_GET["id"];
$bidang1 = $_GET['idbidang'];

$session1 = $_GET["session"];
$link = mysqli_connect("$server","$username","$password","$database") or die(mysqli_error());
$result = mysqli_query($link, "SELECT * FROM sinori_login where id_satker = '$id1'");
if ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
if($row['satkerkey'] == "$session1"){
$name = $row['satkernama'];
?>



<script type="text/javascript">

function printF(printData)

{

var a = window.open ('', '',"status=1,scrollbars=1, width=900,height=600");

a.document.write(document.getElementById(printData).innerHTML.replace(/<a\/?[^>]+>/gi, ''));

a.document.close();

a.focus();

a.print();

a.close();

}

</script>

<table width="100%"  border="0" cellspacing="1" cellpadding="1">

  <tr>

    <td width="94%">&nbsp;</td>

    <td width="6%"><div align="center"><a href="#"  onClick="printF('printData')"><img src="print-icon.png" width="32" height="32" border="0"></a></div></td>

  </tr>

  <tr>

    <td>&nbsp;</td>

    <td>&nbsp;</td>

  </tr>

</table>

<div id="printData"><LINK href="index.css" rel="stylesheet" type="text/css"><table width="100%"  border="0" cellspacing="6" cellpadding="6">

  <tr>

    <td width="47%">SATKER : <?PHP echo $name; ?></td>

    <td width="53%"><div align="right">Tanggal Cetak <?PHP echo $date = date("j/m/Y g:i A"); ?></div></td>

  </tr>

  <tr bgcolor="#CCCCCC">

    <td colspan="2"><table width="100%"  border="0" cellspacing="1" cellpadding="1">

        <tr>

          <td>CETAK PERJANJIAN KINERJA </td>

        </tr>

    </table></td>

  </tr>

  <tr>

    <td colspan="2"></td>

  </tr>

  <tr>

    <td colspan="2"><table width="70%"  border="0" align="center" cellpadding="4" cellspacing="4">
      <tr>
        <td colspan="3"><p align="center"><img src="themes/kejaksaan.png" width="133" height="137"></p>          </td>
      </tr>
      <tr>
        <td colspan="3">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="3"><div align="center"><strong>PERJANJIAN KINERJA</strong></div></td>
      </tr>
      <tr>
        <td colspan="3"><div align="center"><strong>TAHUN 2024 </strong></div></td>
      </tr>
      <tr>
        <td colspan="3">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="3"><p align="justify">Dalam rangka mewujudkan manajemen pemerintahan yang efektif, transparan dan akuntabel serta berorientasi pada hasil, yang bertanda tangan dibawah ini: </p></td>
      </tr>
      <tr>
        <td colspan="3">&nbsp;</td>
      </tr>
      <tr>
        <td width="16%">Nama</td>
        <td width="2%">:</td>
        <td width="82%">&nbsp;</td>
      </tr>
      <tr>
        <td>Jabatan</td>
        <td>:</td>
        <td><strong>
          <?PHP 
		  $result4 = mysqli_query($link, "Select * from sinori_sakip_bidang where id = '$bidang1'");
while ($row4=mysqli_fetch_array($result4,MYSQLI_ASSOC)){
$namabidang1  = $row4['bidang_nama'];
echo $namabidang1;
}
?>
        </strong></td>
      </tr>
      <tr>
        <td colspan="3"><p align="justify">Selanjutnya disebut pihak pertama </p></td>
        </tr>
      <tr>
        <td colspan="3">&nbsp;</td>
      </tr>
      <tr>
        <td>Nama</td>
        <td>:</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Jabatan</td>
        <td>:</td>
        <td><strong>
        </strong></td>
      </tr>
      <tr>
        <td colspan="3"><p>Selaku atasan langsung pihak pertama, selanjutnya disebut pihak kedua </p></td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="3"><p align="justify">Pihak pertama berjanji akan mewujudkan target kinerja yang seharusnya sesuai dengan lampiran perjanjian ini, dalam rangka mencapai target kinerja jangka menengah seperti yang telah ditetapkan dalam dokumen perencanaan. Keberhasilan dan kegagalan pencapaian target kinerja tersebut menjadi tanggung jawab kami. </p></td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="3"><p align="justify">Pihak kedua akan melakukan supervisi yang diperlukan serta akan melakukan evaluasi terhadap capaian kinerja dari perjanjian ini dan akan mengambil tindakan yang diperlukan dalam rangka pemberian penghargaan dan sanksi. </p></td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="3"><table width="100%"  border="0" cellspacing="4" cellpadding="4">
          <tr>
            <td width="39%"><p align="center">Pihak Kedua, </p></td>
            <td width="15%">&nbsp;</td>
            <td width="46%"><p align="center">Pihak Pertama, </p></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table></td>
        </tr>
    </table>
      <table width="70%"  border="0" align="center" cellpadding="4" cellspacing="4">
        <tr>
          <td colspan="2"><p align="center"><strong>LAMPIRAN PERJANJIAN KINERJA TAHUN 2024 </strong></p>            </td>
        </tr>
        <tr>
          <td colspan="2"><div align="center"><strong><?PHP 
		echo $namabidang1;
?></strong><strong></strong></div></td>
        </tr>
        <tr>
          <td colspan="2"><div align="center"><strong>KEJAKSAAN NEGERI <?PHP echo $name; ?></strong></div></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
          <td width="4%">A.</td>
          <td width="96%"><strong>KINERJA UTAMA</strong></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><table width="100%"  border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td><?PHP 
include('mr.db.php');
$tables = "sinori_sakip_penetapan";

$link = mysqli_connect("$server","$username","$password","$database") or die(mysqli_error());
if(empty($action))
{
if (empty($order)) $order =  2;
if (empty($page))  $page  =  1;
if (empty($hits))  $hits  = 100;
$start = $hits*($page-1);
$kueri = mysqli_query($link, "SELECT * FROM $tables where id_satker = '$id1' and id_tahun ='2024' and id_tipe='lag' and id_bidang='$bidang1'");
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
<td width="2%"><center>No</center></td>
<td width="30%">Sasaran Program</td>
<td width="30%">Indikator</td>
<td width="30%">Formulasi</td>
<td width="8%"><center>Target (Satuan / Persen %) </center></td>

</tr>
</thead><tbody>
');
$no=1; $x=0;
$result = mysqli_query($link, "SELECT * FROM $tables where id_satker = '$id1' and id_tahun = '2024' and id_tipe='lag' and id_bidang='$bidang1' LIMIT $start,$hits");
while ($ar=mysqli_fetch_array($result,MYSQLI_ASSOC))
{
$x++;
if($x==2) {$barva = "FFFFFF";$x=0;} else {$barva = "FFFFFF";$x=1;}
echo "<tr bgcolor=#$barva>";
print ('<td><center>'.$no++.'.<center></td>');


//end cari
//cari saspro
$saspro1 = $ar['id_saspro'];
$result2 = mysqli_query($link, "Select * from sinori_sakip_saspro where id= '$saspro1'");
while ($row2=mysqli_fetch_array($result2,MYSQLI_ASSOC)){
print ('<td>'.$row2['saspro_nama'].'</td>');
}
//end cari
//cari indikator
$indikator1 = $ar['id_indikator'];
$tipe1 = $ar['id_tipe'];
//---------

 if ($tipe1  == "lag") {
$isi1 = "sinori_sakip_indikator";
} 
elseif ($tipe1 == "led") {
$isi1 = "sinori_sakip_ranpnidx";
} 
//---------------------
$result3 = mysqli_query($link, "Select * from ".$isi1." where id = '$indikator1'");
while ($row2=mysqli_fetch_array($result3,MYSQLI_ASSOC)){
print ('<td>'.$row2['indikator_nama'].'</td>');
print ('<td>'.$row2['indikator_pembilang'].'/'.$row2['indikator_penyebut'].'</td>');
}
//end cari

print ('<td><center>'.$ar['id_target'].'</center></td>');


}
echo" </tr>";
}
echo "</tbody></table>";
?>&nbsp;</td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>B.</td>
          <td><strong>KINERJA TUGAS TAMBAHAN (INDEKSASI, RENCANA AKSI NASIONAL, DIREKTIF, RB TEMATIK) </strong></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><table width="100%"  border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td><?PHP 
include('mr.db.php');
$tables = "sinori_sakip_penetapan";

$link = mysqli_connect("$server","$username","$password","$database") or die(mysqli_error());
if(empty($action))
{
if (empty($order)) $order =  2;
if (empty($page))  $page  =  1;
if (empty($hits))  $hits  = 100;
$start = $hits*($page-1);
$kueri = mysqli_query($link, "SELECT * FROM $tables where id_satker = '$id1' and id_tahun ='2024' and id_tipe='led' and id_bidang='$bidang1'");
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
<td width="2%"><center>No</center></td>
<td width="30%">Sasaran Program</td>
<td width="30%">Sasaran Kegiatan</td>
<td width="30%">Berdasarkan Surat Keputusan/Tusi Bidang </td>

<td width="8%"><center>Target (Satuan / Persen %) </center></td>

</tr>
</thead><tbody>
');
$no=1; $x=0;
$result = mysqli_query($link, "SELECT * FROM $tables where id_satker = '$id1' and id_tahun = '2024' and id_tipe='led' and id_bidang='$bidang1' LIMIT $start,$hits");
while ($ar=mysqli_fetch_array($result,MYSQLI_ASSOC))
{
$x++;
if($x==2) {$barva = "FFFFFF";$x=0;} else {$barva = "FFFFFF";$x=1;}
echo "<tr bgcolor=#$barva>";
print ('<td><center>'.$no++.'.<center></td>');


//end cari
//cari saspro
$saspro1 = $ar['id_saspro'];
$result2 = mysqli_query($link, "Select * from sinori_sakip_saspro where id= '$saspro1'");
while ($row2=mysqli_fetch_array($result2,MYSQLI_ASSOC)){
print ('<td>'.$row2['saspro_nama'].'</td>');
}
//end cari
//cari indikator
$indikator1 = $ar['id_indikator'];
$tipe1 = $ar['id_tipe'];
//---------

 if ($tipe1  == "lag") {
$isi1 = "sinori_sakip_indikator";
} 
elseif ($tipe1 == "led") {
$isi1 = "sinori_sakip_ranpnidx";
} 
//---------------------
$result3 = mysqli_query($link, "Select * from ".$isi1." where id = '$indikator1'");
while ($row2=mysqli_fetch_array($result3,MYSQLI_ASSOC)){
print ('<td>'.$row2['indikator_nama'].'</td>');
print ('<td></td>');
}
//end cari

print ('<td><center>'.$ar['id_target'].'</center></td>');


}
echo" </tr>";
}
echo "</tbody></table>";
?>
            &nbsp;</td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2"><table width="100%"  border="0" cellspacing="4" cellpadding="4">
            <tr>
              <td width="39%"><p align="center">Pihak Kedua, </p></td>
              <td width="15%">&nbsp;</td>
              <td width="46%"><p align="center">Pihak Pertama, </p></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
          </table></td>
          </tr>
      </table></td>

  </tr>

  <tr>

    <td colspan="2"><div align="center"><img src="themes/serenata.png" width="230" height="80"></div></td>

  </tr>

  <tr>

    <td colspan="2">&nbsp;</td>

  </tr>

</table>

</div>

<?PHP

}

else

{

echo "ADA KESALAHAN SILAHKAN BERITAHU KEJADIAN INI KEPADA ADMIN BAGIAN REFORMASI BIROKRASI DI 087770003436";

}

}

?>