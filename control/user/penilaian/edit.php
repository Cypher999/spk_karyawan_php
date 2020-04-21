<?php
require_once 'control/main.php' ;
$nil=new custom_db();
$var_set=array(
"var"=>array("k_01","k_02","k_03","k_04","k_05","id_user"),
"val"=>array($_POST["k-01"],$_POST["k-02"],$_POST["k-03"],$_POST["k-04"],$_POST["k-05"],$_SESSION["id_user_spk"])
);
$id_set=array(
"var"=>array("kd_karyawan"),
"val"=>array($_POST["kd"])
);
$nil->setTableName("penilaian");
$nil->setvar($var_set["var"],$var_set["val"]);
$nil->setidentifier($id_set["var"],$id_set["val"]);
$sql=$nil->edit_data();
if($sql){
		echo "<script>window.location.href='index.php?p=penilaian';</script>";
}
else{
	echo "terjadi kesalahan :".$nil->show_error()."<a href='index.php?p=penilaian'>Kembali</a>";
}
?>