<?php
require_once "control/connection.php";
class custom_db extends connect{
	var $var,$val,$var_id,$val_id,$table_name;
	function __construct(){
		$this->active_connection();
	}
	function __destruct(){
		$this->disconnect();
	}
	function setvar($a,$b){
		$this->var=$a;
		$this->val=$b;
	}
	function setidentifier($a,$b){
		$this->var_id=$a;
		$this->val_id=$b;	
	}
	function setTableName($a){
		$this->table_name=$a;
	}
	function show_error(){
		return mysqli_error($this->connect);
	}
	function save_data(){
		$variable="";
		$value="";
		$blank="'";
		for($i=0;$i<count($this->var);$i++){
			if($i==((count($this->var))-1)){
				$variable=$variable.$this->var[$i];
				$value=$value.$blank.htmlspecialchars($this->val[$i]).$blank;
			}
			else{
				$variable=$variable.$this->var[$i].",";
				$value=$value.$blank.htmlspecialchars($this->val[$i]).$blank.",";	
			}
		}
		$sql_query="insert into ".$this->table_name." (".$variable.") values (".$value.")";
		return mysqli_query($this->connect,$sql_query);
	}
	function edit_data(){
		$variable="";
		$identifier="";
		$value="";
		$blank="'";
		for($j=0;$j<count($this->var_id);$j++){
			if($j==((count($this->var_id))-1)){
				$identifier=$identifier.$this->var_id[$j]."=".$blank.htmlspecialchars($this->val_id[$j]).$blank;				
			}
			else{
				$identifier=$identifier.$this->var_id[$j]."=".$blank.htmlspecialchars($this->val_id[$j]).$blank." and ";
			}
		}

		for($i=0;$i<count($this->var);$i++){
			if($i==((count($this->var))-1)){
				$variable=$variable.$this->var[$i]."=".$blank.htmlspecialchars($this->val[$i]).$blank;				
			}
			else{
				$variable=$variable.$this->var[$i]."=".$blank.htmlspecialchars($this->val[$i]).$blank.",";
			}
		}
		$sql_query="update ".$this->table_name." set ".$variable." where ".$identifier;
		return mysqli_query($this->connect,$sql_query);
	}
	function search_data(){
		$identifier="";
		$value="";
		$blank="'";
		for($j=0;$j<count($this->var_id);$j++){
			if($j==((count($this->var_id))-1)){
				$identifier=$identifier.$this->var_id[$j]."=".$blank.htmlspecialchars($this->val_id[$j]).$blank;				
			}
			else{
				$identifier=$identifier.$this->var_id[$j]."=".$blank.htmlspecialchars($this->val_id[$j]).$blank." and ";
			}
		}
		$sql_query="select * from ".$this->table_name." where ".$identifier;
		return mysqli_query($this->connect,$sql_query);
	}
	function delete_data(){
		$identifier="";
		$value="";
		$blank="'";
		for($j=0;$j<count($this->var_id);$j++){
			if($j==((count($this->var_id))-1)){
				$identifier=$identifier.$this->var_id[$j]."=".$blank.$this->val_id[$j].$blank;				
			}
			else{
				$identifier=$identifier.$this->var_id[$j]."=".$blank.$this->val_id[$j].$blank." and ";
			}
		}
		$sql_query="delete from ".$this->table_name." where ".$identifier;
		return mysqli_query($this->connect,$sql_query);
	}
	function search_all($a){
		$sql_query="select * from ".$this->table_name." order by ".$a;
		return mysqli_query($this->connect,$sql_query);
	}
}