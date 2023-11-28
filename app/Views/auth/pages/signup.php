<?= $this->extend('auth/auth_template') ?>

<?= $this->section('content') ?>
<section>
	<div class="row g-0 app-auth-wrapper">
		<div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
			<div class="d-flex flex-column align-content-end">
				<div class="app-auth-body mx-auto">
					<div class="app-auth-branding mb-4"><a class="app-logo" href="index.html"><img class="logo-icon me-2" src="assets/images/app-logo.svg" alt="logo"></a></div>
					<h2 class="auth-heading text-center mb-4">Sign up to Crafting Connection</h2>
					<div class="auth-form-container text-start mx-auto">
						<?= form_open(base_url() . 'signup', ['class' => 'auth-form auth-signup-form']) ?>
						<div class="username mb-3">
							<label class="sr-only" for="signup-name">Your Name</label>
							<input id="username" name="username" type="text" value="<?= set_value('username') ?>" class="form-control signup-name" placeholder="Full name" />
							<p class="text-danger fs-7">
								<?php if (isset($validation)) {
									echo $validation->getError('username');
								} ?>
							</p>
						</div>
						<div class="email mb-3">
							<label class="sr-only" for="signup-email">Your Email</label>
							<input id="email" name="email" type="email" value="<?= set_value('email') ?>" class="form-control signup-email" placeholder="Email" />
							<p class="text-danger fs-7">
								<?php if (isset($validation)) {
									echo $validation->getError('email');
								} ?>
							</p>
						</div>
						<div class="password mb-3 position-relative">
							<label class="sr-only" for="signup-password">Password</label>
							<input id="password" name="password" type="password" value="<?= set_value('password') ?>" class="form-control pe-4 signup-password" placeholder="Create a password" />
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
						<div class="extra mb-3">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="<?= set_value('termscondition') ?>" id="TermsCondition
								"/>
								<label class="form-check-label" for="TermsCondition
								">
									I agree to Crafting Connections <a href="#" class="app-link">Terms of Service</a> and <a href="#" class="app-link">Privacy Policy</a>.
								</label>
							</div>
						</div><!--//extra-->

						<div class="text-center">
							<button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Sign Up</button>
						</div>
						<?= form_close() ?>

						<div class="auth-option text-center pt-5">Already have an account? <a class="text-link" href="<?= base_url('login') ?>">Log in</a></div>
					</div><!--//auth-form-container-->
				</div><!--//auth-body-->
			</div><!--//flex-column-->
		</div><!--//auth-main-col-->
		<div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
			<div class="auth-background-holder">
			</div>
			<div class="auth-background-mask"></div>
			<div class="auth-background-overlay p-3 p-lg-5">
				<div class="d-flex flex-column align-content-end h-100">
					<div class="h-100"></div>
				</div>
			</div><!--//auth-background-overlay-->
		</div><!--//auth-background-col-->
	</div><!--//row-->
</section>
<?= $this->endSection() ?>