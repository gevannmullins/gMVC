<?php

namespace App\Core;

class Controller 
{
    /**
     * view - Renders the view
     * @param mixed $view
     * @param mixed $data
     * @return void
     */
    protected function view($view, $data = [], $layout = 'dashboard.layout') {
        // Extract data to be available in the view
        extract($data);

        // Start output buffering to capture the view content
        ob_start();
        if (file_exists("../app/Views/{$view}.view.php")) {
            require "../app/Views/{$view}.view.php";
        } else {
            echo "View {$view} not found.";
        }
        $content = ob_get_clean();

        // Load the layout with the content
        if ($view != 'auth/login') {
            require "../app/Views/layouts/{$layout}.view.php";
        } else {
            require "../app/Views/layouts/login.layout.view.php";
        }
    }

    // protected function view($view, $data = [], $layout = 'dashboard.layout') {
    //     extract($data);
    //     ob_start();
    //     if (file_exists("../app/Views/{$view}.view.php")) {
    //         require "../app/Views/{$view}.view.php";
    //     } else {
    //         echo "View {$view} not found.";
    //     }
    //     $content = ob_get_clean();
    
    //     require "../app/Views/layouts/{$layout}.view.php";
    // }

    /**
     * redirect - Redirects to a specific route
     * @param mixed $path
     * @return void
     */
    protected function redirect($path) {
        header("Location: /{$path}");
    }

    /**
     * load - Loads a view into page. Normally used with JQuery Ajax to load the page into a view
     * @param mixed $view
     * @param mixed $data
     * @return void
     */
    protected function load($view, $data = []) {
        foreach ($data as &$value) {
            $value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
        }
        // Extract data to be available in the view
        extract($data);

        // Start output buffering to capture the view content
        require "../app/Views/{$view}.view.php";
        
    }

    protected function jsonResponse($data) {
        header('Content-Type: application/json');
        echo json_encode($data);
    }

}
