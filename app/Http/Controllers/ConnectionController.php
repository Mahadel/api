<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Connection;

class ConnectionController extends Controller
{
 
    public function index(){
        return Connection::all();
    }
}
