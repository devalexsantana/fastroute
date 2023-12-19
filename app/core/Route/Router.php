<?php
namespace App\Core\Route;

use App\Http\Status\NotAllowed;
use function FastRoute\simpleDispatcher;
use App\Http\Status\NotFound;
use Closure;
use FastRoute\RouteCollector;
use FastRoute\Dispatcher;

class Router
{

    private array $routes;

    private array $group;

    public function group(string $prefix, Closure $closure)
    {

        $this->group[$prefix] = $closure;

    }

    public function get(string $uri, array $controller)
    {

        $this->routes[] = [$uri, $controller];

    }

    public function post(string $uri, array $controller)
    {

        $this->routes[] = [$uri, $controller];

    }

    public function put(string $uri, array $controller)
    {

        $this->routes[] = [$uri, $controller];

    }

    public function delete(string $uri, array $controller)
    {

        $this->routes[] = [$uri, $controller];

    }


    public function group_routes(RouteCollector $r)
    {
        $httpMethod = $_SERVER['REQUEST_METHOD'];
        foreach ($this->group as $prefix => $routes) {
            $r->addGroup($prefix, function (RouteCollector $r) use ($routes) {
                foreach ($routes() as $route) {
                    switch ($_SERVER['REQUEST_METHOD']) {
                        case 'GET':
                            $r->get(...$route);
                            break;

                        case 'POST':
                            $r->post(...$route);
                            break;

                        case 'PUT':
                            $r->put(...$route);
                            break;

                        case 'DELETE':
                            $r->delete(...$route);
                            break;
                    }
                }
            });
        }

    }


    public function run()
    {
        $dispatcher = simpleDispatcher(function (RouteCollector $r) {


            if (!empty($this->group)) {
                $this->group_routes($r);
            }
            foreach ($this->routes as $route) {

                switch ($_SERVER['REQUEST_METHOD']) {
                    case 'GET':
                        $r->get(...$route);
                        break;

                    case 'POST':
                        $r->post(...$route);
                        break;

                    case 'PUT':
                        $r->put(...$route);
                        break;

                    case 'DELETE':
                        $r->delete(...$route);
                        break;
                }

            }

        });



        $httpMethod = $_SERVER['REQUEST_METHOD'];
        $uri = parse_url($_SERVER['REQUEST_URI'])['path'];

        if ($uri != '/') {
            $uri = rtrim($uri, '/');
        }


        $routeInfo = $dispatcher->dispatch($httpMethod, $uri);

        $this->handle($routeInfo);
    }


    private function handle(array $routeInfo)
    {
        switch ($routeInfo[0]) {
            case Dispatcher::NOT_FOUND:
                // ... 404 Not Found
                call_user_func_array([new NotFound, 'index'], []);
                break;
            case Dispatcher::METHOD_NOT_ALLOWED:
                //$allowedMethods = $routeInfo[1];
                // ... 405 Method Not Allowed
                call_user_func_array([new NotAllowed, 'index'], []);
                break;
            case Dispatcher::FOUND:

                [, [$controller, $method], $vars] = $routeInfo;

                call_user_func_array([new $controller, $method], $vars);
                break;
        }
    }


}