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
          					<th>Follow</th>
                 </tr>
            </thead>
            <tbody>
			<?php
			/*foreach($movies as $key => $value){
				echo "<tr>";
				echo "<td>".$value->title."</td>";
				echo "<td>".$value->year."</td>";
				echo "<td>".implode(',', $value->cast)."</td>";
				echo "<td>".implode(',', $value->genres)."</td>";
				echo "<td><button class='btn btn-primary'>Follow</button></td>";
				echo "</tr>";
			} */
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

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "bLengthChange": false,
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('imdb/ajax_movies')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
            {
                "targets": [ 1 ], //last column
                "orderable": true, //set not orderable
            },
            {
                "targets": [ 2 ], //2 last column (photo)
                "orderable": true, //set not orderable
            },
        ],

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
