<?php

class Book_model extends Model {
	public function getBooks() {
		return $this->db->query("SELECT b.book_id, b.isbn, b.title, b.pages, b.description, a.name as author_name FROM books b LEFT JOIN authors a ON (b.author_id = a.author_id)")->rows;
	}
	
	public function addBook($data) {
		return $this->db->query("INSERT INTO books (`isbn`, `title`, `pages`, `description`, `author_id`) VALUES ('".$this->db->escape($data['isbn'])."', '".$this->db->escape($data['title'])."', '".(int)$data['pages']."', '".$this->db->escape($data['description'])."', ".$data['author'].")");
	}
	
	public function deleteBook($book_id) {
		$this->db->query("DELETE FROM books WHERE book_id = " .$book_id);
	}
	
	public function getAuthors() {
		return $this->db->query("SELECT name FROM authors")->rows;
	}
	
	public function getAuthorId($name) {
		$res = $this->db->query("SELECT author_id FROM authors WHERE `name` = '".$this->db->escape($name)."' LIMIT 1")->row;
		if (isset($res['author_id']) && (int)$res['author_id']) {
			return $res['author_id'];
		}
		
		return 0;
	}
	
	public function addAuthor($name) {
		$this->db->query("INSERT INTO authors (`name`) VALUES ('".$this->db->escape($name)."')");
		return $this->db->getLastId();
	}
}