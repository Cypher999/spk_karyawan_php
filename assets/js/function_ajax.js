class custom_ajax_function{
	constructor(a){
		this.table_name=a;
	}
	load_table(){
	var abc=new XMLHttpRequest();
	abc.onreadystatechange=function(){
		if(this.readyState==4&&this.status==200){
			document.getElementById("table_isi").innerHTML=this.responseText;
		}
	};
	abc.open("POST","list.php?p="+this.table_name,true);
	abc.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	abc.send();
	}
	load_other_table(a,b){
	var abc=new XMLHttpRequest();
	abc.onreadystatechange=function(){
		if(this.readyState==4&&this.status==200){
			document.getElementById("table_isi").innerHTML=this.responseText;
		}
	};
	abc.open("POST","list.php?p="+this.table_name+"&&b="+a,true);
	abc.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	abc.send("cb="+b);
	}
	delete_data(a,b){
		var abc=new XMLHttpRequest();
	abc.onreadystatechange=function(){
		if(this.readyState==4&&this.status==200){
			alert(this.responseText);			
		}
	};
	abc.open("POST","process.php?p="+this.table_name+"&&b=delete",true);
	abc.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	abc.send(a+"="+b);
	this.load_table();
	}
	process_data(a,b,c){
		var abc=new XMLHttpRequest();
	abc.onreadystatechange=function(){
		if(this.readyState==4&&this.status==200){
			alert(this.responseText);			
		}
	};
	abc.open("POST","process.php?p="+this.table_name+"&&b="+c,true);
	abc.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	abc.send(a+"="+b);
	this.load_table();
	}
	change_tipe(c){
		var abc=new XMLHttpRequest();
		abc.onreadystatechange=function(){
		if(this.readyState==4&&this.status==200){
			alert(this.responseText);			
		}
	};
	abc.open("POST","process.php?p="+this.table_name+"&&b=change_stat",true);
	abc.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	abc.send("id_user="+c);
	this.load_table();	
	}
}

