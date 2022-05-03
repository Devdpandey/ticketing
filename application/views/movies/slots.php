
<?php $this->load->view('includes/header'); ?>
<div class="container">
	<h2 style="text-align:center;margin-top: 5%;">Available slots for <?php echo $movie_detail['m_title'] ?></h2><a class="btn btn-primary" style="margin-bottom:10px;" href="<?php echo site_url().'movie';?>">Back to list</a>
	<div id="body">
		<fieldset>
			<legend style="display: block; padding-left: 2px; padding-right: 2px; border: none;">Available slots for "<?php echo $movie_detail['m_title'] ?>":</legend>
			<div class="row col-md-12">
					<div class="col-md-6" style="text-align:left">
						<img style="height:200px; width:auto" src="<?php echo $movie_detail['m_thumbnail'] ?>"/>
						<p>Duration: <?php echo $movie_detail['m_duration'];?><br>
						Description: <?php echo $movie_detail['m_short_description'];?></p>
						<?php foreach($slots as $slot): ?>
							<a class="btn btn-success rounded-pill" href="<?php echo site_url().'movie/book/'.$this->uri->segment(3).'/'.$slot['id']; ?>"><?php echo $slot['s_time'];?></a>
						<?php endforeach; ?>
					</div>
					<div class="col-md-6"  style="text-align:right">
					<h3>Watch Trailer</h3>
						<iframe height="200px" widht="auto" src="<?php echo $movie_detail['m_trailer'];?>"></iframe>
					</div>
				</div>
		</fieldset>
	</div>
</div>
	<?php $this->load->view('includes/footer'); ?>
	
