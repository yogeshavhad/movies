<div class="container">

    <!-- Include Flash Data File -->
    <?php $this->load->view('_FlashAlert\flash_alert.php') ?>

    <div class="jumbotron">
        <h1 class="display-4"> <?= $page_title ?></h1>
			<table id="dt_Table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Poster</th>
                    <th>Movie Details</th>
                 </tr>
            </thead>
            <tbody>
			<?php
			foreach($movies as $key => $movie){
				echo "<tr>";
        if(strlen($movie->poster) > 10){
          $poster = "<img src='".$movie->poster."' class='poster_img'>";
        }else{
          $poster = "<img src='".base_url()."/assets/images/no_image.jpg' class='poster_img'>";
        }
  			echo '<td>'.$poster.'</td>';
  			echo '<td><div class="movie_wrapper"><h1>'.$movie->title.'<span>('.$movie->year.')</span></h1>' . '<span>Cast:</span> '.$movie->cast.'<br /><span>Genre:</span>'.$movie->genres.'</div>'.'</td>';
				$button = "<button class='btn btn-primary follow' onclick='save(this,".$movie->movie_id.")'>Follow</button>";
  			//add html for action
  		//	echo '<td>'.$button.'</td>';
				echo "</tr>";
			}
			?>
            </tbody>
        </table>

    </div>
</div>
<script type="text/javascript">
/*$(document).ready(function() {
    $('#dt_Table').DataTable({
		"columns": [
    { "width": "30%" },
    null,
    null,
    null,
    null
  ]
	});
} ); */


var table;
$(document).ready(function() {

    //datatables
    table = $('#dt_Table').DataTable({


    });

	$(".follow").click(function(){
		alert($(this).attr('att'));
	});
});

function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax
}

function save(odj, movie_id)
{
    $(odj).attr('disabled',true); //change button text
    $.post( "<?php echo site_url('imdb/ajax_follow_movie')?>", { movie_id: movie_id }, function( data ) {
		alert(data.message);
		if(data.status==true){
		 reload_table();
		}

	}, "json");
}
</script>
