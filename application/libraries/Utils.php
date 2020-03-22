<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// Creating Custom Library in Codeigniter
class Utils {

    function __construct()
    {
        $this->ci =& get_instance();
		$this->ci->load->database();
    }

	function getMyMovies($user_id)
	{
    $this->ci->db->select('movie_master.*,my_follow.*');
    $this->ci->db->from('movie_master');
    $this->ci->db->join('my_follow', 'movie_master.movie_id = my_follow.follow_id','left');
    $this->ci->db->where_in('my_follow.user_id', $user_id);
    $this->ci->db->where_in('my_follow.type', 'movie');
    $query = $this->ci->db->get();
    return $query->result();
	}
	function subscribeMovies($data){
		$this->ci->db->insert('my_follow', $data);
		return $this->ci->db->insert_id();

	}
	function getMyStars($user_id)
	{

    $this->ci->db->select('cast_master.*,my_follow.*');
    $this->ci->db->from('cast_master');
    $this->ci->db->join('my_follow', 'cast_master.cast_id = my_follow.follow_id','left');
    $this->ci->db->where_in('my_follow.user_id', $user_id);
    $this->ci->db->where_in('my_follow.type', 'star');
    $query = $this->ci->db->get();
    return $query->result();
	}

  function getMyGenres($user_id){
    $this->ci->db->where_in('user_id', $user_id);
    return $this->ci->db->get('my_genre')->result();
  }
  function subscribeGenre($data){
		$this->ci->db->insert('my_genre', $data);
		return $this->ci->db->affected_rows();
	}

	function subscribeStars($data){
		$this->ci->db->insert('my_follow', $data);
		return $this->ci->db->insert_id();
	}
  function getSuggestedMovies($user_id){
    $mystars = $this->getMyStars($user_id);
    $starQuery = "";
    foreach($mystars AS $o) {
      $starQuery .= " cast like '%$o->name%' OR";
    }
    $myGenre = $this->getMyGenres($user_id);
    foreach($myGenre AS $o) {
      $starQuery .= " genres like '%$o->genre%' OR";
    }
    $starQuery = substr($starQuery,0,-2);
    if($starQuery){
      $sql = 'select * from movie_master where '.$starQuery;
    }
    $result = $this->ci->db->query($sql)->result();
    return $result;
  }
}
