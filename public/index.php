<?php
require_once('../app/db.php');
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';

$app = new \Slim\App;

//GET Page name
$_SERVER['REQUEST_URI_PATH'] = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$segments = explode('/', $_SERVER['REQUEST_URI_PATH']);

if(isset($segments[4])){

	$page_name = $segments[4];

	if($page_name === 'category' || $page_name === 'categories'){

		require_once('../app/api/category.php');
	}
	elseif($page_name === 'post' || $page_name === 'posts'){


		require_once('../app/api/post.php');
	}
	else{
		die('Please use api endpoints');
	}
}	



$app->run();