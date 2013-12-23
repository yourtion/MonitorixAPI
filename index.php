<?php
include_once('core.php');
include_once('function.php');
//echo pageToJson("test.html");
//echo pageToJson(getPageUrl());
//echo indexToJson(getUrl());
if($_GET['act']=="page"){
	if($_GET['when'] && $_GET['graph']){
		echo pageToJson(getPageUrl($_GET['when'],$_GET['graph']));
	}elseif($_GET['when']){
		echo pageToJson(getPageUrl($_GET['when']));
	}else{
		echo pageToJson(getPageUrl());
	}
}else{
	echo indexToJson(getUrl());
}