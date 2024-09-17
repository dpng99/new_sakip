<?PHP
//DATABASE JAKSa.iD
$server = "localhost"; 
$username = "panevkejaksaan_prosakip";
$password = "B,*3EnP]VIFH";
$database = "panevkejaksaan_prosakip";
$mytable  = "sinori_login";
/* $server = "localhost"; 
$username = "root";
$password = "";
$database = "panevkejaksaan_prosakip";
//$mytable  = ""; */
$mysqli = new mysqli("$server","$username","$password","$database");
//$koneksi = mysqli_connect('localhost','root','','tutorial');
//$mysqli = mysqli_connect("$server","$username","$password","$database");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}


?>


