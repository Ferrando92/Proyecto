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
		$seach_by_title = $this->Mlibros->total_posts_paginados(["titulo" => "test"], 10, 0);
		$seach_by_title_limited_by_one_from_one = $this->Mlibros->total_posts_paginados(["titulo" => "test"], 1, 0);
		$seach_by_title_starting_from_two = $this->Mlibros->total_posts_paginados(["titulo" => "test"], 1, 1);
		$seach_by_title_and_location = $this->Mlibros->total_posts_paginados(["titulo" => "test", "localidad" => "Valencia"], 10, 0);
		$zero_coincidences_search = $this->Mlibros->total_posts_paginados(["titulo" => "xxx"], 10, 0);

		$this->unit->run($count_libros, 2, "Mlibros::count_libros() should return the number of books in the DB");
		$this->unit->run($get_article_by_id->id_libro, 1, "Mlibros::get_article_by_id() should return object with the given id");
		$this->unit->run($get_article_by_user, "is_array", "Mlibros::get_article_by_user() should return an array of books");
		$this->unit->run(count($get_article_by_user), 2, "Mlibros::get_article_by_user() should return an array of books");
		$this->unit->run($get_article_by_user[0]->id_usuario, 12, "Mlibros::get_article_by_user() should return object with the given id_usuario");
		$this->unit->run($get_user_by_article[0]->id_usuario, 12, "Mlibros::get_user_by_article() should return ¿¿¿an array of objects with??? the id of the user that owns the article");
		$this->unit->run(count($seach_by_title), 2, "Mlibros::total_posts_paginados() should return an array with all the coincidences");
		$this->unit->run($seach_by_title_limited_by_one_from_one[0]->id_libro, 1, "Mlibros::total_posts_paginados() must not return more records than the max limit");
		$this->unit->run($seach_by_title_starting_from_two[0]->id_libro, 2, "Mlibros::total_posts_paginados() should start searching from the record indicated");
		$this->unit->run(count($seach_by_title_and_location), 1, "Mlibros::total_posts_paginados() should return an array with all the coincidences");
		$this->unit->run(count($zero_coincidences_search), 0, "Mlibros::total_posts_paginados() should return an empty array if were no coincidences");
	}
}