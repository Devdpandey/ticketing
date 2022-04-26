</body>

<script>
	<?php if($this->session->flashdata('success')): ?>
		toastr.success("<?php echo $this->session->flashdata('success'); ?>");
	<?php elseif($this->session->flashdata('error')): ?>
		toastr.error("<?php echo $this->session->flashdata('error'); ?>");
	<?php endif;
		  if(form_error('e_event_name')): ?>
		  toastr.error("<?php echo form_error('e_event_name'); ?>")
	<?php elseif(form_error('e_event_date')): ?>
		toastr.error("<?php echo form_error('e_event_date'); ?>");
	<?php endif; ?>
    
    $( document ).ready(function() {

		$('.datepicker').datepicker({
			dateFormat: "yy-mm-dd"
		});

		$('.timepicker').timepicker({
			timeFormat: 'h:mm p',
			interval: 60,
			minTime: '10',
			maxTime: '11:00pm',
			startTime: '12:00am',
			dynamic: true,
			dropdown: true,
			scrollbar: true
		});

		$("#e_event_name").keypress(function (e) {
			var keyCode = e.keyCode || e.which;
			//Regex for Valid Characters i.e. Alphabets and Numbers.
			var regex = /^[A-Za-z0-9 ]+$/;
			//Validate TextBox value against the Regex.
			var isValid = regex.test(String.fromCharCode(keyCode));
			if (!isValid) {
				toastr.error("Only Alphabets and Numbers allowed.");
			}
			return isValid;
		});
    	
		$('#submit_event').click(function(e) {
			e.preventDefault();
			if($('#e_event_name').val().trim() == ''){
				toastr.error("Event name is mandatory !");
			}
			else if($('#e_event_date').val() == ''){
				toastr.error("Event date is mandatory !");
			}
			else{
				$('#event_form').submit();
			}
		});

		$('.delete').click(function(e) {
			e.preventDefault();
			var url = $(this).attr('href');
			var row = $(this).parents("tr");
			console.log(url);
			Swal.fire({
                title: 'Are you sure?',
                text: "This will delete the event.Do you want to continue?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, continue!'
			}).then((result) => {
				if (result.value) {
					$.ajax({
					type:'delete',
					url: url
					}).done(function(response){
						if(response.status == true){
							row.remove();
							toastr.success(response.message, 'Success Alert', {timeOut: 5000});
						} else {
							toastr.error(response.message, 'Failed Alert', {timeOut: 5000});	
						}
					});
				}
			});
		});
	})

</script>
</html>