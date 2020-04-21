<?php
require_once "control/main.php";
$cab=new custom_db();
$cab->setTableName("user");
$sql=$cab->search_all("id_user");
?>
<tr><th>ID</th><th>Nama user</th><th>Tipe</th><th>Kontrol</th></tr>
<?php
if(mysqli_num_rows($sql)<=0):
?>
<tr><td colspan="5">Data Kosong</td></tr>
<?php else:
	while ($isi=mysqli_fetch_assoc($sql)):?>
<tr><td><?php echo $isi["id_user"];?></td>
	<td><?php echo $isi["nm_user"];?></td>
	<td><?php echo $isi["tipe"];?></td>
	<td><?php if($_SESSION["id_user_spk"]==$isi["id_user"]):?>
		<input type="submit" class="btn btn-primary" value="ubah nama" onclick="window.location.href='index.php?p=user&&b=edit_nama&&id=<?php echo $isi["id_user"]; ?>'">
		<input type="submit" class="btn btn-secondary" value="ubah password" onclick="window.location.href='index.php?p=user&&b=edit_password&&id=<?php echo $isi["id_user"]; ?>'"><br>
		<?php else:?>
		<input type="submit" class="btn btn-success" value="ubah status" onclick="
		var ubah_stat=new custom_ajax_function('user');
		ubah_stat.change_tipe('<?php echo $isi["id_user"];?>');
		"
		>
		<input type="submit" class="btn btn-warning" value="hapus user" onclick="
		var ubah_stat=new custom_ajax_function('user');
		ubah_stat.delete_data('id_user','<?php echo $isi["id_user"];?>');
		">
	<?php endif;?>
		</td></tr>
<?php endwhile;endif;?>
