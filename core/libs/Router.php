<?php
include 'core/autoload.php';
class core_libs_Router {
    public $routes = [
        'GET' => [],
        'POST' => []
    ];

    public static function load($file)
    {
        $router = new static;

        require $file;
        return $router;
    }

    public function get($uri, $controller)
    { 
        $this->routes['GET'][$uri] = $controller;
        
    }

    public function post($uri, $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }

    public function direct($uri, $requestType)
    {  
        if (array_key_exists($uri, $this->routes[$requestType])) {
           
            return $this->callAction(
                ...explode('@', $this->routes[$requestType][$uri])
            );
        }
        return view('layout/404');
        throw new Exception('Route khong xac dinh');
        
    }

    protected function callAction($controller, $action)
    {   
        // $control = str_replace('_','/',$controller);
        // require_once "{$control}.php";
        $controller = new $controller;
        
        if (! method_exists($controller, $action)) {
            return view('layout/404');
            throw new Exception(
                "{$controller} does not respond to the {$action} action."
            );
            
        }

        return $controller->$action();
    }
}
?>