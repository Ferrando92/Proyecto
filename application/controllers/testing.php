<?php

class Testing extends CI_Controller
{
	const BOOK_TITLE_KEY = 'titulo';

	const TEST_USER_ID = 12;
	const INEXISTENT_USER_ID = 999;
	const TEST_BOOK_ID = 999;
	private static $ARTICLE_DATA_EXAMPLE = [
		"id_libro" => 999,
		"id_usuario" => 1,
		"titulo" => "for testing", 
		"descripcion" => "for testing", 
		"localidad" => "Moncada"
	];

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
		$this->deleteArticle("for testing");

		$count_libros = $this->Mlibros->count_libros();
		$this->unit->run($count_libros, 2, "Mlibros::count_libros() should return the number of books in the DB");

		$get_article_by_id = $this->Mlibros->get_article_by_id(1)[0];
		$this->unit->run($get_article_by_id->id_libro, 1, "Mlibros::get_article_by_id() should return object with the given id");

		$get_article_by_user = $this->Mlibros->get_article_by_user(self::TEST_USER_ID);
		$this->unit->run($get_article_by_user, "is_array", "Mlibros::get_article_by_user() should return an array of books");
		$this->unit->run(count($get_article_by_user), 2, "Mlibros::get_article_by_user() should return an array of books");
		$this->unit->run($get_article_by_user[0]->id_usuario, self::TEST_USER_ID, "Mlibros::get_article_by_user() should return object with the given id_usuario");

		$get_user_by_article = $this->Mlibros->get_user_by_article(1);
		$this->unit->run($get_user_by_article[0]->id_usuario, self::TEST_USER_ID, "Mlibros::get_user_by_article() should return ¿¿¿an array of objects with??? the id of the user that owns the article");

		$seach_by_title = $this->Mlibros->total_posts_paginados(["titulo" => "test"], 10, 0);
			$this->unit->run(count($seach_by_title), 2, "Mlibros::total_posts_paginados() should return an array with all the coincidences");
		$seach_by_title_limited_by_one_from_one = $this->Mlibros->total_posts_paginados(["titulo" => "test"], 1, 0);
			$this->unit->run($seach_by_title_limited_by_one_from_one[0]->id_libro, 1, "Mlibros::total_posts_paginados() must not return more records than the max limit");
		$seach_by_title_starting_from_two = $this->Mlibros->total_posts_paginados(["titulo" => "test"], 1, 1);
			$this->unit->run($seach_by_title_starting_from_two[0]->id_libro, 2, "Mlibros::total_posts_paginados() should start searching from the record indicated");
		$seach_by_title_and_location = $this->Mlibros->total_posts_paginados(["titulo" => "test", "localidad" => "Valencia"], 10, 0);
			$this->unit->run(count($seach_by_title_and_location), 1, "Mlibros::total_posts_paginados() should return an array with all the coincidences");
	
		$zero_coincidences_search = $this->Mlibros->total_posts_paginados(["titulo" => "xxx"], 10, 0);
		$this->unit->run(count($zero_coincidences_search), 0, "Mlibros::total_posts_paginados() should return an empty array if were no coincidences");

		$same_autor_ok_case = $this->Mlibros->same_autor(1, self::TEST_USER_ID);
		$this->unit->run($same_autor_ok_case, True, "Mlibros::same_autor() should return True if the given user owns the given article");

		$same_autor_ko_case = $this->Mlibros->same_autor(1, self::INEXISTENT_USER_ID);
		$this->unit->run($same_autor_ko_case, False, "Mlibros::same_autor() should return False if the given user DOESN'T own the given article");

		$count_search = $this->Mlibros->count_search(["titulo" => "test"]);
		$this->unit->run($count_search, 2, "Mlibros::count_search() should return the number of coincidences of a book search");

		$count_search_complex = $this->Mlibros->count_search(["titulo" => "test", "localidad" => "Valencia"]);
		$this->unit->run($count_search_complex, 1, "Mlibros::count_search() should return the number of coincidences of a book search");

		$insert_new_article = $this->Mlibros->insert_new_article(self::$ARTICLE_DATA_EXAMPLE);
		$this->unit->run($insert_new_article, self::TEST_BOOK_ID, "Mlibros::insert_new_article() must have returned the id of the inserted article");

		$this->unit->run($this->readArticle(self::TEST_BOOK_ID)->titulo, self::$ARTICLE_DATA_EXAMPLE[self::BOOK_TITLE_KEY], "Mlibros::insert_new_article() must have inserted the given article in the DB");

		$this->deleteArticle("for testing");
	}

	private function createArticle($data){
		$this->Mlibros->db->insert('libros', $data);
	}

	private function readArticle($id){
		return $this->Mlibros->db->where('id_libro', $id)->get('libros')->result()[0];
	}

	private function deleteArticle($title){
		$this->Mlibros->db->where('titulo', $title)->delete('libros');
	}
}