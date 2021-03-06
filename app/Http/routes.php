<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
    return $app->version();
});
$app->get('/key',function(){
  return str_random(32);
});

//API routes
$app->get('/api/events','EventsController@GetEvents');// get the events list
$app->get('/api/scores','DepartmentsController@GetScores'); //get the scores of a department
$app->patch('/api/scores','DepartmentsController@UpdateScores'); //update the scores for department
$app->post('/api/scores','DepartmentsController@CreateDepartment'); //post a new score record for a department
$app->post('/api/log','ScoresController@LogScores'); //log the updation of score for event and department
