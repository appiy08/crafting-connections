<?= $this->extend('auth/auth_template') ?>

<?= $this->section('content') ?>
<section>
	<div class="row g-0 app-auth-wrapper">
		<div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
			<div class="d-flex flex-column align-content-end">
				<div class="app-auth-body mx-auto">
					<div class="app-auth-branding mb-4"><a class="app-logo" href="<?= base_url('/') ?>"><img class="logo-icon me-2" src="<?= base_url('assets/images/app-logo.svg') ?>" alt="logo" /></a></div>
					<h2 class="auth-heading text-center mb-4">Reset Password</h2>
					<?php if (isset($error)) : ?>
						<div class="alert alert-danger" role="alert">
							<?= $error ?>
						</div>
					<?php else : ?>
						<div class="auth-form-container text-left">
							<?php if (isset($session)) : if ($session->getTempdata('error')) : ?>
									<div class="alert alert-danger" role="alert">
										<?= $session->getTempdata('error') ?>
									</div>
								<?php elseif ($session->getTempdata('success')) : ?>
									<div class="alert alert-success" role="alert">
										<?= $session->getTempdata('success') ?>
									</div>
							<?php endif;
							endif; ?>
							<?= form_open(base_url() . 'reset-password/' . $token, ['class' => 'auth-form resetpass-form']) ?>
							<div class="password mb-3 position-relative">
								<label class="sr-only" for="password">Password</label>
								<input id="password" name="password" type="password" value="<?= set_value('password') ?>" class="form-control pe-4 signup-password" placeholder="New password" />
								<button type="button" id="togglePassword" class="btn p-1 z-3 position-absolute top-50 translate-middle-y btn-toggle-password">
									<i class="fa-solid fa-eye toggle-password-icon"></i>
									<i class="fa-solid fa-eye-slash toggle-password-icon d-none"></i>
								</button>
								<p class="text-danger fs-7">
									<?php if (isset($validation)) {
										echo $validation->getError('password');
									} ?>
								</p>
							</div>
							<div class="password mb-3 position-relative">
								<label class="sr-only" for="confirm_password">Confirm Password</label>
								<input id="confirm_password" name="confirm_password" type="password" value="<?= set_value('confirm_password') ?>" class="form-control pe-4 signup-password" placeholder="Confirm new password" />
								<button type="button" id="togglePassword" class="btn p-1 z-3 position-absolute top-50 translate-middle-y btn-toggle-password">
									<i class="fa-solid fa-eye toggle-password-icon"></i>
									<i class="fa-solid fa-eye-slash toggle-password-icon d-none"></i>
								</button>
								<p class="text-danger fs-7">
									<?php if (isset($validation)) {
										echo $validation->getError('confirm_password');
									} ?>
								</p>
							</div>
							<div class="text-center">
								<button type="submit" class="btn app-btn-primary btn-block theme-btn mx-auto">Update Password</button>
							</div>
							<?= form_close() ?>

							<div class="auth-option text-center pt-5"><a class="app-link" href="<?= base_url('/login') ?>">Log in</a> <span class="px-2">|</span> <a class="app-link" href="<?= base_url('/login') ?>">Sign up</a></div>
						</div><!--//auth-form-container-->

					<?php endif ?>
				</div><!--//auth-body-->

				<footer class="app-auth-footer">
					<div class="container text-center py-3">
						<!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
						<small class="copyright">Designed with <span class="sr-only">love</span><i class="fas fa-heart" style="color: #fb866a;"></i> by <a class="app-link" href="http://themes.3rdwavemedia.com" target="_blank">Xiaoying Riley</a> for developers</small>

					</div>
				</footer><!--//app-auth-footer-->
			</div><!--//flex-column-->
		</div><!--//auth-main-col-->
		<div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
			<div class="auth-background-holder">
			</div>
			<div class="auth-background-mask"></div>
			<div class="auth-background-overlay p-3 p-lg-5">
				<div class="d-flex flex-column align-content-end h-100">
					<div class="h-100"></div>
					<div class="overlay-content p-3 p-lg-4 rounded">
						<h5 class="mb-3 overlay-title">Explore Portal Admin Template</h5>
						<div>Portal is a free Bootstrap 5 admin dashboard template. You can download and view the template license <a href="https://themes.3rdwavemedia.com/bootstrap-templates/admin-dashboard/portal-free-bootstrap-admin-dashboard-template-for-developers/">here</a>.</div>
					</div>
				</div>
			</div><!--//auth-background-overlay-->
		</div><!--//auth-background-col-->

	</div><!--//row-->
</section>
<?= $this->endSection() ?>