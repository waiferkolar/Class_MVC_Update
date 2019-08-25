<?php

require_once("vendor/autoload.php");


class Init
{
    private $className = "Index";
    private $methodName = "show";
    private $params = [];

    public function __construct()
    {
        $this->loadRouter();
    }

    public function loadRouter()
    {

        $url = isset($_GET["url"]) ? $_GET["url"] : [];

        $urls = explode("/", rtrim($url, "/"));

        if ($url) {
            if (isset($urls[0])) {
                $this->className = ucfirst($urls[0]);
                unset($urls[0]);
            }

            if (isset($urls[1])) {
                $this->methodName = $urls[1];
                unset($urls[1]);
            }

            $this->params = array_values($urls);
        }

        $className = "App\Controllers\\" . $this->className;
        $cls = new $className;
        $method = $this->methodName;
        $cls->$method();

    }
}
new Init();
