<?= $this->extend('templates/dashboard_template') ?>

<?= $this->section('content') ?>
<section>
    <div class="container-xl">
        <div class="row g-3 mb-4 align-items-center justify-content-between">
            <div class="col-auto">
                <h1 class="app-page-title mb-0">Create Blog</h1>
            </div>
        </div>
        <div class="row g-3 mb-4 align-items-center justify-content-between">
            <div class="col-12">
                <div class="app-card shadow-sm h-100">
                    <div class="app-card-body p-3 has-card-actions">

                        <h4 class="app-doc-title truncate">Create Article</h4>

                        <?= form_open('', ['class' => 'auth-form login-form']) ?>
                        <div class="email mb-3">
                            <label class="sr-only" for="email">Email</label>
                            <input id="email" name="email" type="email" class="form-control login-email" placeholder="Email address" />
                            <p class="text-danger fs-7">
                                Error!
                            </p>
                        </div>
                        <div class="mb-3">
                            <div id="article_editor"></div>
                            <textarea id="articleEditor"></textarea>
                        </div>
                        <?= form_close() ?>             
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
$this->endSection()?>