function load_list(){
	var abc=new XMLHttpRequest();
	abc.onreadystatechange=function(){
		if(this.readyState==4&&this.status==200){
			document.getElementById("table_isi").innerHTML=this.responseText;
		}
	};
	abc.open("POST","list.php?p=absen",true);
	abc.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	abc.send();
}
function acc(aa){
	var abc=new XMLHttpRequest();
	abc.onreadystatechange=function(){
		if(this.readyState==4&&this.status==200){
			alert(this.responseText);
			load_list();
		}
	};
	abc.open("POST","process.php?p=absen&&b=acc",true);
	abc.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	abc.send("id_data="+aa);
}
function dec(aa){
	var abc=new XMLHttpRequest();
	abc.onreadystatechange=function(){
		if(this.readyState==4&&this.status==200){
			alert(this.responseText);
			load_list();
		}
	};
	abc.open("POST","process.php?p=absen&&b=dec",true);
	abc.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	abc.send("id_data="+aa);
}