<?php

/**
 * Aplicação Slim
 */

include __DIR__.'/vendor/autoload.php';

$app = new Slim\Slim;
$db = new App\DataBase;

$app->response->headers->set('Content-Type', 'application/json');

$app->get('/users', function() use ($db){
	echo json_encode($db->find());
});

$app->get('/users/:id', function($id) use ($db){
	echo json_encode($db->findById($id));
});

$app->map('/users/:id', function($id) use ($app, $db){
	$data = $app->request->params();
	$db->update($id, $data);
	echo json_encode($db->find());
})->via('POST', 'PUT');

$app->post('/users', function() use ($app, $db){
	$data = $app->request->params();
	$db->insert($data);
	echo json_encode($db->find());
});

$app->delete('/users/:id', function($id) use ($db){
	$db->delete($id);
	echo json_encode($db->find());
});

$app->get('/(:name)', function($name='Word'){
	echo 'Hello '. $name .'!';
});

$app->run();