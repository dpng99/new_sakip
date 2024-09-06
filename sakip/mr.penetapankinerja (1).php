<?PHP
include("mr.db.php");
$idsatker1 = $_GET['idsatker'];
$session1 = $_GET['session'];
$link = mysqli_connect("$server","$username","$password","$database") or die(mysqli_error());

//--pencarian tipe satker
$result = mysqli_query($link, "Select * from sinori_login where id_satker = '$idsatker1'");
while ($row2=mysqli_fetch_array($result,MYSQLI_ASSOC)){
$level1 = $row2['id_sakip_level'];
}
?>
	<!-- Load librari/plugin jquery nya -->
	<script src="js/jquery.min.js" type="text/javascript"></script>
	
	<!-- Load File javascript config.js -->
	<script src="js/config.js" type="text/javascript"></script>
<link rel="stylesheet" href="index.css"><style type="text/css">
<!--
body {
	background-image: url(themes/background.jpg);
}
-->
</style>
	<table width="100%"  border="0" cellspacing="4" cellpadding="4">
  <tr>
    <td colspan="2"><strong>Lakukan Penetapan Kinerja Satuan Kerja <b><?PHP echo $idsatker1; ?></b> Level : <?PHP echo $level1; ?></strong></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td width="98%"><form action="mr.produk.add.php" method="post" enctype="multipart/form-data" name="form1">
      <table width="100%"  border="0" cellspacing="4" cellpadding="4">
        <tr>
          <td width="2%" rowspan="3">&nbsp;</td>
          <td width="11%" colspan="2">Tahun Anggaran </td>
          <td width="2%">:</td>
          <td width="85%"><select name="tahun">
              <option value="2023">2023</option>
              <option value="2024" selected>2024</option>
          </select>
            <input name="idsatker" type="hidden" id="idsatker" value="<?PHP echo $idsatker1; ?>">
            <input name="session" type="hidden" id="session" value="<?PHP echo $session1; ?>">
            <input name="do" type="hidden" id="do" value="tapkinerja">
  </td>
        </tr>
        <tr>
          <td width="11%" colspan="2">&nbsp;</td>
          <td width="2%">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>Bidang</td>
          <td>&nbsp;</td>
          <td width="2%">:</td>
          <td><select name="bidang" id="bidang">
              <?PHP

$result1 = mysqli_query($link, "SELECT * FROM sinori_sakip_bidang where hide = '0' and bidang_lokasi ='$level1'");
while ($row1=mysqli_fetch_array($result1,MYSQLI_ASSOC))
{
print ('<option value="'.$row1['id'].'">'.$row1['bidang_nama'].'</option>');
}
?>
            </select>
    &nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="2">Sasaran Strategis </td>
          <td>:</td>
          <td><select name="saspro" id="saspro">
              <?PHP
if($level1 == '1'){
$result2 = mysqli_query($link, "SELECT * FROM sinori_sakip_saspro where lingkup IN ('0', '1','12')");
} else {
$result2 = mysqli_query($link, "SELECT * FROM sinori_sakip_saspro where lingkup ='0'");
}
while ($row2=mysqli_fetch_array($result2,MYSQLI_ASSOC))
{
$num_char = 1000;
$text2 = $row2['saspro_nama'];
echo substr($text2, 0, $num_char) . '...';
print ('<option value="'.$row2['id'].'">'.$text2.'</option>');
}
?>
          </select></td>
        </tr>
        <tr>
          <td rowspan="4">&nbsp;</td>
          <td colspan="2">Pilih Jenis Indikator </td>
          <td>:</td>
          <td><select class="form-control" name="indikator" id="indikator" required>
              <option value="sinori_sakip_indikator">Lagging Indicator (outcome measure/ukuran hasil)</option>
              <option value="sinori_sakip_ranpnidx">Leading Indicator (performance driver measure/ukuran pemacu kinerja)</option>
              <option selected>--Pilih--</option>
            </select>
          </td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          <td>&nbsp;</td>
          <td> Lagging indicators adalah indikator tingkat keberhasilan pencapaian suatu sasaran yang perspektif waktunya mengarah ke masa lalu. Sedangkan leading indicators adalah indikator tingkat keberhasilan mempengaruhi faktor-faktor kunci penentu kinerja masa depan, sehingga perspektif waktunya mengarah ke masa depan. Penentuan kedua ukuran ini dimaksudkan agar usaha pencapaian sasaran strategik dapat dikelola, dan oleh karena dapat dikelola, sasaran strategik tersebut dapat diwujudkan </td>
        </tr>
        <tr>
          <td colspan="2" rowspan="2">&nbsp;</td>
          <td rowspan="2">&nbsp;</td>
          <td>Pilih Indikator Kinerja dibawah ini </td>
        </tr>
        <tr>
          <td><select class="form-control" name="sasaran" id="sasaran" required>
          </select></td>
        </tr>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script type="text/javascript">
		$('#indikator').change(function() { 
			var indikator = $(this).val(); 
			$.ajax({
				type: 'POST', 
				url: 'ajax_indikator.php', 
				data: 'indikator_id=' + indikator, 
				success: function(response) { 
					$('#sasaran').html(response); 
				}
			});
		});
 
	</script>
        <tr>
          <td rowspan="2">&nbsp;</td>
          <td colspan="2">Target (Masukkan angka) </td>
          <td>:</td>
          <td><input name="target" type="text" id="target" size="10">
        *masukkan jumlah kegiatan atau program yang akan diselesaikan dalam 1 (satu) Tahun </td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          <td>&nbsp;</td>
          <td>Cara menetapkan target adalah menghitung capaian tahun lalu. (2 tahun kebelakang) untuk menentukan proyeksi capaian disesuaikan juga dengan kebutuhan anggaran yang telah diberikan atau apabila ada peningkatan dapat memebrikan data masukkan guna terjadinya perubahan penetapan anggaran baru di tahun mendatang. </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="2">Ditetapkan Tanggal </td>
          <td>:</td>
          <td>Tanggal ditetapkan adalah tanggal simpan data saat ini pada aplikasi yang akan otomatis tersimpan. </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="2">&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="4">Penetapan kinerja yang dilakukan wajib melalui proses persetujuan oleh pimpinan. Apa yang sudah di input membutuhkan validasi dan approved pimpinan.</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="2">&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="2">&nbsp;</td>
          <td>&nbsp;</td>
          <td><input type="submit" name="Submit" value="SIMPAN"></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="2">&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
    </form></td>
    <td width="2%">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">Powered by Chendia Studio Jogjakarta </div></td>
  </tr>
</table>
