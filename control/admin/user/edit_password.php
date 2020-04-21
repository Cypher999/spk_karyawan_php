<?php
require_once 'control/main.php' ;
$id=0;
$cab=new custom_db();
$cab->setTableName("user");
$id_set=array(
"var"=>array("id_user"),
"val"=>array($_SESSION["id_user_spk"])
);
$cab->setIdentifier($id_set["var"],$id_set["val"]);
$cek_pas=$cab->search_data();
$isi_cek_pas=mysqli_fetch_assoc($cek_pas);
if($isi_cek_pas["password"]==$_POST["lm"]){
	if($_POST["br"]==$_POST["kf"]){
		$var_set=array(
			"var"=>array("password"),
			"val"=>array($_POST["br"])
		);
		$cab->setvar($var_set["var"],$var_set["val"]);
		$cab->setIdentifier($id_set["var"],$id_set["val"]);
		$edit=$cab->edit_data();
		if($edit){
			echo "<script>window.location.href='index.php?p=user';</script>";		
		}
		else{
			echo "terjadi kesalahan :".$cab->show_error()."<a href='index.php?p=user'>Kembali</a>";
		}
	}
	else{
		echo "<script>alert('password konfirmasi tidak sama');window.location.href='index.php?p=user';</script>";
	}
}
else{
		echo "<script>alert('password lama tidak sama');window.location.href='index.php?p=user';</script>";
	}

?>