<?php 
	include("connect.php");

	//Get All Categories From Database
	$categories_query = "SELECT category, image FROM categories";
	$categories_result = $con->query($categories_query);
	$categories_error = false;

	if ($categories_result->num_rows < 1) {
		$categories_error = true;
	} else {
		$categories_error = false;
	}

	//Get All Products From Database
	$products_query = "SELECT merchandise.seller AS vendor_id, first_name, last_name, 
							  merchandise.merch_id AS product_id, name, description, 
							  categories.category AS category, color, size, price, `condition` as quality, 
							  merchandise.gender AS gender, age_group, gallery.image as image 
					    FROM merchandise, gallery, categories, users 
						WHERE gallery.seller = merchandise.seller 
						AND merchandise.category = categories.id 
						AND gallery.merch_id = merchandise.merch_id
						AND users.phone = merchandise.seller
						AND user_type = 'customer'";
	$products_result = $con->query($products_query);
	$products_error = false;

	if ($products_result->num_rows < 1) {
		$products_error = true;
	} else {
		$products_error = false;
	}

	//Get All Vendors From Database
	$vendors_query = "SELECT phone, first_name, last_name, photo 
					  FROM users 
					  WHERE user_type = 'customer'";
	$vendors_result = $con->query($vendors_query);
	$vendors_error = false;

	if ($vendors_result->num_rows < 1) {
		$vendors_error = true;
	} else {
		$vendors_error = false;
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Dobhapp - Welcome</title>
		<meta content="width=device-width, initial-scale=1.0" name="viewport" />
		<!-- <meta content="Free HTML Templates" name="keywords" />
		<meta content="Free HTML Templates" name="description" /> -->

		<!-- Favicon -->
		<link href="img/dobhapp.ico" rel="icon" />

		<!-- Google Web Fonts -->
		<link rel="preconnect" href="https://fonts.gstatic.com" />
		<link
			href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap"
			rel="stylesheet"
		/>

		<!-- Font Awesome -->
		<link
			href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css"
			rel="stylesheet"
		/>

		<!-- Libraries Stylesheet -->
		<link href="lib/animate/animate.min.css" rel="stylesheet" />
		<link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />

		<!-- Customized Bootstrap Stylesheet -->
		<link href="css/style.css" rel="stylesheet" />
	</head>

	<body>
		<!-- Topbar Start -->
		<div class="container-fluid">
			<div class="row bg-light py-1 px-xl-5">
				<div class="col-lg-6 d-none d-lg-block">
					<div class="d-inline-flex align-items-center h-100">
						<a class="text-body mr-3" href="">About</a>
						<a class="text-body mr-3" href="">Contact</a>
						<a class="text-body mr-3" href="">Help</a>
						<a class="text-body mr-3" href="">FAQs</a>
					</div>
				</div>
				<div class="col-lg-6 text-center text-lg-right">
					<div class="d-inline-flex align-items-center">
						<div class="btn-group">
							<button
								type="button"
								class="btn btn-sm btn-light dropdown-toggle"
								data-toggle="dropdown"
							>
								My Account
							</button>
							<div class="dropdown-menu dropdown-menu-right">
								<button class="dropdown-item" type="button">Sign in</button>
								<button class="dropdown-item" type="button">Sign up</button>
							</div>
						</div>
						<div class="btn-group mx-2">
							<button
								type="button"
								class="btn btn-sm btn-light dropdown-toggle"
								data-toggle="dropdown"
							>
								USD
							</button>
							<div class="dropdown-menu dropdown-menu-right">
								<button class="dropdown-item" type="button">EUR</button>
								<button class="dropdown-item" type="button">GBP</button>
								<button class="dropdown-item" type="button">CAD</button>
							</div>
						</div>
						<div class="btn-group">
							<button
								type="button"
								class="btn btn-sm btn-light dropdown-toggle"
								data-toggle="dropdown"
							>
								EN
							</button>
							<div class="dropdown-menu dropdown-menu-right">
								<button class="dropdown-item" type="button">FR</button>
								<button class="dropdown-item" type="button">AR</button>
								<button class="dropdown-item" type="button">RU</button>
							</div>
						</div>
					</div>
					<div class="d-inline-flex align-items-center d-block d-lg-none">
						<a href="" class="btn px-0 ml-2">
							<i class="fas fa-heart text-dark"></i>
							<span
								class="badge text-dark border border-dark rounded-circle"
								style="padding-bottom: 2px"
								>0</span
							>
						</a>
						<a href="" class="btn px-0 ml-2">
							<i class="fas fa-shopping-cart text-dark"></i>
							<span
								class="badge text-dark border border-dark rounded-circle"
								style="padding-bottom: 2px"
								>0</span
							>
						</a>
					</div>
				</div>
			</div>
			<div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
				<div class="col-lg-4">
					<a href="" class="text-decoration-none">
						<span class="h1 text-uppercase px-2" style="background-color: #041C1C; color: #88D5D7;"> Dobh </span>
						<span class="h1 text-uppercase px-2 ml-n1" style="color: #041C1C; background-color: #88D5D7;"> App </span>
					</a>
				</div>
				<div class="col-lg-4 col-6 text-left">
					<form action="">
						<div class="input-group">
							<input
								type="text"
								class="form-control"
								placeholder="Search for products"
							/>
							<div class="input-group-append">
								<span class="input-group-text bg-transparent text-primary">
									<i class="fa fa-search"></i>
								</span>
							</div>
						</div>
					</form>
				</div>
				<div class="col-lg-4 col-6 text-right">
					<p class="m-0">Customer Service </p>
					<h5 class="m-0">+012 345 6789</h5>
				</div>
			</div>
		</div>
		<!-- Topbar End -->

		<!-- Navbar Start -->
		<div class="container-fluid bg-dark mb-30">
			<div class="row px-xl-5">
				<div class="col-lg-3 d-none d-lg-block">
					<a
						class="btn d-flex align-items-center justify-content-between w-100"
						data-toggle="collapse"
						href="#navbar-vertical"
						style="height: 65px; padding: 0 30px; background-color: #88D5D7;"
					>
						<h6 class="text-dark m-0"><i class="fa fa-bars mr-2"></i>Categories</h6>
						<i class="fa fa-angle-down text-dark"></i>
					</a>
					<nav
						class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light"
						id="navbar-vertical"
						style="width: calc(100% - 30px); z-index: 999"
					>
						<div class="navbar-nav w-100">							
							<?php
								if ($categories_error) {
							?>
								<a href="" class="nav-item nav-link">No Categories To Show</a>
							<?php } else {
								while ($category = $categories_result->fetch_assoc()) {
							?>
								<a href="" class="nav-item nav-link"><?= $category["category"] ?></a>								
							<?php }} ?>				
						</div>
					</nav>
				</div>
				<div class="col-lg-9">
					<nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
						<a href="" class="text-decoration-none d-block d-lg-none">
							<span class="h1 text-uppercase text-dark bg-light px-2">Dobh</span>
							<span class="h1 text-uppercase text-light bg-primary px-2 ml-n1"
								>App</span
							>
						</a>
						<button
							type="button"
							class="navbar-toggler"
							data-toggle="collapse"
							data-target="#navbarCollapse"
						>
							<span class="navbar-toggler-icon"></span>
						</button>
						<div
							class="collapse navbar-collapse justify-content-between"
							id="navbarCollapse"
						>
							<div class="navbar-nav mr-auto py-0">
								<a href="index.html" class="nav-item nav-link active">Home</a>
								<a href="shop.html" class="nav-item nav-link">Shop</a>
								<a href="detail.html" class="nav-item nav-link">Shop Detail</a>
								<div class="nav-item dropdown">
									<a
										href="#"
										class="nav-link dropdown-toggle"
										data-toggle="dropdown"
										>Pages <i class="fa fa-angle-down mt-1"></i
									></a>
									<div class="dropdown-menu bg-primary rounded-0 border-0 m-0">
										<a href="cart.html" class="dropdown-item">Shopping Cart</a>
										<a href="checkout.html" class="dropdown-item">Checkout</a>
									</div>
								</div>
								<a href="contact.html" class="nav-item nav-link">Contact</a>
							</div>
							<div class="navbar-nav ml-auto py-0 d-none d-lg-block">
								<a href="" class="btn px-0">
									<i class="fas fa-heart text-primary"></i>
									<span
										class="badge text-secondary border border-secondary rounded-circle"
										style="padding-bottom: 2px"
										>0</span
									>
								</a>
								<a href="" class="btn px-0 ml-3">
									<i class="fas fa-shopping-cart text-primary"></i>
									<span
										class="badge text-secondary border border-secondary rounded-circle"
										style="padding-bottom: 2px"
										>0</span
									>
								</a>
							</div>
						</div>
					</nav>
				</div>
			</div>
		</div>
		<!-- Navbar End -->

		<!-- Carousel Start -->
		<div class="container-fluid mb-3">
			<div class="row px-xl-5">
				<div class="col-lg-8">
					<div
						id="header-carousel"
						class="carousel slide carousel-fade mb-30 mb-lg-0"
						data-ride="carousel"
					>
						<ol class="carousel-indicators">
							<li
								data-target="#header-carousel"
								data-slide-to="0"
								class="active"
							></li>
							<li data-target="#header-carousel" data-slide-to="1"></li>
							<li data-target="#header-carousel" data-slide-to="2"></li>
						</ol>
						<div class="carousel-inner">
							<div
								class="carousel-item position-relative active"
								style="height: 430px"
							>
								<img
									class="position-absolute w-100 h-100"
									src="img/carousel-1.jpg"
									style="object-fit: cover"
								/>
								<div
									class="carousel-caption d-flex flex-column align-items-center justify-content-center"
								>
									<div class="p-3" style="max-width: 700px">
										<h1
											class="display-4 text-white mb-3 animate__animated animate__fadeInDown"
										>
											Men Fashion
										</h1>
										<p class="mx-md-5 px-5 animate__animated animate__bounceIn">
											Lorem rebum magna amet lorem magna erat diam stet.
											Sadips duo stet amet amet ndiam elitr ipsum diam
										</p>
										<a
											class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp"
											href="#"
											>Shop Now</a
										>
									</div>
								</div>
							</div>
							<div class="carousel-item position-relative" style="height: 430px">
								<img
									class="position-absolute w-100 h-100"
									src="img/carousel-2.jpg"
									style="object-fit: cover"
								/>
								<div
									class="carousel-caption d-flex flex-column align-items-center justify-content-center"
								>
									<div class="p-3" style="max-width: 700px">
										<h1
											class="display-4 text-white mb-3 animate__animated animate__fadeInDown"
										>
											Women Fashion
										</h1>
										<p class="mx-md-5 px-5 animate__animated animate__bounceIn">
											Lorem rebum magna amet lorem magna erat diam stet.
											Sadips duo stet amet amet ndiam elitr ipsum diam
										</p>
										<a
											class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp"
											href="#"
											>Shop Now</a
										>
									</div>
								</div>
							</div>
							<div class="carousel-item position-relative" style="height: 430px">
								<img
									class="position-absolute w-100 h-100"
									src="img/carousel-3.jpg"
									style="object-fit: cover"
								/>
								<div
									class="carousel-caption d-flex flex-column align-items-center justify-content-center"
								>
									<div class="p-3" style="max-width: 700px">
										<h1
											class="display-4 text-white mb-3 animate__animated animate__fadeInDown"
										>
											Kids Fashion
										</h1>
										<p class="mx-md-5 px-5 animate__animated animate__bounceIn">
											Lorem rebum magna amet lorem magna erat diam stet.
											Sadips duo stet amet amet ndiam elitr ipsum diam
										</p>
										<a
											class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp"
											href="#"
											>Shop Now</a
										>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="product-offer mb-30" style="height: 200px">
						<img class="img-fluid" src="img/offer-1.jpg" alt="" />
						<div class="offer-text">
							<h6 class="text-white text-uppercase">Save 20%</h6>
							<h3 class="text-white mb-3">Special Offer</h3>
							<a href="" class="btn btn-primary">Shop Now</a>
						</div>
					</div>
					<div class="product-offer mb-30" style="height: 200px">
						<img class="img-fluid" src="img/offer-2.jpg" alt="" />
						<div class="offer-text">
							<h6 class="text-white text-uppercase">Save 20%</h6>
							<h3 class="text-white mb-3">Special Offer</h3>
							<a href="" class="btn btn-primary">Shop Now</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Carousel End -->

		<!-- Featured Start -->
		<div class="container-fluid pt-5">
			<div class="row px-xl-5 pb-3">
				<div class="col-lg-3 col-md-6 col-sm-12 pb-1">
					<div class="d-flex align-items-center bg-light mb-4" style="padding: 30px">
						<h1 class="fa fa-check text-primary m-0 mr-3"></h1>
						<h5 class="font-weight-semi-bold m-0">Quality Product</h5>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-12 pb-1">
					<div class="d-flex align-items-center bg-light mb-4" style="padding: 30px">
						<h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
						<h5 class="font-weight-semi-bold m-0">Free Shipping</h5>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-12 pb-1">
					<div class="d-flex align-items-center bg-light mb-4" style="padding: 30px">
						<h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
						<h5 class="font-weight-semi-bold m-0">14-Day Return</h5>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-12 pb-1">
					<div class="d-flex align-items-center bg-light mb-4" style="padding: 30px">
						<h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
						<h5 class="font-weight-semi-bold m-0">24/7 Support</h5>
					</div>
				</div>
			</div>
		</div>
		<!-- Featured End -->

		<!-- Categories Start -->
		<div class="container-fluid pt-5">
			<h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4">
				<span class="bg-secondary pr-3">Categories</span>
			</h2>
			<div class="row px-xl-5 pb-3">
				<?php 
					if ($categories_error) {
						echo "<h1>No Categories To Show</h1>";
					} else {
						for($i = 0; $i < $categories_result->num_rows; $i++) {
							$categories_result->data_seek($i);
							$all_categories = $categories_result->fetch_assoc();
				?>
							<div class="col-lg-3 col-md-4 col-sm-6 pb-1">
								<a class="text-decoration-none" href="">
									<div class="cat-item img-zoom d-flex align-items-center mb-4">
										<div class="overflow-hidden" style="width: 100px; height: 100px">
											<img class="img-fluid" src=<?= $all_categories["image"] ?> alt="<?= $all_categories["category"] ?>" />
										</div>
										<div class="flex-fill pl-3">
											<h6><?= $all_categories["category"] ?></h6>
											<small class="text-body">100 Products</small>
										</div>
									</div>
								</a>
							</div>
				<?php }} ?>				
			</div>
		</div>
		<!-- Categories End -->

		<!-- Products Start -->
		<div class="container-fluid pt-5 pb-3">
			<h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4">
				<span class="bg-secondary pr-3">Featured Products</span>
			</h2>
			<div class="row px-xl-5">
				<?php 
					if ($products_error) {
						echo "<h1>No Products To Show</h1>";
					} else {
						for ($i=0; $i < $products_result->num_rows; $i++) { 
							$products_result->data_seek($i);
							$products = $products_result->fetch_assoc();
				?>
						<div class="col-lg-3 col-md-4 col-sm-6 pb-1">
							<div class="product-item bg-light mb-4">
								<div class="product-img position-relative overflow-hidden">
									<img class="img-fluid w-100" style="height: 300px;" src=<?= $products["image"] ?> alt="<?= $products["name"] ?>" />
									<div class="product-action">
										<a class="btn btn-outline-dark btn-square" href=""
											><i class="fa fa-shopping-cart"></i
										></a>
										<a class="btn btn-outline-dark btn-square" href=""
											><i class="far fa-heart"></i
										></a>
										<a class="btn btn-outline-dark btn-square" href=""
											><i class="fa fa-sync-alt"></i
										></a>
										<a class="btn btn-outline-dark btn-square" href=""
											><i class="fa fa-search"></i
										></a>
									</div>
								</div>
								<div class="text-center py-4">
									<a class="h6 text-decoration-none text-truncate" href=""><?= $products["name"] ?></a>
									<h6 style="color: #88D5D7;"> <?= $products["first_name"] ?> <?= $products["last_name"] ?> </h6>
									<div class="d-flex align-items-center justify-content-center mt-2">
										<h5>E<?= number_format((float)$products["price"], 2, '.', '') ?></h5>
										<h6 class="text-muted ml-2"><del><?= number_format((float)$products["price"], 2, '.', '') ?></del></h6>
									</div>
									<div class="d-flex align-items-center justify-content-center mb-1">
										<?php 
											for ($j=0; $j < ceil((float)$products["quality"]); $j++) { 
												if((fmod((float)$products["quality"], 1) !== 0.00) && ($j == ceil((float)$products["quality"]) - 1)) {
										?>	
													<small class="fa fa-star-half-alt text-primary mr-1"></small>
										  <?php } else { ?>
													<small class="fa fa-star text-primary mr-1"></small>
										<?php }} ?>
										<small>(99)</small>
									</div>
								</div>
							</div>
						</div>
				<?php }}	?>	
			</div>
		</div>
		<!-- Products End -->

		<!-- Offer Start -->
		<div class="container-fluid pt-5 pb-3">
			<div class="row px-xl-5">
				<div class="col-md-6">
					<div class="product-offer mb-30" style="height: 300px">
						<img class="img-fluid" src="img/offer-1.jpg" alt="" />
						<div class="offer-text">
							<h6 class="text-white text-uppercase">Save 20%</h6>
							<h3 class="text-white mb-3">Special Offer</h3>
							<a href="" class="btn btn-primary">Shop Now</a>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="product-offer mb-30" style="height: 300px">
						<img class="img-fluid" src="img/offer-2.jpg" alt="" />
						<div class="offer-text">
							<h6 class="text-white text-uppercase">Save 20%</h6>
							<h3 class="text-white mb-3">Special Offer</h3>
							<a href="" class="btn btn-primary">Shop Now</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Offer End -->

		<!-- Products Start -->
		<div class="container-fluid pt-5 pb-3">
			<h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4">
				<span class="bg-secondary pr-3">Recent Products</span>
			</h2>
			<div class="row px-xl-5">
			<?php 
					if ($products_error) {
						echo "<h1>No Products To Show</h1>";
					} else {
						for ($i=0; $i < $products_result->num_rows; $i++) { 
							$products_result->data_seek($i);
							$products = $products_result->fetch_assoc();
				?>
						<div class="col-lg-3 col-md-4 col-sm-6 pb-1">
							<div class="product-item bg-light mb-4">
								<div class="product-img position-relative overflow-hidden">
									<img class="img-fluid w-100" style="height: 300px;" src=<?= $products["image"] ?> alt="<?= $products["name"] ?>" />
									<div class="product-action">
										<a class="btn btn-outline-dark btn-square" href=""
											><i class="fa fa-shopping-cart"></i
										></a>
										<a class="btn btn-outline-dark btn-square" href=""
											><i class="far fa-heart"></i
										></a>
										<a class="btn btn-outline-dark btn-square" href=""
											><i class="fa fa-sync-alt"></i
										></a>
										<a class="btn btn-outline-dark btn-square" href=""
											><i class="fa fa-search"></i
										></a>
									</div>
								</div>
								<div class="text-center py-4">
									<a class="h6 text-decoration-none text-truncate" href=""
										><?= $products["name"] ?></a
									>
									<div class="d-flex align-items-center justify-content-center mt-2">
										<h5>E<?= number_format((float)$products["price"], 2, '.', '') ?></h5>
										<h6 class="text-muted ml-2"><del><?= number_format((float)$products["price"], 2, '.', '') ?></del></h6>
									</div>
									<div class="d-flex align-items-center justify-content-center mb-1">
										<?php 
											for ($j=0; $j < ceil((float)$products["quality"]); $j++) { 
												if((fmod((float)$products["quality"], 1) !== 0.00) && ($j == ceil((float)$products["quality"]) - 1)) {
										?>	
													<small class="fa fa-star-half-alt text-primary mr-1"></small>
										  <?php } else { ?>
													<small class="fa fa-star text-primary mr-1"></small>
										<?php }} ?>
										<small>(99)</small>
									</div>
								</div>
							</div>
						</div>
				<?php }}	?>
			</div>
		</div>
		<!-- Products End -->

		<!-- Vendor Start -->
		<div class="container-fluid py-5">
			<div class="row px-xl-5">
				<div class="col">
					<div class="owl-carousel vendor-carousel">
						<?php
								if ($vendors_error) {
							?>
								<h1>No Vendors To Show</h1>
							<?php } else {
								while ($vendor = $vendors_result->fetch_assoc()) {
							?>
								<div class="bg-light px-4 pt-2" style="display: flex; flex-direction: column; align-items: center; height: 180px; width: 180px;">
									<img style="width: 100%; height: 80%;" src=<?= $vendor["photo"] ?> alt="<?= $vendor["first_name"] ?> <?= $vendor["last_name"] ?>" />
									<a class="h6 text-decoration-none text-truncate pt-2"><?= $vendor["first_name"] ?> <?= $vendor["last_name"] ?></a>
								</div>								
						<?php }} ?>					
					</div>
				</div>
			</div>
		</div>
		<!-- Vendor End -->

		<!-- Footer Start -->
		<div class="container-fluid bg-dark text-secondary mt-5 pt-5">
			<div class="row px-xl-5 pt-5">
				<div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
					<h5 class="text-secondary text-uppercase mb-4">Get In Touch</h5>
					<p class="mb-4">
						No dolore ipsum accusam no lorem. Invidunt sed clita kasd clita et et dolor
						sed dolor. Rebum tempor no vero est magna amet no
					</p>
					<p class="mb-2">
						<i class="fa fa-map-marker-alt text-primary mr-3"></i>123 Street, New York,
						USA
					</p>
					<p class="mb-2">
						<i class="fa fa-envelope text-primary mr-3"></i>info@example.com
					</p>
					<p class="mb-0">
						<i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890
					</p>
				</div>
				<div class="col-lg-8 col-md-12">
					<div class="row">
						<div class="col-md-4 mb-5">
							<h5 class="text-secondary text-uppercase mb-4">Quick Shop</h5>
							<div class="d-flex flex-column justify-content-start">
								<a class="text-secondary mb-2" href="#"
									><i class="fa fa-angle-right mr-2"></i>Home</a
								>
								<a class="text-secondary mb-2" href="#"
									><i class="fa fa-angle-right mr-2"></i>Our Shop</a
								>
								<a class="text-secondary mb-2" href="#"
									><i class="fa fa-angle-right mr-2"></i>Shop Detail</a
								>
								<a class="text-secondary mb-2" href="#"
									><i class="fa fa-angle-right mr-2"></i>Shopping Cart</a
								>
								<a class="text-secondary mb-2" href="#"
									><i class="fa fa-angle-right mr-2"></i>Checkout</a
								>
								<a class="text-secondary" href="#"
									><i class="fa fa-angle-right mr-2"></i>Contact Us</a
								>
							</div>
						</div>
						<div class="col-md-4 mb-5">
							<h5 class="text-secondary text-uppercase mb-4">My Account</h5>
							<div class="d-flex flex-column justify-content-start">
								<a class="text-secondary mb-2" href="#"
									><i class="fa fa-angle-right mr-2"></i>Home</a
								>
								<a class="text-secondary mb-2" href="#"
									><i class="fa fa-angle-right mr-2"></i>Our Shop</a
								>
								<a class="text-secondary mb-2" href="#"
									><i class="fa fa-angle-right mr-2"></i>Shop Detail</a
								>
								<a class="text-secondary mb-2" href="#"
									><i class="fa fa-angle-right mr-2"></i>Shopping Cart</a
								>
								<a class="text-secondary mb-2" href="#"
									><i class="fa fa-angle-right mr-2"></i>Checkout</a
								>
								<a class="text-secondary" href="#"
									><i class="fa fa-angle-right mr-2"></i>Contact Us</a
								>
							</div>
						</div>
						<div class="col-md-4 mb-5">
							<h5 class="text-secondary text-uppercase mb-4">Newsletter</h5>
							<p>Duo stet tempor ipsum sit amet magna ipsum tempor est</p>
							<form action="">
								<div class="input-group">
									<input
										type="text"
										class="form-control"
										placeholder="Your Email Address"
									/>
									<div class="input-group-append">
										<button class="btn btn-primary">Sign Up</button>
									</div>
								</div>
							</form>
							<h6 class="text-secondary text-uppercase mt-4 mb-3">Follow Us</h6>
							<div class="d-flex">
								<a class="btn btn-primary btn-square mr-2" href="#"
									><i class="fab fa-twitter"></i
								></a>
								<a class="btn btn-primary btn-square mr-2" href="#"
									><i class="fab fa-facebook-f"></i
								></a>
								<a class="btn btn-primary btn-square mr-2" href="#"
									><i class="fab fa-linkedin-in"></i
								></a>
								<a class="btn btn-primary btn-square" href="#"
									><i class="fab fa-instagram"></i
								></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div
				class="row border-top mx-xl-5 py-4"
				style="border-color: rgba(256, 256, 256, 0.1) !important"
			>
				<div class="col-md-6 px-xl-0">
					<p class="mb-md-0 text-center text-md-left text-secondary">
						&copy; <a class="text-primary" href="#">Domain</a>. All Rights Reserved.
						Designed by
						<a class="text-primary" href="https://htmlcodex.com">HTML Codex</a>
					</p>
				</div>
				<div class="col-md-6 px-xl-0 text-center text-md-right">
					<img class="img-fluid" src="img/payments.png" alt="" />
				</div>
			</div>
		</div>
		<!-- Footer End -->

		<!-- Back to Top -->
		<a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

		<!-- JavaScript Libraries -->
		<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
		<script src="lib/easing/easing.min.js"></script>
		<script src="lib/owlcarousel/owl.carousel.min.js"></script>

		<!-- Contact Javascript File -->
		<script src="mail/jqBootstrapValidation.min.js"></script>
		<script src="mail/contact.js"></script>

		<!-- Template Javascript -->
		<script src="js/main.js"></script>
	</body>
</html>