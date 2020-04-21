<?php
session_start();
require 'control/main.php';
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
if($tipe=="A"){
	if(empty($_GET["b"])){
		require_once "view/admin/".$_GET["p"]."/content.php";
	}
	else if(isset($_GET["b"])){
		require_once "view/admin/".$_GET["p"]."/".$_GET["b"].".php";
	}
}
else if($tipe=="U"){
	if(empty($_GET["b"])){
		require_once "view/user/".$_GET["p"]."/content.php";
	}
	else if(isset($_GET["b"])){
		require_once "view/user/".$_GET["p"]."/".$_GET["b"].".php";
	}
}
?>