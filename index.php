<?php session_start();
date_default_timezone_set("Asia/Bangkok");
date_default_timezone_get();
require 'control/main.php';
if(isset($_SESSION["id_user_spk"])){
$mod_m=new custom_db();
$mod_m->setTableName("user");
$var_set=array(
"var"=>array("id_user"),
"val"=>array($_SESSION["id_user_spk"])
);
$mod_m->setidentifier($var_set["var"],$var_set["val"]);
$sql=$mod_m->search_data();
$isi=mysqli_fetch_assoc($sql);
$nama_user=$isi["nm_user"];
$tipe=$isi["tipe"];
}
?>
<!DOCTYPE html>
<html>
<head><title>SPK Karyawan</title>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/dropdown_menu.css" type="text/css">
    <link rel="stylesheet" href="assets/css/set_image.css" type="text/css">
    <link rel="stylesheet" href="assets/css/table.css" type="text/css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="assets/js/jquery.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
</head>
<body>
	<?php if(isset($_SESSION["id_user_spk"])){
		echo "<div id=\"main_content\" style=\"position:relative\">
		<div style=\"background-color:black;color:white;width:100%;position:fixed;z-index:1000\">
			<span style=\"font-size:30px;cursor:pointer;\" onclick=\"openNav()\">&#9776; Menu</span>
		</div><br><br><br>";
		if($tipe=="A"){
			require_once "view/admin/menu.php";
			if((empty($_GET["b"]))&&(isset($_GET["p"]))){
				if($_GET["p"]!="logout"){
					require_once "view/admin/".$_GET["p"]."/list.php";
				}
				else{
					require_once "control/logout.php";	
				}
			}
			else if((isset($_GET["b"]))&&(isset($_GET["p"]))){
				require_once "view/admin/".$_GET["p"]."/".$_GET["b"].".php";
			}
			
			else{
				require_once "view/admin/home.php";
			}
		}
		else if($tipe=="U"){
			require_once "view/user/menu.php";
			if((empty($_GET["b"]))&&(isset($_GET["p"]))){
				if($_GET["p"]!="logout"){
					require_once "view/user/".$_GET["p"]."/list.php";
				}
				else{
					require_once "control/logout.php";	
				}
			}
			else if((isset($_GET["b"]))&&(isset($_GET["p"]))){
				require_once "view/user/".$_GET["p"]."/".$_GET["b"].".php";
			}
			else if((empty($_GET["b"]))&&(isset($_GET["p"]))&&($_GET["p"]=="logout")){
				require_once "control/logout.php";
			}
			else{
				require_once "view/user/home.php";
			}
		}		
		echo "</div>";
	}
	else{
		require_once 'view/login.php';
	}

	?>
<script src="assets/js/dropdown_menu.js"></script>
</body>
</html>