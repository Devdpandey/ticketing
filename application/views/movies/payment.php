<?php $this->load->view('includes/header'); ?>
<div class="container">
	<h4 style="text-align:center">Payment</h4><a class="btn btn-primary" style="margin-bottom:10px;" href="<?php echo site_url() . 'movie'; ?>">Back to list</a>
	<div class="col-md-12 row">
		<div class="col-md-6">
			<h4>Are you sure to confirm booking for following ?</h4>
			<p><?php echo $slot['s_title']; ?></p>
			<p><?php echo $slot['s_date'] . ' ' . $slot['s_time']; ?></p>
			<p> Seats :</p>
			<?php foreach ($seats as $seat) : ?>
				<a class="btn btn-info rounded-pill" href="#"><?php echo $seat; ?></a>
			<?php endforeach; ?>
		</div>
		<div class="col-md-6">
			<div class="countdownmsg" style="color:red"></div>
			<div class="countdown" style="color:red"></div>
			<a data-status="complete" class="btn btn-success process_btn">Confirm</a>
			<a data-status="cancel" class="btn btn-danger process_btn">Cancel</a>
		</div>
		<form method="POST" id="payment_form" action="<?php echo site_url('complete-bookings') ?>">
			<?php foreach ($booking_ids as $booking_id) : ?>
				<input type="hidden" name="booking_id[]" value="<?php echo $booking_id; ?>">
			<?php endforeach; ?>
			<input type="hidden" name="status" id="booking_status" value="">
		</form>
	</div>


</div>

<script>
	$(".countdownmsg").html("You have only 1 minute(s) to complete your booking! ");
	$(".countdown").timer({
		duration: '60',
		format: '%M:%S',
		callback: function() {
			Swal.fire(
				'Expired',
				'Your booking time has expired!',
				'error'
			);
			$('#booking_status').val('cancel');
			$("#payment_form").submit();
		}
	});

	$('.process_btn').on("click", function(e) {
		$('#booking_status').val($(this).attr('data-status'));
		$("#payment_form").submit();
	});
</script>
<?php $this->load->view('includes/footer'); ?>