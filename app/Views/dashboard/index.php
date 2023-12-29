<?= $this->extend('templates/dashboard_template') ?>

<?= $this->section('content') ?>
<section>
	<div class="container-xl">

		<h1 class="app-page-title">Dashboard</h1>

		<div class="row g-4 mb-4">
			<div class="col-12">
				<div class="app-card app-card-stat shadow-sm h-100">
					<div class="app-card-body p-3 p-lg-4">
						<div class="row">
							<div class="col-12 col-md-4">
								<div class="p-3"><img class="img-thumbnail rounded" src="<?= $user_data['avatar']; ?>" alt=""></div>
							</div>
							<div class="col-12 col-md-6">
								<div class="item border-bottom py-3">
									<div class="row justify-content-between align-items-center">
										<div class="col-auto">
											<div class="item-label text-start"><strong>Name</strong></div>
											<div class="item-data text-start"><?= $user_data['username']; ?></div>
										</div>
									</div>
								</div>
								<div class="item border-bottom py-3">
									<div class="row justify-content-between align-items-center">
										<div class="col-auto">
											<div class="item-label text-start"><strong>Email</strong></div>
											<div class="item-data text-start"><?= $user_data['email']; ?></div>
										</div>
									</div>
								</div>
								<div class="item border-bottom py-3">
									<div class="row justify-content-between align-items-center">
										<div class="col-auto">
											<div class="item-label text-start"><strong>Gender</strong></div>
											<div class="item-data text-start">
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
											<div class="item-label text-start"><strong>Bio</strong></div>
											<div class="item-data text-start"><?= $user_data['bio']; ?></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12">
				<div class="app-card app-card-stat shadow-sm h-100">
					<div class="app-card-header p-3">
						<h4 class="fw-bold">Article Details</h4>
					</div>
					<div class="app-card-body p-3 p-lg-4">
						<div class="row">
							<div class="col-12 col-md-6">
								<div class="item border-bottom py-3">
									<div class="row justify-content-between align-items-center">
										<div class="col-auto">
											<div class="item-label text-start"><strong>Article Count</strong></div>
											<div class="item-data text-start"><?php if(is_array($articles_list)){ echo count($articles_list); }else{echo 0;}?></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div><!--//container-fluid-->
</section>
<?= $this->endSection() ?>