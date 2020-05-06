<section>
<div class="album py-5 bg-light">
		<div class="container">
			<a href="#" class="hit">ร้านดังติดดาว</a>

			<div class="row">
				<?php
				foreach ($restaurants as $restaurant) {
				?>
					<div class="col-md-3">
						<a href="<?php echo base_url(); ?>index.php/main/test/<?php echo $restaurant['restaurant_id']; ?>">
							<div class="card mb-4 box-shadow">
								<img class="card-img-top" src="<?php echo $restaurant['restaurant_img']; ?>" alt="Card image cap" height="200px">
								<div class="card-body">
									<p class="card-text restaurant"> <?php echo $restaurant['restaurant_name']; ?></p>
								</div>
							</div>
						</a>
					</div>
				<?php
				}
				?>
			</div>

			<a href="<?php echo base_url();?>index.php/main/test" class="hit">โปรโมชั่นสาดความอร่อย!!</a>

			<div class="row">
				<?php
				foreach ($restaurants as $restaurant) {
				?>
					<div class="col-md-3">
						<a href="#">
							<div class="card mb-4 box-shadow">
								<img class="card-img-top" src="<?php echo $restaurant['restaurant_img']; ?>" alt="Card image cap" height="202px">
								<div class="card-body">
									<p class="card-text restaurant"> <?php echo $restaurant['restaurant_name']; ?></p>
									
								</div>
							</div>
						</a>
					</div>
				<?php
				}
				?>

			</div>
		</div>


</section>
	