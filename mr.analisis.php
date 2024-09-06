<?Php
include('mr.db.1.php');
$connection=mysqli_connect($host,$username,$password,$database);
if (!$connection) {
    echo "Error: Unable to connect to MySQL.<br>";
    echo "<br>Debugging errno: " . mysqli_connect_errno();
    echo "<br>Debugging error: " . mysqli_connect_error();
    exit;
}
//////Sample script to display record ///


//$q="SELECT * FROM mr_f WHERE id=3";
// Generate resultset
$q="SELECT * FROM mr_a";
$result_set = $connection->query($q);
$row=$result_set->fetch_array(MYSQLI_NUM);
echo $row[0],$row[1],$row[2],$row[3];
$result->free;

?>