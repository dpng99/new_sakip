
<?php include("mr.db.php"); 
$link = mysqli_connect("$server","$username","$password","$database") or die(mysqli_error());

$indikator = $_POST['indikator_id'];
//$tampil=mysqli_query($link,"SELECT * FROM sinori_sakip_indikator WHERE indikator_link='$indikator'");

$tampil=mysqli_query($link,"SELECT * FROM ".$indikator."");
//$data = array ();
//while (($row = mysqli_fetch_array($tampil)) != null){
//$data[] = $row;
//}
//$jml = count ($data);



$jml=mysqli_num_rows($tampil);
 
if($jml > 0){    
   while($r=mysqli_fetch_array($tampil)){
	
	//while ($r=mysqli_fetch_array($tampil,MYSQLI_ASSOC)){
        ?>
		
		
        <option value="<?php echo $r['id']; ?>"><?php echo $r['indikator_nama'];
		
		//$num_char = 1000;
//$text2 = $r['indikator_nama'] ;
//echo substr($text2, 0, $num_char) . '...';
//print (''.$text2.'');
		
		?> (<?php echo $r['tipe']; ?>)</option>
        <?php        
    }
}else{
    echo "<option selected>- Data Sasaran Indikator tidak ada, Pilih Yang Lain -</option>";
}
 
?>