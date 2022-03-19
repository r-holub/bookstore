<?php

Class Model {
	protected $db;
	
	public function __construct() {
		$this->db = new db();
	}
}