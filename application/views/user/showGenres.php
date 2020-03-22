<div class="container">

    <!-- Include Flash Data File -->
    <?php $this->load->view('_FlashAlert\flash_alert.php') ?>

    <div class="jumbotron">
         <h1 class="display-4"> <?= $page_title ?></h1>
			<div class="block_wrapper">
        <?php
          foreach($genres as $key=>$genre){
            if(in_array($genre, $myGenreList))
            $button = "<button class='btn btn-success follow' disabled='disabled'>Following</button>";
            else
            $button = "<button class='btn btn-primary follow' att='".$genre."'>Follow</button>";
            echo '<div class="block_list"><h2>'.$genre.'</h2>'.$button.'</div>';
          }
        ?>
      </div>

    </div>
</div>
<script type="text/javascript">

$(document).ready(function() {
	$(".follow").click(function(){
		var genre = $(this).attr('att');
    $.post( "<?php echo site_url('imdb/ajax_follow_genre')?>", { genre: genre }, function( data ) {
    alert(data.message);
    if(data.status==true){
     window.location.href = "<?php site_url('imdb/showGenres') ?>";
    }

  }, "json");
	});
});
</script>
