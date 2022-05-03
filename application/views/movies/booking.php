
<?php $this->load->view('includes/header'); ?>


<div class="container">
<a class="btn btn-primary" style="margin-bottom:10px;" href="<?php echo site_url().'movie';?>">Back to list</a>
<h5 style="text-align:center">Choose seats for <?php echo $slot['s_title']; ?></h5>
<h6><?php echo $slot['s_date'].' '.$slot['s_time']; ?></h6>
    <ul class="showcase">
        <li>
            <div class="seat"></div>
            <small>Available</small>
        </li>
        <li>
            <div class="seat selectedindex"></div>
            <small>Selected</small>
        </li>
        <li>
            <div class="seat occupied"></div>
            <small>Booked</small>
        </li>

    </ul>
	<div class="screen"><h3>SCREEN</h3></div>
	<div class="seatrow">
			<div class="row">
				<div id="seat_1" class="seat"></div>
				<div id="seat_2" class="seat"></div>
				<div id="seat_3" class="seat"></div>
				<div id="seat_4" class="seat"></div>
				<div id="seat_5" class="seat"></div>
				<div id="seat_6" class="seat"></div>
				<div id="seat_7" class="seat"></div>
				<div id="seat_8" class="seat"></div>
				<div id="seat_9" class="seat"></div>
				<div id="seat_10" class="seat"></div>
			</div>
			<div class="row">
				<div id="seat_11" class="seat"></div>
				<div id="seat_12" class="seat"></div>
				<div id="seat_13" class="seat"></div>
				<div id="seat_14" class="seat"></div>
				<div id="seat_15" class="seat"></div>
				<div id="seat_16" class="seat"></div>
				<div id="seat_17" class="seat"></div>
				<div id="seat_18" class="seat"></div>
				<div id="seat_19" class="seat"></div>
				<div id="seat_20" class="seat"></div>
			</div>
			<div class="row">
				<div id="seat_21" class="seat"></div>
				<div id="seat_22" class="seat"></div>
				<div id="seat_23" class="seat"></div>
				<div id="seat_24" class="seat"></div>
				<div id="seat_25" class="seat"></div>
				<div id="seat_26" class="seat"></div>
				<div id="seat_27" class="seat"></div>
				<div id="seat_28" class="seat"></div>
				<div id="seat_29" class="seat"></div>
				<div id="seat_30" class="seat"></div>
			</div>
			<div class="row">
				<div id="seat_31" class="seat"></div>
				<div id="seat_32" class="seat"></div>
				<div id="seat_33" class="seat"></div>
				<div id="seat_34" class="seat"></div>
				<div id="seat_35" class="seat"></div>
				<div id="seat_36" class="seat"></div>
				<div id="seat_37" class="seat"></div>
				<div id="seat_38" class="seat"></div>
				<div id="seat_39" class="seat"></div>
				<div id="seat_40" class="seat"></div>
			</div>
			<div class="row">
				<div id="seat_41" class="seat"></div>
				<div id="seat_42" class="seat"></div>
				<div id="seat_43" class="seat"></div>
				<div id="seat_44" class="seat"></div>
				<div id="seat_45" class="seat"></div>
				<div id="seat_46" class="seat"></div>
				<div id="seat_47" class="seat"></div>
				<div id="seat_48" class="seat"></div>
				<div id="seat_49" class="seat"></div>
				<div id="seat_50" class="seat"></div>
			</div>
	</div>
</div>
<br>
<p class="text">You have selected <span id="seatsSelected">0</span> seats for the price of Rs <span id="totalPrice">0</span></p>
<a id ="confirm_booking" style="display:none" class="btn btn-success" style="margin-bottom:10px;" href="#">Confirm Booking</a>
<form method ="POST" id="seat_details_form" action ="<?php echo site_url('movie/payment/') ?>">
<input type ="hidden" name="slot_id" value="<?php echo $id;?>">
<input type ="hidden" name="movie_id" value="<?php echo $movie_id;?>">
<div id="booked_seats"></div>
</form>
<style>
@import url('https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap');

* {
	box-sizing: border-box;
}

* {
	user-select: none;
	-khtml-user-select: none;
	-o-user-select: none;
	-moz-user-select: -moz-none;
	-webkit-user-select: none;
}

::selection {
	background: transparent;
	color: inherit;
}
::-moz-selection {
	background: transparent;
	color: inherit;
}

