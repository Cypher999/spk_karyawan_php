<?php
require_once 'control/main.php' ;
$kar=new custom_db();
$id_set=array(
"var"=>array("kd_karyawan"),
"val"=>array($_POST["kd"])
);
$kar->setTableName("penilaian");
$kar->setidentifier($id_set["var"],$id_set["val"]);
$sql=$kar->delete_data();
if($sql){
	echo "data sudah dihapus";
}
else{
	echo "terjadi kesalahan :".$kar->show_error();
}
?>