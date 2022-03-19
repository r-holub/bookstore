<?php

class Home extends Controller {
	public function index() {
		$data['title'] = 'Devsk Bookstore';
		
		$this->view('part/header', $data);
		$this->view('home', $data);
		$this->view('part/footer', $data);
	}
}