
<?php $this->load->view('includes/header'); ?>
<div class="container">
	<h4>All Events!</h4>
	<a class="btn btn-primary float-right" style="margin-bottom:10px;" href="<?php echo base_url('/form'); ?>">Add Event</a>

	<div id="body">
		<table class="table table-bordered">
			<thead>
				<th>Event Name</th>
				<th>Event Description</th>
				<th>Event Date</th>
				<th>Event Time</th>
				<th>Action</th>
			</thead>
			<tbody >
		<?php foreach ($events as $key => $event): ?>
			<tr>
				<td><?php echo $event['e_event_name']; ?></td>
				<td><?php echo $event['e_event_description']; ?></td>
				<td><?php echo $event['e_event_date']; ?></td>
				<td><?php echo $event['e_event_time']; ?></td>
				<td>
					<a class="btn btn-primary" href="<?php echo site_url('event/form/'.$event['id']) ?>">EDIT</a> |
					<a class="btn btn-danger delete"  href="<?php echo site_url('event/delete/'.$event['id']) ?>">DELETE</a>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
		</table>
	</div>
</div>
<?php $this->load->view('includes/footer'); ?>
	
