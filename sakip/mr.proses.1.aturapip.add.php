
<?PHP
include('mr.db.php');
$link = mysqli_connect("$server","$username","$password","$database") or die(mysqli_error());
?>

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
          <td><div align="center"><strong>MENU PENDAFTARAN PENJAMIN KUALITAS (APIP) </strong></div></td>
        </tr>
        <tr>
          <td><div align="center">Satker ID : <?PHP echo $id = $_GET['idsatker']; ?>
                <input name="idsatker" type="hidden" id="idsatker" value="<?PHP echo $id = $_GET['idsatker']; ?>">
                <input name="session" type="hidden" id="session" value="<?PHP echo $session = $_GET['session']; ?>">
                <input name="do" type="hidden" id="do" value="aturapip">
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
                <td width="5%" rowspan="2">&nbsp;</td>
                <td width="19%">Nama Auditor Lengkap dengan Gelar </td>
                <td width="2%">:</td>
                <td width="74%"><input name="nama" type="text" id="nama" size="60"></td>
              </tr>
              <tr>
                <td width="19%">NIP</td>
                <td width="2%">:</td>
                <td><input name="nip" type="text" id="nip" size="40"> 
                  Masukkan tanpa Spasi gabung seluruh angka </td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Pangkat</td>
                <td>:</td>
                <td><select name="pangkat" id="pangkat">
                  <option value="III/a">III/a</option>
                  <option value="III/b">III/B</option>
                  <option value="III/c">III/c</option>
                  <option value="III/d">III/d</option>
                  <option value="IV/a">IV/a</option>
                  <option value="IV/b">IV/b</option>
                  <option value="IV/c">IV/c</option>
                  <option value="IV/d">IV/d</option>
                  <option selected>--PILIH--</option>
                </select></td>
              </tr>
              <tr>
                <td rowspan="3">&nbsp;</td>
                <td>Asal Satuan Kerja </td>
                <td>:</td>
                <td><select name="satker" id="satker">
                  <?PHP

$result1 = mysqli_query($link, "SELECT * FROM sinori_login where id_sakip_level = '2' or id_sakip_level = '1' and id_hidesatker ='0'");
while ($row1=mysqli_fetch_array($result1,MYSQLI_ASSOC))
{
print ('<option value="'.$row1['id_satker'].'">'.$row1['satkernama'].'</option>');
}
?>
                </select></td>
              </tr>
              <tr>
                <td>Jabatan</td>
                <td>:</td>
                <td><input name="jabatan" type="text" id="jabatan" size="60"> 
                  Ketikkan Jabatan </td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>Perhatian!! Auditor pemeriksa data wajib dibuatkan Surat keputusan dan bagi yang ditunjuk memasukkan Kinerja ini kedalam SKP nya masing-masing. Utamakan yang telah memiliki sertifikat/kapabilitas dan Intergitas </td>
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
                <td><input type="submit" name="Submit" value="SIMPAN DATA INI"></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td colspan="3"><p>&nbsp;</p>
                  </td>
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
