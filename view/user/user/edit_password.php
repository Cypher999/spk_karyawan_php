<script>
	function cek(){
		var pj=document.getElementById("pas").value;
		var kf=document.getElementById("kf").value;
		if((pj.length>5)&&(pj==kf)){
			document.getElementById("not_long").style.display="none";
			document.getElementById("not_same").style.display="none";
			document.getElementsByClassName("button_save")[0].removeAttribute("type");
			document.getElementsByClassName("button_save")[0].setAttribute("type","submit");
			document.getElementsByClassName("button_save")[0].disabled=false;
		}
		if ((pj.length<5)&&(pj.length!=0)){
			document.getElementById("not_long").style.display="block";
			document.getElementsByClassName("button_save")[0].removeAttribute("type");
			document.getElementsByClassName("button_save")[0].setAttribute("type","button");
			document.getElementsByClassName("button_save")[0].disabled=true;
		}
		if(pj.length==0){
			document.getElementById("not_long").style.display="none";
			document.getElementsByClassName("button_save")[0].removeAttribute("type");
			document.getElementsByClassName("button_save")[0].setAttribute("type","button");
			document.getElementsByClassName("button_save")[0].disabled=true;
		}
		if(pj!=kf){
			document.getElementById("not_same").style.display="block";
			document.getElementsByClassName("button_save")[0].removeAttribute("type");
			document.getElementsByClassName("button_save")[0].setAttribute("type","button");
			document.getElementsByClassName("button_save")[0].disabled=true;
		}
	}
	
</script>
<div class="col-md-8">
<h2>Edit Password</h2>
<form action="process.php?p=user&&b=edit_password" method="post" enctype="multipart/form-data">
	<label>Password Lama</label>
	<input type="password" name="lm" class="form-control">
	<label>Password Baru</label>
	<input type="password" name="br" id="pas" class="form-control" onkeyup="cek()" onkeydown="cek()">
	<label>Konfirmasi Password</label>
	<input type="password" name="kf" id="kf" class="form-control" onkeyup="cek()" onkeydown="cek()"><br>
	<div class="bg-warning" id="not_same" style="display:none">Password Tidak Sama</div>
	<div class="bg-warning" id="not_long" style="display:none">Panjang Harus Melebihi 5</div>
<div class="row">
	<div class="col">
		<input type="submit" class="button_save" title="simpan data">
	</div>
	<div class="col">
		<input type="reset" class="button_reset" title="reset">
	</div>
</div><br>
<div class="row">
	<div class="col">
		<input type="button" onclick="window.location.href='index.php?p=user'" class="btn btn-success" title="kembali" value="&#8666; &#8666; &#8666;">
	</div>
</div>
</form>
</div>
