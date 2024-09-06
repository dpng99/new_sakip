

<?PHP
include('mr.db.php');
$sid1 = $_GET['idsatker']; //id satker
$session1 = $_GET['session'];
$nama1 = $_GET['nama'];
$link = mysqli_connect("$server","$username","$password","$database");
$result = mysqli_query($link, "Select * from sinori_login where id_satker = '$sid1'");
while ($row2=mysqli_fetch_array($result,MYSQLI_ASSOC)){
$id_satker1 = $row2['id_satker'];
$id_kejati1 = $row2['id_kejati'];
$satkernama1 = $row2['satkernama'];
}
?>

<!doctype html>
<html lang="en">
  <head>
  	<title>Sinergi Informasi Manajemen Risiko Yang Dinamis</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">
<script language="javascript">
/*
Auto center window script- Eric King (http://redrival.com/eak/index.shtml)
Permission granted to Dynamic Drive to feature script in archive
For full source, usage terms, and 100's more DHTML scripts, visit http://dynamicdrive.com
*/
var win = null;
function NewWindow(mypage,myname,w,h,scroll){
LeftPosition = (screen.width) ? (screen.width-w)/2 : 0;
TopPosition = (screen.height) ? (screen.height-h)/2 : 0;
settings = 'height='+h+',width='+w+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',resizable'
win = window.open(mypage,myname,settings)
}
</script>
  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	        </button>
        </div>
	  		<div class="img bg-wrap text-center py-4" style="background-image: url(images/bg_1.jpg);">
	  			<div class="user-logo">
	  				<div class="img" style="background-image: url(images/logo.jpg);"></div>
	  				<h3>Halo <br><?php echo $satkernama1;  ?> <br>ID Satker : <?php echo $id_satker1;  ?></h3>
	  			</div>
	  		</div>
        <ul class="list-unstyled components mb-5">
          <li class="active">
  <a href="?g=beranda&i=mr&session=<?PHP echo $session1; ?>&nama=<?PHP echo $nama1; ?>&idsatker=<?PHP echo $sid1; ?>"><span class="fa fa-home mr-3"></span> Beranda</a>
          </li>
          <li>
              <a href="?g=download&i=mr&session=<?PHP echo $session1; ?>&nama=<?PHP echo $nama1; ?>&idsatker=<?PHP echo $sid1; ?>"><span class="fa fa-download mr-3 notif"><small class="d-flex align-items-center justify-content-center">6</small></span> Download</a>
          </li>
     
          <li>
            <a href="#"><span class="fa fa-trophy mr-3"></span> Proses Evaluasi </a>
   <ul>
      <li> <a href="?g=proses1&i=mr&session=<?PHP echo $session1; ?>&nama=<?PHP echo $nama1; ?>&idsatker=<?PHP echo $sid1; ?>"><span class="fa fa-trophy mr-3"></span>1. Penetapan Tujuan </a></li>
      <li> <a href="?g=proses2&i=mr&session=<?PHP echo $session1; ?>&nama=<?PHP echo $nama1; ?>&idsatker=<?PHP echo $sid1; ?>"><span class="fa fa-trophy mr-3"></span>2. Identifikasi Risiko </a></li>
 <li> <a href="?g=proses3&i=mr&session=<?PHP echo $session1; ?>&nama=<?PHP echo $nama1; ?>&idsatker=<?PHP echo $sid1; ?>"><span class="fa fa-trophy mr-3"></span>3. Analisa Risiko </a></li>
 <li> <a href="?g=proses4&i=mr&session=<?PHP echo $session1; ?>&nama=<?PHP echo $nama1; ?>&idsatker=<?PHP echo $sid1; ?>"><span class="fa fa-trophy mr-3"></span>4. Evaluasi Risiko </a></li>
 <li> <a href="?g=proses5&i=mr&session=<?PHP echo $session1; ?>&nama=<?PHP echo $nama1; ?>&idsatker=<?PHP echo $sid1; ?>"><span class="fa fa-trophy mr-3"></span>5. Penanganan Risiko </a></li>
 <li> <a href="?g=proses6&i=mr&session=<?PHP echo $session1; ?>&nama=<?PHP echo $nama1; ?>&idsatker=<?PHP echo $sid1; ?>"><span class="fa fa-trophy mr-3"></span>6. Pemantauan dan Reviu </a></li>
    </ul>
          </li>
  <li>
            <a href="?g=proses7&i=mr&session=<?PHP echo $session1; ?>&nama=<?PHP echo $nama1; ?>&idsatker=<?PHP echo $sid1; ?>"><span class="fa fa-trophy mr-3"></span> Cetak Hasil</a>
          </li>
     <li>
            <a href="?g=pemantauan&i=mr&session=<?PHP echo $session1; ?>&nama=<?PHP echo $nama1; ?>&idsatker=<?PHP echo $sid1; ?>"><span class="fa fa-cog mr-3"></span> Pemantauan & Reviu</a>
          </li>
    <li>
            <a href="?g=metaindikator&i=mr&session=<?PHP echo $session1; ?>&nama=<?PHP echo $nama1; ?>&idsatker=<?PHP echo $sid1; ?>"><span class="fa fa-cog mr-3"></span> Meta Indikator</a>
          </li>
       
     
          <li>
              <a href="index.logout.php?g=proses6&i=mr&session=<?PHP echo $session1; ?>&nama=<?PHP echo $nama1; ?>&idsatker=<?PHP echo $sid1; ?>"><span class="fa fa-support mr-3"></span><span class="fa fa-sign-out mr-3"></span> Sign Out</a>
          </li>
        </ul>
<p><center>Powered By Chendia Studio<br>Pembuat Aplikasi <br>Yang Mudah Digunakan</center></p>
    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4">Sistem Informasi Manajemen Risiko yang Dinamis <br>Simeryd v.1.0</h2>
       <p><table width="100%"  border="0" cellspacing="5" cellpadding="5">
  <tr>
    <td><?PHP

$g1 = $_GET["g"];  
$i1 = $_GET["i"]; 
if($g1 == "beranda"){ include("$i1.beranda.php"); }
elseif($g1 == "download"){ include("$i1.download.php"); }
elseif($g1 == "proses1"){ include("$i1.proses.1.php"); }
elseif($g1 == "proses2"){ include("$i1.proses.2.php"); }
elseif($g1 == "proses3"){ include("$i1.proses.3.php"); }
elseif($g1 == "proses4"){ include("$i1.proses.4.php"); }
elseif($g1 == "proses5"){ include("$i1.proses.5.php"); }
elseif($g1 == "proses6"){ include("$i1.proses.6.php"); }
elseif($g1 == "proses7"){ include("$i1.proses.7.php"); }
elseif($g1 == "pemantauan"){ include("mr.pemantauanreviu.php"); }
elseif($g1 == "rekap"){ include("mr.rekap.php"); }
elseif($g1 == "metaindikator"){ include("mr.metaindikator.php"); }
else{ include("mr.beranda.php"); }



?></td>
  </tr>
</table>

       </p>
      </div>
      <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
