


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
          <td><div align="center"><strong>UPLOAD DIPA SATKER ANDA </strong></div></td>
        </tr>
        <tr>
          <td><div align="center">Satker ID : <?PHP echo $id = $_GET['idsatker']; ?>
                <input name="idsatker" type="hidden" id="idsatker" value="<?PHP echo $id = $_GET['idsatker']; ?>">
                <input name="session" type="hidden" id="session" value="<?PHP echo $session = $_GET['session']; ?>">
                <input name="do" type="hidden" id="do" value="dipa">
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
                <td colspan="2">DIPA TAHUN </td>
                <td width="2%">:</td>
                <td width="76%"><select name="periode" id="periode">
                  <option selected>--PILIH---</option>
                  <option value="2023">2023</option>
                  <option value="2024">2024</option>
                  <option value="2025">2025</option>
                </select></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td colspan="2">Perubahan Ke- </td>
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
                <td colspan="2">File PDF DIPA </td>
                <td>:</td>
                <td><input name="upl" type="file" id="upl">
                Hanya File PDF, Periksa kembali data yang anda kirim </td>
              </tr>
              <tr>
                <td colspan="2">Jumlah total Pagu Anggaran satker </td>
                <td>Rp.</td>
                <td><input name="total" type="text" id="total">
                  Gunakan titik untuk memisahkan angka (jangan digabung) </td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td width="2%"><div align="center">&gt;</div></td>
                <td width="15%">Program Penegakan dan Pelayanan Hukum </td>
                <td>Rp.</td>
                <td><input name="yankum" type="text" id="yankum"> 
                Gunakan titik untuk memisahkan angka (jangan digabung) </td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><div align="center">&gt;</div></td>
                <td>Program Dukungan Manajemen </td>
                <td>Rp.</td>
                <td><input name="dukma" type="text" id="dukma">
                  Gunakan titik untuk memisahkan angka (jangan digabung) </td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td colspan="2">&nbsp;</td>
                <td>&nbsp;</td>
                <td><input type="submit" name="Submit" value="UPLOAD"></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td colspan="4"><div align="center"><strong>Powered by Chendia Studio </strong></div></td>
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
