<?php

	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json');
	
	include_once('../core/initialize.php');
	
	$post=new Post($db);
	
	$result=$post->read();
	$num=$result->rowCount();
	
	if($num > 0){
		$post_arr=array();
		$post_arr['data']=array();
		while($row=$result->fetch(PDO::FETCH_ASSOC)){
			extract($row);
			$post_item=array(
				'Team_ID' => $Team_ID,
				'Team_Name' => $Team_Name,
				'Host_City' => $Host_City,
				'Owner_Name' => $Owner_Name,
			);
			array_push($post_arr['data'], $post_item);
		}
		echo json_encode($post_arr);
	}
	else{
		echo json_encode(array("message" => "Not found."));
	}

?>