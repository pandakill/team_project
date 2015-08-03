<?php

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

$GLOBALS['logined'] = null;

function my_base_url()
{
	$url = $_SERVER['HTTP_HOST'].'/pro_dev/index.php';
	return $url;
}

function my_server_url()
{
	$url = 'http://'.$_SERVER['HTTP_HOST'].':8080/pro_server/';
	return $url;
}

function resources_url()
{
    $url = "/pro/resources";
    return $url;
}

?>