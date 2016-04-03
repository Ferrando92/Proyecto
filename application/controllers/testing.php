<?php

class Testing extends CI_Controller
{
	public function __construct(){
		parent::__construct();

		$this->load->library('unit_test');  

        $this->load->model("Mlibros");
	}	

	public function index(){
		$this->testBooksModel();
		$this->load->view('tests_report');
	}

	private function testBooksModel(){
		$count_libros = $this->Mlibros->count_libros();
		$get_article_by_id = $this->Mlibros->get_article_by_id(1)[0];
		$get_article_by_user = $this->Mlibros->get_article_by_user(12);
		$get_user_by_article = $this->Mlibros->get_user_by_article(1);

		$this->unit->run($count_libros, 2, "Mlibros::count_libros() should return the number of books in the DB");
		$this->unit->run($get_article_by_id->id_libro, 1, "Mlibros::get_article_by_id() should return object with the given id");
		$this->unit->run($get_article_by_user, "is_array", "Mlibros::get_article_by_user() should return an array of books");
		$this->unit->run(count($get_article_by_user), 2, "Mlibros::get_article_by_user() should return an array of books");
		$this->unit->run($get_article_by_user[0]->id_usuario, 12, "Mlibros::get_article_by_user() should return object with the given id_usuario");
		$this->unit->run($get_user_by_article[0]->id_usuario, 12, "Mlibros::get_user_by_article() should return ¿¿¿an array of objects with??? the id of the user that owns the article");
	}
}