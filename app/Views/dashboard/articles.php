<?= $this->extend('templates/dashboard_template') ?>

<?= $this->section('content') ?>
<section>
    <div class="container-xl">
        <div class="row g-3 mb-4 align-items-center justify-content-between">
            <div class="col-auto">
                <h1 class="app-page-title mb-0">Articles</h1>
            </div>
            <div class="col-auto">
                <a href='<?= base_url('/dashboard/article/create') ?>' class="btn app-btn-primary w-100 theme-btn mx-auto">Create Article</a>
            </div>
        </div>
        <div class="row g-3 mb-4 align-items-center justify-content-between">
            <div class="col-12">
                <div class="app-card shadow-sm h-100">
                    <div class="app-card-body p-3 has-card-actions">
                        <div class="row row-cols-1 row-cols-md-2 g-4">
                            <?php

                            use CodeIgniter\I18n\Time;

                            if (isset($articles_data)) : foreach ($articles_data as $article) :
                            ?>
                                    <div class="col">
                                        <div class="app-card app-card-basic h-100 shadow-sm">
                                            <div class="ratio ratio-21x9 border-bottom">
                                                <p class="display-5 text-body-tertiary p-5">Crafting Connections</p>
                                            </div>
                                            <div class="app-card-body px-4 pt-3">
                                                <h5 class="card-title"><?= esc($article['article_title']) ?></h5>
                                            </div>
                                            <div class="app-card-footer p-4 mt-auto">
                                                <p class="card-text">
                                                    <small class="text-body-secondary">Last updated
                                                        <?php $current = Time::now();
                                                        $test = Time::parse($article['created_at']);
                                                        $diff = $current->difference($test);
                                                        echo $diff->humanize();
                                                        ?>
                                                    </small>
                                                    <small class="text-body">
                                                        &#8213; <?= $article['username']; ?>
                                                    </small>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                            <?php endforeach;
                            endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
$this->endSection() ?>