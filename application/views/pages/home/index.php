
<main role="main" class="container">

	<div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
		<div class="carousel-inner mt-4">
			<div class="carousel-item active">
				<img src="/images/sprei1.jpg" style="width:200px; height:500px;" class="d-block w-100" alt="...">
				</div>
			<div class="carousel-item">
				<img src="/images/sprei2.png" style="width:200px; height:500px;" class="d-block w-100" alt="...">
			</div>
			<div class="carousel-item">
				<img src="/images/sprei3.jpg" style="width:200px; height:500px;" class="d-block w-100" alt="...">
			</div>
		</div>
		<a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>


	
	
	<?php $this->load->view('layouts/_alert') ?>
	<div class="row mt-3">
		
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-12">
					<div class="card mb-3">
						<div class="card-body">
							Kategori: <strong><?= isset($category) ? $category : 'Semua Kategori' ?></strong>
							<span class="float-right">
								Urutkan Harga: <a href="<?= base_url("/shop/sortby/asc") ?>"
									class="badge badge-primary">Termurah</a> | <a
									href="<?= base_url("/shop/sortby/desc") ?>" class="badge badge-primary">Termahal</a>
							</span>
						</div>
					</div>
				</div>
			</div>

			<div class="nav-scroller py-1 mb-2">
			<nav class="nav d-flex justify-content-between">
				<a style="color: #6C757D;" href="<?= base_url('/') ?>">Semua Kategori</a></li>
				<?php foreach(getCategories() as $category) : ?>
				<a style="color: #6C757D;"
						href="<?= base_url("/shop/category/$category->slug") ?>"><?= $category->title ?></a>
				
				<?php endforeach ?>
			</nav>
		</div>


			<div class="row">
				<?php foreach($content as $row) : ?>
				<div class="col-md-3">
					<div class="card mb-3">
						<img src="<?= $row->image ? base_url("/images/product/$row->image") : base_url("/images/product/default.png") ?>"
							alt="" height="" class="card-img-top">
						<div class="card-body">
							<h5 class="card-title"><?= $row->product_title ?></h5>
							<p class="card-text"><strong>Rp<?= number_format($row->price, 0, ',', '.') ?>,-</strong></p>
							<p class="card-text"><?= $row->description ?></p>
							<a href="<?= base_url("/shop/category/$row->category_slug") ?>"
								class="badge badge-primary"><i class="fas fa-tags"></i> <?= $row->category_title ?></a>
							<a href="<?= $row->tokopedia ?>" target=”_blank”>
								<img src="<?= base_url('images/logo/tokopedia.png') ?>" alt="" class="img-fluid"
									style="max-width: 20px;">
							</a>
							<a href="<?= $row->shopee ?>" target=”_blank”>
								<img src="<?= base_url('images/logo/shopee.png') ?>" alt="" class="img-fluid"
									style="max-width: 28px;">
							</a>
						</div>
						<div class="card-footer">
							<form action="<?= base_url("/cart/add") ?>" method="POST">
								<input type="hidden" name="id_product" value="<?= $row->id ?>">
								<div class="input-group">
									<input type="number" name="qty" value="1" class="form-control">
									<div class="input-group-append">
										<button class="btn btn-primary">Add to Cart</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<?php endforeach ?>
			</div>

			<nav aria-label="Page navigation example">
				<?= $pagination ?>
			</nav>
		</div>
		
			
		</div>
	</div>
	
	<footer class="container py-5 mt-5 ">
		<div class="row">
			<div class="col-12 col-md">
				<svg xmlns="#" width="24" height="24" viewBox="0 0 24 24" fill="none"
					stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
					class="d-block mb-2">
					<circle cx="12" cy="12" r="10"></circle>
					<line x1="14.31" y1="8" x2="20.05" y2="17.94"></line>
					<line x1="9.69" y1="8" x2="21.17" y2="8"></line>
					<line x1="7.38" y1="12" x2="13.12" y2="2.06"></line>
					<line x1="9.69" y1="16" x2="3.95" y2="6.06"></line>
					<line x1="14.31" y1="16" x2="2.83" y2="16"></line>
					<line x1="16.62" y1="12" x2="10.88" y2="21.94"></line>
				</svg>
				<small class="d-block mb-3 text-muted">© 2017-2018</small>
			</div>
			<div class="col-6 col-md">
				<h5>Features</h5>
				<ul class="list-unstyled text-small">
					<li><a class="text-muted" href="#">Cool stuff</a></li>
					<li><a class="text-muted" href="#">Random feature</a></li>
					<li><a class="text-muted" href="#">Team feature</a></li>
					<li><a class="text-muted" href="#">Stuff for developers</a></li>
					<li><a class="text-muted" href="#">Another one</a></li>
					<li><a class="text-muted" href="#">Last time</a></li>
				</ul>
			</div>
			<div class="col-6 col-md">
				<h5>Resources</h5>
				<ul class="list-unstyled text-small">
					<li><a class="text-muted" href="#">Resource</a></li>
					<li><a class="text-muted" href="#">Resource name</a></li>
					<li><a class="text-muted" href="#">Another resource</a></li>
					<li><a class="text-muted" href="#">Final resource</a></li>
				</ul>
			</div>
			<div class="col-6 col-md">
				<h5>Resources</h5>
				<ul class="list-unstyled text-small">
					<li><a class="text-muted" href="#">Business</a></li>
					<li><a class="text-muted" href="#">Education</a></li>
					<li><a class="text-muted" href="#">Government</a></li>
					<li><a class="text-muted" href="#">Gaming</a></li>
				</ul>
			</div>
			<div class="col-6 col-md">
				<h5>About</h5>
				<ul class="list-unstyled text-small">
					<li><a class="text-muted" href="#">Team</a></li>
					<li><a class="text-muted" href="#">Locations</a></li>
					<li><a class="text-muted" href="#">Privacy</a></li>
					<li><a class="text-muted" href="#">Terms</a></li>
				</ul>
			</div>
		</div>
	</footer>
	</footer>
	</div>
</main>

