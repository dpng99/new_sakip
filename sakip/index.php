<?PHP
include("index.globalconfig.php");

?><!DOCTYPE html>
<html lang="en">
<head>
<title>Kejaksaan Republik Indonesia</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="images/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="images/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="images/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="images/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="images/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="images/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="images/css/util.css">
	<link rel="stylesheet" type="text/css" href="images/css/main.css">
	<link rel="stylesheet" type="text/css" href="images/index.css">
<!--===============================================================================================-->
</head>
<body>
<?php

?>
<div class="container-contact100" style="background-image: url('images/birocan3.jpg');">

		<div class="wrap-contact100"><center><?PHP echo $satker; ?><br><br><img src="themes/kejaksaan.png" width="150" height="165"><br><br>
<form name="form1" method="POST" action="index.auth.php">
                  <table width="200" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td background="themes/camelon_b.jpg"><table width="100%"  border="0" align="center" cellpadding="4" cellspacing="4">
                          <tr>
                            <td><div align="center"></div></td>
                          </tr>
                          <tr>
                            <td><div align="center"><strong>Kode Satker:</strong></div></td>
                          </tr>
                          <tr>
                            <td><div align="center">
                                <input name="n" type="text" id="n" size="15">
                            </div></td>
                          </tr>
                          <tr>
                            <td><div align="center"><strong>Kata Kunci:</strong></div></td>
                          </tr>
                          <tr>
                            <td><div align="center">
                                <input name="p" type="password" id="p" size="15">
                            </div></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
                       
                          <tr>
                            <td><div align="center">
                                                          </div></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td><div align="center">
                                <input type="submit" name="Submit" value=" - LOGIN - ">
                            </div></td>
                          </tr>
                          <tr>
                            <td><div align="center"></div></td>
                          </tr>
                      </table>
                      </td>
                    </tr>
                  </table>
          </form></center>
		</div>

		<br><br><center><img src="themes/serenata.png" width="230" height="80"><br><br>
				Serenata AKIP - Sinergi Continuous Improvement - Akuntabilitas Kinerja Instansi Pemerintah (AKIP) <br>Kejaksaan Republik Indonesia <br> (c) April 2024 v.1.0 Powered by Chendia Studio Jogjakarta<center>
		
</div>



	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="images/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="images/vendor/bootstrap/js/popper.js"></script>
	<script src="images/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="images/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="images/js/main.js"></script>

</body>
</html>
