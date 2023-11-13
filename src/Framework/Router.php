<?php

declare(strict_types=1);

namespace Framework;

/**
 * Class Router
 * Manages routes and dispatches requests to appropriate controllers based on path and method.
 */
class Router
{
    private array $routes = [];

    /**
     * Add a route to the router.
     *
     * @param string $method The HTTP method (GET, POST, etc.).
     * @param string $path The route path.
     * @param array $controller The controller and method to be executed for the route.
     */
    public function add(string $method, string $path, array $controller)
    {
        $path = $this->normalizePath($path);

        $this->routes[] = [
            'path' => $path,
            'method' => strtoupper($method),
            'controller' => $controller
        ];
    }

    /**
     * Normalize the given path by removing trailing slashes and ensuring a consistent format.
     *
     * @param string $path The path to be normalized.
     * @return string The normalized path.
     */
    private function normalizePath(string $path): string
    {
        $path = trim($path, "/");
        $path = "/{$path}/";
        $path = preg_replace("#/+#", "/", $path);

        return $path;
    }

    /**
     * Dispatches the request to the appropriate controller based on the path and method.
     *
     * @param string $path The requested path.
     * @param string $method The requested method.
     */
    public function dispatch(string $path, string $method): void
    {
        $path = $this->normalizePath($path);
        $method = strtoupper($method);

        foreach ($this->routes as $route) {
            if (!preg_match("#^" . preg_quote($route['path'], '#') . "$#", $path) || $route['method'] !== $method) {
                continue;
            }

            [$class, $function] = $route['controller'];
            $controllerInstance = new $class();
            $controllerInstance->$function();
        }
    }
}
