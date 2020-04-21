<?php
require_once 'control/main.php' ;
$kar=new custom_db();
$var_set=array(
"var"=>array("nm_karyawan","kd_cabang","alt","shift"),
"val"=>array($_POST["nm"],$_POST["cbg"],$_POST["alt"],$_POST["shift"])
);
$id_set=array(
"var"=>array("kd_karyawan"),
"val"=>array($_POST["kd"])
);
$kar->setTableName("karyawan");
$kar->setvar($var_set["var"],$var_set["val"]);
$kar->setidentifier($id_set["var"],$id_set["val"]);
$sql=$kar->edit_data();
if($sql){
	if(($_FILES["gambar"]["name"]!="")&&($_FILES["gambar"]["size"]!="0")){
		$cek_file="image/".$_POST["kd"].".jpg";
		if(file_exists($cek_file)){
			unlink($cek_file);
		}
		$nama=$_FILES["gambar"]["name"];
		$fl=$_FILES["gambar"]["tmp_name"];
		move_uploaded_file($fl,"image/".$_POST["kd"].".jpg");
	}
	echo "<script>window.location.href='index.php?p=karyawan';</script>";
}
else{
	echo "terjadi kesalahan :".$kar->show_error()."<a href='index.php?p=karyawan'>Kembali</a>";
}
?>