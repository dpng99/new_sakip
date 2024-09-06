<table width="100%"  border="0" cellspacing="4" cellpadding="4">
  <tr>
    <td>PEMANTAUAN DAN REVIU</td>
  </tr>
</table>

<?PHP 
include('mr.db.php');


$tables = "mr_keputusan";

$link = mysqli_connect("$server","$username","$password","$database") or die(mysqli_error());
 if(empty($action))
 {
  if (empty($order)) $order =  2;
  if (empty($page))  $page  =  1;
  if (empty($hits))  $hits  = 1000;
  $start = $hits*($page-1);
$kueri = mysqli_query($link, "SELECT * FROM $tables where id_filesurat !=''");
 
 	$data = array ();
 	while (($row = mysqli_fetch_array($kueri)) != null){
 		$data[] = $row;
 	}
 		$xnum = count ($data);
 		//-------------------------
  $stw2 = (int)($xnum/$hits);
  if ($xnum%$hits > 0) {$stw2++;}
  $np = $page+1;
  $pp = $page-1;
  if ($page == 1) { $pp=1; }
  if ($np > $stw2) { $np = $stw2;} 
  echo '<table id="myTable" cellspacing="1" width="100%" align="center" cellpadding="3" bgcolor="#FFCC00" >';
  echo '<thead><tr>';
  echo '<td width="4%">No</td>';
  echo '<td width="16%">Satker ID</td>';
echo '<td width="40%">Nama Satker/KEP MR</td>';
echo '<td width="40%">Isian MR</td>';
  echo '</tr></thead><tbody>';

$no=1; // fungsi nomor

 $x=0;

$result = mysqli_query($link, "SELECT * FROM $tables where id_filesurat !='' LIMIT $start,$hits");
while ($ar=mysqli_fetch_array($result,MYSQLI_ASSOC))
  {

   $x++;


   if($x==2) {$barva = "FFFFB7";$x=0;} else {$barva = "FFD8B0";$x=1;}
//-----------
echo "<tr bgcolor=#$barva>";
print ('<td><center>'.$no++.'</center></td>');
print ('<td>'.$ar['id_satker'].'</td>');
$id_satker1 = $ar['id_satker'];
$id_filesurat1 = $ar['id_filesurat'];
$link2 = mysqli_connect("$server","$username","$password", "rbkejagu_sinori1") or die(mysqli_error());
$sql2 = "SELECT * FROM sinori_login where id_satker = '$id_satker1'";
$query2 = mysqli_query($link2, $sql2);
while ($row2 = mysqli_fetch_array($query2)){
print('<td><a href="KEP/'.$id_filesurat1.'" target="_blank">'.$row2['satkernama'].'</a></td>');
print('<td><a href="mr.pemantauanreviu.view.php?sid='.$id_satker1.'" target="_blank">EVALUASI MANAJEMEN RISIKO</a></td>');
}
}






  echo" </tr>";
}
  echo "</tbody></table>";

  ?>
