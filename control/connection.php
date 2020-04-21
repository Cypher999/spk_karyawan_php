<?php
class connect{
	var $connect;
	function active_connection(){
		$this->connect=mysqli_connect("localhost","root","","spk_karyawan");
	}
	function disconnect(){
		mysqli_close($this->connect);
	}
}
?>