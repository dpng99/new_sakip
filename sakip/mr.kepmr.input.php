<?PHP
$sid1 = $_GET['idsatker'];
include('mr.db.php');
$link = mysqli_connect("$server","$username","$password","$database");
$result = mysqli_query($link, "Select * from sinori_sakip_keputusan where id_satker = '$sid1'");
while ($row2=mysqli_fetch_array($result,MYSQLI_ASSOC)){
$kep = $row2['id_filesurat'];
$nomor = $row2['id_nomorsurat'];
$tgl = $row2['id_tglsurat'];
if ($kep !== "") { 
print ('<link rel="stylesheet" href="index.css"><style>
body {
	background-image: url(images/bgmr.jpg);
}
</style>
<table width="100%"  border="0" cellspacing="4" cellpadding="4">
    <tr>
      <td bgcolor="#FFCC00">ANDA SUDAH MENGUPLOAD SURAT KEPUTUSAN ANDA. KAMI UCAPKAN TERIMA KASIH. APABILA ANDA MEMILIKI PERTANYAAN YANG SUDAH MERUPAKAN HASIL MUSYAWARAH/KOLABORASI DAPAT DI AJUKAN KEPADA KAMI MELALUI TELP/WA <strong>087770003436</strong> PADA JAM DAN HARI KERJA. </td>
    </tr>
 <tr>
      <td bgcolor="#FFFFFF"><b><a href="KEP/'.$kep.'">'.$nomor.', '.$tgl.'</a></b></td>
    </tr>
  </table>
');} 
elseif ($kep == "") { 
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
    </script><form action="mr.kepmr.input.add.php" method="post" enctype="multipart/form-data" name="form1">
  <table width="100%"  border="0" cellspacing="1" cellpadding="1">
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><table width="100%"  border="0" cellspacing="4" cellpadding="4">
        <tr>
          <td><div align="center"><strong>UPLOAD SURAT PERINTAH TIM PELAKSANA AKIP SATKER ANDA </strong></div></td>
        </tr>
        <tr>
          <td><div align="center">Satker ID : <?PHP echo $id = $_GET['idsatker']; ?>
                <input name="idsatker" type="hidden" id="idsatker" value="<?PHP echo $id = $_GET['idsatker']; ?>">
                <input name="session" type="hidden" id="session" value="<?PHP echo $session = $_GET['session']; ?>">
                <input name="do" type="hidden" id="do" value="kep">
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
                <td width="13%">&nbsp;</td>
                <td width="21%">Nomor Surat </td>
                <td width="3%">:</td>
                <td width="63%"><input name="nomor" type="text" id="nomor" size="40"></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Tanggal Surat </td>
                <td>:</td>
                <td><input name="tanggal" type="text" id="datepicker"></td>
              </tr>
              <tr>
                <td rowspan="2">&nbsp;</td>
                <td>File PDF surat </td>
                <td>:</td>
                <td><input name="upl" type="file" id="upl"></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>Upload Surat Perintah Hanya Bisa dilakukan Satu Kali. Cek Lagi File dan pastikan  anda akan upload benar.</td>
              </tr>
            </table>
          </div></td>
        </tr>
        <tr>
          <td><div align="center">
            <input type="submit" name="Submit" value="UPLOAD">
          </div></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><div align="center">Tidak ada proses edit / delete. Uploadlah dengan sikap penuh tanggungjawab. </div></td>
        </tr>
        <tr>
          <td><div align="center">Cek dan Cek Ulang file sebelum upload. </div></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
  </table>
  
    </form>
<?PHP 
} }
?>