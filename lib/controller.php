<?php

Class Controller {
	public function __construct($controller_name = '') {
		if ($controller_name) {
			$this->setModel($controller_name);
		}
	}
	
	protected $model;
	
	public function view($path, $data = array()) {
		if (is_file('view/'.$path.'.php')) {
			require_once 'view/'.$path.'.php';
		} else {
			die("Error: view/".$path.".php missing!");
		}
	}
	
	public function setModel($model_name) {
		$model_name .= '_model';
		if (is_file('model/'.$model_name.'.php')) {
			require_once 'model/'.$model_name.'.php';
			$this->model = ucwords($model_name);
			$this->model = new $this->model;
		}
	}
	
	public function __destruct() {
		
	}
}