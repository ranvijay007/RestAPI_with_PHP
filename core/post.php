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
		$row=$stmt->fetch(PDO::FETCH_ASSOC);
		$this->Team_ID=$row['Team_ID'];
		$this->Team_Name=$row['Team_Name'];
		$this->Host_City=$row['Host_City'];
		$this->Owner_Name=$row['Owner_Name'];
		
		
	}
	public function create(){
		$query="insert into ".$this->table." set Team_ID = :team_id, Team_Name = :team_name, Host_City = :host_city, Owner_Name = :owner_name";
		$stmt=$this->conn->prepare($query);
		
		$this->Team_ID=htmlspecialchars(strip_tags($this->Team_ID));
		$this->Team_Name=htmlspecialchars(strip_tags($this->Team_Name));
		$this->Host_City=htmlspecialchars(strip_tags($this->Host_City));
		$this->Owner_Name=htmlspecialchars(strip_tags($this->Owner_Name));
		
		$stmt->bindParam(':team_id', $this->Team_ID);
		$stmt->bindParam(':team_name', $this->Team_Name);
		$stmt->bindParam(':host_city', $this->Host_City);
		$stmt->bindParam(':owner_name', $this->Owner_Name);
		
		if($stmt->execute()){
			return true;
		}
		
		echo "Error : ".$stmt->error;
		return false;
	}
	
	public function update(){
		$query="update ".$this->table." set  Team_Name = :team_name, Host_City = :host_city, Owner_Name = :owner_name where Team_ID= :team_id";
		$stmt=$this->conn->prepare($query);
		
		$this->Team_ID=htmlspecialchars(strip_tags($this->Team_ID));
		$this->Team_Name=htmlspecialchars(strip_tags($this->Team_Name));
		$this->Host_City=htmlspecialchars(strip_tags($this->Host_City));
		$this->Owner_Name=htmlspecialchars(strip_tags($this->Owner_Name));
		
		$stmt->bindParam(':team_id', $this->Team_ID);
		$stmt->bindParam(':team_name', $this->Team_Name);
		$stmt->bindParam(':host_city', $this->Host_City);
		$stmt->bindParam(':owner_name', $this->Owner_Name);
		
		if($stmt->execute()){
			return true;
		}
		
		echo "Error : ".$stmt->error;
		return false;
	}
	
	public function delete(){
		$query="delete from ".$this->table." where Team_ID= :team_id";
		$stmt=$this->conn->prepare($query);
		
		$this->Team_ID=htmlspecialchars(strip_tags($this->Team_ID));
		
		$stmt->bindParam(':team_id', $this->Team_ID);
		
		if($stmt->execute()){
			return true;
		}
		
		echo "Error : ".$stmt->error;
		return false;
	}
 }

?>