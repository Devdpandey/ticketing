
<?php $this->load->view('includes/header'); ?>
<div class="container">
	<h4 style="text-align:center">Payment</h4><a class="btn btn-primary" style="margin-bottom:10px;" href="<?php echo site_url().'movie';?>">Back to list</a>
	<div class="col-md-12 row">
		<div class="col-md-6">
		<h4>Are you sure to confirm booking for following ?</h4>
		<p><?php echo $slot['s_title']; ?></p>
		<p><?php echo $slot['s_date'].' '.$slot['s_time']; ?></p>
		<p> Seats :</p>
		<?php foreach($seats as $seat): ?>
				<a class="btn btn-info rounded-pill" href="#"><?php echo $seat;?></a>
		<?php endforeach; ?>
		</div>
		<div class="col-md-6">
			<a class="btn btn-success">Confirm</a>
			<a class="btn btn-danger">Cancel</a>
		</div>
	</div>
					
	
</div>
	<?php $this->load->view('includes/footer'); ?>
	
