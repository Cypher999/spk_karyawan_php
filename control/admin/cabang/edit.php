<?php
require_once 'control/main.php' ;
$cabr=new custom_db();
$var_set=array(
"var"=>array("nm_cabang"),
"val"=>array($_POST["nm"])
);
$id_set=array(
"var"=>array("kd_cabang"),
"val"=>array($_POST["kd"])
);
$cabr->setTableName("cabang");
$cabr->setvar($var_set["var"],$var_set["val"]);
$cabr->setidentifier($id_set["var"],$id_set["val"]);
$sql=$cabr->edit_data();
if($sql){
	echo "<script>window.location.href='index.php?p=cabang';</script>";
}
else{
	echo "terjadi kesalahan :".$cabr->show_error()."<a href='index.php?p=karyawan'>Kembali</a>";
}
?>