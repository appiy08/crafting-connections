<?= $this->extend('templates/dashboard_template') ?>

<?= $this->section('content') ?>
<section>
    <div class="container-xl">
        <div class="row g-3 mb-4 align-items-center justify-content-between">
            <div class="col-auto">
                <h1 class="app-page-title mb-0">Article Edit</h1>
            </div>
        </div>
        <div class="row g-3 mb-4 align-items-center justify-content-between">
            <div class="col-12">
                <div class="app-card shadow-sm h-100">
                    <div class="app-card-body p-3 has-card-actions">
                        <?php if (session()->getTempdata('success')) : ?>
                            <div class="alert alert-success" role="alert">
                                <?= session()->getTempdata('success') ?>
                            </div>
                        <?php elseif (session()->getTempdata('error')) : ?>
                            <div class="alert alert-danger" role="alert">
                                <?= session()->getTempdata('error') ?>
                            </div>
                        <?php endif; ?>
                        <?= form_open_multipart('', ['class' => 'mt-3 mb-5 px-3']); ?>
                        <div class="mb-3">
                            <label class="sr-only" for="article_title">Title</label>
                            <input id="article_title" name="article_title" type="text" value="<?= set_value('article_title', $article_data[0]['article_title']) ?>" class="form-control" placeholder="Article Title" />
                            <p class="text-danger fs-7">
                                <?php
                                if (isset($validation)) {
                                    echo $validation->getError('article_title');
                                }
                                ?>
                            </p>
                        </div>
                        <div class="mb-3">
                            <label class="sr-only" for="category_id">Category</label>
                            <select id="category_id" name="category_id" class="form-select" aria-label="Default select example">
                                <option disabled selected>Category</option>
                                <?php if (isset($categories_data)) : foreach ($categories_data as $item) : ?>
                                        <option value="<?= esc($item['category_id']) ?>" <?= $item['category_id'] == $article_data[0]['category_id'] ? 'selected' : null ?>><?= esc($item['category_title']) ?></option>
                                <?php
                                    endforeach;
                                endif;
                                ?>
                            </select>
                            <p class="text-danger fs-7">
                                <?php
                                if (isset($validation)) {
                                    echo $validation->getError('category_id');
                                }
                                ?>
                            </p>
                        </div>

                        <div class="mb-5">
                            <label class="sr-only" for="articleContentEditor">Content</label>
                            <textarea id="articleContentEditor" name="article_content" value="<?= $article_data[0]['article_content'] ?>"></textarea>
                            <p class="text-danger fs-7">
                                <?php
                                if (isset($validation)) {
                                    echo $validation->getError('article_content');
                                }
                                ?>
                            </p>
                        </div>
                        <div class="mt-3 text-center">
                            <button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Update</button>
                        </div>
                        <?= form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
$this->endSection() ?>