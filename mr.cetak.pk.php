<LINK href="index.css" rel="stylesheet" type="text/css">
<?PHP
include('mr.db.php');
$id1 = $_GET["id"];
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
        <td>&nbsp;</td>
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
        <td>&nbsp;</td>
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
          <td colspan="2"><p align="center"><strong>PERJANJIAN KINERJA TAHUN 2024 </strong></p>            </td>
        </tr>
        <tr>
          <td colspan="2"><div align="center"><strong>KEPALA SUB BAGIAN PEMBINAAN </strong><strong></strong></div></td>
        </tr>
        <tr>
          <td colspan="2"><div align="center"><strong>KEJAKSAAN NEGERI <?PHP echo $name; ?></strong></div></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
          <td width="4%">A.</td>
          <td width="96%"><p align="justify"><strong>TEMA RENCANA KERJA PEMERINTAH TAHUN 2024: </strong></p>            </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>Mempercepat Transformasi Ekonomi yang Inklusif dan Berkelanjutan. </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>B.</td>
          <td><p><strong>TUJUH AGENDA PEMBANGUNAN/PRIORITAS NASIONAL TAHUN 2024 </strong></p></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>1.Memperkuat Ketahanan Ekonomi untuk Pertumbuhan yang Berkualitas dan Berkeadilan.<br>
            2.Mengembangkan Wilayah untuk Mengurangi Kesenjangan dan Menjamin Pemerataan.<br>
            3.Meningkatkan Sumber Daya Manusia Berkualitas dan Berdaya Saing.<br>
            4.Revolusi Mental dan Pembangunan Kebudayaan.<br>
            5.Memperkuat Infrastruktur untuk Mendukung Pengembangan Ekonomi dan Pelayanan Dasar.<br>
            6.Membangun Lingkungan Hidup, Meningkatkan Ketahanan Bencana, dan Perubahan Iklim.<br>
            7.Memperkuat Stabilitas Politik Hukum, Pertahanan dan Keamanan Serta Transformasi Pelayanan Publik.</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>C.</td>
          <td><strong>KINERJA UTAMA</strong></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><table width="100%"  border="0" cellspacing="2" cellpadding="2" class="panel">
            <tr>
              <td width="5%">No</td>
              <td width="21%">Sasaran Program</td>
              <td width="34%">Indikator Kinerja Utama (IKU) </td>
              <td width="30%">Formulasi</td>
              <td width="10%">Target (Satuan / Persen %) </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>D.</td>
          <td><strong>KINERJA TUGAS TAMBAHAN </strong></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><table width="100%"  border="0" cellspacing="2" cellpadding="2" class="panel">
            <tr>
              <td width="5%">No</td>
              <td width="21%">Sasaran Kegiatan </td>
              <td width="34%">Indikator Capaian </td>
              <td width="30%">Formulasi</td>
              <td width="10%">Target (Satuan / Persen %) </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
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