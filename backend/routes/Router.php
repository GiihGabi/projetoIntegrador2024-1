<?php
class Router
{
    private $routes = [];

    public function get($path, $callback)
    {
        $this->addRoute('GET', $path, $callback);
    }

    public function post($path, $callback)
    {
        $this->addRoute('POST', $path, $callback);
    }

    public function put($path, $callback)
    {
        $this->addRoute('PUT', $path, $callback);
    }

    public function delete($path, $callback)
    {
        $this->addRoute('DELETE', $path, $callback);
    }

    private function addRoute($method, $path, $callback)
    {
        $this->routes[$method][$path] = $callback;
    }

    public function handleRequest($method, $path)
    {
        $basePath = strtok($path, '?'); // Remove os parâmetros de query da URL, se houver

        // Verifica se o método HTTP é suportado pelo roteador
        if (!isset($this->routes[$method])) {
            return 'Erro: Método não suportado';
        }

        // Verifica se existe uma rota exata correspondente ao caminho na requisição
        if (isset($this->routes[$method][$basePath])) {
            $callback = $this->routes[$method][$basePath];
            // Verifica se o callback é uma função válida
            if (is_callable($callback)) {
                return call_user_func($callback);
            } else {
                return 'Erro: Callback inválido para rota';
            }
        }

        // Verifica se existe uma rota com parâmetros dinâmicos
        // Verifica se existe uma rota com parâmetros dinâmicos
        foreach ($this->routes[$method] as $route => $callback) {
            // Verifica se o caminho base da rota corresponde ao caminho da requisição
            if ($this->routeMatchesPath($route, $basePath)) {
                // Extrai os parâmetros dinâmicos da URL
                $params = $this->extractParams($route, $basePath);
                if ($params === null) {
                    // Se não houver parâmetros, continue para a próxima rota
                    continue;
                }
                // Chama o callback passando os parâmetros
                return call_user_func_array($callback, $params);
            }
        }


        return 'Erro: Rota não encontrada';
    }

    // Função auxiliar para verificar se o caminho da rota corresponde ao caminho da requisição
    private function routeMatchesPath($route, $path)
    {
        $regex = str_replace('/', '\/', $route);
        $regex = preg_replace('/\{.*?\}/', '.+', $regex);
        $regex = '/^' . $regex . '$/';
        return preg_match($regex, $path);
    }

    // Função auxiliar para extrair os parâmetros dinâmicos da URL
    private function extractParams($route, $path)
    {
        $params = [];
        $routeParts = explode('/', $route);
        $pathParts = explode('/', $path);

        foreach ($routeParts as $key => $part) {
            // Verifica se a parte da rota é um parâmetro dinâmico
            if (strpos($part, '{') !== false && strpos($part, '}') !== false) {
                // Parte da rota é um parâmetro dinâmico
                $paramName = trim($part, '{}');
                // Verifica se o parâmetro dinâmico existe no caminho da requisição
                if (isset($pathParts[$key])) {
                    // Obtém o valor do parâmetro do caminho da requisição
                    $params[$paramName] = $pathParts[$key];
                }
            }
        }

        return $params;
    }


    public function run()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $path = $_SERVER['REQUEST_URI'];
        echo $this->handleRequest($method, $path);
    }
}
