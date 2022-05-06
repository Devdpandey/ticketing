<?php $this->load->view('includes/header'); ?>
<div class="container">
	<h6><a class="btn btn-primary float-right" style="margin-bottom:10px;" href="<?php echo base_url(); ?>">Back to event list</a></h6>
	<form method="POST" id="event_form" action="<?php echo base_url('/form/' . $id); ?>">
		<input type="hidden" name="id" value="<?php echo $id;  ?>">
		<div class="form-group">
			<label for="event name">Event Name</label>
			<input type="text" required class="form-control" name="e_event_name" value="<?php echo $e_event_name; ?>" id="e_event_name" placeholder="Enter event name">
		</div>
		<div class="form-group">
			<label for="event name">Event Description</label>
			<textarea name="e_event_description" class="form-control" rows="5" cols="10"><?php echo $e_event_description; ?></textarea>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="event name">Event Date</label>
					<input readonly type="text" class="form-control datepicker" value="<?php echo $e_event_date; ?>" name="e_event_date" id="e_event_date" placeholder="">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="event name">Event Time</label>
					<input readonly type="text" class="form-control timepicker" value="<?php echo $e_event_time; ?>" name="e_event_time" id="e_event_time" placeholder="">
				</div>
			</div>
		</div>
		<input type="submit" name="save" id="submit_event" value="save" class="btn btn-primary float-right">
	</form>
</div>
<?php $this->load->view('includes/footer'); ?>