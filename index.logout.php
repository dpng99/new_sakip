<?PHP
session_start();
session_destroy();
//include("index.cma.db.php");
//$name1 = $_GET["nama"];
//if ($error == ""){
//$query = "UPDATE $mytable Set user_session = '0' where user_name = '$name1'";  
//$result = mysql_query($query);
echo "<html>
<head>
<meta HTTP-EQUIV=\"Refresh\" Content=\"3;URL=index.php\">
<LINK href=\"images/index.css\" rel=stylesheet>
</head>
<body>
<table width=\"50%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
  <tr>
    <td bgcolor=\"#999999\"><table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"1\">
        <tr>
          <td bgcolor=\"#F4F4F4\"><table width=\"100%\" border=\"0\" cellspacing=\"4\" cellpadding=\"4\">
              <tr> 
                <td width=\"6%\"></td>
                <td width=\"94%\"><a href=\"index.php\">Anda Sudah Logout Terima kasih | Terima Kasih menggunakan Aplikasi Original Chendia Studio</a> </td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
</table>
</body>
</html>";



?>
