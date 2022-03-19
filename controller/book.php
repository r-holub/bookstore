<?php

class Book extends Controller {
	
	private $json = array();
	
	public function index() {
		
	}
	
	public function getBooks() {
		$books = $this->model->getBooks();
	
		header("Content-Type: application/json");
		echo json_encode($books);
		exit();
	}
	
	public function addBook() {
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$data = $_POST;
			
			$data['isbn'] = trim(strip_tags($data['isbn']));
			$data['title'] = trim(strip_tags($data['title']));
			$data['author'] = trim(strip_tags($data['author']));
			$data['pages'] = trim(strip_tags($data['pages']));
			$data['description'] = trim(strip_tags($data['description']));
			
			if ($this->verify($data)) {
				/* Search for author_id, create a new author if not found */
				$author_id = $this->model->getAuthorId($data['author']);
				if (!$author_id) {
					$author_id = $this->model->addAuthor($data['author']);
				}
				$data['author'] = $author_id;
				
				/* Add a new books (multiple books with the same ISBN can exist) */
				if ($this->model->addBook($data)) {
					$this->json['success'] = 'Book added!';
				} else {
					$this->json['error_code'] = 'unknown';
					$this->json['error'] = 'Unknown error :(';
				}
			}
			
			header("Content-Type: application/json");
			echo json_encode($this->json);
			exit();
		}
	}
	
	public function deleteBook() {
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			if (isset($_POST['book_id']) && (int)$_POST['book_id'] && ((int)$_POST['book_id'] > 0)) {
				$this->model->deleteBook((int)$_POST['book_id']);
			}
		}
	}
	
	public function getAuthors() {
		$authors = $this->model->getAuthors();
		$res = array();
		foreach ($authors as $author) {
			$res[] = $author['name'];
		}
		
		header("Content-Type: application/json");
		echo json_encode($res);
		exit();
	}
	
	public function verify($data) {
		/* Check if all the fields are filled */
		
		if (!isset($data['isbn']) || !$data['isbn']) {
			$this->json['error_code'] = 'isbn';
			$this->json['error'] = 'ISBN required!';
			return 0;
		}
		
		if (!isset($data['title']) || !$data['title']) {
			$this->json['error_code'] = 'title';
			$this->json['error'] = 'Title required!';
			return 0;
		}
		
		if (!isset($data['author']) || !$data['author']) {
			$this->json['error_code'] = 'author';
			$this->json['error'] = 'Author required!';
			return 0;
		}
		
		if (!isset($data['pages']) || !(int)$data['pages'] || ((int)$data['pages'] < 1)) {
			$this->json['error_code'] = 'pages';
			$this->json['error'] = 'Number of pages required!';
			return 0;
		}
		
		if (!isset($data['description']) || !$data['description']) {
			$this->json['error_code'] = 'description';
			$this->json['error'] = 'Description required!';
			return 0;
		}
		
		return 1;
	}
	
}