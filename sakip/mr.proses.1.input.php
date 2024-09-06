<link rel="stylesheet" href="index.css">
<style>
textarea {	
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;	
    width: 100%;
    }
</style>  <script type="text/javascript">
      function updateText()
    {	
    var dd = document.getElementById("template");
    var ddtext = dd.options[dd.selectedIndex].text;
    var sp_ddtext = ddtext.replace(/[^. a-zA-Z]+/g,'');
    document.getElementById("a1").value = sp_ddtext;
    }
    function updateText2()
    {	
    var dd = document.getElementById("template2");
    var ddtext = dd.options[dd.selectedIndex].text;
    var sp_ddtext = ddtext.replace(/[^. a-zA-Z]+/g,'');
    document.getElementById("a2").value = sp_ddtext;
    }
    </script><form name="form1" method="post" action="index.mr.add.php">
  <table width="100%"  border="0" cellspacing="1" cellpadding="1">
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><table width="100%"  border="0" cellspacing="4" cellpadding="4">
        <tr>
          <td><div align="center"><strong>PENETAPAN TUJUAN </strong></div></td>
        </tr>
        <tr>
          <td><div align="center">Satker ID : <?PHP echo $id = $_GET['idsatker']; ?>
                <input name="idsatker" type="hidden" id="idsatker" value="<?PHP echo $id = $_GET['idsatker']; ?>">
                <input name="session" type="hidden" id="session" value="<?PHP echo $session = $_GET['session']; ?>">
                <input name="do" type="hidden" id="do" value="mr1">
                <input name="tab" type="hidden" id="tab" value="a">
          </div></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td><table width="100%"  border="0" cellspacing="4" cellpadding="4">
        <tr>
          <td width="14%">Program </td>
          <td width="4%">(A.1) </td>
          <td width="2%">:</td>
          <td width="80%">            <select name="a1" id="a1">
              <option value="Dukungan Manajemen">Dukungan Manajemen</option>
              <option value="Penegakan dan Pelayanan Hukum">Penegakan dan Pelayanan Hukum</option>
              <option selected>---PILIH TEMPLATE---</option>
                                                  </select></td>
        </tr>
        <tr>
          <td>Tujuan Sasaran </td>
          <td>(A.2)</td>
          <td>:</td>
          <td><select name="template2" id="template2" onChange="updateText2();">
            <option selected>---PILIH TEMPLATE---</option>
            <option value="Meningkatnya kualitas dan kuantitas SDM aparatur Kejaksaan">Meningkatkan kualitas dan kuantitas SDM aparatur Kejaksaan</option>
            <option value="Meningkatnya optimalisasi realisasi anggaran">Meningkatnya realisasi anggaran</option>
            <option value="Meningkatnya kualitas Reformasi Birokrasi Kejaksaan">Meningkatnya kualitas Reformasi Birokrasi Kejaksaan</option>
            <option value="Meningkatnya kinerja berbasis IT">Meningkatnya kinerja berbasis IT</option>
            <option value="Meningkatnya penyelesaian penyelamatan dan pemulihan aset">Meningkatnya penyelesaian penyelamatan dan pemulihan aset</option>
            <option value="Meningkatnya sarana dan prasarana yang mendukung kinerja Kejaksaan">Meningkatnya sarana dan prasarana yang mendukung kinerja Kejaksaan</option>
            <option value="Meningkatnya kualitas akuntabilitas kinerja aparatur Kejaksaan">Meningkatnya kualitas akuntabilitas kinerja aparatur Kejaksaan</option>
            <option value="Meningkatnya kualitas aparatur Kejaksaan yang bersertifikat">Meningkatnya kualitas aparatur Kejaksaan yang bersertifikat</option>
            <option value="Meningkatnya integritas aparatur kejaksaan">Meningkatnya integritas aparatur kejaksaan</option>
            <option value="Meningkatnya pelaksanaan operasi intelijen yang berkaitan dengan bidang ipolhankam">Meningkatnya pelaksanaan operasi intelijen yang berkaitan dengan bidang ipolhankam</option>
            <option value="Meningkatnya pelaksanaan operasi intelijen yang berkaitan dengan bidang sosial, budaya, dan kemasyarakatan">Meningkatnya pelaksanaan operasi intelijen yang berkaitan dengan bidang sosial, budaya, dan kemasyarakatan</option>
            <option value="Meningkatnya pelaksanaan operasi intelijen yang berkaitan dengan ekonomi dan keuangan">Meningkatnya pelaksanaan operasi intelijen yang berkaitan dengan ekonomi dan keuangan</option>
            <option value="Meningkatnya kegiatan pengaamanan pembangunan strategis">Meningkatnya kegiatan pengaamanan pembangunan strategis</option>
            <option value="Meningkatnya operasi intelijen yang berkaitan dengan TI dan produksi Intelijen">Meningkatnya operasi intelijen yang berkaitan dengan TI dan produksi Intelijen</option>
            <option value="Meningkatnya kulitas dan kuantitas penyuluhan dan penerangan hukum">Meningkatnya kulitas dan kuantitas penyuluhan dan penerangan hukum</option>
            <option value="Meningkatnya penyelesaian perkara Tindak pidana umum tertentu berdasarkan keadilan restoratif">Meningkatnya penyelesaian perkara Tindak pidana umum tertentu berdasarkan keadilan restoratif</option>
            <option value="Meningkatnya kualitas penyelesaian penanganan perkara tindak pidana umum">Meningkatnya kualitas penyelesaian penanganan perkara tindak pidana umum</option>
            <option value="Meningkatnya penyelesaian Tindak pidana korupsi dan TPPU secara transparan, akuntable dan profesional">Meningkatnya penyelesaian Tindak pidana korupsi dan TPPU secara transparan, akuntable dan profesional</option>
            <option value="Meningkatnya Penyelesaian Penanganan Perkara Tindak Pidana Khusus, (Kepabeaan, Cukai dan Pajak) dan TPPU secara transparan, akuntabel dan profesional ">Meningkatnya Penyelesaian Penanganan Perkara Tindak Pidana Khusus, (Kepabeaan, Cukai dan Pajak) dan TPPU secara transparan, akuntabel dan profesional </option>
            <option value="Perbaikan Tata Kelola Administrasi Penanganan Perkara Tindak Pidana Korupsi dan TPPU, Tindak Pidana Khusus (Kepabeanan, Cukai dan Pajak) dan TPPU berbasis Teknologi Informasi">Perbaikan Tata Kelola Administrasi Penanganan Perkara Tindak Pidana Korupsi dan TPPU, Tindak Pidana Khusus (Kepabeanan, Cukai dan Pajak) dan TPPU berbasis Teknologi Informasi</option>
            <option value="Meningkatnya keberhasilan Penyelesaian perkara Perdata dan Tata Usaha Negara">Meningkatnya keberhasilan Penyelesaian perkara Perdata dan Tata Usaha Negara</option>
            <option value="Meningkatnya pengembalian kerugian keuangan Negara melalui jalur perdata">Meningkatnya pengembalian kerugian keuangan Negara melalui jalur perdata</option>
            <option value="Meningkatnya pengetahuan hukum masyarakat ">Meningkatnya pengetahuan hukum masyarakat </option>
            <option value="Meningkatnya Penyelesaian Penanganan Perkara Pidana Tindak Pidana Umum">Meningkatnya Penyelesaian Penanganan Perkara Pidana Tindak Pidana Umum</option>
            <option value="Meningkatnya pelaksanaan kegiatan Penanganan dan Penyelesaian Perkara Tata Usaha Negara">Meningkatnya pelaksanaan kegiatan Penanganan dan Penyelesaian Perkara Tata Usaha Negara</option>
            <option value="Meningkatnya pelaksanaan kegiatan Pemberian Pertimbangan Hukum, Pelayanan Hukum dan Tindakan Hukum Lain">Meningkatnya pelaksanaan kegiatan Pemberian Pertimbangan Hukum, Pelayanan Hukum dan Tindakan Hukum Lain</option>
            <option value="Terlaksananya kegiatan Penanganan dan Penyelesaian Perkara Perdata dan Tata Usaha Negara">Terlaksananya kegiatan Penanganan dan Penyelesaian Perkara Perdata dan Tata Usaha Negara</option>
            <option value="Meningkatnya optimalisasi pelaksanaan anggaran yang akuntabel">Meningkatnya optimalisasi pelaksanaan anggaran yang akuntabel</option>
            <option value="Meningkatnya kegiatan Pengawasan di Bidang Kepegawaian dan Tugas Umum, Intelijen, Tindak Pidana Umum, Tindak Pidana Khusus serta Perdata dan Tata Usaha Negara">Meningkatnya kegiatan Pengawasan di Bidang Kepegawaian dan Tugas Umum, Intelijen, Tindak Pidana Umum, Tindak Pidana Khusus serta Perdata dan Tata Usaha Negara</option>
            <option value="Meningkatnya Kegiatan Pengawasan Aparatur Kejaksaan">Meningkatnya Kegiatan Pengawasan Aparatur Kejaksaan</option>
