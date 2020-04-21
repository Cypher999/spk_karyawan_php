<?php
require_once 'control/main.php' ;
$kri=new custom_db();
$var_set=array(
"var"=>array("nm_kriteria","tipe","bobot"),
"val"=>array($_POST["nm"],$_POST["tipe"],$_POST["bobot"])
);
$id_set=array(
"var"=>array("kd_kriteria"),
"val"=>array($_POST["kd"])
);
$kri->setTableName("kriteria");
$kri->setvar($var_set["var"],$var_set["val"]);
$kri->setidentifier($id_set["var"],$id_set["val"]);
$sql=$kri->edit_data();
if($sql){
	echo "<script>window.location.href='index.php?p=kriteria';</script>";
}
else{
	echo "terjadi kesalahan :".$kri->show_error()."<a href='index.php?p=kriteria'>Kembali</a>";
}
?>