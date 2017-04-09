<?php

class Router
{
    protected $routers = [];
    protected $provider;

    public function __construct($provider)
    {
        $this->provider = $provider;
    }

    public function add($name, $callback)
    {
        $pattern = '/^'. str_replace('/', '\/', $name) .'$/';
        $this->routers[$pattern] = $callback;
    }

    public function dispach()
    {
        foreach ($this->routers as $pattern => $callback) {
            if (preg_match($pattern, $_SERVER['REQUEST_URI'], $params)) {
                array_shift($params);
                if (!is_callable($callback)) {
                    throw new \Exception('Router is not callable');
                }
                if (is_string($callback)) {
                    list($class, $method) = explode('::', $callback, 2);
                    $function = array(new $class($this->provider), $method);
                } else {
                    $function = array($callback);
                }
                echo call_user_func_array($function, $params);
                break;
            }
        }
    }
}
