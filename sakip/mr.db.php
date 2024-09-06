<?PHP
//DATABASE JAKSa.iD
$server = "localhost"; 
$username = "root";
$password = "";
$database = "panevkejaksaan_prosakip";

$mysqli = new mysqli("$server","$username","$password","$database");
//$koneksi = mysqli_connect('localhost','root','','tutorial');
//$mysqli = mysqli_connect("$server","$username","$password","$database");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}


?>


