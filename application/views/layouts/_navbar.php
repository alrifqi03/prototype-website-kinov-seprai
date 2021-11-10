<nav class="navbar navbar-expand-lg navbar-light fixed-top bg-white shadow p-2">

	<!-- Just an image -->
	<img  href="<?= base_url('') ?>" src="/images/kinov-logo.png" alt="" width="120" height="120"
		style=" position:absolute; ">

	<div class="container mt-3 mb-3 shadow-sm p-3 bg-body rounded">
		<button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarCollapse"
			aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
			<ul class="navbar-nav">
				<li class="nav-item active">
					<a class="nav-link" href="<?= base_url('') ?>">Home <span class="sr-only">(current)</span></a>
				</li>


				<!-- <?php if ($this->session->userdata('role') == 'admin') : ?>
				

				
				<li class="nav-item active">
					<a class="nav-link" href="<?= base_url('') ?>">About <span class="sr-only">(current)</span></a>
				</li>

				<li class="nav-item active">
					<a class="nav-link" href="<?= base_url('') ?>">Kontak <span class="sr-only">(current)</span></a>
				</li>
				<?php endif ?> -->

				<?php if ($this->session->userdata('role') == 'admin') : ?>

				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('category') ?>">Kategori</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('product') ?>">Produk</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('order') ?>">Order</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('user') ?>">Pengguna</a>
				</li>
				<?php endif ?>
			</ul>


			<form class="w-50" action="<?= base_url("/shop/search") ?>" method="POST">
				<div class="input-group ">
					<input class="form-control" type="text" name="keyword" placeholder="Cari"
						value="<?= $this->session->userdata('keyword') ?>">
					<div class="input-group-append">
						<button class="btn btn-secondary" type="submit">
							<i class="fas fa-search"></i>
						</button>
					</div>
				</div>
			</form>



			<ul class="navbar-nav">
				<?php if ($this->session->userdata('role') == 'member') : ?>
				<li class="nav-item">
					<a href="<?= base_url('cart') ?>" class="nav-link"><i class="fas fa-shopping-cart"></i> Keranjang
						<?= getCart(); ?></a>

				</li>
				<?php endif ?>

				<?php if (! $this->session->userdata('role') == 'admin') : ?>
				<li class="nav-item">
					<a href="<?= base_url('/login') ?>" class="nav-link">Login</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('/register') ?>" class="nav-link">Register</a>
				</li>
				<?php else : ?>



				<li class="nav-item dropdown">
					<a href="#" class="nav-link dropdown-toggle" id="dropdown-2" data-toggle="dropdown"
						aria-haspopup="true" aria-expanded="false"><?= $this->session->userdata('name') ?></a>
					<div class="dropdown-menu" aria-labelledby="dropdown-2">
						<a href="<?= base_url('/profile') ?>" class="dropdown-item">Profile</a>

						<?php if ($this->session->userdata('role') == 'member') : ?>
						<a href="<?= base_url("/myorder") ?>" class="dropdown-item">Orders</a>
						<?php endif ?>

						<a href="<?= base_url('/logout') ?>" class="dropdown-item">Logout</a>
					</div>
				</li>
				<?php endif ?>

			</ul>
		</div>

	</div>
</nav>
