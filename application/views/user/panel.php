<div class="container">

    <!-- Include Flash Data File -->
    <?php $this->load->view('_FlashAlert\flash_alert.php') ?>

    <div class="jumbotron">
        <h1 class="display-4">Welcome to <?= $this->session->userdata('USER_NAME') ?></h1>
			<div class="my_links">
			<p><a class="btn btn-success" href="<?php echo base_url(); ?>/index.php/imdb/showMovies">Follow Movies</a></p>
			<p><a class="btn btn-success" href="<?php echo base_url(); ?>/index.php/imdb/showStars">Follow Stars</a></p>
			<p><a class="btn btn-success" href="<?php echo base_url(); ?>/index.php/imdb/showGenres">Follow Genres</a></p>
			<p><a class="btn btn-success"href="<?php echo base_url(); ?>/index.php/imdb/movieSuggestion">Movie Suggestion</a></p>

		</div>
    </div>


    <?php myMovieSlider(); ?>
    <?php myStarSlider(); ?>
    <?php myGenreSlider(); ?>
</div>
