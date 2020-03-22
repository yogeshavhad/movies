<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Imdb extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">', '</p>');
		$this->load->model('Movies_model','movies');
		$this->load->model('Star_model','stars');
    }

	public function ajax_movies(){
		$myMoviesList = $this->utils->getMyMovies($this->session->userdata("USER_ID"));
		$myList = array();
		foreach ($myMoviesList as $ml) {
			$myList[] = $ml->follow_id;
		}
		$list = $this->movies->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $movie) {
			$no++;
			$row = array();
      if(strlen($movie->poster) > 10){
        $poster = "<img src='".$movie->poster."' class='poster_img'>";
      }else{
        $poster = "<img src='".base_url()."/assets/images/no_image.jpg' class='poster_img'>";
      }
			$row[] =$poster;
			$row[] = '<div class="movie_wrapper"><h1>'.$movie->title.'<span>('.$movie->year.')</span></h1>' . '<span>Cast:</span> '.$movie->cast.'<br /><span>Genre:</span>'.$movie->genres.'</div>';
			//$row[] = $movie->year;
			//$row[] = $movie->cast;
			//$row[] = $movie->genres;
			//$row[] = implode(',', $movie->cast);
			//$row[] = implode(',', $movie->genres);
			if(in_array($movie->movie_id, $myList))
				$button = "<button class='btn btn-success' disabled='disabled'>Followed</button>";
			else
				$button = "<button class='btn btn-primary follow' onclick='save(this,".$movie->movie_id.")'>Follow</button>";
			/*if($person->photo)
				$row[] = '<a href="'.base_url('upload/'.$person->photo).'" target="_blank"><img src="'.base_url('upload/'.$person->photo).'" class="img-responsive" /></a>';
			else
				$row[] = '(No photo)';*/

			//add html for action
			$row[] = $button;

			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->movies->count_all(),
						"recordsFiltered" => $this->movies->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_follow_movie()
	{

		$data = array(
				'follow_id' => $this->input->post('movie_id'),
				'type' => 'movie',
				'user_id' => $this->session->userdata("USER_ID"),
			);



		$insert = $this->utils->subscribeMovies($data);
		if($insert)
			$msg = array("status" => true, "message" => "You successfully subscribed this movie..!");
		else
			$msg = array("status" => false, "message" => "Something went wrong, Please try again.");

		echo json_encode($msg);
	}

    /**
     * showMovies Panel
     */
    public function showMovies() {

        if (empty($this->session->userdata('USER_ID'))) {
            redirect('user/login');
        }
		//$data['movies'] = json_decode(file_get_contents(base_url().'/assets/json/movies.json'));
        $data['page_title'] = "Movies List";
        $this->load->view('_Layout/home/header.php', $data); // Header File
        $this->load->view("user/showMovies");
        $this->load->view('_Layout/home/footer.php'); // Footer File
    }

    /**
     * showMovies as per suggestion
     */
    public function movieSuggestion() {

        if (empty($this->session->userdata('USER_ID'))) {
            redirect('user/login');
        }

		$movies = $this->utils->getSuggestedMovies($this->session->userdata("USER_ID"));
    $data['movies'] = $movies;
        $data['page_title'] = "Movies Suggestion List";
        $this->load->view('_Layout/home/header.php', $data); // Header File
        $this->load->view("user/movieSuggestion");
        $this->load->view('_Layout/home/footer.php'); // Footer File
    }



	/**
     * showStars Panel
     */
    public function showStars() {

        if (empty($this->session->userdata('USER_ID'))) {
            redirect('user/login');
        }
		$data['stars'] = json_decode(file_get_contents(base_url().'/assets/json/stars.json'));

        $data['page_title'] = "Stars List";
        $this->load->view('_Layout/home/header.php', $data); // Header File
        $this->load->view("user/showStars");
        $this->load->view('_Layout/home/footer.php'); // Footer File
    }

		public function ajax_stars(){
		$myStarList = $this->utils->getMyStars($this->session->userdata("USER_ID"));
		$myList = array();
		foreach ($myStarList as $ml) {
			$myList[] = $ml->follow_id;
		}
		$list = $this->stars->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $star) {
			$no++;
			$row = array();

      $poster = "<img src='".base_url()."/assets/images/no_image.jpg' class='poster_img'>";
		//	$row[] =$poster;
    	$row[] = $poster.'<div class="movie_wrapper"><h1>'.$star->name.'</h1>  <span>Rating: </span>'.$star->rating.'</div>';
			if(in_array($star->cast_id, $myList))
				$button = "<button class='btn btn-success' disabled='disabled'>Followed</button>";
			else
				$button = "<button class='btn btn-primary follow' onclick='save(this,".$star->cast_id.")'>Follow</button>";
			/*if($person->photo)
				$row[] = '<a href="'.base_url('upload/'.$person->photo).'" target="_blank"><img src="'.base_url('upload/'.$person->photo).'" class="img-responsive" /></a>';
			else
				$row[] = '(No photo)';*/

			//add html for action
			$row[] = $button;

			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->stars->count_all(),
						"recordsFiltered" => $this->stars->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_follow_stars()
	{

		$data = array(
				'follow_id' => $this->input->post('star_id'),
				'type' => 'star',
				'user_id' => $this->session->userdata("USER_ID"),
			);



		$insert = $this->utils->subscribeStars($data);
		if($insert)
			$msg = array("status" => true, "message" => "You successfully subscribed this star..!");
		else
			$msg = array("status" => false, "message" => "Something went wrong, Please try again.");

		echo json_encode($msg);
	}

  public function ajax_follow_genre()
	{

		$data = array(
				'genre' => $this->input->post('genre'),
				'user_id' => $this->session->userdata("USER_ID"),
			);



		$insert = $this->utils->subscribeGenre($data);
		if($insert)
			$msg = array("status" => true, "message" => "You successfully subscribed ".$this->input->post('genre')."..!");
		else
			$msg = array("status" => $insert . false, "message" => "Something went wrong, Please try again.");

		echo json_encode($msg);
	}

	/**
     * showGenres Panel
     */
    public function showGenres() {

        if (empty($this->session->userdata('USER_ID'))) {
            redirect('user/login');
        }
        $myGenreList = $this->utils->getMyGenres($this->session->userdata("USER_ID"));
    		$myList = array();
    		foreach ($myGenreList as $ml) {
    			$myList[] = $ml->genre;
    		}
        $data['genres'] = json_decode(file_get_contents(base_url().'/assets/json/genres.json'));
        $data['myGenreList'] = $myList;
        $data['page_title'] = "Genres List";
        $this->load->view('_Layout/home/header.php', $data); // Header File
        $this->load->view("user/showGenres");
        $this->load->view('_Layout/home/footer.php'); // Footer File
    }
}
