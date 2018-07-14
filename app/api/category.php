<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App;

// Get All Post 
$app->get('/api/categories', function(Request $request, Response $response){

	global $database;

	$query = "SELECT * FROM categories";

	$result = $database->query($query);

	$posts = $database->fetch_assoc($result);

	echo json_encode($posts, JSON_PRETTY_PRINT, 1000);


});

// Get Single Post
$app->get('/api/category/{id}', function(Request $request, Response $response){


	global $database;

	$id = $request->getAttribute('id');

	$query = " SELECT * FROM categories WHERE  id = ".$id." ";

	$result = $database->query($query);

	$single_post = $database->fetch_assoc($result);

	echo json_encode($single_post, JSON_PRETTY_PRINT, 1000);

});

// Add Post
$app->post('/api/category/add', function(Request $request, Response $response){

	global $database;


	$name = $request->getParam('name');

	$stmt = $database->connection->prepare("INSERT INTO categories (name)VALUES(?) ");
	

	if($stmt->bind_param("s", $name)){

		$stmt->execute();

		echo '{ "notice": { "text": "Category Added" } } ';
	}

});

// Update Post
$app->put('/api/category/update/{id}', function(Request $request, Response $response){

	global $database;

	$id = $request->getAttribute('id');

	$name = $request->getParam('name');

	$stmt = $database->connection->prepare("UPDATE categories SET name = ? WHERE id = ?  ");
	

	if($stmt->bind_param("si", $name, $id)){

		$stmt->execute();

		echo '{ "notice": { "text": "Category I.D '.$id.' Updated" } } ';
	}

});

// Delete Post
$app->delete('/api/category/delete/{id}', function(Request $request, Response $response){

	global $database;

	$id = $request->getAttribute('id');

	$stmt = $database->connection->prepare("DELETE FROM categories WHERE id = ? ");

	if($stmt->bind_param("i", $id)){

		$stmt->execute();

		echo '{ "notice": { "text": "Category I.D '.$id.' Deleted" } } ';
	}

});