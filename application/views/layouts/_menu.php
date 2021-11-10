<div class="card mb-3">
	<div class="card-header">
		Menu
	</div>
	<div class="list-group list-group-flush">
		<li class="list-group-item">
			<a href="<?= base_url("/profile") ?>">Profile</a>
		</li>
		<?php if ($this->session->userdata('role') == 'member') : ?>
		<li class="list-group-item">
			<a href="<?= base_url("/myorder") ?>">Orders</a>
		</li>
		<?php endif ?>
	</div>
</div>
