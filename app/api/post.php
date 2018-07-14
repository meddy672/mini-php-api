<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App;

// Get All Post 
$app->get('/api/posts', function(Request $request, Response $response){

	global $database;

	$query = "SELECT * FROM posts";

	$result = $database->query($query);

	$posts = $database->fetch_assoc($result);

	echo json_encode($posts, JSON_PRETTY_PRINT, 1000);


});

// Get Single Post
$app->get('/api/post/{id}', function(Request $request, Response $response){


	global $database;

	$id = $request->getAttribute('id');

	$query = " SELECT * FROM posts WHERE  id = ".$id." ";

	$result = $database->query($query);

	$single_post = $database->fetch_assoc($result);

	echo json_encode($single_post, JSON_PRETTY_PRINT, 1000);

});

// Add Post
$app->post('/api/post/add', function(Request $request, Response $response){

	global $database;

	$title 			= $request->getParam('title');
	$category_id 	= $request->getParam('category_id');
	$body 			= $request->getParam('body');

	$stmt = $database->connection->prepare("INSERT INTO posts (title, category_id, body)VALUES(?, ?, ?) ");
	

	if($stmt->bind_param("sis", $title, $category_id, $body)){

		$stmt->execute();

		echo '{ "notice": { "text": "Post Added" } } ';
	}

});

// Update Post
$app->put('/api/post/update/{id}', function(Request $request, Response $response){

	global $database;

	$id = $request->getAttribute('id');

	$title 			= $request->getParam('title');
	$category_id 	= $request->getParam('category_id');
	$body 			= $request->getParam('body');

	$stmt = $database->connection->prepare("UPDATE posts SET title = ?, category_id = ?, body = ? WHERE id = ?  ");
	

	if($stmt->bind_param("sisi", $title, $category_id, $body, $id)){

		$stmt->execute();

		echo '{ "notice": { "text": "Post I.D '.$id.' Updated" } } ';
	}

});

// Delete Post
$app->delete('/api/post/delete/{id}', function(Request $request, Response $response){

	global $database;

	$id = $request->getAttribute('id');

	$stmt = $database->connection->prepare("DELETE FROM posts WHERE id = ? ");

	if($stmt->bind_param("i", $id)){

		$stmt->execute();

		echo '{ "notice": { "text": "Post I.D '.$id.' Deleted" } } ';
	}

});