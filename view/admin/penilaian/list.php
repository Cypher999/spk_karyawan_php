<?php require_once 'control/main.php';
$jml_kol=2;
?>
<div class="col-md-8">
<h1>Data Penilaian</h1>
<div class="row">
			<div class="col">
		<input type="button" title="Tambah Data" class="button_add" onclick="window.location.href='index.php?p=penilaian&&b=new';">
		</div>
		<div class="col">
		<input type="text" placeholder="cari data" id="cari" class="form-control" onkeyup="cari_data()">
	</div>
</div><br>
<div class="row">
		<div class="col">
		<input type="button" value="Data Nilai" class="btn btn-secondary" onclick="
my_function=new custom_ajax_function('penilaian');
		my_function.load_table();
		document.getElementById('cabang_cek').style.display='none';">
		</div>
		<div class="col">
		<input type="button" value="Normalisasi" class="btn btn-primary" onclick="my_function.load_other_table('normalisasi');
		document.getElementById('cabang_cek').style.display='none';
		">
		</div>
		<div class="col">
		<input type="button" value="Hasil Penilaian" class="btn btn-success" onclick="my_function.load_other_table('penilaian','');
		document.getElementById('cabang_cek').style.display='block';
		">
	</div>
</div>
<div class="row" id="cabang_cek" style="display: none">
	<div class="col">
Cabang
</div>
<div class="col"><select id=cb>
	<option value="all" onclick="my_function.load_other_table('penilaian','');">Semua cabang</option>
	<?php 
	$cabang=new custom_db();
	$cabang->setTableName("cabang");
	$sql_cb=$cabang->search_all("kd_cabang");
	while($isi_cb=mysqli_fetch_assoc($sql_cb)):
	?>
	<option value="<?php echo $isi_cb["kd_cabang"];?>"
		onclick="my_function.load_other_table('penilaian','<?php echo $isi_cb["kd_cabang"];?>');"><?php echo $isi_cb["nm_cabang"];?></option>
<?php endwhile;?>
</select>
</div></div>
		<table class="table table-striped table-bordered" id="table_isi">
			
		</table>

	</div>
		<script src="assets/js/function_ajax.js"></script>
<script>
	my_function=new custom_ajax_function("penilaian");
	my_function.load_table()
		function cari_data(){
			var input,filter,table,tr,td,i,j,
			<?php for($a=0;$a<$jml_kol;$a++){
				if($a==($jml_kol-1)){
					echo "td".$a.",txt".$a.",fil".$a;
				}
				else{
					echo "td".$a.",txt".$a.",fil".$a.",";
				}

			}?>;
			input=document.getElementById("cari");
			filter=input.value.toUpperCase();
			table=document.getElementById("table_isi");
			tr=table.getElementsByTagName("tr");
			for(i=0;i<tr.length;i++){
				<?php for($b=0;$b<$jml_kol;$b++){
					echo "td".$b."=tr[i].getElementsByTagName(\"td\")[".$b."];\n";
				}?>
				
				if(<?php for($b=0;$b<$jml_kol;$b++){
					if($b==($jml_kol-1)){
						echo "td".$b;
					}
					else{
						echo "td".$b." || ";
					}
				}?>){
					<?php for($k=0;$k<$jml_kol;$k++){
					echo "txt".$k."=td".$k.".textContent || td".$k.".innerText;\n
					fil".$k."=txt".$k.".toUpperCase().indexOf(filter);\n";

				}?>
					
					if (<?php for($c=0;$c<$jml_kol;$c++){
						if($c==($jml_kol-1)){
						echo "fil".$c.">-1";
					}
					else{
						echo "fil".$c.">-1 || ";
					}	
					}?>){
						tr[i].style.display="";
					}
					else{
						tr[i].style.display="none";	
					}
				}
				
			}
		}
	</script>
