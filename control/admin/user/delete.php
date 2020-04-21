<?php
require_once 'control/main.php' ;
$cab=new custom_db();
$id_set=array(
"var"=>array("id_user"),
"val"=>array($_POST["id_user"])
);
$cab->setTableName("user");
$cab->setidentifier($id_set["var"],$id_set["val"]);
$sql=$cab->delete_data();
if($sql){
	echo "data sudah dihapus";
}
else{
	echo "terjadi kesalahan :".$cab->show_error();
}
?>