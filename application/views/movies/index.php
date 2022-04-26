
<?php $this->load->view('includes/header'); ?>
<div class="container">
	<h4 style="text-align:center">Now showing!</h4>
	<div id="body">
		<div class="row col-md-12">
			<?php foreach($movies as $movie): ?>
			<div class="card" style="width: 18rem; margin:10px;">
				<img class="card-img-top" style="height:150px;width:auto" src="<?php echo $movie['m_thumbnail'] ?>" alt="Card image cap">
				<div class="card-body">
					<h5 class="card-title"><?php echo $movie['m_title'] ?></h5>
					<a href="<?php echo site_url('/movie/slots/'.$movie['id']); ?>" class="btn btn-success">View shows</a>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>
<?php $this->load->view('includes/footer'); ?>
	
