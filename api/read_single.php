<?php

	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json');
	
	include_once('../core/initialize.php');
	
	$post=new Post($db);
	
	$post->Team_ID=isset($_GET['id'])?$_GET['id']: die();
	$post->read_single();
	$post_arr=array(
		'Team_ID'=>$post->Team_ID,
		'Team_Name'=>$post->Team_Name,
		'Host_City'=>$post->Host_City,
		'Owner_Name'=>$post->Owner_Name,
	);
	
	print_r(json_encode($post_arr));
	
	

?>