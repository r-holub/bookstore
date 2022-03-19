<?php

Class Route {
	private $route;
	private $method;
	private $controller;
	
	public function __construct() {
		$this->route = 'home';
		$this->method = 'index';
		
		if (isset($_GET['url'])) {
			$url = explode('/', $_GET['url']);
			$this->route = mb_strtolower($url[0]);
			
			if (isset($url[1]) && $url[1]) {
				$this->method = $url[1];
			}
		}
		
		if (is_file('controller/'.$this->route.'.php')) {
			require_once 'controller/'.$this->route.'.php';
			$this->controller = ucwords($this->route);
			$this->controller = new $this->controller($this->route);
			
			$this->controller->{$this->method}();
		} else {
			http_response_code(404);
			exit();
		}
	}
}