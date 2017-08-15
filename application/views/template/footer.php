  </div>

  <script src="<?php echo base_url('assests/bootstrap/js/bootstrap.min.js')?>"></script>
  <script src="<?php echo base_url('assests/datatables/js/jquery.dataTables.min.js')?>"></script>
  <script src="<?php echo base_url('assests/datatables/js/dataTables.bootstrap.js')?>"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.14.0/jquery.validate.min.js"></script>
  <script>
	$(document).ready( function () {
		$('#table_id').DataTable({
			"pageLength": 5,
			"lengthMenu": [[5, 10, 15, 20], [5, 10, 15, 20]]
		});	
		if(localStorage.getItem("Status"))
		{
			$( "div.alert-msg" ).html(localStorage.getItem("Status"));
			localStorage.clear();
		}	
	});
	window.setTimeout(function() {
		$(".alert").fadeTo(500, 0).slideUp(500, function(){
			$(this).remove(); 
		});
	}, 4000);
  </script>
  </body>
</html>