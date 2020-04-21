<?php
require_once "control/main.php";
$cab=new custom_db();
$cab->setTableName("cabang");
$sql=$cab->search_all("kd_cabang");
?>
<tr><th>Kode Cabang</th><th>Nama Cabang</th></tr>
<?php
if(mysqli_num_rows($sql)<=0):
?>
<tr><td colspan="5">Data Kosong</td></tr>
<?php else:
	while ($isi=mysqli_fetch_assoc($sql)):?>
<tr><td><?php echo $isi["kd_cabang"];?></td>
	<td><?php echo $isi["nm_cabang"];?></td>
	</tr>
<?php endwhile;endif;?>
