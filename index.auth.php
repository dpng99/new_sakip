<?PHP

date_default_timezone_set('Asia/Jakarta');
$id1 = $_POST["n"];
$pass1 = $_POST["p"];
$pass1 = md5($pass1);
//include("lapbul.db.php");
//$link = mysqli_connect("$server","$username","$password","$database");
//$result = mysqli_query($link, "SELECT * FROM lapbulbin_login WHERE satkernama ='BIROCANA'");
//while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
//echo $row['satkerpass'];
//}
include("mr.db.php");
$link = mysqli_connect("$server","$username","$password","$database");
$result = mysqli_query($link, "SELECT * FROM sinori_login WHERE id_satker ='$id1'");
while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
if ($row['satkerpass'] == $pass1){
//$user_logindate1 = date("j/m/Y g:i A");
$actnum = "";
$chars_for_actnum = array ("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z","a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z","1","2","3","4","5","6","7","8","9","0");
for ($i = 1; $i <= 20; $i++) {
$actnum = $actnum . $chars_for_actnum[mt_rand (0,62)];
}
$link2 = mysqli_connect("$server","$username","$password","$database");
//$result = mysqli_query($link2, "UPDATE $mytable Set satkerkey = '$actnum', satkerlogindate = '$user_logindate1', user_fail = '0' where id_satker = '$id1'");
$result = mysqli_query($link2, "UPDATE sinori_login Set satkerkey = '$actnum' where id_satker = '$id1'");

header("Location: index.home.php?session=$actnum&sid=$id1");
session_start();
$_SESSION['ID'] = "$id1";
$_SESSION['Pass'] = "$actnum";
}
echo "<LINK href=\"index.css\" rel=\"stylesheet\" type=\"text/css\">";
echo "GAGAL LOGIN."; 
}
?>
