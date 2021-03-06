<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class EventsController extends Controller{
    public function CheckDay($day){
      return $day <= 3;
    }
    public function GetEvents(Request $request){
      $data = [];
      $data['type'] = 'events';
      $data['day'] = $request['day'];
      $day = $request['day'];
      if($this->CheckDay($day)){
        $data['status'] = '200 OK';
        $data['message'] = 'day found';
        $events = app('db')->select('select name from events where day = '.$day.'');
        $data['data'] = $events;
      }
      else{
        $data['status'] = '404 NOT FOUND';
        $data['message'] = 'requested day not found';
        $data['data'] = NULL;
      }
      return json_encode($data);
    }
}
