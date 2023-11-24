<?=$this->extend('template')?>

<?=$this->section('content')?>
<section class="py-5">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-5">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">
                            Register User
                        </h2>
                    </div>
                    <?php if (isset($validation)): ?>
                        <div class="alert alert-warning">
                            <?=$validation->listErrors()?>
                        </div>
                    <?php endif;?>
                    <div class="pt-2 px-3 pb-5">
                        <form action="<?=base_url();?>/SignupController/store" method="post">
                            <div class="form-group mb-3">
                                <input type="text" name="name" placeholder="Name" value="<?=set_value('name')?>" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <input type="email" name="email" placeholder="Email" value="<?=set_value('email')?>" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <input type="password" name="password" placeholder="Password" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <input type="password" name="confirmpassword" placeholder="Confirm Password" class="form-control">
                            </div>

                            <div class="d-grid pt-3">
                                <button type="submit" class="btn btn-dark">Signup</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?=$this->endSection()?>