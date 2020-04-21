<?php
require_once 'control/main.php' ;
$cab=new custom_db();
$var_set=array(
"var"=>array("kd_cabang","nm_cabang"),
"val"=>array($_POST["kd"],$_POST["nm"])
);
$cab->setTableName("cabang");
$cab->setvar($var_set["var"],$var_set["val"]);
$sql=$cab->save_data();
if($sql){
	echo "<script>window.location.href='index.php?p=cabang';</script>";
}
else{
	echo "terjadi kesalahan :".$cab->show_error()."<a href='index.php?p=cabang'>Kembali</a>";
}
?>