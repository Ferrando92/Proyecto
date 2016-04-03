<?php

class Testing extends CI_Controller
{
	const TEST_USER_ID = 12;
	const INEXISTENT_USER_ID = 999;

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
		$get_article_by_user = $this->Mlibros->get_article_by_user(self::TEST_USER_ID);
		$get_user_by_article = $this->Mlibros->get_user_by_article(1);
		$seach_by_title = $this->Mlibros->total_posts_paginados(["titulo" => "test"], 10, 0);
		$seach_by_title_limited_by_one_from_one = $this->Mlibros->total_posts_paginados(["titulo" => "test"], 1, 0);
		$seach_by_title_starting_from_two = $this->Mlibros->total_posts_paginados(["titulo" => "test"], 1, 1);
		$seach_by_title_and_location = $this->Mlibros->total_posts_paginados(["titulo" => "test", "localidad" => "Valencia"], 10, 0);
		$zero_coincidences_search = $this->Mlibros->total_posts_paginados(["titulo" => "xxx"], 10, 0);
		$same_autor_ok_case = $this->Mlibros->same_autor(1, self::TEST_USER_ID);
		$same_autor_ko_case = $this->Mlibros->same_autor(1, self::INEXISTENT_USER_ID);

		$this->unit->run($count_libros, 2, "Mlibros::count_libros() should return the number of books in the DB");
		$this->unit->run($get_article_by_id->id_libro, 1, "Mlibros::get_article_by_id() should return object with the given id");
		$this->unit->run($get_article_by_user, "is_array", "Mlibros::get_article_by_user() should return an array of books");
		$this->unit->run(count($get_article_by_user), 2, "Mlibros::get_article_by_user() should return an array of books");
		$this->unit->run($get_article_by_user[0]->id_usuario, self::TEST_USER_ID, "Mlibros::get_article_by_user() should return object with the given id_usuario");
		$this->unit->run($get_user_by_article[0]->id_usuario, self::TEST_USER_ID, "Mlibros::get_user_by_article() should return ¿¿¿an array of objects with??? the id of the user that owns the article");
		$this->unit->run(count($seach_by_title), 2, "Mlibros::total_posts_paginados() should return an array with all the coincidences");
		$this->unit->run($seach_by_title_limited_by_one_from_one[0]->id_libro, 1, "Mlibros::total_posts_paginados() must not return more records than the max limit");
		$this->unit->run($seach_by_title_starting_from_two[0]->id_libro, 2, "Mlibros::total_posts_paginados() should start searching from the record indicated");
		$this->unit->run(count($seach_by_title_and_location), 1, "Mlibros::total_posts_paginados() should return an array with all the coincidences");
		$this->unit->run(count($zero_coincidences_search), 0, "Mlibros::total_posts_paginados() should return an empty array if were no coincidences");
		$this->unit->run($same_autor_ok_case, True, "Mlibros::same_autor() should return True if the given user owns the given article");
		$this->unit->run($same_autor_ko_case, False, "Mlibros::same_autor() should return False if the given user DOESN'T own the given article");

	}
}