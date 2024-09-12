
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
  	<title>Serenata AKIP Kejaksaan RI</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">
<script language="javascript">

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
	  				<h3>Halo <br><?php

$hasil1 = str_replace("_"," ","$satkernama1");


 echo $hasil1;  ?> <br>ID Satker : <?php echo $id_satker1;  ?></h3>
	  			</div>
	  		</div>
        <ul class="list-unstyled components mb-5">
          <li class="active">
            <a href="?g=beranda&i=mr&session=<?PHP echo $session1; ?>&nama=<?PHP echo $nama1; ?>&idsatker=<?PHP echo $sid1; ?>"><span class="fa fa-home mr-3"></span> Beranda</a>
          </li>
   
          <li>
              <a href="?g=inbox&i=mr&session=<?PHP echo $session1; ?>&nama=<?PHP echo $nama1; ?>&idsatker=<?PHP echo $sid1; ?>"><span class="fa fa-download mr-3 notif"><small class="d-flex align-items-center justify-content-center">0</small></span>Pesan Masuk</a>
          </li>


 <li>
            <a href="?g=download&i=mr&session=<?PHP echo $session1; ?>&nama=<?PHP echo $nama1; ?>&idsatker=<?PHP echo $sid1; ?>"><span class="fa fa-trophy mr-3"></span>Sumber Aturan</a>
          </li>
 <li>
            <a href="?g=peralatan&i=mr&session=<?PHP echo $session1; ?>&nama=<?PHP echo $nama1; ?>&idsatker=<?PHP echo $sid1; ?>"><span class="fa fa-trophy mr-3"></span>Sumber Literasi</a>
          </li>
      <li>
              <a href="?g=faq&i=mr&session=<?PHP echo $session1; ?>&nama=<?PHP echo $nama1; ?>&idsatker=<?PHP echo $sid1; ?>"><span class="fa fa-trophy mr-3"></span> FAQ</a>
          </li>
          <li>
            <a href="#"><span class="fa fa-trophy mr-3"></span>Tata Kelola AKIP</a>
   <ul><li> <a href="?g=kepmr&i=mr&session=<?PHP echo $session1; ?>&nama=<?PHP echo $nama1; ?>&idsatker=<?PHP echo $sid1; ?>"><span class="fa fa-trophy mr-3"></span>Kep Tim Sakip</a></li>
     
<?PHP


