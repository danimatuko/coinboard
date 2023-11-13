<?php

declare(strict_types=1);

namespace Framework;

/**
 * Class App
 * Main application class managing routes and request handling.
 */
class App
{
    private Router $router;

    /**
     * App constructor.
     */
    public function __construct()
    {
        $this->router = new Router();
    }

    /**
     * Define a GET route.
     *
     * @param string $path The path for the route.
     * @param array $controller The controller and method to be executed.
     */
    public function get(string $path, array $controller)
    {
        $this->router->add('GET', $path, $controller);
    }

    /**
     * Run the application.
     * This matches the requested path and method to the appropriate route and executes the associated controller.
     */
    public function run()
    {
        $path =  parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];

        $this->router->dispatch($path, $method);
    }
}
