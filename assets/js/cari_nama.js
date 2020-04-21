function cari_nama(){
	var abc=new XMLHttpRequest();
	var a=document.getElementById('kd').value;
	var hasil="";
	abc.onreadystatechange=function(){
		if(this.readyState==4&&this.status==200){
			if(this.responseText=="not found"&&a.length>0){
				document.getElementById('nm').value="";
				document.getElementById('alert').style.display="block";
				document.getElementById('gambar').src="image/empty.jpeg";
			}
			else if(this.responseText!="not found"&&a.length>0){
				document.getElementById('nm').value=this.responseText;
				document.getElementById('gambar').src="image/"+a+".jpg";
				document.getElementById('alert').style.display="none";
			}
			else{
				document.getElementById('nm').value="";
				document.getElementById('alert').style.display="none";	
			}
			
		}
	};
	abc.open("POST","process.php?p=karyawan&&b=cari",true);
	abc.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	abc.send("kd="+a);
	
}