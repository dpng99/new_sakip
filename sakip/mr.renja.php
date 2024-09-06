


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
          <td><div align="center"><strong>UPLOAD RENCANA KERJA TAHUNAN SATKER ANDA </strong></div></td>
        </tr>
        <tr>
          <td><div align="center">Satker ID : <?PHP echo $id = $_GET['idsatker']; ?>
                <input name="idsatker" type="hidden" id="idsatker" value="<?PHP echo $id = $_GET['idsatker']; ?>">
                <input name="session" type="hidden" id="session" value="<?PHP echo $session = $_GET['session']; ?>">
                <input name="do" type="hidden" id="do" value="renja">
                <input name="tab" type="hidden" id="tab" value="a">
          </div></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><div align="center">
            <table width="100%"  border="0" cellspacing="4" cellpadding="4">
              <tr>
                <td width="5%">&nbsp;</td>
                <td width="10%">Tahun Renja</td>
                <td width="2%">:</td>
                <td width="83%"><select name="periode" id="periode">
                  <option selected>--PILIH---</option>
                  <option value="2023">2023</option>
                  <option value="2024">2024</option>
                  <option value="2025">2025</option>
                </select></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Perubahan Ke- </td>
                <td>:</td>
                <td><select name="perubahan" id="perubahan">
                  <option selected>--PILIH---</option>
                  <option value="0">0</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                                                </select></td>
              </tr>
              <tr>
                <td rowspan="2">&nbsp;</td>
                <td>File PDF </td>
                <td>:</td>
                <td><input name="upl" type="file" id="upl">
                Hanya File PDF, PEriksa kembali data yang anda kirim </td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>Upload Rencana Kerja Hanya Bisa dilakukan Satu Kali. Cek Lagi File dan pastikan  anda akan upload benar.</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><input type="submit" name="Submit" value="UPLOAD"></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td colspan="3"><p>Cara Membuat Rencana Strategis (Renstra) atau Annual Planning (Renja): </p>
                  <ol>
                    <li>Temukan Visi Misi dan Roadmap setahun </li>
                    <li>Analisa proses bisnis dengan balance scorecard sesuai roadmap </li>
                    <li>Tentukan Performance Indicator sesuai blueprint organisasi </li>
                    <li>Analisa isu internal eksternal dengan metode bisnis forensic </li>
                    <li>Gunakan Strategy Toolbox sesuai kebutuhan </li>
                  </ol></td>
                </tr>
              <tr>
                <td>&nbsp;</td>
                <td colspan="3">&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td colspan="3"><div align="center"><strong>Powered by Chendia Studio </strong></div></td>
              </tr>
            </table>
          </div></td>
        </tr>
        <tr>
          <td><div align="center">
          </div></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
