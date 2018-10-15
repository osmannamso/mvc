<?php
	session_start();
	
	require 'core/library/main.php';
	require 'core/library/assets.php';
	
	if(!empty(getUrlSegment(0))){
		$controllerName = getUrlSegment(0);
	}else {
		$controllerName = 'main';
	}
	
	if(!empty(getUrlSegment(1))){
		$actionName = 'action_' . getUrlSegment(1);
	}else {
		$actionName = 'action_index';
	}
	
	$path = "core/controllers/" . $controllerName . '.php';
	if(file_exists($path)){
		require_once $path;
		if(function_exists($actionName)){
			$actionName();
		}else {
			get404page();
		}
	}else {
		get404page();
	}
?>