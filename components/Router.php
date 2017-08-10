<?php


/**
 * Class Router
 */
class Router
{

    private $routes;

    public function __construct()
    {
        //  The path to a file with routers
        $routesPath = ROOT . '/config/routes.php';

        // Receive routes from the file
        $this->routes = include($routesPath);
    }

    /**
     * Returns the query string
     */
    private function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function run()
    {
        // We receive a query string
        $uri = $this->getURI();

        foreach ($this->routes as $uriPattern => $path) {

            // We compare $ uriPattern and $ uri
            if (preg_match("~$uriPattern~", $uri)) {


                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

                // Define controller, action, parameters

                $segments = explode('/', $internalRoute);

                $controllerName = array_shift($segments) . 'Controller';
                $controllerName = ucfirst($controllerName);

                $actionName = 'action' . ucfirst(array_shift($segments));

                $parameters = $segments;

                // Connect the controller class file
                $controllerFile = ROOT . '/controllers/' .
                    $controllerName . '.php';

                if (file_exists($controllerFile)) {
                    include_once($controllerFile);
                }

                // Create an object, call the method (i.e., action)
                $controllerObject = new $controllerName;

                $result = call_user_func_array(array($controllerObject, $actionName), $parameters);

                // If the controller method is successfully called, we complete the router
                if ($result != null) {
                    break;
                }
            }
        }
    }

}
