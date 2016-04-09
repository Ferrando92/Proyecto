<?php
class Mlibros extends CI_Model {

	const TABLE = "libros";
	const ID_KEY = "id_libro";
	const USER_ID_KEY = "id_usuario";

	function __construct()
    {
        parent::__construct();
    }

	function count_libros()
	{
		return $this->db->from(self::TABLE)->count_all_results();
	}

	function get_article_by_id($id)
	{
		return $this->db->where(self::ID_KEY, $id)->get(self::TABLE)->result();
	}

	function get_article_by_user($userId)
	{
		return $this->db->where(self::USER_ID_KEY, $userId)->get(self::TABLE)->result();
	}

	function get_user_by_article($articleId)
	{
		return $this->db->select(self::USER_ID_KEY)
						->where(self::ID_KEY, $articleId)
						->get(self::TABLE)
						->result();
	}

	function total_posts_paginados($searchCollection, $maxRecords, $since) {
		foreach ($searchCollection as $key => $value) {
			$this->db->like($key, $value);
		}

        return $this->db->get(self::TABLE, $maxRecords, $since)->result();
	}
	
	function same_autor($articleId, $userId)
	{
		$NO_RECORDS_MATCHED = 0;

		return $this->db->where(self::ID_KEY, $articleId)
						->where(self::USER_ID_KEY, $userId)
						->get(self::TABLE)
						->num_rows() > $NO_RECORDS_MATCHED;
	}

	function insert_new_article($data)
	{
		$this->db->insert(self::TABLE, $data);
		
		return mysql_insert_id();
	}
	
	function count_search($search)
	{
		foreach ($search as $field => $value) {
			$this->db->like($field, $value);
		}
		
		return $this->db->get(self::TABLE)->num_rows();
	}

	function update_article($id, $new_data)
	{
		$this->db->where(self::ID_KEY, $id)->update(self::TABLE, $new_data);
	}
	
	function delete_article($id)
	{		
		return $this->db->where(self::ID_KEY, $id)->delete(self::TABLE);
	}
}