body {
	background-color: #e5e7e9;
	display: flex;
	flex-direction: column;
	align-items: center;
	justify-content: center;
	height: 75vh;
	color: #000;
	margin: 0;
}

.showcase {
	border-radius: 7px;
	display: flex;
	padding: 15px;
	background-color: rgb(120 118 118 / 50%);
	list-style: none;
	font-weight: 500;
	margin: 20px 0;
	color: #000;
}

.seatrow{
	padding-left: 30px;
	width: 100%;
	text-align:center
}
.showcase li {
	margin: 0 32px;
    align-items: center;
    display: flex;
    gap: 5px;
    font-size: 18px;
}

.showcase li small {
	margin-left: 3px;
}

.seat {
	height: 45px;
	width: 45px;
	background-color: #777;
	display: inline-block;
	border-top-left-radius: 8px;
	border-top-right-radius: 8px;
}

.seat.selected {
	background-color: rgb(36 124 43);
}
.seat.selectedindex {
	background-color: rgb(36 124 43);
}

.seat.occupied {
	background-color: #d70d0d;
}

.container {
	width: 600px;
	perspective: 1000px;
	text-align:center;
}

.container .screen {
	width: 100%;
	/* height: 50px; */
	background-color: #cb7226;
	-webkit-box-shadow: 0px 0px 7px 0px rgba(255, 255, 255, 1);
	-moz-box-shadow: 0px 0px 7px 0px rgba(255, 255, 255, 1);
	box-shadow: 0px 0px 7px 0px rgba(255, 255, 255, 1);
	margin: 10px 0;
}

.row .seat:nth-of-type(2) {
	margin-right: 10px;
}

.row .seat:nth-last-of-type(2) {
	margin-left: 10px;
}

.container .seat {
	margin-left: 5px;
	margin-bottom: 5px;
}

.container .seat:not(.occupied):hover {
	transform: scale(1.2);
	cursor: pointer;
}

.text span {
	color: rgb(115, 115, 253);
}

</style>
<script>
	$(document).ready(function(){
		const movieprice = "<?php echo $slot['s_seat_price']; ?>";
		const seatsSelected = document.getElementById('seatsSelected');
		const totalPrice = document.getElementById('totalPrice');
		const container = document.querySelector('.container');

		const updatePrice = () => {
		const selectedSeats = document.querySelectorAll(
			'.container .seat.selected:not(.occupied)'
		);
		const selectedSeatsCount = selectedSeats.length;

		totalPrice.innerText = selectedSeatsCount * +movieprice;
		seatsSelected.innerText = selectedSeatsCount;
		};

		const selectSeat = (seat) => {
		seat.classList.toggle('selected');
		updatePrice();
		var selectedSeats = $('.selected').length;
		console.log(selectedSeats);
		if (selectedSeats>0){
			$('#confirm_booking').show();
		}
		if(selectedSeats<1){
			$('#confirm_booking').hide();
		}
		};

		container.addEventListener('click', (e) => {
		e.preventDefault();
		if (
			e.target.classList.contains('seat') &&
			!e.target.classList.contains('occupied')
		) {
			selectSeat(e.target);
		}
		});

		var bookeddetails = JSON.parse('<?php echo $bookings;?>');
		for (var i = 0; i < bookeddetails.length; i++) {
				$('#'+bookeddetails[i]['b_seat_id']).addClass('occupied');
				console.log('the id is'+bookeddetails[i]['b_seat_id']);
		}

		$('#confirm_booking').on("click", function(e) {
			var booking_check_status = 'success';
			var selectedSeats = $('.selected').length;
			var ids = $('.selected').map(function() {
				if($(this).attr('id')){
					return $(this).attr('id');
				}
			});
			var seat_id = ids.toArray();
			if(seat_id){
			$.ajax({
			url: '/check-bookings',
			type: 'POST',
			data: {slot_id: "<?php echo $id;?>", seat: seat_id},
			error: function(response) {
				alert('some error occured while processing your request ! please try again later')
			},
			success: function(response) {
				if(response.status==false){
					toastr.error(response.message, 'Booking Failed!', {timeOut: 7000});
					booking_check_status = 'failed';
				} 
			}
			});
			$('#booked_seats').append('<input type="hidden" name="seats" value="'+seat_id+'" >');
			}

			$(document).ajaxStop(function() {
				if(booking_check_status=='success'){
				$("#seat_details_form").submit();
				}
			});	 
			
		});
	});
</script>
<?php $this->load->view('includes/footer'); ?>
	
