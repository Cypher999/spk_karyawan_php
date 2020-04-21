function load_list(){
	var abc=new XMLHttpRequest();
	abc.onreadystatechange=function(){
		if(this.readyState==4&&this.status==200){
			document.getElementById("table_isi").innerHTML=this.responseText;
		}
	};
	abc.open("POST","list.php?p=dosen",true);
	abc.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	abc.send();
}
function delete_data(aa){
	var abc=new XMLHttpRequest();
	abc.onreadystatechange=function(){
		if(this.readyState==4&&this.status==200){
			alert(this.responseText);
			load_list();
		}
	};
	abc.open("POST","process.php?p=dosen&&b=del",true);
	abc.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	abc.send("nidn="+aa);
	
}