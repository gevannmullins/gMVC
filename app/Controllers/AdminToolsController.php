<?php

namespace App\Controllers;

use App\Core\Controller;

class AdminToolsController extends Controller 
{

    public function __construct() {

    }

    public function index(){
        $this->view('tools/index', [ ] );
    }




}
