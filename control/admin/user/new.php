<?php
require_once 'control/main.php' ;
$id=0;
$cab=new custom_db();
$cab->setTableName("user");
$cek_id=$cab->search_all("id_user");
if(mysqli_num_rows($cek_id)>0){
	while($isi_id=mysqli_fetch_assoc($cek_id)){
		$id=$isi_id["id_user"];
	}
}
$id=$id+1;
$var_set=array(
"var"=>array("id_user","nm_user","password","tipe"),
"val"=>array($id,$_POST["nm"],$_POST["pas"],$_POST["tp"])
);
$cab->setvar($var_set["var"],$var_set["val"]);
$id_set=array(
"var"=>array("nm_user"),
"val"=>array($_POST["nm"])
);
$cab->setIdentifier($id_set["var"],$id_set["val"]);
$cek_nama=$cab->search_data();
if(mysqli_num_rows($cek_nama)<=0){
if($_POST["pas"]!=$_POST["kf"]){
	echo "<script>alert('password konfirmasi tidak sama');window.location.href='index.php?p=user';</script>";
}
else if((strlen($_POST["pas"])<5)){
	echo "<script>alert('password harus lebih dari 5');window.location.href='index.php?p=user';</script>";	
}
else{
$sql=$cab->save_data();	
if($sql){
	echo "<script>window.location.href='index.php?p=user';</script>";
}
else{
	echo "terjadi kesalahan :".$cab->show_error()."<a href='index.php?p=user'>Kembali</a>";
}
}
}
else{
	echo "<script>alert('nama sudah ada');window.location.href='index.php?p=user';</script>";		
}
?>