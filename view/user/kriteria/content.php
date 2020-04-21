<?php
require_once "control/main.php";
$kri=new custom_db();
$kri->setTableName("kriteria");
$sql=$kri->search_all("kd_kriteria");
$jml_all=0;
?>
<tr><th>Kode Kriteria</th><th>Nama Kriteria</th><th>Tipe</th><th>Bobot</th></tr>
<?php
if(mysqli_num_rows($sql)<=0):
?>
<tr><td colspan="5">Data Kosong</td></tr>
<?php else:
	while ($isi=mysqli_fetch_assoc($sql)):?>
<tr><td><?php echo $isi["kd_kriteria"];?></td>
	<td><?php echo $isi["nm_kriteria"];?></td>
	<td><?php if($isi["tipe"]=="B"){
		echo "Benefit";
	}
		else{
			echo "Cost";
		}?></td>
	<td><?php echo $isi["bobot"];?></td>
	</tr>
<?php $jml_all=$jml_all+$isi["bobot"]; endwhile;endif;?>
<?php if($jml_all!=100):?>
	<tr><td class="bg-warning" colspan="5">Peringatan : Jumlah bobot keseluruhan tidak sama dengan 100, hal ini tidak mengganggu jalannya program<br>
	Tapi disarankan agar nilai keseluruhan sama dengan 100 untuk mempermudah proses perhitungan</td></tr>
<?php endif;?>
