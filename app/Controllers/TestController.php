<?php

namespace App\Controllers;

use App\Core\Controller;
// use App\Core\dblayer\SQLite;
use App\Core\Dbal\SQLiteDatabase;

class TestController extends Controller 
{

    protected $sqlite;

    public function __construct() {
        $this->sqlite = new SQLiteDatabase();
    }

    public function index(){
        $userData = $this->sqlite->getAll('users');
        $this->view('test/index', [
            'data' => $userData
        ] );
    }




}
