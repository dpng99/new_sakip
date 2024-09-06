<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"><style type="text/css">
<!--
body {
	background-image: url(themes/background.jpg);
}
-->
</style>
<div align="center"><img src="images/sakip.png" width="1824" height="914">
  <div align="center">
</div>
<table width="100%"  border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td width="39%"><img src="themes/smart.png" width="725" height="703"></td>
    <td width="61%" valign="top">
	   <div class="w3-container"><div class="w3-panel w3-pale-green w3-bottombar w3-border-green w3-border">
  <p>Dapatkan informasi update pada kotak dibawah ini</p>
  
  <?PHP 
include('mr.db.php');
$tables = "sinori_sakip_inbox";
$link = mysqli_connect("$server","$username","$password","$database") or die(mysqli_error());
if(empty($action))
{
if (empty($order)) $order =  2;
if (empty($page))  $page  =  1;
if (empty($hits))  $hits  = 100;
$start = $hits*($page-1);
$kueri = mysqli_query($link, "SELECT * FROM $tables");
$data = array ();
while (($row = mysqli_fetch_array($kueri)) != null){
$data[] = $row;
}
$xnum = count ($data);
$stw2 = (int)($xnum/$hits);
if ($xnum%$hits > 0) {$stw2++;}
$np = $page+1;
$pp = $page-1;
if ($page == 1) { $pp=1; }
if ($np > $stw2) { $np = $stw2;} 
print ('
<table id="myTable" cellspacing="2" width="100%" align="center" cellpadding="3" bgcolor="#FFFF42" ><thead>
<tr bgcolor="#FFFF42">
<td width="3%"><center>No</center></td>
<td width="97%">Pesan</td>

</tr>
</thead><tbody>
');
$no=1; $x=0;
$result = mysqli_query($link, "SELECT * FROM $tables LIMIT $start,$hits");
while ($ar=mysqli_fetch_array($result,MYSQLI_ASSOC))
{
$x++;
if($x==2) {$barva = "FFFFB7";$x=0;} else {$barva = "FFFFFF";$x=1;}
echo "<tr bgcolor=#$barva>";
print ('<td ><center>'.$no++.'<center></td>');
print (' <td ><b>'.$ar['judul'].'</b><br>'.$ar['isi'].'<br>'.$ar['tanggal'].'</td>');

}
echo" </tr>";
}
echo "</tbody></table>";
?>
	   </div> 
	   </div> 



      <div class="w3-container">
  <div class="w3-panel w3-pale-red w3-leftbar w3-border-red">
    <p>Pengumuman proses penilaian mandiri AKIP satuan kerja</td>
       </p>
  </div>
</div></td>
  </tr>
</table>
<table width="100%"  border="0" cellspacing="4" cellpadding="4">
  <tr>
    <td><h3>1.&nbsp; Specific </h3>
      <p>Saat menetapakan tujuan untuk proyek akan kamu lakukan, tujuan tersebut harus jelas dan spesifik. Jika tidak, kamu akan kesulitan ketika harus fokus pada proyek tersebut. </p>
      <p>Kamu bisa mempertimbangkan beberapa hal berikut ketika menentukan proyek yang akan dibuat. </p>
      <ul>
        <li>Tujuan apa yang ingin dicapai. </li>
        <li>Apa alasan tujuan tersebut dan mengapa tujuan tersebut penting. </li>
        <li>Tentukan siapa saja yang akan terlibat untuk mencapai tujuan tersebut. </li>
        <li>Jika membutuhkan lokasi, tentukan lokasi yang relevan dengan tujuan. </li>
        <li>Identifikasi persyaratan atau hambatan yang dapat menjadi masalah dalam proses pelaksanaan. </li>
      </ul>
      <h3>2.&nbsp; Measurable </h3>
      <p>Saat menentukan tujuan proyek, kamu harus memastikan bahwa tujuan tersebut dapat diukur. Dengan begitu, kamu dapat melacaknya. </p>
    <p>Untuk itu, tentukan tugas yang spesifik. Tetapkan apa saja yang harus diselesaikan dan kapan tugas tersebut harus selesai. Ini akan memudahkanmu mengawasi jalannya proyek. </p>
    <h3>3. Achievable </h3>
    <p>Agar tujuan proyekmu dapat tercapai, tujuan tersebut harus realistis. Kamu boleh membuat proyek yang menantang tetapi tetap memungkinkan. </p>
    <p>Jadi, perhatikan baik-baik peluang yang sebelumnya terlewatkan. Pikirkan juga sumber daya yang diperlukan untuk menyelesaikan tujuan tersebut. </p>
    <p>Kamu bisa melibatkan anggota timmu dalam menetapkan tujuan proyek. Dengan begitu, mereka dapat memilih area proyek yang akan dikerjakan tergantung pada keahlian dan kemampuan mereka. </p>
    <h3>4.&nbsp; Relevant </h3>
    <p>Tujuan proyek haruslah relevan dengan misi perusahaan. Paling tidak, tujuan tersebut mencerminkan satu atau lebih dari nilai inti perusahaan. </p>
    <p>Untuk memastikan proyek memberikan hasil yang diharapkan, kamu harus memastikan bahwa setiap tujuan proyek konsisten dengan tujuan perusahaan secara keseluruhan. </p>
    <h3>5.&nbsp; Time-bound goals </h3>
    <p>Kamu perlu memiliki tenggat waktu yang jelas untuk benar-benar fokus dalam mencapai tujuanmu. Tanpa tenggat waktu yang jelas, kamu tidak akan tahu di mana dan kapan harus memulai. </p>
    <p>Buatlah kerangka waktu yang realistis untuk dicapai pada setiap tahapan proyek. Untuk menghindari maraton yang tidak pernah berakhir dalam sebuah proyek, setiap tahapan harus memiliki tenggat waktu yang pasti. </p></td>
  </tr>
</table>
</div>
