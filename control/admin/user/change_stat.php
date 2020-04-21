<?php
include_once 'control/main.php';
$us=new custom_db();
$us->setTableName("user");
$id_set=array(
"var"=>array("id_user"),
"val"=>array($_POST["id_user"])
);
$us->setidentifier($id_set["var"],$id_set["val"]);
$cek_stat=$us->search_data();
$isi_cek_stat=mysqli_fetch_assoc($cek_stat);
if($isi_cek_stat["tipe"]=="A"){
	$var_set=array(
		"var"=>array("tipe"),
		"val"=>array("U")
	);
}
else{
	$var_set=array(
		"var"=>array("tipe"),
		"val"=>array("A")
	);	
}
$us->setvar($var_set["var"],$var_set["val"]);
$edit=$us->edit_data();
if($edit){
	echo "sudah diedit";
}
else{
	echo $us->show_error();
}
?>