<?php

 class Post{
 	private $conn;
	private $table="team";
	
	public $Team_ID;
	public $Team_Name;
	public $Host_City;
	public $Owner_Name;
	
	public function __construct($db){
		$this->conn=$db;
	}
	
	public function read(){
		$query="select * from ".$this->table;
		$stmt=$this->conn->prepare($query);
		$stmt->execute();
		return $stmt;
	}
	
	public function read_single(){
		$query="select * from ".$this->table." where Team_ID= ? LIMIT 1";
		$stmt=$this->conn->prepare($query);
		$stmt->bindParam(1, $this->Team_ID);
		
		$stmt->execute();
		$row=$stmt->fetch(PDO::FETH_ASSOC);
		$this->Team_ID=$row['Team_ID'];
		$this->Team_Name=$row['Team_Name'];
		$this->Host_City=$row['Host_City'];
		$this->Owner_Name=$row['Owner_Name'];
		
		
	}
 }

?>