<?php
require_once 'control/main.php' ;
$us=new custom_db();
$us->setTableName("user");
$id_cek_nama=array(
"var"=>array("nm_user"),
"val"=>array($_POST["nm"]));

$us->setidentifier($id_cek_nama["var"],$id_cek_nama["val"]);
$sql_cek_nama=$us->search_data();
if(mysqli_num_rows($sql_cek_nama)<=0){
	$var_set=array(
"var"=>array("nm_user"),
"val"=>array($_POST["nm"])
);
	$id_set=array(
"var"=>array("id_user"),
"val"=>array($_SESSION["id_user_spk"])
);
$us->setvar($var_set["var"],$var_set["val"]);
$us->setidentifier($id_set["var"],$id_set["val"]);
$sql=$us->edit_data();
if($sql){
	echo "<script>window.location.href='index.php?p=user&&b=edit_nama';</script>";
}
else{
	echo "terjadi kesalahan :".$us->show_error()."<a href='index.php?p=user&&b=edit_nama'>Kembali</a>";
}
}
else{
	echo "<script>alert('nama sudah ada');window.location.href='index.php?p=user&&b=edit_nama';</script>";	
}






?>