<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Server;
class SoapServerController extends Controller
{
    public function index(){
      $params = array('uri' => url('/soap/server'));
      $server = new \SoapServer(null, $params);
      $server->setClass(Server::class);
      $server->handle();
    }
}
