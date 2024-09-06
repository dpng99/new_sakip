<LINK href="index.css" rel="stylesheet" type="text/css"><?PHP
include("lapbul.kejari.db.php");
$bulan1 = $_GET['bulan'];
$kejati1 = $_GET['kejati'];
$page = $_GET['page'];
$loc1 = $_GET['loc'];
$squery = $_GET['squery'];
if(empty($action))
{
if (empty($order)) $order =  2;
if (empty($page))  $page  =  1;
if (empty($hits))  $hits  = 100;
$start = $hits*($page-1);
$tables = "lapbulbin_".$bulan1;
//--HITUNG AWAL
$mysqli = new mysqli("$server","$username","$password","$database");
$query = $mysqli->prepare("Select * from $tables where id_kejati = '$loc1' and id_kejati2 ='0'");
$query->execute();
$query->store_result();
$xnum = $query->num_rows;
//--HITUNG AKHIR
$stw2 = (int)($xnum/$hits);
if ($xnum%$hits > 0) {$stw2++;}
$np = $page+1;
$pp = $page-1;
if ($page == 1) { $pp=1; }
if ($np > $stw2) { $np = $stw2;} 
echo"<LINK href=\"index.css\" rel=\"stylesheet\" type=\"text/css\">";
echo "Daftar Satker pada wilayah hukum $kejati1 anda sebanyak : <strong>$xnum</strong> | ";
for ($i=1;$i<=$stw2;$i++) {if($page==$i){
echo "<b>$i</b> ";} 
else{echo " <font size=\"2\"><a href=\"?page=$i\">$i</A></font> ";}}
print ('<br><br>');
//----------
$link = mysqli_connect("$server","$username","$password","$database") or die(mysqli_error());
$result  = "SELECT * FROM ".$tables." ";
if(!empty($squery)) { $query .= "WHERE id_kejati LIKE \"%$squery%\" ";}
$result .= "where id_kejati = '$loc1' and id_kejati2 ='0' ORDER BY id ASC LIMIT $start,$hits";

//$result = mysqli_query($link, "Select * from $tables where id_kejati = '$kejati1' ORDER BY id ASC");
//-----------
$query = mysqli_query($link, $result);
  echo '<br><br><table id="myTable" cellspacing="1" width="100%" align="center" cellpadding="3" bgcolor="#999999" >';



  echo '<thead><tr>';

echo '<td>ID</td>';
  echo '<td>Satker</td>';


  echo '<td>L.Cr.1a</td>';

  echo '<td>L.Cr.1b</td>';

 echo '<td>L.Cr.3a</td>';

echo '<td>L.Cr.3b</td>';

echo '<td>L.Cr.4</td>';

echo '<td>L.Cr.5</td>';

echo '<td>L.Cr.in</td>';

echo '<td>L.Cum.1</td>';

echo '<td>L.Cum.2</td>';

echo '<td>L.Cum.3</td>';

echo '<td>L.Cum.4</td>';

echo '<td>L.Cum.5</td>';

echo '<td>L.Cum.6</td>';

echo '<td>L.Cum.7</td>';

echo '<td>L.Cum.8</td>';

echo '<td>L.Cum.9</td>';

echo '<td>L.Cum.in</td>';

echo '<td>L.Cp.1</td>';

echo '<td>L.Cp.2</td>';

echo '<td>L.Cp.3</td>';

echo '<td>L.Cp.4</td>';

echo '<td>L.Cp.5</td>';

echo '<td>L.Cp.6</td>';

echo '<td>L.Cp.7</td>';

echo '<td>L.Cp.in</td>';

echo '<td>L.Cu</td>';

echo '<td>L.Cu.in</td>';

echo '<td>L.Cpl.1</td>';

echo '<td>L.Cpl.2</td>';

echo '<td>L.Cpl.3</td>';

echo '<td>L.Cpl.4</td>';

echo '<td>L.Cpl.in</td>';

echo '<td>L.Chk</td>';

echo '<td>L.Chk.in</td>';
echo '<td>EIS</td>';
echo '<td>CMS</td>';

echo '<td>L.Kti.1</td>';

echo '<td>L.Kti.2</td>';


echo '<td>L.Kti.in</td>';

echo '<td>Form.3a</td>';

echo '<td>Form.3b</td>';

echo '<td>Form.3c</td>';

echo '<td>Form.3d</td>';

echo '<td>Form.3e</td>';

echo '<td>Form.3f</td>';

echo '<td>L.Kpa.in</td>';

  echo '</tr></thead><tbody>';

 $x=0;
  while($row = mysqli_fetch_array($query))
  {

   $x++;
   if($x==2) {$barva = "FFFFB7";$x=0;} else {$barva = "FFD8B0";$x=1;}
$area1 = explode("|", $row["LCr1a"]);

$area2 = explode("|", $row["LCr1b"]);

$area3 = explode("|", $row["LCr3a"]);

$area4 = explode("|", $row["LCr3b"]);

$area5 = explode("|", $row["LCr4"]);

$area6 = explode("|", $row["LCr5"]);

$area7 = explode("|", $row["LCrin"]);

$area8 = explode("|", $row["LCum1"]);

$area9 = explode("|", $row["LCum2"]);

$area10 = explode("|", $row["LCum3"]);

$area11 = explode("|", $row["LCum4"]);

$area12 = explode("|", $row["LCum5"]);

$area13 = explode("|", $row["LCum6"]);

$area14 = explode("|", $row["LCum7"]);

$area15 = explode("|", $row["LCum8"]);

$area16 = explode("|", $row["LCum9"]);

$area17 = explode("|", $row["LCumin"]);

$area18 = explode("|", $row["LCp1"]);

$area19 = explode("|", $row["LCp2"]);

$area20 = explode("|", $row["LCp3"]);

$area21 = explode("|", $row["LCp4"]);

$area22 = explode("|", $row["LCp5"]);

$area23 = explode("|", $row["LCp6"]);

$area24 = explode("|", $row["LCp7"]);

$area25 = explode("|", $row["LCpin"]);

$area26 = explode("|", $row["LCu"]);

$area27 = explode("|", $row["LCuin"]);

$area28 = explode("|", $row["LCpl1"]);

$area29 = explode("|", $row["LCpl2"]);

$area30 = explode("|", $row["LCpl3"]);

$area31 = explode("|", $row["LCpl4"]);

$area32 = explode("|", $row["LCplin"]);

$area33 = explode("|", $row["LChk"]);

$area34 = explode("|", $row["LChkin"]);

$area35 = explode("|", $row["LKti1"]);

$area36 = explode("|", $row["LKti2"]);

$area37 = explode("|", $row["LKtiin"]);

$area38 = explode("|", $row["Form3a"]);

$area39 = explode("|", $row["Form3b"]);

$area40 = explode("|", $row["Form3c"]);

$area41 = explode("|", $row["Form3d"]);

$area42 = explode("|", $row["Form3e"]);

$area43 = explode("|", $row["Form3f"]);

$area44 = explode("|", $row["LKpain"]);
$area45 = explode("|", $row["EIS"]);
$area46 = explode("|", $row["CMS"]);

print ('<tr bgcolor=#'.$barva.'>');
//cari nama satker
$id_satker1 = $row['id_satker'];
print('<td>'.$id_satker1.'</td>');
$link2 = mysqli_connect("$server","$username","$password","$database") or die(mysqli_error());
$sql2 = "SELECT * FROM lapbulbin_login where id_satker = '$id_satker1'";
$query2 = mysqli_query($link2, $sql2);
while ($row2 = mysqli_fetch_array($query2)){
print('<td>'.$row2['satkernama'].'</td>');
}
//end cari

if ($area1[0] == "") {echo "<td><center>-</center></td>";} elseif ($area1[0] !== "") { print ('<td><center><a href="lapbul-kejari/'.$bulan1.'/1/'.$area1[0].'" title="'.$area1[1].'" target="_blank"><img src="images/ok.png" width="20" height="20" border="0"></a></center></td>');} 

if ($area2[0] == "") {echo "<td><center>-</center></td>";} elseif ($area2[0] !== "") { print ('<td><center><a href="lapbul-kejari/'.$bulan1.'/1/'.$area2[0].'" title="'.$area2[1].'" target="_blank"><img src="images/ok.png" width="20" height="20" border="0"></a></center></td>');} 

if ($area3[0] == "") {echo "<td><center>-</center></td>";} elseif ($area3[0] !== "") { print ('<td><center><a href="lapbul-kejari/'.$bulan1.'/1/'.$area3[0].'" title="'.$area3[1].'" target="_blank"><img src="images/ok.png" width="20" height="20" border="0"></a></center></td>');} 

if ($area4[0] == "") {echo "<td><center>-</center></td>";} elseif ($area4[0] !== "") { print ('<td><center><a href="lapbul-kejari/'.$bulan1.'/1/'.$area4[0].'" title="'.$area4[1].'" target="_blank"><img src="images/ok.png" width="20" height="20" border="0"></a></center></td>');} 

if ($area5[0] == "") {echo "<td><center>-</center></td>";} elseif ($area5[0] !== "") { print ('<td><center><a href="lapbul-kejari/'.$bulan1.'/1/'.$area5[0].'" title="'.$area5[1].'" target="_blank"><img src="images/ok.png" width="20" height="20" border="0"></a></center></td>');} 

if ($area6[0] == "") {echo "<td><center>-</center></td>";} elseif ($area6[0] !== "") { print ('<td><center><a href="lapbul-kejari/'.$bulan1.'/1/'.$area6[0].'" title="'.$area6[1].'" target="_blank"><img src="images/ok.png" width="20" height="20" border="0"></a></center></td>');} 

if ($area7[0] == "") {echo "<td><center>-</center></td>";} elseif ($area7[0] !== "") { print ('<td><center><a href="lapbul-kejari/'.$bulan1.'/1/'.$area7[0].'" title="'.$area7[1].'" target="_blank"><img src="images/ok.png" width="20" height="20" border="0"></a></center></td>');} 

if ($area8[0] == "") {echo "<td><center>-</center></td>";} elseif ($area8[0] !== "") { print ('<td><center><a href="lapbul-kejari/'.$bulan1.'/2/'.$area8[0].'" title="'.$area8[1].'" target="_blank"><img src="images/ok.png" width="20" height="20" border="0"></a></center></td>');} 

if ($area9[0] == "") {echo "<td><center>-</center></td>";} elseif ($area9[0] !== "") { print ('<td><center><a href="lapbul-kejari/'.$bulan1.'/2/'.$area9[0].'" title="'.$area9[1].'" target="_blank"><img src="images/ok.png" width="20" height="20" border="0"></a></center></td>');} 

if ($area10[0] == "") {echo "<td><center>-</center></td>";} elseif ($area10[0] !== "") { print ('<td><center><a href="lapbul-kejari/'.$bulan1.'/2/'.$area10[0].'" title="'.$area10[1].'" target="_blank"><img src="images/ok.png" width="20" height="20" border="0"></a></center></td>');} 

if ($area11[0] == "") {echo "<td><center>-</center></td>";} elseif ($area11[0] !== "") { print ('<td><center><a href="lapbul-kejari/'.$bulan1.'/2/'.$area11[0].'" title="'.$area11[1].'" target="_blank"><img src="images/ok.png" width="20" height="20" border="0"></a></center></td>');} 

if ($area12[0] == "") {echo "<td><center>-</center></td>";} elseif ($area12[0] !== "") { print ('<td><center><a href="lapbul-kejari/'.$bulan1.'/2/'.$area12[0].'" title="'.$area12[1].'" target="_blank"><img src="images/ok.png" width="20" height="20" border="0"></a></center></td>');} 

if ($area13[0] == "") {echo "<td><center>-</center></td>";} elseif ($area13[0] !== "") { print ('<td><center><a href="lapbul-kejari/'.$bulan1.'/2/'.$area13[0].'" title="'.$area13[1].'" target="_blank"><img src="images/ok.png" width="20" height="20" border="0"></a></center></td>');} 

if ($area14[0] == "") {echo "<td><center>-</center></td>";} elseif ($area14[0] !== "") { print ('<td><center><a href="lapbul-kejari/'.$bulan1.'/2/'.$area14[0].'" title="'.$area14[1].'" target="_blank"><img src="images/ok.png" width="20" height="20" border="0"></a></center></td>');} 

if ($area15[0] == "") {echo "<td><center>-</center></td>";} elseif ($area15[0] !== "") { print ('<td><center><a href="lapbul-kejari/'.$bulan1.'/2/'.$area15[0].'" title="'.$area15[1].'" target="_blank"><img src="images/ok.png" width="20" height="20" border="0"></a></center></td>');} 

if ($area16[0] == "") {echo "<td><center>-</center></td>";} elseif ($area16[0] !== "") { print ('<td><center><a href="lapbul-kejari/'.$bulan1.'/2/'.$area16[0].'" title="'.$area16[1].'" target="_blank"><img src="images/ok.png" width="20" height="20" border="0"></a></center></td>');} 

if ($area17[0] == "") {echo "<td><center>-</center></td>";} elseif ($area17[0] !== "") { print ('<td><center><a href="lapbul-kejari/'.$bulan1.'/2/'.$area17[0].'" title="'.$area17[1].'" target="_blank"><img src="images/ok.png" width="20" height="20" border="0"></a></center></td>');} 

if ($area18[0] == "") {echo "<td><center>-</center></td>";} elseif ($area18[0] !== "") { print ('<td><center><a href="lapbul-kejari/'.$bulan1.'/3/'.$area18[0].'" title="'.$area18[1].'" target="_blank"><img src="images/ok.png" width="20" height="20" border="0"></a></center></td>');} 

if ($area19[0] == "") {echo "<td><center>-</center></td>";} elseif ($area19[0] !== "") { print ('<td><center><a href="lapbul-kejari/'.$bulan1.'/3/'.$area19[0].'" title="'.$area19[1].'" target="_blank"><img src="images/ok.png" width="20" height="20" border="0"></a></center></td>');} 

if ($area20[0] == "") {echo "<td><center>-</center></td>";} elseif ($area20[0] !== "") { print ('<td><center><a href="lapbul-kejari/'.$bulan1.'/3/'.$area20[0].'" title="'.$area20[1].'" target="_blank"><img src="images/ok.png" width="20" height="20" border="0"></a></center></td>');} 

if ($area21[0] == "") {echo "<td><center>-</center></td>";} elseif ($area21[0] !== "") { print ('<td><center><a href="lapbul-kejari/'.$bulan1.'/3/'.$area21[0].'" title="'.$area21[1].'" target="_blank"><img src="images/ok.png" width="20" height="20" border="0"></a></center></td>');} 

if ($area22[0] == "") {echo "<td><center>-</center></td>";} elseif ($area22[0] !== "") { print ('<td><center><a href="lapbul-kejari/'.$bulan1.'/3/'.$area22[0].'" title="'.$area22[1].'" target="_blank"><img src="images/ok.png" width="20" height="20" border="0"></a></center></td>');} 

if ($area23[0] == "") {echo "<td><center>-</center></td>";} elseif ($area23[0] !== "") { print ('<td><center><a href="lapbul-kejari/'.$bulan1.'/3/'.$area23[0].'" title="'.$area23[1].'" target="_blank"><img src="images/ok.png" width="20" height="20" border="0"></a></center></td>');} 

if ($area24[0] == "") {echo "<td><center>-</center></td>";} elseif ($area24[0] !== "") { print ('<td><center><a href="lapbul-kejari/'.$bulan1.'/3/'.$area24[0].'" title="'.$area24[1].'" target="_blank"><img src="images/ok.png" width="20" height="20" border="0"></a></center></td>');} 

if ($area25[0] == "") {echo "<td><center>-</center></td>";} elseif ($area25[0] !== "") { print ('<td><center><a href="lapbul-kejari/'.$bulan1.'/3/'.$area25[0].'" title="'.$area25[1].'" target="_blank"><img src="images/ok.png" width="20" height="20" border="0"></a></center></td>');} 

if ($area26[0] == "") {echo "<td><center>-</center></td>";} elseif ($area26[0] !== "") { print ('<td><center><a href="lapbul-kejari/'.$bulan1.'/4/'.$area26[0].'" title="'.$area26[1].'" target="_blank"><img src="images/ok.png" width="20" height="20" border="0"></a></center></td>');} 

if ($area27[0] == "") {echo "<td><center>-</center></td>";} elseif ($area27[0] !== "") { print ('<td><center><a href="lapbul-kejari/'.$bulan1.'/4/'.$area27[0].'" title="'.$area27[1].'" target="_blank"><img src="images/ok.png" width="20" height="20" border="0"></a></center></td>');} 

if ($area28[0] == "") {echo "<td><center>-</center></td>";} elseif ($area28[0] !== "") { print ('<td><center><a href="lapbul-kejari/'.$bulan1.'/5/'.$area28[0].'" title="'.$area28[1].'" target="_blank"><img src="images/ok.png" width="20" height="20" border="0"></a></center></td>');} 

if ($area29[0] == "") {echo "<td><center>-</center></td>";} elseif ($area29[0] !== "") { print ('<td><center><a href="lapbul-kejari/'.$bulan1.'/5/'.$area29[0].'" title="'.$area29[1].'" target="_blank"><img src="images/ok.png" width="20" height="20" border="0"></a></center></td>');} 

if ($area30[0] == "") {echo "<td><center>-</center></td>";} elseif ($area30[0] !== "") { print ('<td><center><a href="lapbul-kejari/'.$bulan1.'/5/'.$area30[0].'" title="'.$area30[1].'" target="_blank"><img src="images/ok.png" width="20" height="20" border="0"></a></center></td>');} 

if ($area31[0] == "") {echo "<td><center>-</center></td>";} elseif ($area31[0] !== "") { print ('<td><center><a href="lapbul-kejari/'.$bulan1.'/5/'.$area31[0].'" title="'.$area31[1].'" target="_blank"><img src="images/ok.png" width="20" height="20" border="0"></a></center></td>');} 

if ($area32[0] == "") {echo "<td><center>-</center></td>";} elseif ($area32[0] !== "") { print ('<td><center><a href="lapbul-kejari/'.$bulan1.'/5/'.$area32[0].'" title="'.$area32[1].'" target="_blank"><img src="images/ok.png" width="20" height="20" border="0"></a></center></td>');} 

if ($area33[0] == "") {echo "<td><center>-</center></td>";} elseif ($area33[0] !== "") { print ('<td><center><a href="lapbul-kejari/'.$bulan1.'/6/'.$area33[0].'" title="'.$area33[1].'" target="_blank"><img src="images/ok.png" width="20" height="20" border="0"></a></center></td>');} 

if ($area34[0] == "") {echo "<td><center>-</center></td>";} elseif ($area34[0] !== "") { print ('<td><center><a href="lapbul-kejari/'.$bulan1.'/6/'.$area34[0].'" title="'.$area34[1].'" target="_blank"><img src="images/ok.png" width="20" height="20" border="0"></a></center></td>');} 
if ($area45[0] == "") {echo "<td><center>-</center></td>";} elseif ($area45[0] !== "") { print ('<td><center><a href="lapbul-kejari/'.$bulan1.'/7/'.$area45[0].'" title="'.$area45[1].'" target="_blank"><img src="images/ok.png" width="20" height="20" border="0"></a></center></td>');} 
if ($area46[0] == "") {echo "<td><center>-</center></td>";} elseif ($area46[0] !== "") { print ('<td><center><a href="lapbul-kejari/'.$bulan1.'/7/'.$area46[0].'" title="'.$area46[1].'" target="_blank"><img src="images/ok.png" width="20" height="20" border="0"></a></center></td>');} 
if ($area35[0] == "") {echo "<td><center>-</center></td>";} elseif ($area35[0] !== "") { print ('<td><center><a href="lapbul-kejari/'.$bulan1.'/7/'.$area35[0].'" title="'.$area35[1].'" target="_blank"><img src="images/ok.png" width="20" height="20" border="0"></a></center></td>');} 

if ($area36[0] == "") {echo "<td><center>-</center></td>";} elseif ($area36[0] !== "") { print ('<td><center><a href="lapbul-kejari/'.$bulan1.'/7/'.$area36[0].'" title="'.$area36[1].'" target="_blank"><img src="images/ok.png" width="20" height="20" border="0"></a></center></td>');} 



if ($area37[0] == "") {echo "<td><center>-</center></td>";} elseif ($area37[0] !== "") { print ('<td><center><a href="lapbul-kejari/'.$bulan1.'/7/'.$area37[0].'" title="'.$area37[1].'" target="_blank"><img src="images/ok.png" width="20" height="20" border="0"></a></center></td>');} 

if ($area38[0] == "") {echo "<td><center>-</center></td>";} elseif ($area38[0] !== "") { print ('<td><center><a href="lapbul-kejari/'.$bulan1.'/8/'.$area38[0].'" title="'.$area38[1].'" target="_blank"><img src="images/ok.png" width="20" height="20" border="0"></a></center></td>');} 

if ($area39[0] == "") {echo "<td><center>-</center></td>";} elseif ($area39[0] !== "") { print ('<td><center><a href="lapbul-kejari/'.$bulan1.'/8/'.$area39[0].'" title="'.$area39[1].'" target="_blank"><img src="images/ok.png" width="20" height="20" border="0"></a></center></td>');} 

if ($area40[0] == "") {echo "<td><center>-</center></td>";} elseif ($area40[0] !== "") { print ('<td><center><a href="lapbul-kejari/'.$bulan1.'/8/'.$area40[0].'" title="'.$area40[1].'" target="_blank"><img src="images/ok.png" width="20" height="20" border="0"></a></center></td>');} 

if ($area41[0] == "") {echo "<td><center>-</center></td>";} elseif ($area41[0] !== "") { print ('<td><center><a href="lapbul-kejari/'.$bulan1.'/8/'.$area41[0].'" title="'.$area41[1].'" target="_blank"><img src="images/ok.png" width="20" height="20" border="0"></a></center></td>');} 

if ($area42[0] == "") {echo "<td><center>-</center></td>";} elseif ($area42[0] !== "") { print ('<td><center><a href="lapbul-kejari/'.$bulan1.'/8/'.$area42[0].'" title="'.$area42[1].'" target="_blank"><img src="images/ok.png" width="20" height="20" border="0"></a></center></td>');} 

if ($area43[0] == "") {echo "<td><center>-</center></td>";} elseif ($area43[0] !== "") { print ('<td><center><a href="lapbul-kejari/'.$bulan1.'/8/'.$area43[0].'" title="'.$area43[1].'" target="_blank"><img src="images/ok.png" width="20" height="20" border="0"></a></center></td>');} 

if ($area44[0] == "") {echo "<td><center>-</center></td>";} elseif ($area44[0] !== "") { print ('<td><center><a href="lapbul-kejari/'.$bulan1.'/8/'.$area44[0].'" title="'.$area44[1].'" target="_blank"><img src="images/ok.png" width="20" height="20" border="0"></a></center></td>');} 
print ('</tr>');
}
print ('</tbody></table>');
echo "<br><br>Ditampilkan $hits /Halaman";
}
?>