<?php require_once 'control/main.php';
$jml_kol=2;
?>
<div class="col-md-8">
<h1>Data User</h1>
<div class="row">
			<div class="col">
		<input type="button" title="Tambah Data" class="button_add" onclick="window.location.href='index.php?p=user&&b=new';">
		</div>
		<div class="col">
		<input type="text" placeholder="cari data" id="cari" class="form-control" onkeyup="cari_data()">
	</div>
</div>
		<table class="table table-stripped table-bordered" id="table_isi">
			
		</table>
	</div>
		<script src="assets/js/function_ajax.js"></script>
<script>
	my_function=new custom_ajax_function("user");
	my_function.load_table();
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