<option value="Meningkatnya koordinasi teknis penindakan dan penuntutan yang dilakukan oleh oditurat dan penegakan hukum dalam penanganan perkara koneksitas.">PIDMIL - Meningkatnya koordinasi teknis penindakan dan penuntutan yang dilakukan oleh oditurat dan penegakan hukum dalam penanganan perkara koneksitas.</option>
                              <option value="Meningkatnya keberhasilan penyelesaian penanganan perkara koneksitas">PIDMIL - Meningkatnya keberhasilan penyelesaian penanganan perkara koneksitas</option>    </select></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>Gunakan template untuk tujuan sasaran apabila tidak sesuai dengan rencana kerja anda silahkan ketik di dalam kotak dibawah ini. </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><textarea name="a2" wrap="VIRTUAL" id="a2"></textarea></td>
        </tr>
        <tr>
          <td rowspan="2">Indikator Kinerja </td>
          <td rowspan="2">(A.3) </td>
          <td rowspan="2">:</td>
          <td><textarea name="a3" wrap="VIRTUAL" id="a3"></textarea></td>
        </tr>
        <tr>
          <td>Jelaskan indikator kinerja / sasaran atas pelaksanaan program kegiatan anda dengan kata awalan tercapainya </td>
        </tr>
        <tr>
          <td rowspan="2">Permasalahan </td>
          <td rowspan="2">(A.4) </td>
          <td rowspan="2">:</td>
          <td><textarea name="a4" wrap="VIRTUAL" id="a4"></textarea></td>
        </tr>
        <tr>
          <td>Jelaskan permasalahan yang akan timbul apabila program sesuai indikator kinerja diatas apabila tidak dapat dilaksanakan dengan baik.</td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          <td>&nbsp;</td>
          <td><input type="submit" name="Submit" value="Submit"></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <th>&nbsp;</th>
    </tr>
    <tr>
      <th>Aplikasi Si Mr YD | Sinergi Informasi Manajemen Risiko Yang Dinamis</th>
    </tr>
    <tr>
      <th>Didukung oleh Chendia Studio </th>
    </tr>
  </table>
</form>
