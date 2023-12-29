<?= $this->extend('templates/dashboard_template') ?>

<?= $this->section('content') ?>
<section>
	<div class="container-xl">
		<h1 class="app-page-title">My Account</h1>
		<div class="row gy-4">
			<div class="col-12 col-lg-6">
				<div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
					<div class="app-card-header p-3 border-bottom-0">
						<div class="row align-items-center gx-3">
							<div class="col-auto">
								<div class="app-icon-holder">
									<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" d="M10 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
									</svg>
								</div>
							</div>
							<div class="col-auto">
								<h4 class="app-card-title">Profile</h4>
							</div>
						</div>
					</div>
					<div class="app-card-body px-4 w-100">
						<?php if (session()->getTempdata('success')) : ?>
							<div class="alert alert-success" role="alert">
								<?= session()->getTempdata('success') ?>
							</div>
						<?php elseif (session()->getTempdata('error')) : ?>
							<div class="alert alert-danger" role="alert">
								<?= session()->getTempdata('error') ?>
							</div>
						<?php endif; ?>
						<div class="item border-bottom py-3">
							<div class="row justify-content-between align-items-center">
								<div class="col-auto">
									<div class="item-label mb-2"><strong>Photo</strong></div>
									<div class="item-data"><img class="profile-image" src="<?= $user_data['avatar']; ?>" alt=""></div>
								</div>
								<div class="col text-end">
									<a class="btn-sm app-btn-secondary" href="<?= base_url('/dashboard/account/update/avatar') ?>">Change</a>
								</div>
							</div>
						</div>
						<div class="item border-bottom py-3">
							<div class="row justify-content-between align-items-center">
								<div class="col-auto">
									<div class="item-label"><strong>Name</strong></div>
									<div class="item-data"><?= $user_data['username']; ?></div>
								</div>
							</div>
						</div>
						<div class="item border-bottom py-3">
							<div class="row justify-content-between align-items-center">
								<div class="col-auto">
									<div class="item-label"><strong>Email</strong></div>
									<div class="item-data"><?= $user_data['email']; ?></div>
								</div>
							</div>
						</div>
						<div class="item border-bottom py-3">
							<div class="row justify-content-between align-items-center">
								<div class="col-auto">
									<div class="item-label"><strong>Gender</strong></div>
									<div class="item-data">
										<?php if ($user_data['gender'] == 1) {
											echo "Male";
										} else if ($user_data['gender'] == 2) {
											echo "Female";
										} else if ($user_data['gender'] == 3) {
											echo "Other";
										} else {
											echo "Not Selected";
										};
										?>
									</div>
								</div>
							</div>
						</div>
						<div class="item border-bottom py-3">
							<div class="row justify-content-between align-items-center">
								<div class="col-auto">
									<div class="item-label"><strong>Bio</strong></div>
									<div class="item-data"><?= $user_data['bio']; ?></div>
								</div>
							</div>
						</div>
						<div class="app-card-footer p-4 mt-auto">
							<a class="btn app-btn-secondary" href="<?= base_url('/dashboard/account/update') ?>">Manage Profile</a>
						</div>
					</div>
				</div>
			</div>

		</div><!--//container-fluid-->
</section>
<?= $this->endSection() ?>