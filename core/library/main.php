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
	$x = (include '/core/configs/db.php');
	
	return new mysqli($x['servername'], $x['username'], $x['password'], $x['dbname']);
}
function upload($image)
{
	$img_dir = '/upload/';
	$rand = rand(1, 9999);
	
	$temp = explode(".", $image["name"]);
	$img = $img_dir . round(microtime(true)). $rand . '.' . end($temp);
	$upload_icon = "/upload/".round(microtime(true)). $rand . '.' . end($temp);
	
	move_uploaded_file($image["tmp_name"], $img);
	
	return $upload_icon;
}
function img($id, $table)
{
	$con = connectDB();
	
	$sql = "SELECT img FROM $table WHERE id = $id";
	$result = $con->query($sql);
	$row = $result->fetch_assoc();
	
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
?>