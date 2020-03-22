<div class="container">

    <!-- Include Flash Data File -->
    <?php $this->load->view('_FlashAlert\flash_alert.php') ?>

    <div class="jumbotron">
        <h1 class="display-4"> <?= $page_title ?></h1>
			<table id="dt_Table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Cast</th>
		               <th>Follow</th>
                 </tr>
            </thead>
            <tbody>

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
        "bLengthChange": false,
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('imdb/ajax_stars')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
            {
                "targets": [ -1 ], //last column
                "orderable": false, //set not orderable
            },
            {
                "targets": [ -2 ], //2 last column (photo)
                "orderable": false, //set not orderable
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

function save(odj, star_id)
{
    $(odj).attr('disabled',true); //change button text
    $.post( "<?php echo site_url('imdb/ajax_follow_stars')?>", { star_id: star_id }, function( data ) {
		alert(data.message);
		if(data.status==true){
		 reload_table();
		}

	}, "json");
}
</script>
