    <h3>Customer Detail</h3>
    <button class="btn btn-success" onclick="add_customer()"><i class="glyphicon glyphicon-plus"></i> Add Customer</button>
    <br /><br />
	<div class="alert-msg"></div>
    <table id="table_id" class="table table-striped table-bordered">
      <thead>
        <tr>
			<th>Customer Name</th>
			<th>Phone</th>
			<th>City</th>
			<th>State</th>
			<th>Postal Code</th>
			<th>Country</th>
			<th style="width:125px;">Action</th>
        </tr>
      </thead>
      <tbody>
		<?php foreach($customers as $customer){?>
			<tr>				
				<td><?php echo $customer->customer_name;?></td>
				<td><?php echo $customer->phone;?></td>
				<td><?php echo $customer->city;?></td>
				<td><?php echo $customer->state;?></td>
				<td><?php echo $customer->postal_code;?></td>
				<td><?php echo $customer->country;?></td>
				<td>
					<button class="btn btn-warning" onclick="edit_customer(<?php echo $customer->customer_id;?>)"><i class="glyphicon glyphicon-pencil"></i></button>
					<button class="btn btn-danger" onclick="delete_customer(<?php echo $customer->customer_id;?>)"><i class="glyphicon glyphicon-remove"></i></button>
				</td>
				</tr>
		<?php }?>
      </tbody>			       
    </table>	

	<script type="text/javascript">
	var save_method; //for save method string
	var table;	 

	function add_customer()
	{
		save_method = 'add';
		$('#customer_form')[0].reset(); // reset form on modals
		$('#modal_form').modal('show'); // show bootstrap modal
		//$('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
	}

	function edit_customer(id)
	{
		save_method = 'update';
		$('#customer_form')[0].reset(); // reset form on modals

		//Ajax Load data from ajax
		$.ajax({
			url : "<?php echo site_url('customer/ajax_edit/')?>/" + id,
			type: "GET",
			dataType: "JSON",
			success: function(data)
			{  
				$('[name="customer_id"]').val(data.customer_id);
				$('[name="customer_name"]').val(data.customer_name);
				$('[name="phone"]').val(data.phone);
				$('[name="city"]').val(data.city);
				$('[name="state"]').val(data.state);
				$('[name="postal_code"]').val(data.postal_code);
				$('[name="country"]').val(data.country);   

				$('#modal_form').modal('show'); // show bootstrap modal when complete loaded
				$('.modal-title').text('Edit Customer'); // Set title to Bootstrap modal title		
			},
			error: function (jqXHR, textStatus, errorThrown)
			{
				alert('Error get data from ajax');
			}
		});
	}  

	function save()
	{
		var url;

		if(save_method == 'add')
		{
			url = "<?php echo site_url('customer/customer_add')?>";
		}
		else
		{
			url = "<?php echo site_url('customer/customer_update')?>";
		}

		// ajax adding data to database
		$.ajax({
			url : url,
			type: "POST",
			data: $('#customer_form').serialize(),
			dataType: "JSON",
			success: function(res)
			{  		           
				if(res.status == 'Success')
				{
					//if success close modal and reload ajax table
					$('#modal_form').modal('hide');
					localStorage.setItem("Status",'<div class="alert alert-success">'+res.msg+'</div>');					
					location.reload();// for reload a page
				}
				else
				{
					alert(res.msg.replace(/\\n/g,"\n"));
				}
			},
			error: function (jqXHR, textStatus, errorThrown)
			{
				alert('Error! Please try again');
			}
		});
	}

	function delete_customer(id)
	{
		if(confirm('Are you sure delete this data?'))
		{
			// ajax delete data from database
			$.ajax({
				url : "<?php echo site_url('customer/customer_delete')?>/"+id,
				type: "POST",
				dataType: "JSON",
				success: function(res)
				{   
					if(res.status == 'Success')
					{					
						localStorage.setItem("Status",'<div class="alert alert-success">'+res.msg+'</div>');											
					}
					else
					{
						localStorage.setItem("Status",'<div class="alert alert-danger">'+res.msg+'</div>');	
					}
					location.reload();
				},
				error: function (jqXHR, textStatus, errorThrown)
				{
					alert('Error! Please try again');
				}
			});	 
		}
	}	 
	</script>

	<!-- Bootstrap modal -->
	<div class="modal fade" id="modal_form" role="dialog">
	<div class="modal-dialog">
	<div class="modal-content">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h3 class="modal-title">Customer Form</h3>
	</div>
	<div class="modal-body form">
		<form action="#" id="customer_form" class="form-horizontal">
			<input type="hidden" value="" name="customer_id"/>
			<div class="form-body">
				<div class="form-group">
					<label class="control-label col-md-3">Customer Name</label>
					<div class="col-md-9">
						<input name="customer_name" placeholder="Customer Name" class="form-control" type="text"  />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3">Phone</label>
					<div class="col-md-9">
						<input name="phone" placeholder="Phone" class="form-control" type="text"   />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3">City</label>
					<div class="col-md-9">
						<input name="city" placeholder="City" class="form-control" type="text"   />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3">State</label>
					<div class="col-md-9">
						<input name="state" placeholder="State" class="form-control" type="text" /> 
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3">Postal Code</label>
					<div class="col-md-9">
						<input name="postal_code" placeholder="Postal Code" class="form-control" type="text" /> 
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3">Country</label>
					<div class="col-md-9">
						<input name="country" placeholder="Country" class="form-control" type="text" /> 
					</div>
				</div>	
			</div>
		</form>
		</div>

		<div class="modal-footer">
			<button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
			<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
		</div>
	</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<!-- End Bootstrap modal --> 


