<?php
require_once 'control/main.php' ;
$kar=new custom_db();
$id_set=array(
"var"=>array("kd_karyawan"),
"val"=>array($_POST["kd"])
);
$kar->setTableName("karyawan");
$kar->setidentifier($id_set["var"],$id_set["val"]);
$sql=$kar->search_data();
if(mysqli_num_rows($sql)>0){
$isi=mysqli_fetch_assoc($sql);
echo $isi["nm_karyawan"];
}
else{
	echo "not found";
}
?>