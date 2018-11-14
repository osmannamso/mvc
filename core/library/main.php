<?php

function getUrlSegment($n)
{
	$url = explode('/', $_GET['url']);
	return $url[$n];
}	
function get404page()
{
	render('404', ['title'=>'404']);
}
function render($view, $data)
{
	require 'core/views/layouts/' . $view . '.php';
}
function connectDB()
{
	$x = (include 'core/configs/db.php');
	
	return new mysqli($x['servername'], $x['username'], $x['password'], $x['dbname']);
}
function upload($image)
{
	$img_dir = 'upload/';
	$rand = rand(1, 9999);
	
	$temp = explode(".", $image["name"]);
	$img = $img_dir . round(microtime(true)). $rand . '.' . end($temp);
	$upload_icon = "upload/".round(microtime(true)). $rand . '.' . end($temp);
	
	move_uploaded_file($image["tmp_name"], $img);
	
	return $upload_icon;
}
function img($id, $table)
{
	$con = connectDB();
	
	$sql = "SELECT img FROM $table WHERE id = $id";
	$result = $con->query($sql);
	if($result->num_rows > 0)
		$row = $result->fetch_assoc();
	else
		return null;
	
	return $row['img'];
}
function getAll($table)
{
	$con = connectDB();
	
	$array = [];
	
	$sql = "SELECT * FROM $table";
	$result = $con->query($sql);
	while($row = $result->fetch_assoc()){
		$array[] = $row;
	}
	
	return $array;
}
function delete($id, $table)
{
	$con = connectDB();
	
	$img = img($id, $table);
	if($img)
		unlink($img);
	
	$sql = "DELETE FROM $table WHERE id = $id";
	$con->query($sql);
}