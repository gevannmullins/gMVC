<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\YourModel;
use PDO;

class CrudController extends Controller {
    protected $model;
    // protected $pdo;

    public function __construct() {
        // // Initialize the PDO connection here
        // $this->pdo = new PDO('mysql:host=127.0.0.1;dbname=rise_ims', 'root', 'root', [
        //     PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        //     PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        // ]);
        $this->model = new YourModel();

    }

    public function index() {
        $items = $this->model->all();
        $this->view('crud/index', compact('items'));
    }

    public function create() {
        $this->view('crud/create');
    }

    public function store() {
        $this->model->create($_POST);
        $this->redirect('crud/index');
    }

    public function edit($id) {
        $item = $this->model->find($id);
        $this->view('crud/edit', compact('item'));
    }

    public function update($id) {
        $this->model->update($id, $_POST);
        $this->redirect('crud/index');
    }

    public function destroy($id) {
        $this->model->delete($id);
        $this->redirect('crud/index');
    }
}
