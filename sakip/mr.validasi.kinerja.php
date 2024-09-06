


<link rel="stylesheet" href="index.css">
  <link rel="stylesheet" href="images/jquery-ui.css">
 
  <script src="images/jquery-1.12.4.js"></script>
  <script src="images/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
<style>
textarea {	
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;	
    width: 100%;
    }
body {
	background-image: url(images/bgmr.jpg);
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
    </script>
<form action="mr.produk.add.php" method="post" enctype="multipart/form-data" name="form1">
  <table width="100%"  border="0" cellspacing="1" cellpadding="1">
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><table width="100%"  border="0" cellspacing="4" cellpadding="4">
        <tr>
          <td><div align="center"><strong>PERSETUJUAN HASIL CAPAIAN KINERJA </strong></div></td>
        </tr>
        <tr>
          <td><div align="center">Satker ID : <?PHP echo $id = $_GET['idsatker']; ?>
                <input name="idsatker" type="hidden" id="idsatker" value="<?PHP echo $id = $_GET['idsatker']; ?>">
                <input name="session" type="hidden" id="session" value="<?PHP echo $session = $_GET['session']; ?>">
                <input name="do" type="hidden" id="do" value="capaiantw">
				<input name="step" type="hidden" id="step" value="<?PHP echo $step = $_GET['step']; ?>">
                <input name="tahun" type="hidden" id="tahun" value="2024">
          </div></td>
        </tr>
        <tr>
          <td><table width="60%"  border="0" align="center" cellpadding="4" cellspacing="4">
            <tr>
              <td width="100%">&nbsp;</td>
            </tr>
            <tr>
              <td><div align="center"><strong>PERNYATAAN TELAH DI REVIU PENGUKURAN KINERJA TRIWULAN INTERNAL SATKER </strong></div></td>
            </tr>
            <tr>
              <td><div align="center">Kami telah melakukan reviu atas data yang kami masukkan sesuai dengan Berbagai Indikator Kinerja yang telah ditetapkan secara kelembagaan maupun menjadi tugas fungsi kami sesuai dengan indikator kinerja utama kami. </div></td>
              </tr>
            <tr>
              <td><div align="center">
              </div></td>
            </tr>
            <tr>
              <td><div align="center">
                <input type="submit" name="Submit" value="TANDA PERSETUJUAN KEPALA SATUAN KERJA">
              </div></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td><div align="center">Persetujuan tidak dapat di perbaiki. Cek kembali dengan baik sebelum melakukan langkah ini. </div></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td><div align="center"><img src="themes/serenata.png" width="230" height="80"></div></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td><div align="center">
            </div></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
