<?php
session_start();
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
date_default_timezone_set("Asia/Bangkok");
date_default_timezone_get();
if ((isset($_GET["p"]))&&($_GET["p"]=="login")){
	require_once 'control/login.php';
}
else if ((isset($_GET["p"]))&&($_GET["p"]=="logout")){
	require_once 'control/logout.php';
}
else{
	if($tipe=="A"){
		require_once 'control/admin/'.$_GET["p"].'/'.$_GET["b"].'.php';
	}
	else if($tipe=="U"){
		require_once 'control/user/'.$_GET["p"].'/'.$_GET["b"].'.php';
	}
}
?>