$link = mysqli_connect("$server","$username","$password","$database");
$result = mysqli_query($link, "Select * from sinori_sakip_keputusan where id_satker = '$sid1'");
while ($row2=mysqli_fetch_array($result,MYSQLI_ASSOC)){
$kep = $row2['id_filesurat'];
if ($kep == "") { echo  "";}
elseif ($kep !== "") { print ('

 <li> <a href="?g=proses1&i=mr&session='.$session1.'&nama='.$nama1.'&idsatker='.$sid1.'"><span class="fa fa-trophy mr-3"></span>1. Perencanaan</a></li>
      <li> <a href="?g=proses2&i=mr&session='.$session1.'&nama='.$nama1.'&idsatker='.$sid1.'"><span class="fa fa-trophy mr-3"></span>2. Pengukuran</a></li>
 <li> <a href="?g=proses3&i=mr&session='.$session1.'&nama='.$nama1.'&idsatker='.$sid1.'"><span class="fa fa-trophy mr-3"></span>3. Pelaporan </a></li>
 <li> <a href="?g=proses4&i=mr&session='.$session1.'&nama='.$nama1.'&idsatker='.$sid1.'"><span class="fa fa-trophy mr-3"></span>4. Evaluasi </a></li>


');} } ?>  </ul>
          </li>
         <?PHP


$link = mysqli_connect("$server","$username","$password","$database");
$result = mysqli_query($link, "Select * from sinori_login where id_satker = '$sid1'");
while ($row2=mysqli_fetch_array($result,MYSQLI_ASSOC)){
$idkejati1 = $row2['id_kejati'];
$idkejari1 = $row2['id_kejari'];
if ($idkejari1 !== "0") { 

echo  "";

}
elseif ($idkejari1 == "0") { 

print ('

 <li> <a href="?g=listsatker&i=mr&session='.$session1.'&nama='.$nama1.'&idkejati='.$idkejati1.'&idsatker='.$id_satker1.'"><span class="fa fa-trophy mr-3"></span>SAKIP WILAYAH</a></li>
<li> <a href="?g=validasiAPIP&i=mr&session='.$session1.'&nama='.$nama1.'&idkejati='.$idkejati1.'&idsatker='.$id_satker1.'"><span class="fa fa-trophy mr-3"></span>SAKIP VALIDASI</a></li>


');} } ?> 

  <li>
            <a href="?g=kepatuhan&i=mr&session=<?PHP echo $session1; ?>&nama=<?PHP echo $nama1; ?>&idsatker=<?PHP echo $sid1; ?>"><span class="fa fa-trophy mr-3"></span>Kepatuhan AKIP</a>
          </li>
          <li>
            <a href="https://api.whatsapp.com/send?phone=6285215374433&text=Saya%20dari%20satker%20: <?PHP echo $nama1; ?> ingin%20bertanya%20tentang%20SAKIP" target="_blank"><span class="fa fa-support mr-3"></span> Chat Support <img src="images/wa.png" width="30" height="30" border="0"></a>
          </li>
          <li>
            <a href="?g=password&i=mr&session=<?PHP echo $session1; ?>&nama=<?PHP echo $nama1; ?>&idsatker=<?PHP echo $sid1; ?>" target="_blank"><span class="fa fa-sign-out mr-3"></span>Ubah Password</a>
          </li>
          <li>
              <a href="index.logout.php?g=proses6&i=mr&session=<?PHP echo $session1; ?>&nama=<?PHP echo $nama1; ?>&idsatker=<?PHP echo $sid1; ?>"><span class="fa fa-support mr-3"></span><span class="fa fa-sign-out mr-3"></span> Sign Out</a>
          </li>
        </ul>
<p><center>Powered By<br> Chendia Studio Jogjakarta<br>(c) 2024</center></p>
    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4"><center>Sinergi Continuous Improvement - AKIP Kejaksaan RI</center>
       </h2>
       <p><table width="100%"  border="0" cellspacing="5" cellpadding="5">
  <tr>
    <td><?PHP

$g1 = $_GET["g"];  
$i1 = $_GET["i"]; 
if($g1 == "beranda"){ include("$i1.beranda.php"); }
elseif($g1 == "kepmr"){ include("$i1.kepmr.php"); }
elseif($g1 == "faq"){ include("$i1.faq.php"); }
elseif($g1 == "listsatker"){ include("$i1.listsatker.php"); }
elseif($g1 == "download"){ include("$i1.download.php"); }
elseif($g1 == "password"){ include("$i1.password.php"); }
elseif($g1 == "validasiAPIP"){ include("$i1.validasiAPIP.php"); }
elseif($g1 == "inbox"){ include("$i1.inbox.php"); }
elseif($g1 == "kepatuhan"){ include("$i1.kepatuhan.php"); }
elseif($g1 == "hapuspk"){ include("$i1.hapuspk.php"); }
elseif($g1 == "proses1"){ include("$i1.proses.1.php"); }
elseif($g1 == "proses2"){ include("$i1.proses.2.php"); }
elseif($g1 == "proses3"){ include("$i1.proses.3.php"); }
elseif($g1 == "proses4"){ include("$i1.proses.4.php"); }
elseif($g1 == "proses5"){ include("$i1.proses.5.php"); }
elseif($g1 == "proses6"){ include("$i1.proses.6.php"); }
elseif($g1 == "peralatan"){ include("$i1.peralatan.php"); }
elseif($g1 == "semester2"){ include("$i1.semester.2.php"); }
else{ include("mr.beranda.php"); }



?>
      </td>
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
